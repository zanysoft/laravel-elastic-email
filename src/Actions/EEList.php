<?php
namespace ZanySoft\ElasticEmail\Actions;

/**
 * API methods for managing your Lists
 */
class EEList extends ApiClient
{
    
    /**
     * Create new list, based on filtering rule or list of IDs
     *
     * @param string $apikey         ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $listName       Name of your list.
     * @param bool $createEmptyList  True to create an empty list, otherwise false. Ignores rule and emails parameters if provided.
     * @param bool $allowUnsubscribe True: Allow unsubscribing from this list. Otherwise, false
     * @param string $rule           Query used for filtering.
     * @param array                  <string> $emails Comma delimited list of contact emails
     * @param bool $allContacts      True: Include every Contact in your Account. Otherwise, false
     *
     * @return int
     */
    public function Add($listName, array $emails = array(), $allowUnsubscribe = false, $rule = NULL, $allContacts = false) {
        return $this->request('list/add', array(
            'listName' => $listName,
            'createEmptyList' => empty($emails) ? true : false,
            'allowUnsubscribe' => $allowUnsubscribe,
            'rule' => $rule,
            'emails' => (count($emails) === 0) ? NULL : join(';', $emails),
            'allContacts' => $allContacts
        ));
    }
    
    /**
     * Add existing Contacts to chosen list
     *
     * @param string $apikey    ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $listName  Name of your list.
     * @param string $rule      Query used for filtering.
     * @param array             <string> $emails Comma delimited list of contact emails
     * @param bool $allContacts True: Include every Contact in your Account. Otherwise, false
     */
    public function AddContacts($listName, $rule = NULL, array $emails = array(), $allContacts = false) {
        return $this->request('list/addcontacts', array(
            'listName' => $listName,
            'rule' => $rule,
            'emails' => (count($emails) === 0) ? NULL : join(';', $emails),
            'allContacts' => $allContacts
        ));
    }
    
    /**
     * Copy your existing List with the option to provide new settings to it. Some fields, when left empty, default to the source list's settings
     *
     * @param string $apikey         ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $sourceListName The name of the list you want to copy
     * @param string $newlistName    Name of your list if you want to change it.
     * @param ?bool $createEmptyList True to create an empty list, otherwise false. Ignores rule and emails parameters if provided.
     * @param ?bool $allowUnsubscribe True: Allow unsubscribing from this list. Otherwise, false
     * @param string $rule           Query used for filtering.
     *
     * @return int
     */
    public function EECopy($sourceListName, $newlistName = NULL, $createEmptyList = NULL, $allowUnsubscribe = NULL, $rule = NULL) {
        return $this->request('list/copy', array(
            'sourceListName' => $sourceListName,
            'newlistName' => $newlistName,
            'createEmptyList' => $createEmptyList,
            'allowUnsubscribe' => $allowUnsubscribe,
            'rule' => $rule
        ));
    }
    
    /**
     * Create a new list from the recipients of the given campaign, using the given statuses of Messages
     *
     * @param string $apikey             ApiKey that gives you access to our SMTP and HTTP API's.
     * @param int $campaignID            ID of the campaign which recipients you want to copy
     * @param string $listName           Name of your list.
     * @param array $statuses            Statuses of a campaign's emails you want to include in the new list (but NOT the contacts' statuses)
     *                                   All = 0,ReadyToSend = 1,WaitingToRetry = 2,Sending = 3,Error = 4,Sent = 5,Opened = 6,
     *                                   Clicked = 7,Unsubscribed = 8,AbuseReport = 9
     *
     * @return int
     */
    public function CreateFromCampaign($campaignID, $listName, array $statuses = array()) {
        return $this->request('list/createfromcampaign', array(
            'campaignID' => $campaignID,
            'listName' => $listName,
            'statuses' => (count($statuses) === 0) ? NULL : join(';', $statuses)
        ));
    }
    
    /**
     * Create a series of nth selection lists from an existing list or segment
     *
     * @param string $apikey         ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $listName       Name of your list.
     * @param int $numberOfLists     The number of evenly distributed lists to create.
     * @param bool $excludeBlocked   True if you want to exclude contacts that are currently in a blocked status of either unsubscribe, complaint or bounce. Otherwise, false.
     * @param bool $allowUnsubscribe True: Allow unsubscribing from this list. Otherwise, false
     * @param string $rule           Query used for filtering.
     * @param bool $allContacts      True: Include every Contact in your Account. Otherwise, false
     */
    public function CreateNthSelectionLists($listName, $numberOfLists, $excludeBlocked = true, $allowUnsubscribe = false, $rule = NULL, $allContacts = false) {
        return $this->request('list/createnthselectionlists', array(
            'listName' => $listName,
            'numberOfLists' => $numberOfLists,
            'excludeBlocked' => $excludeBlocked,
            'allowUnsubscribe' => $allowUnsubscribe,
            'rule' => $rule,
            'allContacts' => $allContacts
        ));
    }
    
