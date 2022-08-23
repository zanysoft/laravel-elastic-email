<?php

namespace ZanySoft\ElasticEmail\Actions;

class Export extends ApiClient
{
    /**
     * Check the current status of the export.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param Guid $publicExportID
     */
    public function CheckStatus($publicExportID)
    {
        return $this->request('export/checkstatus', array(
            'publicExportID' => $publicExportID
        ));
    }

    /**
     * Summary of export type counts.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     */
    public function CountByType()
    {
        return $this->request('export/countbytype');
    }

    /**
     * Delete the specified export.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param Guid $publicExportID
     */
    public function EEDelete($publicExportID)
    {
        return $this->request('export/delete', array(
            'publicExportID' => $publicExportID
        ));
    }

    /**
     * Returns a list of all exported data.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param int $limit Maximum of loaded items.
     * @param int $offset How many items should be loaded ahead.
     *
     * @return array
     */
    public function EEList($limit = 0, $offset = 0)
    {
        return $this->request('export/list', array(
            'limit' => $limit,
            'offset' => $offset
        ));
    }

}