<?php
namespace ZanySoft\ElasticEmail\Actions;

use ElasticEmailClient\ApiClient;

class Attachment
{
    protected $client;
    
    public function __construct($apiKey, $account) {
        $this->client = new ApiClient($apiKey, $account);
    }
    
    /**
     * Permanently deletes attachment file from your account
     *
     * @param string $apikey     ApiKey that gives you access to our SMTP and HTTP API's.
     * @param long $attachmentID ID number of your attachment.
     */
    public function EEDelete($attachmentID) {
        return $this->client->Request('attachment/delete', array(
            'attachmentID' => $attachmentID
        ));
    }
    
    /**
     * Gets address of chosen Attachment
     *
     * @param string $apikey     ApiKey that gives you access to our SMTP and HTTP API's.
     * @param long $attachmentID ID number of your attachment.
     *
     * @return File
     */
    public function Get($attachmentID) {
        return $this->client->getFile('attachment/get', array(
            'attachmentID' => $attachmentID
        ));
    }
    
    /**
     * Lists your available Attachments in the given email
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $msgID  ID number of selected message.
     *
     * @return Array<ApiTypes\Attachment>
     */
    public function EEList($msgID) {
        return $this->client->Request('attachment/list', array(
            'msgID' => $msgID
        ));
    }
    
    /**
     * Lists all your available attachments
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     *
     * @return Array<ApiTypes\Attachment>
     */
    public function ListAll() {
        return $this->client->Request('attachment/listall');
    }
    
    /**
     * Permanently removes attachment file from your account
     *
     * @param string $apikey   ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $fileName Name of your file.
     */
    public function Remove($fileName) {
        return $this->client->Request('attachment/remove', array(
            'fileName' => $fileName
        ));
    }
    
    /**
     * Uploads selected file to the server using http form upload format (MIME multipart/form-data) or PUT method. The attachments expire after 30 days.
     *
     * @param string $apikey       ApiKey that gives you access to our SMTP and HTTP API's.
     * @param File $attachmentFile Content of your attachment.
     *
     * @return ApiTypes\Attachment
     */
    public function Upload($attachmentFile) {
        return $this->client->Request('attachment/upload', array(), "POST", $attachmentFile);
    }
    
}