<?php
namespace ZanySoft\ElasticEmail\Actions;

class Contact extends ApiClient
{
    
    /**
     * Add a new contact and optionally to one of your lists.  Note that your API KEY is not required for this call.
     *
     * @param string $publicAccountID     Public key for limited access to your account such as contact/add so you can use it safely on public websites.
     * @param string $email               Proper email address.
     * @param array                       <string> $publicListID ID code of list
     * @param array                       <string> $listName Name of your list.
     * @param string $title               Title
     * @param string $firstName           First name.
     * @param string $lastName            Last name.
     * @param string $phone               Phone number
     * @param string $mobileNumber        Mobile phone number
     * @param string $notes               Free form field of notes
     * @param string $gender              Your gender
     * @param ?DateTime $birthDate Date of birth in YYYY-MM-DD format
     * @param string $city                City.
     * @param string $state               State or province.
     * @param string $postalCode          Zip/postal code.
     * @param string $country             Name of country.
     * @param string $organizationName    Name of organization
     * @param string $website             HTTP address of your website.
     * @param ?int $annualRevenue Annual revenue of contact
     * @param string $industry            Industry contact works in
     * @param ?int $numberOfEmployees Number of employees
     * @param $source                     Specifies the way of uploading the contact
     *                                    DeliveryApi = 0, ManualInput = 1, FileUpload = 2, WebForm = 3,ContactApi = 4
     * @param string $returnUrl           URL to navigate to after account creation
     * @param string $sourceUrl           URL from which request was sent.
     * @param string $activationReturnUrl The url to return the contact to after activation.
     * @param string $activationTemplate
     * @param bool $sendActivation        True, if you want to send activation email to this account. Otherwise, false
     * @param ?DateTime $consentDate Date of consent to send this contact(s) your email. If not provided current date is used for consent.
     * @param string $consentIP           IP address of consent to send this contact(s) your email. If not provided your current public IP address is used for consent.
     * @param array                       <string, string> $field Custom contact field like firstname, lastname, city etc. Request parameters prefixed by field_ like field_firstname, field_lastname
     * @param string $notifyEmail         Emails, separated by semicolon, to which the notification about contact subscribing should be sent to
     *
     * @return string
     */
    public function Add(
        $email, $title = NULL, $firstName = NULL, $lastName = NULL, $phone = NULL, $mobileNumber = NULL, $notes = NULL, $gender = NULL, $birthDate = NULL, $city = NULL, $state = NULL, $postalCode = NULL, $country = NULL,
        $organizationName = NULL, $website = NULL, $annualRevenue = NULL, $industry = NULL, $numberOfEmployees = NULL, $source = 4, $returnUrl = NULL, $sourceUrl = NULL, $activationReturnUrl = NULL, $activationTemplate = NULL, $sendActivation = true,
        $consentDate = NULL, $consentIP = NULL, array $field = array(), $notifyEmail = NULL
    ) {
        $arr = array(
            'publicAccountID' => $this->account,
            'email' => $email,
            'publicListID' => is_array($this->list_id) ? implode(';', $this->list_id) : $this->list_id,
            'listName' => is_array($this->list_name) ? implode(';', $this->list_name) : $this->list_name,
            'title' => $title,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'phone' => $phone,
            'mobileNumber' => $mobileNumber,
            'notes' => $notes,
            'gender' => $gender,
            'birthDate' => $birthDate,
            'city' => $city,
            'state' => $state,
            'postalCode' => $postalCode,
            'country' => $country,
            'organizationName' => $organizationName,
            'website' => $website,
            'annualRevenue' => $annualRevenue,
            'industry' => $industry,
            'numberOfEmployees' => $numberOfEmployees,
            'source' => $source,
            'returnUrl' => $returnUrl,
            'sourceUrl' => $sourceUrl,
            'activationReturnUrl' => $activationReturnUrl,
            'activationTemplate' => $activationTemplate,
            'sendActivation' => $sendActivation,
            'consentDate' => $consentDate,
            'consentIP' => $consentIP,
            'notifyEmail' => $notifyEmail
        );
        foreach (array_keys($field) as $key) {
            $arr['field_' . $key] = $field[$key];
        }
        
        return $this->request('contact/add', $arr);
    }
    
    /**
     * Manually add or update a contacts status to Abuse or Unsubscribed status (blocked).
     *
     * @param string $email  Proper email address.
     * @param $status        Name of status: Active, Engaged, Inactive, Abuse, Bounced, Unsubscribed.
     */
    public function AddBlocked($email, $status) {
        return $this->request('contact/addblocked', array(
            'email' => $email,
            'status' => $status
        ));
    }
    
