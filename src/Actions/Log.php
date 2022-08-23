<?php

namespace ZanySoft\ElasticEmail\Actions;

class Log extends ApiClient
{

    /**
     * Cancels emails that are waiting to be sent.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $channelName Name of selected channel.
     * @param string $transactionID ID number of transaction
     */
    public function CancelInProgress($channelName = NULL, $transactionID = NULL)
    {
        return $this->request('log/cancelinprogress', array(
            'channelName' => $channelName,
            'transactionID' => $transactionID
        ));
    }

    /**
     * Export email log information to the specified file format.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param array $statuses List of comma separated message statuses: 0 for all, 1 for ReadyToSend, 2 for InProgress, 4 for Bounced, 5 for Sent, 6 for Opened, 7 for Clicked, 8 for Unsubscribed, 9 for Abuse Report
     * @param $fileFormat            Format of the exported file 1=csv, 2=xml, 3=json
     * @param ?DateTime $from Start date.
     * @param ?DateTime $to End date.
     * @param int $channelID ID number of selected Channel.
     * @param int $limit Maximum of loaded items.
     * @param int $offset How many items should be loaded ahead.
     * @param bool $includeEmail True: Search includes emails. Otherwise, false.
     * @param bool $includeSms True: Search includes SMS. Otherwise, false.
     * @param array $messageCategory <ApiTypes\MessageCategory> ID of message category
     * @param $compressionFormat     FileResponse compression format. 0=None or 1=Zip.
     * @param string $fileName Name of your file.
     * @param string $email Proper email address.
     *
     * @return string
     */
    public function Export($statuses, $fileFormat = 1, $from = NULL, $to = NULL, $channelID = 0, $limit = 0, $offset = 0, $includeEmail = true, $includeSms = true, array $messageCategory = array(), $compressionFormat = 0, $fileName = NULL, $email = NULL)
    {
        return $this->request('log/export', array(
            'statuses' => (count($statuses) === 0) ? NULL : join(';', $statuses),
            'fileFormat' => $fileFormat,
            'from' => $from,
            'to' => $to,
            'channelID' => $channelID,
            'limit' => $limit,
            'offset' => $offset,
            'includeEmail' => $includeEmail,
            'includeSms' => $includeSms,
            'messageCategory' => (count($messageCategory) === 0) ? NULL : join(';', $messageCategory),
            'compressionFormat' => $compressionFormat,
            'fileName' => $fileName,
            'email' => $email
        ));
    }

    /**
     * Export detailed link tracking information to the specified file format.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param int $channelID ID number of selected Channel.
     * @param ?DateTime $from Starting date for search in YYYY-MM-DDThh:mm:ss format.
     * @param ?DateTime $to Ending date for search in YYYY-MM-DDThh:mm:ss format.
     * @param $fileFormat        Format of the exported file
     * @param int $limit Maximum of loaded items.
     * @param int $offset How many items should be loaded ahead.
     * @param $compressionFormat FileResponse compression format. None or Zip.
     * @param string $fileName Name of your file.
     *
     * @return string
     */
    public function ExportLinkTracking($channelID, $from, $to, $fileFormat = 1, $limit = 0, $offset = 0, $compressionFormat = 0, $fileName = NULL)
    {
        return $this->request('log/exportlinktracking', array(
            'channelID' => $channelID,
            'from' => $from,
            'to' => $to,
            'fileFormat' => $fileFormat,
            'limit' => $limit,
            'offset' => $offset,
            'compressionFormat' => $compressionFormat,
            'fileName' => $fileName
        ));
    }

    /**
     * Track link clicks
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param ?DateTime $from Starting date for search in YYYY-MM-DDThh:mm:ss format.
     * @param ?DateTime $to Ending date for search in YYYY-MM-DDThh:mm:ss format.
     * @param int $limit Maximum of loaded items.
     * @param int $offset How many items should be loaded ahead.
     * @param string $channelName Name of selected channel.
     */
    public function LinkTracking($from = NULL, $to = NULL, $limit = 0, $offset = 0, $channelName = NULL)
    {
        return $this->request('log/linktracking', array(
            'from' => $from,
            'to' => $to,
            'limit' => $limit,
            'offset' => $offset,
            'channelName' => $channelName
        ));
    }

