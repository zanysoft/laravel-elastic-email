<?php
namespace ZanySoft\ElasticEmail\Actions;

/**
 * Managing and editing templates of your emails
 */
class Template extends ApiClient
{
    /**
     * Create new Template. Needs to be sent using POST method
     *
     * @param $templateType           0 for API connections. RawHTML = 0,DragDropEditor = 1
     * @param string $templateName    Name of template.
     * @param string $subject         Default subject of email.
     * @param string $fromEmail       Default From: email address.
     * @param string $fromName        Default From: name.
     * @param $templateScope          Enum: 0 - private, 1 - public, 2 - mockup
     * @param string $bodyHtml        HTML code of email (needs escaping).
     * @param string $bodyText        Text body of email.
     * @param string $css             CSS style
     * @param int $originalTemplateID ID number of original template.
     *
     * @return int
     */
    public function Add($templateType, $templateName, $subject, $fromEmail, $fromName, $templateScope = 0, $bodyHtml = NULL, $bodyText = NULL, $css = NULL, $originalTemplateID = 0) {
        return $this->request('template/add', array(
            'templateType' => $templateType,
            'templateName' => $templateName,
            'subject' => $subject,
            'fromEmail' => $fromEmail,
            'fromName' => $fromName,
            'templateScope' => $templateScope,
            'bodyHtml' => $bodyHtml,
            'bodyText' => $bodyText,
            'css' => $css,
            'originalTemplateID' => $originalTemplateID
        ));
    }
    
    /**
     * Check if template is used by campaign.
     *
     * @param int $templateID ID number of template.
     *
     * @return bool
     */
    public function CheckUsage($templateID) {
        return $this->request('template/checkusage', array(
            'templateID' => $templateID
        ));
    }
    
    /**
     * Copy Selected Template
     *
     * @param int $templateID      ID number of template.
     * @param string $templateName Name of template.
     * @param string $subject      Default subject of email.
     * @param string $fromEmail    Default From: email address.
     * @param string $fromName     Default From: name.
     */
    public function EECopy($templateID, $templateName, $subject, $fromEmail, $fromName) {
        return $this->request('template/copy', array(
            'templateID' => $templateID,
            'templateName' => $templateName,
            'subject' => $subject,
            'fromEmail' => $fromEmail,
            'fromName' => $fromName
        ));
    }
    
    /**
     * Delete template with the specified ID
     *
     * @param int $templateID ID number of template.
     */
    public function EEDelete($templateID) {
        return $this->request('template/delete', array(
            'templateID' => $templateID
        ));
    }
    
    /**
     * Search for references to images and replaces them with base64 code.
     *
     * @param int $templateID ID number of template.
     *
     * @return string
     */
    public function GetEmbeddedHtml($templateID) {
        return $this->request('template/getembeddedhtml', array(
            'templateID' => $templateID
        ));
    }
    
    /**
     * Lists your templates
     *
     * @param int $limit  Maximum of loaded items.
     * @param int $offset How many items should be loaded ahead.
     */
    public function GetList($limit = 500, $offset = 0) {
        return $this->request('template/getlist', array(
            'limit' => $limit,
            'offset' => $offset
        ));
    }
    
    /**
     * Load template with content
     *
     * @param int $templateID ID number of template.
     * @param bool $ispublic
     */
    public function LoadTemplate($templateID, $ispublic = false) {
        return $this->request('template/loadtemplate', array(
            'templateID' => $templateID,
            'ispublic' => $ispublic
        ));
    }
    
    /**
     * Removes previously generated screenshot of template
     *
     * @param int $templateID ID number of template.
     */
    public function RemoveScreenshot($templateID) {
        return $this->request('template/removescreenshot', array(
            'templateID' => $templateID
        ));
    }
    
    /**
     * Saves screenshot of chosen Template
     *
     * @param string $base64Image Image, base64 coded.
     * @param int $templateID     ID number of template.
     *
     * @return string
     */
    public function SaveScreenshot($base64Image, $templateID) {
        return $this->request('template/savescreenshot', array(
            'base64Image' => $base64Image,
            'templateID' => $templateID
        ));
    }
    
    /**
     * Update existing template, overwriting existing data. Needs to be sent using POST method.
     *
     * @param int $templateID      ID number of template.
     * @param $templateScope       Enum: 0 - private, 1 - public, 2 - mockup
     * @param string $templateName Name of template.
     * @param string $subject      Default subject of email.
     * @param string $fromEmail    Default From: email address.
     * @param string $fromName     Default From: name.
     * @param string $bodyHtml     HTML code of email (needs escaping).
     * @param string $bodyText     Text body of email.
     * @param string $css          CSS style
     * @param bool $removeScreenshot
     */
    public function Update($templateID, $templateScope = 0, $templateName = NULL, $subject = NULL, $fromEmail = NULL, $fromName = NULL, $bodyHtml = NULL, $bodyText = NULL, $css = NULL, $removeScreenshot = true) {
        return $this->request('template/update', array(
            'templateID' => $templateID,
            'templateScope' => $templateScope,
            'templateName' => $templateName,
            'subject' => $subject,
            'fromEmail' => $fromEmail,
            'fromName' => $fromName,
            'bodyHtml' => $bodyHtml,
            'bodyText' => $bodyText,
            'css' => $css,
            'removeScreenshot' => $removeScreenshot
        ),'POST');
    }
    
}