    /**
     * Change any property on the contact record.
     *
     * @param string $email  Proper email address.
     * @param string $name   Name of the contact property you want to change.
     * @param string $value  Value you would like to change the contact property to.
     */
    public function ChangeProperty($email, $name, $value) {
        return $this->request('contact/changeproperty', array(
            'email' => $email,
            'name' => $name,
            'value' => $value
        ));
    }
    
    /**
     * Changes status of selected Contacts. You may provide RULE for selection or specify list of Contact IDs.
     *
     * @param $status           Name of status: Transactional = -2,Engaged = -1,Active = 0,Bounced = 1,
     *                          Unsubscribed = 2,Abuse = 3,Inactive = 4,Stale = 5,NotConfirmed = 6.
     * @param string $rule      Query used for filtering.
     * @param array             <string> $emails Comma delimited list of contact emails
     * @param bool $allContacts True: Include every Contact in your Account. Otherwise, false
     */
    public function ChangeStatus($status, $rule = NULL, array $emails = array(), $allContacts = false) {
        return $this->request('contact/changestatus', array(
            'status' => $status,
            'rule' => $rule,
            'emails' => (count($emails) === 0) ? NULL : join(';', $emails),
            'allContacts' => $allContacts
        ));
    }
    
    /**
     * Returns number of Contacts, RULE specifies contact Status.
     *
     * @param string $rule      Query used for filtering.
     * @param bool $allContacts True: Include every Contact in your Account. Otherwise, false
     */
    public function CountByStatus($rule = NULL, $allContacts = false) {
        return $this->request('contact/countbystatus', array(
            'rule' => $rule,
            'allContacts' => $allContacts
        ));
    }
    
    /**
     * Returns count of unsubscribe reasons for unsubscribed and complaint contacts.
     *
     */
    public function CountByUnsubscribeReason() {
        return $this->request('contact/countbyunsubscribereason');
    }
    
    /**
     * Permanantly deletes the contacts provided.  You can provide either a qualified rule or a list of emails (comma separated string).
     *
     * @param string $rule      Query used for filtering.
     * @param array             <string> $emails Comma delimited list of contact emails
     * @param bool $allContacts True: Include every Contact in your Account. Otherwise, false
     */
    public function EEDelete($rule = NULL, array $emails = array(), $allContacts = false) {
        return $this->request('contact/delete', array(
            'rule' => $rule,
            'emails' => (count($emails) === 0) ? NULL : join(';', $emails),
            'allContacts' => $allContacts
        ));
    }
    
    /**
     * Export selected Contacts to JSON.
     *
     * @param $fileFormat        Format of the exported file 1 = csv, 2=xml, 3=json
     * @param string $rule       Query used for filtering.
     * @param array              <string> $emails Comma delimited list of contact emails
     * @param bool $allContacts  True: Include every Contact in your Account. Otherwise, false
     * @param $compressionFormat FileResponse compression format. 0=None or 1=Zip.
     * @param string $fileName   Name of your file.
     */
    public function Export($fileFormat = 1, $rule = NULL, array $emails = array(), $allContacts = false, $compressionFormat = 0, $fileName = NULL) {
        return $this->request('contact/export', array(
            'fileFormat' => $fileFormat,
            'rule' => $rule,
            'emails' => (count($emails) === 0) ? NULL : join(';', $emails),
            'allContacts' => $allContacts,
            'compressionFormat' => $compressionFormat,
            'fileName' => $fileName
        ));
    }
    
    /**
     * Finds all Lists and Segments this email belongs to.
     *
     * @param string $email  Proper email address.
     */
    public function FindContact($email) {
        return $this->request('contact/findcontact', array(
            'email' => $email
        ));
    }
    
    /**
     * List of Contacts for provided List
     *
     * @param string $listName Name of your list.
     * @param int $limit       Maximum of loaded items.
     * @param int $offset      How many items should be loaded ahead.
     */
    public function GetContactsByList($listName, $limit = 20, $offset = 0) {
        return $this->request('contact/getcontactsbylist', array(
            'listName' => $listName,
            'limit' => $limit,
            'offset' => $offset
        ));
    }
    
    /**
     * List of Contacts for provided Segment
     *
     * @param string $segmentName Name of your segment.
     * @param int $limit          Maximum of loaded items.
     * @param int $offset         How many items should be loaded ahead.
     *
     * @return array
     */
    public function GetContactsBySegment($segmentName, $limit = 20, $offset = 0) {
        return $this->request('contact/getcontactsbysegment', array(
            'segmentName' => $segmentName,
            'limit' => $limit,
            'offset' => $offset
        ));
    }
    
