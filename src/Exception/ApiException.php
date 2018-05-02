<?php
namespace ZanySoft\ElasticEmail\Exception;

class ApiException extends \Exception
{
    public $url;
    public $method;
    public $rawResponse;
    
    /**
     * @param string $url
     * @param string $method
     * @param string $message
     * @param string $rawResponse
     */
    public function __construct($url, $method, $message = "", $rawResponse = "") {
        $this->url         = $url;
        $this->method      = $method;
        $this->rawResponse = $rawResponse;
        parent::__construct($message);
    }
    
    public function __toString() {
        return strtoupper($this->method) . ' ' . $this->url . ' returned: ' . $this->getMessage();
    }
}