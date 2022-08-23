<?php

namespace ZanySoft\ElasticEmail\Actions;

use ZanySoft\ElasticEmail\Exception\ApiException;

class ApiClient
{
    /**
     * The Elastic Email API key.
     * @var string
     */
    protected $apiKey;

    /**
     * The Elastic Email username.
     * @var string
     */
    protected $account;

    /**
     * THe Elastic Email API end-point.
     * @var string
     */
    protected $ApiUri = "https://api.elasticemail.com/v2/";

    /**
     * THe Elastic Email API end-point.
     * @var string
     */
    protected $list_name = NULL;

    protected $list_id = NULL;

    /*
     * @param string $apikey    ApiKey that gives you access to our SMTP and HTTP API's.
     */
    public function __construct($apiKey = NULL, $account = NULL)
    {

        $config = app('config')->get('services.elastic_email', []);

        $this->apiKey = $apiKey ? $apiKey : $config['key'];
        $this->account = $account ? $account : $config['account'];
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function setListId($list_id)
    {

        if ($list_id == '' || $list_id == NULL) {
            throw new \Exception("List id cannot be null or empty");
        }

        $this->list_id = $list_id;

        return $this;
    }

    public function setListName($list_name)
    {

        if ($list_name == '' || $list_name == NULL) {
            throw new \Exception("List name cannot be null or empty");
        }

        $this->list_name = $list_name;

        return $this;
    }

    public function request($target, $data = array(), $method = "GET", array $attachments = array())
    {
        $this->cleanNullData($data);
        $data['apikey'] = $this->apiKey;
        $ch = curl_init();
        $url = $this->ApiUri . $target . (($method === "GET") ? '?' . http_build_query($data) : '');
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_SSL_VERIFYPEER => false
        ));

        if ($method === "POST" && count($attachments) > 0) {
            foreach ($attachments as $k => $attachment) {
                $att = $this->attachFile($attachment);
                $postnameSplit = explode('/', $att->postname);
                $att->postname = trim(end($postnameSplit));
                $data['file_' . $k] = $att;
            }
        }

        if ($method === "POST") {
            curl_setopt($ch, CURLOPT_POST, true);
            if (empty($attachments)) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            } else {
                error_reporting(E_ALL ^ E_NOTICE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
        }

        $response = $this->executeWithRetry($ch, true);
        if ($response === false) {
            throw new ApiException($url, $method, 'Request Error: ' . curl_error($ch));
        }
        curl_close($ch);
        $jsonResult = json_decode($response);

        $parseError = $this->getParseError();
        if ($parseError !== false) {
            throw new ApiException($url, $method, 'Request Error: ' . $parseError, $response);
        }
        if ($jsonResult->success === false) {
            throw new ApiException($url, $method, $jsonResult->error);
        }

        return (isset($jsonResult->data) ? $jsonResult->data : $jsonResult);
    }

    public function executeWithRetry($ch, $sleep = false)
    {
        $counter = 0;
        $maxRetries = 3;
        $lastErr = NULL;
        $sleepInSeconds = 5;

        while ($counter < $maxRetries) {
            try {
                $response = curl_exec($ch);

                return $response;
            } catch (\Exception $e) {
                $counter++;
                $lastErr = $e->getMessage();

                if ($sleep) {
                    sleep($sleepInSeconds);
                }
            }
        }

        throw new \Exception('Error after ' . $maxRetries . ' retries: ' . $lastErr);
    }

    public function getFile($target, $data)
    {
        $this->cleanNullData($data);
        $data['apikey'] = $this->apiKey;
        $url = $this->ApiUri . $target;
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data
        ));
        $response = curl_exec($ch);
        if ($response === false) {
            throw new ApiException($url, "POST", 'Request Error: ' . curl_error($ch));
        }
        curl_close($ch);

        return $response;
    }

    private function cleanNullData(&$data)
    {
        foreach ($data as $key => $item) {
            if ($item === NULL) {
                unset($data[$key]);
            }
            if (is_bool($item)) {
                $data[$key] = ($item) ? 'true' : 'false';
            }
        }
    }

    private function attachFile($attachment)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $attachment);
        finfo_close($finfo);
        $save_file = realpath($attachment);

        return new \CurlFile($save_file, $mimeType, $attachment);
    }

    private function getParseError()
    {
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                return false;
            case JSON_ERROR_DEPTH:
                return 'Maximum stack depth exceeded';
            case JSON_ERROR_STATE_MISMATCH:
                return 'Underflow or the modes mismatch';
            case JSON_ERROR_CTRL_CHAR:
                return 'Unexpected control character found';
            case JSON_ERROR_SYNTAX:
                return 'Syntax error, malformed JSON';
            case JSON_ERROR_UTF8:
                return 'Malformed UTF-8 characters, possibly incorrectly encoded';
            default:
                return 'Unknown error';
        }
    }

}