<?php

namespace ZanySoft\ElasticEmail\Actions;

class Email extends ApiClient
{
    protected $template = NULL;

    protected $subject = NULL;

    protected $bodyHtml = NULL;

    protected $from = NULL;

    protected $fromName = NULL;

    /**
     * @param $template Template name
     *
     * @return $this
     * @throws \Exception
     */
    public function setTemplate($template)
    {

        if ($template == '' || $template == NULL) {
            throw new \Exception("Template name cannot be null or empty");
        }

        $this->template = $template;

        return $this;
    }

    public function setSubject($subject)
    {

        $this->subject = $subject;

        return $this;
    }

    public function setBodyHtml($html)
    {

        $this->bodyHtml = $html;

        return $this;
    }

    public function setFrom($email)
    {

        $this->from = $email;

        return $this;
    }

    public function setFromName($fromName)
    {

        $this->fromName = $fromName;

        return $this;
    }

    /**
     * Get email batch status
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $transactionID Transaction identifier
     * @param bool $showFailed Include Bounced email addresses.
     * @param bool $showSent Include Sent email addresses.
     * @param bool $showDelivered Include all delivered email addresses.
     * @param bool $showPending Include Ready to send email addresses.
     * @param bool $showOpened Include Opened email addresses.
     * @param bool $showClicked Include Clicked email addresses.
     * @param bool $showAbuse Include Reported as abuse email addresses.
     * @param bool $showUnsubscribed Include Unsubscribed email addresses.
     * @param bool $showErrors Include error messages for bounced emails.
     * @param bool $showMessageIDs Include all MessageIDs for this transaction
     */
    public function GetStatus($transactionID, $showFailed = false, $showSent = false, $showDelivered = false, $showPending = false, $showOpened = false, $showClicked = false, $showAbuse = false, $showUnsubscribed = false, $showErrors = false, $showMessageIDs = false)
    {
        return $this->request('email/getstatus', array(
            'transactionID' => $transactionID,
            'showFailed' => $showFailed,
            'showSent' => $showSent,
            'showDelivered' => $showDelivered,
            'showPending' => $showPending,
            'showOpened' => $showOpened,
            'showClicked' => $showClicked,
            'showAbuse' => $showAbuse,
            'showUnsubscribed' => $showUnsubscribed,
            'showErrors' => $showErrors,
            'showMessageIDs' => $showMessageIDs
        ));
    }

