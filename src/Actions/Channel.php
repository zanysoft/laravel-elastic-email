<?php
namespace ZanySoft\ElasticEmail\Actions;

class Channel
{
    protected $client;
    
    public function __construct($apiKey, $account) {
        $this->client = new ApiClient($apiKey, $account);
    }
    
    /**
     * Manually add a channel to your account to group email
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $name   Descriptive name of the channel
     *
     * @return string
     */
    public function Add($name) {
        return $this->client->Request('channel/add', array(
            'name' => $name
        ));
    }
    
    /**
     * Delete the channel.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $name   The name of the channel to delete.
     */
    public function EEDelete($name) {
        return $this->client->Request('channel/delete', array(
            'name' => $name
        ));
    }
    
    /**
     * Export channels in CSV file format.
     *
     * @param string $apikey     ApiKey that gives you access to our SMTP and HTTP API's.
     * @param array              <string> $channelNames List of channel names used for processing
     * @param $compressionFormat 0 for None or 1 for Zip.
     * @param string $fileName   Name of your file.
     *
     * @return File
     */
    public function ExportCsv($channelNames, $compressionFormat = 0, $fileName = NULL) {
        return $this->client->getFile('channel/exportcsv', array(
            'channelNames' => (count($channelNames) === 0) ? NULL : join(';', $channelNames),
            'compressionFormat' => $compressionFormat,
            'fileName' => $fileName
        ));
    }
    
    /**
     * Export channels in JSON file format.
     *
     * @param string $apikey     ApiKey that gives you access to our SMTP and HTTP API's.
     * @param array              <string> $channelNames List of channel names used for processing
     * @param $compressionFormat 0 for None or 1 for Zip.
     * @param string $fileName   Name of your file.
     *
     * @return File
     */
    public function ExportJson($channelNames, $compressionFormat = 0, $fileName = NULL) {
        return $this->client->getFile('channel/exportjson', array(
            'channelNames' => (count($channelNames) === 0) ? NULL : join(';', $channelNames),
            'compressionFormat' => $compressionFormat,
            'fileName' => $fileName
        ));
    }
    
    /**
     * Export channels in XML file format.
     *
     * @param string $apikey     ApiKey that gives you access to our SMTP and HTTP API's.
     * @param array              <string> $channelNames List of channel names used for processing
     * @param $compressionFormat 0 for None or 1 for Zip.
     * @param string $fileName   Name of your file.
     *
     * @return File
     */
    public function ExportXml($channelNames, $compressionFormat = 0, $fileName = NULL) {
        return $this->client->getFile('channel/exportxml', array(
            'channelNames' => (count($channelNames) === 0) ? NULL : join(';', $channelNames),
            'compressionFormat' => $compressionFormat,
            'fileName' => $fileName
        ));
    }
    
    /**
     * List all of your channels
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     *
     * @return Array
     */
    public function EEList() {
        return $this->client->Request('channel/list');
    }
    
    /**
     * Rename an existing channel.
     *
     * @param string $apikey  ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $name    The name of the channel to update.
     * @param string $newName The new name for the channel.
     *
     * @return string
     */
    public function Update($name, $newName) {
        return $this->client->Request('channel/update', array(
            'name' => $name,
            'newName' => $newName
        ));
    }
    
}