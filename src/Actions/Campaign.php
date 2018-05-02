<?php
namespace ZanySoft\ElasticEmail\Actions;

class Campaign
{
    protected $client;
    
    public function __construct($apiKey, $account) {
        $this->client = new ApiClient($apiKey, $account);
    }
    
    /**
     * Adds a campaign to the queue for processing based on the configuration
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param $campaign      Json representation of a campaign
     *
     * @return int
     */
    public function Add($campaign) {
        return $this->client->Request('campaign/add', array(
            'campaign' => $campaign
        ));
    }
    
    /**
     * Copy selected campaign
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param int $channelID ID number of selected Channel.
     *
     * @return int
     */
    public function EECopy($channelID) {
        return $this->client->Request('campaign/copy', array(
            'channelID' => $channelID
        ));
    }
    
    /**
     * Delete selected campaign
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param int $channelID ID number of selected Channel.
     */
    public function EEDelete($channelID) {
        return $this->client->Request('campaign/delete', array(
            'channelID' => $channelID
        ));
    }
    
    /**
     * Export selected campaigns to chosen file format.
     *
     * @param string $apikey     ApiKey that gives you access to our SMTP and HTTP API's.
     * @param array              <int> $channelIDs List of campaign IDs used for processing
     * @param $fileFormat        Format of the exported file 1 for csv, 2 for xml and 3 for json
     * @param $compressionFormat FileResponse compression format. 0 for None or 1 for Zip.
     * @param string $fileName   Name of your file.
     *
     * @return link
     */
    public function Export(array $channelIDs = array(), $fileFormat = 1, $compressionFormat = 0, $fileName = NULL) {
        return $this->client->Request('campaign/export', array(
            'channelIDs' => (count($channelIDs) === 0) ? NULL : join(';', $channelIDs),
            'fileFormat' => $fileFormat,
            'compressionFormat' => $compressionFormat,
            'fileName' => $fileName
        ));
    }
    
    /**
     * List all of your campaigns
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $search Text fragment used for searching.
     * @param int $offset    How many items should be loaded ahead.
     * @param int $limit     Maximum of loaded items.
     *
     * @return array
     */
    public function EEList($search = NULL, $offset = 0, $limit = 0) {
        return $this->client->Request('campaign/list', array(
            'search' => $search,
            'offset' => $offset,
            'limit' => $limit
        ));
    }
    
    /**
     * Updates a previously added campaign.  Only Active and Paused campaigns can be updated.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param $campaign      Json representation of a campaign
     *
     * @return int
     */
    public function Update($campaign) {
        return $this->client->Request('campaign/update', array(
            'campaign' => $campaign
        ));
    }
    
}