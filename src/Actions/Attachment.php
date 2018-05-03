<?php
namespace ZanySoft\ElasticEmail\Actions;

class Attachment extends ApiClient
{
    
    /**
     * Permanently deletes attachment file from your account
     *
     * @param long $attachmentID ID number of your attachment.
     */
    public function EEDelete($attachmentID) {
        return $this->request('attachment/delete', array(
            'attachmentID' => $attachmentID
        ));
    }
    
    /**
     * Gets address of chosen Attachment
     *
     * @param long $attachmentID ID number of your attachment.
     *
     * @return File
     */
    public function get($attachmentID) {
        return $this->getFile('attachment/get', array(
            'attachmentID' => $attachmentID
        ));
    }
    
    /**
     * Lists your available Attachments in the given email
     *
     * @param string $msgID ID number of selected message.
     *
     * @return array
     */
    public function EEList($msgID) {
        return $this->request('attachment/list', array(
            'msgID' => $msgID
        ));
    }
    
    /**
     * Lists all your available attachments
     * @return array
     */
    public function listAll() {
        return $this->request('attachment/listall');
    }
    
    /**
     * Permanently removes attachment file from your account
     *
     * @param string $fileName Name of your file.
     */
    public function remove($fileName) {
        return $this->request('attachment/remove', array(
            'fileName' => $fileName
        ));
    }
    
    /**
     * Uploads selected file to the server using http form upload format (MIME multipart/form-data) or PUT method. The attachments expire after 30 days.
     *
     * @param File $attachmentFile Content of your attachment.
     */
    public function upload($attachmentFile) {
        return $this->request('attachment/upload', array(), "POST", $attachmentFile);
    }
    
}