    /**
     * List of all contacts. If you have not specified RULE, all Contacts will be listed.
     *
     * @param string $rule      Query used for filtering.
     * @param bool $allContacts True: Include every Contact in your Account. Otherwise, false
     * @param int $limit        Maximum of loaded items.
     * @param int $offset       How many items should be loaded ahead.
     *
     * @return array
     */
    public function EEList($rule = NULL, $allContacts = false, $limit = 20, $offset = 0) {
        return $this->request('contact/list', array(
            'rule' => $rule,
            'allContacts' => $allContacts,
            'limit' => $limit,
            'offset' => $offset
        ));
    }
    
    /**
     * Load blocked contacts
     *
     * @param array $statuses List of blocked statuses: Abuse, Bounced or Unsubscribed
     * @param string $search  Text fragment used for searching.
     * @param int $limit      Maximum of loaded items.
     * @param int $offset     How many items should be loaded ahead.
     *
     * @return array
     */
    public function LoadBlocked($statuses, $search = NULL, $limit = 0, $offset = 0) {
        return $this->request('contact/loadblocked', array(
            'statuses' => (count($statuses) === 0) ? NULL : join(';', $statuses),
            'search' => $search,
            'limit' => $limit,
            'offset' => $offset
        ));
    }
    
    /**
     * Load detailed contact information
     *
     * @param string $email  Proper email address.
     */
    public function LoadContact($email) {
        return $this->request('contact/loadcontact', array(
            'email' => $email
        ));
    }
    
    /**
     * Shows detailed history of chosen Contact.
     *
     * @param string $email  Proper email address.
     * @param int $limit     Maximum of loaded items.
     * @param int $offset    How many items should be loaded ahead.
     *
     * @return array
     */
    public function LoadHistory($email, $limit = 0, $offset = 0) {
        return $this->request('contact/loadhistory', array(
            'email' => $email,
            'limit' => $limit,
            'offset' => $offset
        ));
    }
    
    /**
     * Add new Contact to one of your Lists.
     *
     * @param array                <string> $emails Comma delimited list of contact emails
     * @param string $firstName    First name.
     * @param string $lastName     Last name.
     * @param string $title        Title
     * @param string $organization Name of organization
     * @param string $industry     Industry contact works in
     * @param string $city         City.
     * @param string $country      Name of country.
     * @param string $state        State or province.
     * @param string $zip          Zip/postal code.
     * @param string $publicListID ID code of list
     * @param $status              Name of status: Transactional = -2,Engaged = -1,Active = 0,Bounced = 1,
     *                             Unsubscribed = 2,Abuse = 3,Inactive = 4,Stale = 5,NotConfirmed = 6;.
     * @param string $notes        Free form field of notes
     * @param ?DateTime $consentDate Date of consent to send this contact(s) your email. If not provided current date is used for consent.
     * @param string $consentIP    IP address of consent to send this contact(s) your email. If not provided your current public IP address is used for consent.
     * @param string $notifyEmail  Emails, separated by semicolon, to which the notification about contact subscribing should be sent to
     */
    public function QuickAdd(
        $emails, $firstName = NULL, $lastName = NULL, $title = NULL, $organization = NULL, $industry = NULL, $city = NULL, $country = NULL, $state = NULL, $zip = NULL, $publicListID = NULL, $status = 0, $notes = NULL, $consentDate = NULL,
        $consentIP = NULL, $notifyEmail = NULL
    ) {
        return $this->request('contact/quickadd', array(
            'emails' => (count($emails) === 0) ? NULL : join(';', $emails),
            'firstName' => $firstName,
            'lastName' => $lastName,
            'title' => $title,
            'organization' => $organization,
            'industry' => $industry,
            'city' => $city,
            'country' => $country,
            'state' => $state,
            'zip' => $zip,
            'publicListID' => $publicListID,
            'listName' => $this->list_name,
            'status' => $status,
            'notes' => $notes,
            'consentDate' => $consentDate,
            'consentIP' => $consentIP,
            'notifyEmail' => $notifyEmail
        ));
    }
    
    /**
     * Basic double opt-in email subscribe form for your account.  This can be used for contacts that need to re-subscribe as well.
     *
     * @param string $publicAccountID Public key for limited access to your account such as contact/add so you can use it safely on public websites.
     *
     * @return string
     */
    public function Subscribe($publicAccountID) {
        return $this->request('contact/subscribe', array(
            'publicAccountID' => $publicAccountID
        ));
    }
    