    /**
     * Create a new list with randomized contacts from an existing list or segment
     *
     * @param string $apikey         ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $listName       Name of your list.
     * @param int $count             Number of items.
     * @param bool $excludeBlocked   True if you want to exclude contacts that are currently in a blocked status of either unsubscribe, complaint or bounce. Otherwise, false.
     * @param bool $allowUnsubscribe True: Allow unsubscribing from this list. Otherwise, false
     * @param string $rule           Query used for filtering.
     * @param bool $allContacts      True: Include every Contact in your Account. Otherwise, false
     *
     * @return int
     */
    public function CreateRandomList($listName, $count, $excludeBlocked = true, $allowUnsubscribe = false, $rule = NULL, $allContacts = false) {
        return $this->request('list/createrandomlist', array(
            'listName' => $listName,
            'count' => $count,
            'excludeBlocked' => $excludeBlocked,
            'allowUnsubscribe' => $allowUnsubscribe,
            'rule' => $rule,
            'allContacts' => $allContacts
        ));
    }
    
    /**
     * Deletes List and removes all the Contacts from it (does not delete Contacts).
     *
     * @param string $apikey   ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $listName Name of your list.
     */
    public function EEDelete($listName) {
        return $this->request('list/delete', array(
            'listName' => $listName
        ));
    }
    
    /**
     * Exports all the contacts from the provided list
     *
     * @param string $apikey     ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $listName   Name of your list.
     * @param $fileFormat        Format of the exported file 1=csv,2=xml,3=json
     * @param $compressionFormat FileResponse compression format. 0=None or 1=Zip.
     * @param string $fileName   Name of your file.
     */
    public function Export($listName, $fileFormat = 1, $compressionFormat = 0, $fileName = NULL) {
        return $this->request('list/export', array(
            'listName' => $listName,
            'fileFormat' => $fileFormat,
            'compressionFormat' => $compressionFormat,
            'fileName' => $fileName
        ));
    }
    
    /**
     * Shows all your existing lists
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param ?DateTime $from Starting date for search in YYYY-MM-DDThh:mm:ss format.
     * @param ?DateTime $to Ending date for search in YYYY-MM-DDThh:mm:ss format.
     *
     * @return array
     */
    public function EElist($from = NULL, $to = NULL) {
        return $this->request('list/list', array(
            'from' => $from,
            'to' => $to
        ));
    }
    
    /**
     * Returns detailed information about specific list.
     *
     * @param string $apikey   ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $listName Name of your list.
     */
    public function Load($listName) {
        return $this->request('list/load', array(
            'listName' => $listName
        ));
    }
    
    /**
     * Move selected contacts from one List to another
     *
     * @param string $apikey      ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $oldListName The name of the list from which the contacts will be copied from
     * @param string $newListName The name of the list to copy the contacts to
     * @param array               <string> $emails Comma delimited list of contact emails
     * @param ?bool $moveAll TRUE - moves all contacts; FALSE - moves contacts provided in the 'emails' parameter. This is ignored if the 'statuses' parameter has been provided
     * @param array               <ApiTypes\ContactStatus> $statuses List of contact statuses which are eligible to move. This ignores the 'moveAll' parameter
     * @param string $rule        Query used for filtering.
     */
    public function MoveContacts($oldListName, $newListName, array $emails = array(), $moveAll = NULL, array $statuses = array(), $rule = NULL) {
        return $this->request('list/movecontacts', array(
            'oldListName' => $oldListName,
            'newListName' => $newListName,
            'emails' => (count($emails) === 0) ? NULL : join(';', $emails),
            'moveAll' => $moveAll,
            'statuses' => (count($statuses) === 0) ? NULL : join(';', $statuses),
            'rule' => $rule
        ));
    }
    
    /**
     * Remove selected Contacts from your list
     *
     * @param string $apikey   ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $listName Name of your list.
     * @param string $rule     Query used for filtering.
     * @param array            <string> $emails Comma delimited list of contact emails
     */
    public function RemoveContacts($listName, $rule = NULL, array $emails = array()) {
        return $this->request('list/removecontacts', array(
            'listName' => $listName,
            'rule' => $rule,
            'emails' => (count($emails) === 0) ? NULL : join(';', $emails)
        ));
    }
    
    /**
     * Update existing list
     *
     * @param string $apikey         ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $listName       Name of your list.
     * @param string $newListName    Name of your list if you want to change it.
     * @param bool $allowUnsubscribe True: Allow unsubscribing from this list. Otherwise, false
     */
    public function Update($listName, $newListName = NULL, $allowUnsubscribe = false) {
        return $this->request('list/update', array(
            'listName' => $listName,
            'newListName' => $newListName,
            'allowUnsubscribe' => $allowUnsubscribe
        ));
    }
    
}