    /**
     * Submit emails. The HTTP POST request is suggested. The default, maximum (accepted by us) size of an email is 10 MB in total, with or without attachments included. For suggested implementations please refer to https://elasticemail.com/support/http-api/
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $subject Email subject
     * @param string $from From email address
     * @param string $fromName Display name for from email address
     * @param string $sender Email address of the sender
     * @param string $senderName Display name sender
     * @param string $msgFrom Optional parameter. Sets FROM MIME header.
     * @param string $msgFromName Optional parameter. Sets FROM name of MIME header.
     * @param string $replyTo Email address to reply to
     * @param string $replyToName Display name of the reply to address
     * @param array                                                                                                                                                             <string> $to List of email recipients (each email is treated separately, like a BCC). Separated by comma or semicolon. We
     *                                                                                                                                                                                   suggest using the
     *                                                                                                                                                                          "msgTo" parameter if backward compatibility with API version 1 is not a must.
     * @param array                                                                                                                                                             <string> $msgTo Optional parameter. Will be ignored if the 'to' parameter is also provided. List of email recipients
     *                                                                                                                                                                                   (visible to all other recipients of the message as TO MIME header). Separated by comma or semicolon.
     * @param array                                                                                                                                                             <string> $msgCC Optional parameter. Will be ignored if the 'to' parameter is also provided. List of email recipients
     *                                                                                                                                                                                   (visible to all other recipients of the message as CC MIME header). Separated by comma or semicolon.
     * @param array                                                                                                                                                             <string> $msgBcc Optional parameter. Will be ignored if the 'to' parameter is also provided. List of email recipients (each
     *                                                                                                                                                                                   email is treated seperately). Separated by comma or semicolon.
     * @param array                                                                                                                                                             <string> $lists The name of a contact list you would like to send to. Separate multiple contact lists by commas or
     *                                                                                                                                                                                   semicolons.
     * @param array                                                                                                                                                             <string> $segments The name of a segment you would like to send to. Separate multiple segments by comma or semicolon.
     *                                                                                                                                                                                   Insert "0" for all Active contacts.
     * @param string $mergeSourceFilename File name one of attachments which is a CSV list of Recipients.
     * @param string $channel An ID field (max 191 chars) that can be used for reporting [will default to HTTP API or SMTP API]
     * @param string $bodyHtml Html email body
     * @param string $bodyText Text email body
     * @param string $charset Text value of charset encoding for example: iso-8859-1, windows-1251, utf-8, us-ascii, windows-1250 and more…
     * @param string $charsetBodyHtml Sets charset for body html MIME part (overrides default value from charset parameter)
     * @param string $charsetBodyText Sets charset for body text MIME part (overrides default value from charset parameter)
     * @param $encodingType 0 for None, 1 for Raw7Bit, 2 for Raw8Bit, 3 for QuotedPrintable, 4 for Base64 (Default), 5 for Uue  note that you can also
     *                                                                                                                                                                          provide the text version such as
     *                                                                                                                                                                          "Raw7Bit" for value
     *                                                                                                                                                                          1.  NOTE: Base64 or QuotedPrintable is recommended if you are validating your domain(s) with DKIM.
     * @param string $template The ID of an email template you have created in your account.
     * @param array                                                                                                                                                             <File> $attachmentFiles Attachment files. These files should be provided with the POST multipart file upload, not directly
     *                                                                                                                                                                                 in the request's URL. Should also include merge CSV file
     * @param array                                                                                                                                                             <string, string> $headers Optional Custom Headers. Request parameters prefixed by headers_ like headers_customheader1,
     *                                                                                                                                                                          headers_customheader2. Note: a space is required after the colon before the custom header value. headers_xmailer=xmailer:
     *                                                                                                                                                                          header-value1
     * @param string $postBack Optional header returned in notifications.
     * @param array                                                                                                                                                             <string, string> $merge Request parameters prefixed by merge_ like merge_firstname, merge_lastname. If sending to a
     *                                                                                                                                                                                   template you can send merge_ fields to merge data with the template. Template fields are entered with
     *                                                                                                                                                                          {firstname},
     *                                                                                                                                                                          {lastname} etc.
     * @param string $timeOffSetMinutes Number of minutes in the future this email should be sent up to a maximum of 1 year (524160 minutes)
     * @param string $poolName Name of your custom IP Pool to be used in the sending process
     * @param bool $isTransactional True, if email is transactional (non-bulk, non-marketing, non-commercial). Otherwise, false
     */
    public function Send(
        $subject = NULL, $from = NULL, $fromName = NULL, $sender = NULL, $senderName = NULL, $msgFrom = NULL, $msgFromName = NULL, $replyTo = NULL, $replyToName = NULL, array $to = array(), array $msgTo = array(), array $msgCC = array(), array $msgBcc = array(), array $lists = array(),
        array $segments = array(), $mergeSourceFilename = NULL, $channel = NULL, $bodyHtml = NULL, $bodyText = NULL, $charset = NULL, $charsetBodyHtml = NULL, $charsetBodyText = NULL, $encodingType = 0, $template = NULL, array $attachmentFiles = array(),
        array $headers = array(), $postBack = NULL, array $merge = array(), $timeOffSetMinutes = NULL, $poolName = NULL, $isTransactional = false
    )
    {
        $lists = (count($lists) === 0) ? NULL : join(';', $lists);

        if (empty($lists) || $lists == NULL) {
            $lists = is_array($this->list_name) ? implode(';', $this->list_name) : $this->list_name;
        }

        $arr = array(
            'subject' => $subject ? $subject : $this->subject,
            'from' => $from ? $from : $this->from,
            'fromName' => $fromName ? $fromName : $this->fromName,
            'sender' => $sender,
            'senderName' => $senderName,
            'msgFrom' => $msgFrom,
            'msgFromName' => $msgFromName,
            'replyTo' => $replyTo,
            'replyToName' => $replyToName,
            'to' => (count($to) === 0) ? NULL : join(';', $to),
            'msgTo' => (count($msgTo) === 0) ? NULL : join(';', $msgTo),
            'msgCC' => (count($msgCC) === 0) ? NULL : join(';', $msgCC),
            'msgBcc' => (count($msgBcc) === 0) ? NULL : join(';', $msgBcc),
            'lists' => $lists,
            'segments' => (count($segments) === 0) ? NULL : join(';', $segments),
            'mergeSourceFilename' => $mergeSourceFilename,
            'channel' => $channel,
            'bodyHtml' => $bodyHtml ? $bodyHtml : $this->bodyHtml,
            'bodyText' => $bodyText,
            'charset' => $charset,
            'charsetBodyHtml' => $charsetBodyHtml,
            'charsetBodyText' => $charsetBodyText,
            'encodingType' => $encodingType,
            'template' => $template ? $template : $this->template,
            'postBack' => $postBack,
            'timeOffSetMinutes' => $timeOffSetMinutes,
            'poolName' => $poolName,
            'isTransactional' => $isTransactional
        );
        foreach (array_keys($headers) as $key) {
            $arr['headers_' . $key] = $key . ': ' . $headers[$key];
        }
        foreach (array_keys($merge) as $key) {
            $arr['merge_' . $key] = $merge[$key];
        }

        return $this->request('email/send', $arr, "POST", $attachmentFiles);
    }

    /**
     * Detailed status of a unique email sent through your account. Returns a 'Email has expired and the status is unknown.' error, if the email has not been fully processed yet.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $messageID Unique identifier for this email.
     *
     * @return EmailStatus
     */
    public function Status($messageID)
    {
        return $this->request('email/status', array(
            'messageID' => $messageID
        ));
    }

    /**
     * View email
     *
     * @param string $messageID Message identifier
     *
     * @return EmailView
     */
    public function View($messageID)
    {
        return $this->request('email/view', array(
            'messageID' => $messageID
        ));
    }

}