    /**
     * Update selected contact. Omitted contact's fields will be reset by default (see the clearRestOfFields parameter)
     *
     * @param string $email               Proper email address.
     * @param string $firstName           First name.
     * @param string $lastName            Last name.
     * @param string $organizationName    Name of organization
     * @param string $title               Title
     * @param string $city                City.
     * @param string $state               State or province.
     * @param string $country             Name of country.
     * @param string $zip                 Zip/postal code.
     * @param string $birthDate           Date of birth in YYYY-MM-DD format
     * @param string $gender              Your gender
     * @param string $phone               Phone number
     * @param ?bool $activate True, if Contact should be activated. Otherwise, false
     * @param string $industry            Industry contact works in
     * @param int $numberOfEmployees      Number of employees
     * @param string $annualRevenue       Annual revenue of contact
     * @param int $purchaseCount          Number of purchases contact has made
     * @param string $firstPurchase       Date of first purchase in YYYY-MM-DD format
     * @param string $lastPurchase        Date of last purchase in YYYY-MM-DD format
     * @param string $notes               Free form field of notes
     * @param string $websiteUrl          Website of contact
     * @param string $mobileNumber        Mobile phone number
     * @param string $faxNumber           Fax number
     * @param string $linkedInBio         Biography for Linked-In
     * @param int $linkedInConnections    Number of Linked-In connections
     * @param string $twitterBio          Biography for Twitter
     * @param string $twitterUsername     User name for Twitter
     * @param string $twitterProfilePhoto URL for Twitter photo
     * @param int $twitterFollowerCount   Number of Twitter followers
     * @param int $pageViews              Number of page views
     * @param int $visits                 Number of website visits
     * @param bool $clearRestOfFields     States if the fields that were omitted in this request are to be reset or should they be left with their current value
     * @param array                       <string, string> $field Custom contact field like firstname, lastname, city etc. Request parameters prefixed by field_ like field_firstname, field_lastname
     */
    public function Update(
        $email, $firstName = NULL, $lastName = NULL, $organizationName = NULL, $title = NULL, $city = NULL, $state = NULL, $country = NULL, $zip = NULL, $birthDate = NULL, $gender = NULL, $phone = NULL, $activate = NULL, $industry = NULL, $numberOfEmployees = 0, $annualRevenue = NULL,
        $purchaseCount = 0, $firstPurchase = NULL, $lastPurchase = NULL, $notes = NULL, $websiteUrl = NULL, $mobileNumber = NULL, $faxNumber = NULL, $linkedInBio = NULL, $linkedInConnections = 0, $twitterBio = NULL, $twitterUsername = NULL, $twitterProfilePhoto = NULL, $twitterFollowerCount = 0,
        $pageViews = 0, $visits = 0, $clearRestOfFields = true, array $field = array()
    ) {
        $arr = array(
            'email' => $email,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'organizationName' => $organizationName,
            'title' => $title,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'zip' => $zip,
            'birthDate' => $birthDate,
            'gender' => $gender,
            'phone' => $phone,
            'activate' => $activate,
            'industry' => $industry,
            'numberOfEmployees' => $numberOfEmployees,
            'annualRevenue' => $annualRevenue,
            'purchaseCount' => $purchaseCount,
            'firstPurchase' => $firstPurchase,
            'lastPurchase' => $lastPurchase,
            'notes' => $notes,
            'websiteUrl' => $websiteUrl,
            'mobileNumber' => $mobileNumber,
            'faxNumber' => $faxNumber,
            'linkedInBio' => $linkedInBio,
            'linkedInConnections' => $linkedInConnections,
            'twitterBio' => $twitterBio,
            'twitterUsername' => $twitterUsername,
            'twitterProfilePhoto' => $twitterProfilePhoto,
            'twitterFollowerCount' => $twitterFollowerCount,
            'pageViews' => $pageViews,
            'visits' => $visits,
            'clearRestOfFields' => $clearRestOfFields,
        );
        foreach (array_keys($field) as $key) {
            $arr['field_' . $key] = $field[$key];
        }
        
        return $this->request('contact/update', $arr);
    }
    
    /**
     * Upload contacts in CSV file.
     *
     * @param File $contactFile      Name of CSV file with Contacts.
     * @param bool $allowUnsubscribe True: Allow unsubscribing from this (optional) newly created list. Otherwise, false
     * @param ?int $listID ID number of selected list.
     * @param $status                Name of status: Transactional = -2,Engaged = -1,Active = 0,Bounced = 1,
     *                               Unsubscribed = 2,Abuse = 3,Inactive = 4,Stale = 5,NotConfirmed = 6
     * @param ?DateTime $consentDate Date of consent to send this contact(s) your email. If not provided current date is used for consent.
     * @param string $consentIP      IP address of consent to send this contact(s) your email. If not provided your current public IP address is used for consent.
     *
     * @return int
     */
    public function upload($contactFile, $allowUnsubscribe = false, $status = 0, $consentDate = NULL, $consentIP = NULL) {
        return $this->request('contact/upload', array(
            'allowUnsubscribe' => $allowUnsubscribe,
            'listID' => $this->list_id,
            'listName' => $this->list_name,
            'status' => $status,
            'consentDate' => $consentDate,
            'consentIP' => $consentIP
        ), "POST", $contactFile);
    }
}