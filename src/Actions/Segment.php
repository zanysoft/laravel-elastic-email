<?php

namespace ZanySoft\ElasticEmail\Actions;

/**
 * Manages your segments - dynamically created lists of contacts
 */
class Segment extends ApiClient
{
    /**
     * Create new segment, based on specified RULE.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $segmentName Name of your segment.
     * @param string $rule Query used for filtering.
     */
    public function Add($segmentName, $rule)
    {
        return $this->request('segment/add', array(
            'segmentName' => $segmentName,
            'rule' => $rule
        ));
    }

    /**
     * Copy your existing Segment with the optional new rule and custom name
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $sourceSegmentName The name of the segment you want to copy
     * @param string $newSegmentName New name of your segment if you want to change it.
     * @param string $rule Query used for filtering.
     */
    public function EECopy($sourceSegmentName, $newSegmentName = NULL, $rule = NULL)
    {
        return $this->request('segment/copy', array(
            'sourceSegmentName' => $sourceSegmentName,
            'newSegmentName' => $newSegmentName,
            'rule' => $rule
        ));
    }

    /**
     * Delete existing segment.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $segmentName Name of your segment.
     */
    public function EEDelete($segmentName)
    {
        return $this->request('segment/delete', array(
            'segmentName' => $segmentName
        ));
    }

    /**
     * Exports all the contacts from the provided segment
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $segmentName Name of your segment.
     * @param $fileFormat         Format of the exported file 1=csv, 2=xml, 3=json
     * @param $compressionFormat  FileResponse compression format. 0=None or 1=Zip.
     * @param string $fileName Name of your file.
     */
    public function Export($segmentName, $fileFormat = 1, $compressionFormat = 0, $fileName = NULL)
    {
        return $this->request('segment/export', array(
            'segmentName' => $segmentName,
            'fileFormat' => $fileFormat,
            'compressionFormat' => $compressionFormat,
            'fileName' => $fileName
        ));
    }

    /**
     * Lists all your available Segments
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param bool $includeHistory True: Include history of last 30 days. Otherwise, false.
     * @param ?DateTime $from From what date should the segment history be shown. In YYYY-MM-DDThh:mm:ss format.
     * @param ?DateTime $to To what date should the segment history be shown. In YYYY-MM-DDThh:mm:ss format.
     */
    public function EEList($includeHistory = false, $from = NULL, $to = NULL)
    {
        return $this->request('segment/list', array(
            'includeHistory' => $includeHistory,
            'from' => $from,
            'to' => $to
        ));
    }

    /**
     * Lists your available Segments using the provided names
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param array                <string> $segmentNames Names of segments you want to load. Will load all contacts if left empty or the 'All Contacts' name has been provided
     * @param bool $includeHistory True: Include history of last 30 days. Otherwise, false.
     * @param ?DateTime $from From what date should the segment history be shown. In YYYY-MM-DDThh:mm:ss format.
     * @param ?DateTime $to To what date should the segment history be shown. In YYYY-MM-DDThh:mm:ss format.
     *
     * @return array
     */
    public function LoadByName($segmentNames, $includeHistory = false, $from = NULL, $to = NULL)
    {
        return $this->request('segment/loadbyname', array(
            'segmentNames' => (count($segmentNames) === 0) ? NULL : join(';', $segmentNames),
            'includeHistory' => $includeHistory,
            'from' => $from,
            'to' => $to
        ));
    }

    /**
     * Rename or change RULE for your segment
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $segmentName Name of your segment.
     * @param string $newSegmentName New name of your segment if you want to change it.
     * @param string $rule Query used for filtering.
     */
    public function Update($segmentName, $newSegmentName = NULL, $rule = NULL)
    {
        return $this->request('segment/update', array(
            'segmentName' => $segmentName,
            'newSegmentName' => $newSegmentName,
            'rule' => $rule
        ));
    }

}