    /**
     * Returns logs filtered by specified parameters.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param array $statuses List of comma separated message statuses: 0 for all, 1 for ReadyToSend, 2 for InProgress, 4 for Bounced, 5 for Sent, 6 for Opened, 7 for Clicked, 8 for Unsubscribed, 9 for Abuse Report
     * @param ?DateTime $from Starting date for search in YYYY-MM-DDThh:mm:ss format.
     * @param ?DateTime $to Ending date for search in YYYY-MM-DDThh:mm:ss format.
     * @param string $channelName Name of selected channel.
     * @param int $limit Maximum of loaded items.
     * @param int $offset How many items should be loaded ahead.
     * @param bool $includeEmail True: Search includes emails. Otherwise, false.
     * @param bool $includeSms True: Search includes SMS. Otherwise, false.
     * @param array $messageCategory ID of message category
     * @param string $email Proper email address.
     * @param bool $useStatusChangeDate True, if 'from' and 'to' parameters should resolve to the Status Change date. To resolve to the creation date - false
     */
    public function Load($statuses, $from = NULL, $to = NULL, $channelName = NULL, $limit = 0, $offset = 0, $includeEmail = true, $includeSms = true, array $messageCategory = array(), $email = NULL, $useStatusChangeDate = false)
    {
        return $this->request('log/load', array(
            'statuses' => (count($statuses) === 0) ? NULL : join(';', $statuses),
            'from' => $from,
            'to' => $to,
            'channelName' => $channelName,
            'limit' => $limit,
            'offset' => $offset,
            'includeEmail' => $includeEmail,
            'includeSms' => $includeSms,
            'messageCategory' => (count($messageCategory) === 0) ? NULL : join(';', $messageCategory),
            'email' => $email,
            'useStatusChangeDate' => $useStatusChangeDate
        ));
    }

    /**
     * Returns notification logs filtered by specified parameters.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param array $statuses List of comma separated message statuses: 0 for all, 1 for ReadyToSend, 2 for InProgress, 4 for Bounced, 5 for Sent, 6 for Opened, 7 for Clicked, 8 for Unsubscribed, 9 for Abuse Report
     * @param ?DateTime $from Starting date for search in YYYY-MM-DDThh:mm:ss format.
     * @param ?DateTime $to Ending date for search in YYYY-MM-DDThh:mm:ss format.
     * @param int $limit Maximum of loaded items.
     * @param int $offset How many items should be loaded ahead.
     * @param array $messageCategory ID of message category
     * @param bool $useStatusChangeDate True, if 'from' and 'to' parameters should resolve to the Status Change date. To resolve to the creation date - false
     * @param $notificationType 0=All, 1=Email, 2=Web
     */
    public function LoadNotifications($statuses, $from = NULL, $to = NULL, $limit = 0, $offset = 0, array $messageCategory = array(), $useStatusChangeDate = false, $notificationType = 0)
    {
        return $this->request('log/loadnotifications', array(
            'statuses' => (count($statuses) === 0) ? NULL : join(';', $statuses),
            'from' => $from,
            'to' => $to,
            'limit' => $limit,
            'offset' => $offset,
            'messageCategory' => (count($messageCategory) === 0) ? NULL : join(';', $messageCategory),
            'useStatusChangeDate' => $useStatusChangeDate,
            'notificationType' => $notificationType
        ));
    }

    /**
     * Retry sending of temporarily not delivered message.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $msgID ID number of selected message.
     */
    public function RetryNow($msgID)
    {
        return $this->request('log/retrynow', array(
            'msgID' => $msgID
        ));
    }

    /**
     * Loads summary information about activity in chosen date range.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param DateTime $from Starting date for search in YYYY-MM-DDThh:mm:ss format.
     * @param DateTime $to Ending date for search in YYYY-MM-DDThh:mm:ss format.
     * @param string $channelName Name of selected channel.
     * @param $interval 1 for detailed information, 0 for daily overview
     * @param string $transactionID ID number of transaction
     */
    public function Summary($from, $to, $channelName = NULL, $interval = 0, $transactionID = NULL)
    {
        return $this->request('log/summary', array(
            'from' => $from,
            'to' => $to,
            'channelName' => $channelName,
            'interval' => $interval,
            'transactionID' => $transactionID
        ));
    }

}