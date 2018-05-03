<?php
namespace ZanySoft\ElasticEmail\Actions;

class Account extends ApiClient
{
    /**
     * Create new subaccount and provide most important data about it.
     *
     * @param string $email                Proper email address.
     * @param string $password             Current password.
     * @param string $confirmPassword      Repeat new password.
     * @param bool $requiresEmailCredits   True, if account needs credits to send emails. Otherwise, false
     * @param bool $enableLitmusTest       True, if account is able to send template tests to Litmus. Otherwise, false
     * @param bool $requiresLitmusCredits  True, if account needs credits to send emails. Otherwise, false
     * @param int $maxContacts             Maximum number of contacts the account can have
     * @param bool $enablePrivateIPRequest True, if account can request for private IP on its own. Otherwise, false
     * @param bool $sendActivation         True, if you want to send activation email to this account. Otherwise, false
     * @param string $returnUrl            URL to navigate to after account creation
     * @param ?ApiTypes\SendingPermission $sendingPermission Sending permission setting for account
     * @param ?bool $enableContactFeatures True, if you want to use Contact Delivery Tools.  Otherwise, false
     * @param string $poolName             Private IP required. Name of the custom IP Pool which Sub Account should use to send its emails. Leave empty for the default one or if no Private IPs have been bought
     * @param int $emailSizeLimit          Maximum size of email including attachments in MB's
     * @param ?int $dailySendLimit Amount of emails account can send daily
     *
     * @return string
     */
    public function AddSubAccount(
        $email, $password, $confirmPassword, $requiresEmailCredits = false, $enableLitmusTest = false, $requiresLitmusCredits = false, $maxContacts = 0, $enablePrivateIPRequest = true, $sendActivation = false, $returnUrl = NULL, $sendingPermission = NULL, $enableContactFeatures = NULL,
        $poolName = NULL, $emailSizeLimit = 10, $dailySendLimit = NULL
    ) {
        return $this->request('account/addsubaccount', array(
            'email' => $email,
            'password' => $password,
            'confirmPassword' => $confirmPassword,
            'requiresEmailCredits' => $requiresEmailCredits,
            'enableLitmusTest' => $enableLitmusTest,
            'requiresLitmusCredits' => $requiresLitmusCredits,
            'maxContacts' => $maxContacts,
            'enablePrivateIPRequest' => $enablePrivateIPRequest,
            'sendActivation' => $sendActivation,
            'returnUrl' => $returnUrl,
            'sendingPermission' => $sendingPermission,
            'enableContactFeatures' => $enableContactFeatures,
            'poolName' => $poolName,
            'emailSizeLimit' => $emailSizeLimit,
            'dailySendLimit' => $dailySendLimit
        ));
    }
    
    /**
     * Add email, template or litmus credits to a sub-account
     *
     * @param int $credits            Amount of credits to add
     * @param string $notes           Specific notes about the transaction
     * @param $creditType             Type of credits to add (Email (9) or Litmus (17))
     * @param string $subAccountEmail Email address of sub-account
     * @param string $publicAccountID Public key of sub-account to add credits to. Use subAccountEmail or publicAccountID not both.
     */
    public function AddSubAccountCredits($credits, $notes, $creditType = 9, $subAccountEmail = NULL, $publicAccountID = NULL) {
        return $this->request('account/addsubaccountcredits', array(
            'credits' => $credits,
            'notes' => $notes,
            'creditType' => $creditType,
            'subAccountEmail' => $subAccountEmail,
            'publicAccountID' => $publicAccountID
        ));
    }
    
    /**
     * Change your email address. Remember, that your email address is used as login!
     *
     * @param string $newEmail     New email address.
     * @param string $confirmEmail New email address.
     * @param string $sourceUrl    URL from which request was sent.
     *
     * @return string
     */
    public function ChangeEmail($newEmail, $confirmEmail, $sourceUrl = "https://elasticemail.com/account/") {
        return $this->request('account/changeemail', array(
            'newEmail' => $newEmail,
            'confirmEmail' => $confirmEmail,
            'sourceUrl' => $sourceUrl
        ));
    }
    
    /**
     * Create new password for your account. Password needs to be at least 6 characters long.
     *
     * @param string $currentPassword Current password.
     * @param string $newPassword     New password for account.
     * @param string $confirmPassword Repeat new password.
     */
    public function ChangePassword($currentPassword, $newPassword, $confirmPassword) {
        return $this->request('account/changepassword', array(
            'currentPassword' => $currentPassword,
            'newPassword' => $newPassword,
            'confirmPassword' => $confirmPassword
        ));
    }
    
    /**
     * Deletes specified Subaccount
     *
     * @param bool $notify            True, if you want to send an email notification. Otherwise, false
     * @param string $subAccountEmail Email address of sub-account
     * @param string $publicAccountID Public key of sub-account to delete. Use subAccountEmail or publicAccountID not both.
     */
    public function DeleteSubAccount($notify = true, $subAccountEmail = NULL, $publicAccountID = NULL) {
        return $this->request('account/deletesubaccount', array(
            'notify' => $notify,
            'subAccountEmail' => $subAccountEmail,
            'publicAccountID' => $publicAccountID
        ));
    }
    
    /**
     * Returns API Key for the given Sub Account.
     *
     * @param string $subAccountEmail Email address of sub-account
     * @param string $publicAccountID Public key of sub-account to retrieve sub-account API Key. Use subAccountEmail or publicAccountID not both.
     *
     * @return string
     */
    public function GetSubAccountApiKey($subAccountEmail = NULL, $publicAccountID = NULL) {
        return $this->request('account/getsubaccountapikey', array(
            'subAccountEmail' => $subAccountEmail,
            'publicAccountID' => $publicAccountID
        ));
    }
    
    /**
     * Lists all of your subaccounts
     * @return array
     */
    public function GetSubAccountList() {
        return $this->request('account/getsubaccountlist');
    }
    
    /**
     * Loads your account. Returns detailed information about your account.
     
     */
    public function Load() {
        return $this->request('account/load');
    }
    
    /**
     * Load advanced options of your account
     
     */
    public function LoadAdvancedOptions() {
        return $this->request('account/loadadvancedoptions');
    }
    
    /**
     * Lists email credits history
     * @return array
     */
    public function LoadEmailCreditsHistory() {
        return $this->request('account/loademailcreditshistory');
    }
    
    /**
     * Lists litmus credits history
     * @return array
     */
    public function LoadLitmusCreditsHistory() {
        return $this->request('account/loadlitmuscreditshistory');
    }
    
    /**
     * Shows queue of newest notifications - very useful when you want to check what happened with mails that were not received.
     * @return array
     */
    public function LoadNotificationQueue() {
        return $this->request('account/loadnotificationqueue');
    }
    
    /**
     * Lists all payments
     *
     * @param int $limit         Maximum of loaded items.
     * @param int $offset        How many items should be loaded ahead.
     * @param DateTime $fromDate Starting date for search in YYYY-MM-DDThh:mm:ss format.
     * @param DateTime $toDate   Ending date for search in YYYY-MM-DDThh:mm:ss format.
     *
     * @return array
     */
    public function LoadPaymentHistory($limit, $offset, $fromDate, $toDate) {
        return $this->request('account/loadpaymenthistory', array(
            'limit' => $limit,
            'offset' => $offset,
            'fromDate' => $fromDate,
            'toDate' => $toDate
        ));
    }
    
    /**
     * Lists all referral payout history
     * @return array
     */
    public function LoadPayoutHistory() {
        return $this->request('account/loadpayouthistory');
    }
    
    /**
     * Shows information about your referral details
     
     */
    public function LoadReferralDetails() {
        return $this->request('account/loadreferraldetails');
    }
    
    /**
     * Shows latest changes in your sending reputation
     *
     * @param int $limit  Maximum of loaded items.
     * @param int $offset How many items should be loaded ahead.
     *
     * @return array
     */
    public function LoadReputationHistory($limit = 20, $offset = 0) {
        return $this->request('account/loadreputationhistory', array(
            'limit' => $limit,
            'offset' => $offset
        ));
    }
    
    /**
     * Shows detailed information about your actual reputation score
     
     */
    public function LoadReputationImpact() {
        return $this->request('account/loadreputationimpact');
    }
    
    /**
     * Returns detailed spam check.
     *
     * @param int $limit  Maximum of loaded items.
     * @param int $offset How many items should be loaded ahead.
     *
     * @return array
     */
    public function LoadSpamCheck($limit = 20, $offset = 0) {
        return $this->request('account/loadspamcheck', array(
            'limit' => $limit,
            'offset' => $offset
        ));
    }
    
    /**
     * Lists email credits history for sub-account
     *
     * @param string $subAccountEmail Email address of sub-account
     * @param string $publicAccountID Public key of sub-account to list history for. Use subAccountEmail or publicAccountID not both.
     *
     * @return array
     */
    public function LoadSubAccountsEmailCreditsHistory($subAccountEmail = NULL, $publicAccountID = NULL) {
        return $this->request('account/loadsubaccountsemailcreditshistory', array(
            'subAccountEmail' => $subAccountEmail,
            'publicAccountID' => $publicAccountID
        ));
    }
    
    /**
     * Loads settings of subaccount
     *
     * @param string $subAccountEmail Email address of sub-account
     * @param string $publicAccountID Public key of sub-account to load settings for. Use subAccountEmail or publicAccountID not both.
     */
    public function LoadSubAccountSettings($subAccountEmail = NULL, $publicAccountID = NULL) {
        return $this->request('account/loadsubaccountsettings', array(
            'subAccountEmail' => $subAccountEmail,
            'publicAccountID' => $publicAccountID
        ));
    }
    
    /**
     * Lists litmus credits history for sub-account
     *
     * @param string $subAccountEmail Email address of sub-account
     * @param string $publicAccountID Public key of sub-account to list history for. Use subAccountEmail or publicAccountID not both.
     *
     * @return array
     */
    public function LoadSubAccountsLitmusCreditsHistory($subAccountEmail = NULL, $publicAccountID = NULL) {
        return $this->request('account/loadsubaccountslitmuscreditshistory', array(
            'subAccountEmail' => $subAccountEmail,
            'publicAccountID' => $publicAccountID
        ));
    }
    
    /**
     * Shows usage of your account in given time.
     *
     * @param DateTime $from Starting date for search in YYYY-MM-DDThh:mm:ss format.
     * @param DateTime $to   Ending date for search in YYYY-MM-DDThh:mm:ss format.
     *
     * @return array
     */
    public function LoadUsage($from, $to) {
        return $this->request('account/loadusage', array(
            'from' => $from,
            'to' => $to
        ));
    }
    
    /**
     * Manages your apikeys.
     *
     * @param $action 1 for add, 2 for change, 3 for delete
     *
     * @return Array<string>
     */
    public function ManageApiKeys($apiKey, $action) {
        return $this->request('account/manageapikeys', array(
            'apiKey' => $apiKey,
            'action' => $action
        ));
    }
    
    /**
     * Shows summary for your account.
     
     */
    public function Overview() {
        return $this->request('account/overview');
    }
    
    /**
     * Shows you account's profile basic overview
     
     */
    public function ProfileOverview() {
        return $this->request('account/profileoverview');
    }
    
    /**
     * Remove email, template or litmus credits from a sub-account
     *
     * @param $creditType             Type of credits to add (Email (9) or Litmus (17))
     * @param string $notes           Specific notes about the transaction
     * @param string $subAccountEmail Email address of sub-account
     * @param string $publicAccountID Public key of sub-account to remove credits from. Use subAccountEmail or publicAccountID not both.
     * @param ?int $credits Amount of credits to remove
     * @param bool $removeAll         Remove all credits of this type from sub-account (overrides credits if provided)
     */
    public function RemoveSubAccountCredits($creditType, $notes, $subAccountEmail = NULL, $publicAccountID = NULL, $credits = NULL, $removeAll = false) {
        return $this->request('account/removesubaccountcredits', array(
            'creditType' => $creditType,
            'notes' => $notes,
            'subAccountEmail' => $subAccountEmail,
            'publicAccountID' => $publicAccountID,
            'credits' => $credits,
            'removeAll' => $removeAll
        ));
    }
    
    /**
     * Request premium support for your account
     
     */
    public function RequestPremiumSupport() {
        return $this->request('account/requestpremiumsupport');
    }
    
    /**
     * Request a private IP for your Account
     *
     * @param int $count    Number of items.
     * @param string $notes Free form field of notes
     */
    public function RequestPrivateIP($count, $notes) {
        return $this->request('account/requestprivateip', array(
            'count' => $count,
            'notes' => $notes
        ));
    }
    
    /**
     * Update sending and tracking options of your account.
     *
     * @param ?bool $enableClickTracking True, if you want to track clicks. Otherwise, false
     * @param ?bool $enableLinkClickTracking True, if you want to track by link tracking. Otherwise, false
     * @param ?bool $manageSubscriptions True, if you want to display your labels on your unsubscribe form. Otherwise, false
     * @param ?bool $manageSubscribedOnly True, if you want to only display labels that the contact is subscribed to on your unsubscribe form. Otherwise, false
     * @param ?bool $transactionalOnUnsubscribe True, if you want to display an option for the contact to opt into transactional email only on your unsubscribe form. Otherwise, false
     * @param ?bool $skipListUnsubscribe True, if you do not want to use list-unsubscribe headers. Otherwise, false
     * @param ?bool $autoTextFromHtml True, if text BODY of message should be created automatically. Otherwise, false
     * @param ?bool $allowCustomHeaders True, if you want to apply custom headers to your emails. Otherwise, false
     * @param string $bccEmail                       Email address to send a copy of all email to.
     * @param string $contentTransferEncoding        Type of content encoding
     * @param ?bool $emailNotificationForError True, if you want bounce notifications returned. Otherwise, false
     * @param string $emailNotificationEmail         Specific email address to send bounce email notifications to.
     * @param string $webNotificationUrl             URL address to receive web notifications to parse and process.
     * @param ?bool $webNotificationNotifyOncePerEmail True, if you want to receive notifications for each type only once per email. Otherwise, false
     * @param ?bool $webNotificationForSent True, if you want to send web notifications for sent email. Otherwise, false
     * @param ?bool $webNotificationForOpened True, if you want to send web notifications for opened email. Otherwise, false
     * @param ?bool $webNotificationForClicked True, if you want to send web notifications for clicked email. Otherwise, false
     * @param ?bool $webNotificationForUnsubscribed True, if you want to send web notifications for unsubscribed email. Otherwise, false
     * @param ?bool $webNotificationForAbuseReport True, if you want to send web notifications for complaint email. Otherwise, false
     * @param ?bool $webNotificationForError True, if you want to send web notifications for bounced email. Otherwise, false
     * @param string $hubCallBackUrl                 URL used for tracking action of inbound emails
     * @param string $inboundDomain                  Domain you use as your inbound domain
     * @param ?bool $inboundContactsOnly True, if you want inbound email to only process contacts from your account. Otherwise, false
     * @param ?bool $lowCreditNotification True, if you want to receive low credit email notifications. Otherwise, false
     * @param ?bool $enableUITooltips True, if account has tooltips active. Otherwise, false
     * @param ?bool $enableContactFeatures True, if you want to use Contact Delivery Tools.  Otherwise, false
     * @param string $notificationsEmails            Email addresses to send a copy of all notifications from our system. Separated by semicolon
     * @param string $unsubscribeNotificationsEmails Emails, separated by semicolon, to which the notification about contact unsubscribing should be sent to
     * @param string $logoUrl                        URL to your logo image.
     * @param ?bool $enableTemplateScripting True, if you want to use template scripting in your emails {{}}. Otherwise, false
     * @param ?int $staleContactScore (0 means this functionality is NOT enabled) Score, depending on the number of times you have sent to a recipient, at which the given recipient should be moved to the Stale status
     * @param ?int $staleContactInactiveDays (0 means this functionality is NOT enabled) Number of days of inactivity for a contact after which the given recipient should be moved to the Stale status
     * @param string $deliveryReason                 Why your clients are receiving your emails.
     * @param ?bool $tutorialsEnabled
     */
    public function UpdateAdvancedOptions(
        $enableClickTracking = NULL, $enableLinkClickTracking = NULL, $manageSubscriptions = NULL, $manageSubscribedOnly = NULL, $transactionalOnUnsubscribe = NULL, $skipListUnsubscribe = NULL, $autoTextFromHtml = NULL, $allowCustomHeaders = NULL, $bccEmail = NULL, $contentTransferEncoding = NULL,
        $emailNotificationForError = NULL, $emailNotificationEmail = NULL, $webNotificationUrl = NULL, $webNotificationNotifyOncePerEmail = NULL, $webNotificationForSent = NULL, $webNotificationForOpened = NULL, $webNotificationForClicked = NULL, $webNotificationForUnsubscribed = NULL,
        $webNotificationForAbuseReport = NULL, $webNotificationForError = NULL, $hubCallBackUrl = "", $inboundDomain = NULL, $inboundContactsOnly = NULL, $lowCreditNotification = NULL, $enableUITooltips = NULL, $enableContactFeatures = NULL, $notificationsEmails = NULL,
        $unsubscribeNotificationsEmails = NULL, $logoUrl = NULL, $enableTemplateScripting = true, $staleContactScore = NULL, $staleContactInactiveDays = NULL, $deliveryReason = NULL, $tutorialsEnabled = NULL
    ) {
        return $this->request('account/updateadvancedoptions', array(
            'enableClickTracking' => $enableClickTracking,
            'enableLinkClickTracking' => $enableLinkClickTracking,
            'manageSubscriptions' => $manageSubscriptions,
            'manageSubscribedOnly' => $manageSubscribedOnly,
            'transactionalOnUnsubscribe' => $transactionalOnUnsubscribe,
            'skipListUnsubscribe' => $skipListUnsubscribe,
            'autoTextFromHtml' => $autoTextFromHtml,
            'allowCustomHeaders' => $allowCustomHeaders,
            'bccEmail' => $bccEmail,
            'contentTransferEncoding' => $contentTransferEncoding,
            'emailNotificationForError' => $emailNotificationForError,
            'emailNotificationEmail' => $emailNotificationEmail,
            'webNotificationUrl' => $webNotificationUrl,
            'webNotificationNotifyOncePerEmail' => $webNotificationNotifyOncePerEmail,
            'webNotificationForSent' => $webNotificationForSent,
            'webNotificationForOpened' => $webNotificationForOpened,
            'webNotificationForClicked' => $webNotificationForClicked,
            'webNotificationForUnsubscribed' => $webNotificationForUnsubscribed,
            'webNotificationForAbuseReport' => $webNotificationForAbuseReport,
            'webNotificationForError' => $webNotificationForError,
            'hubCallBackUrl' => $hubCallBackUrl,
            'inboundDomain' => $inboundDomain,
            'inboundContactsOnly' => $inboundContactsOnly,
            'lowCreditNotification' => $lowCreditNotification,
            'enableUITooltips' => $enableUITooltips,
            'enableContactFeatures' => $enableContactFeatures,
            'notificationsEmails' => $notificationsEmails,
            'unsubscribeNotificationsEmails' => $unsubscribeNotificationsEmails,
            'logoUrl' => $logoUrl,
            'enableTemplateScripting' => $enableTemplateScripting,
            'staleContactScore' => $staleContactScore,
            'staleContactInactiveDays' => $staleContactInactiveDays,
            'deliveryReason' => $deliveryReason,
            'tutorialsEnabled' => $tutorialsEnabled
        ));
    }
    
    /**
     * Update settings of your private branding. These settings are needed, if you want to use Elastic Email under your brand.
     *
     * @param bool $enablePrivateBranding True: Turn on or off ability to send mails under your brand. Otherwise, false
     * @param string $logoUrl             URL to your logo image.
     * @param string $supportLink         Address to your support.
     * @param string $privateBrandingUrl  Subdomain for your rebranded service
     * @param string $smtpAddress         Address of SMTP server.
     * @param string $smtpAlternative     Address of alternative SMTP server.
     * @param string $paymentUrl          URL for making payments.
     */
    public function UpdateCustomBranding($enablePrivateBranding = false, $logoUrl = NULL, $supportLink = NULL, $privateBrandingUrl = NULL, $smtpAddress = NULL, $smtpAlternative = NULL, $paymentUrl = NULL) {
        return $this->request('account/updatecustombranding', array(
            'enablePrivateBranding' => $enablePrivateBranding,
            'logoUrl' => $logoUrl,
            'supportLink' => $supportLink,
            'privateBrandingUrl' => $privateBrandingUrl,
            'smtpAddress' => $smtpAddress,
            'smtpAlternative' => $smtpAlternative,
            'paymentUrl' => $paymentUrl
        ));
    }
    
    /**
     * Update http notification URL.
     *
     * @param string $url              URL of notification.
     * @param bool $notifyOncePerEmail True, if you want to receive notifications for each type only once per email. Otherwise, false
     * @param string $settings         Http notification settings serialized to JSON
     */
    public function UpdateHttpNotification($url, $notifyOncePerEmail = false, $settings = NULL) {
        return $this->request('account/updatehttpnotification', array(
            'url' => $url,
            'notifyOncePerEmail' => $notifyOncePerEmail,
            'settings' => $settings
        ));
    }
    
    /**
     * Update your profile.
     *
     * @param string $firstName First name.
     * @param string $lastName  Last name.
     * @param string $address1  First line of address.
     * @param string $city      City.
     * @param string $state     State or province.
     * @param string $zip       Zip/postal code.
     * @param int $countryID    Numeric ID of country. A file with the list of countries is available <a href="http://api.elasticemail.com/public/countries"><b>here</b></a>
     * @param ?bool $marketingConsent True if you want to receive newsletters from Elastic Email. Otherwise, false. Empty to leave the current value.
     * @param string $address2  Second line of address.
     * @param string $company   Company name.
     * @param string $website   HTTP address of your website.
     * @param string $logoUrl   URL to your logo image.
     * @param string $taxCode   Code used for tax purposes.
     * @param string $phone     Phone number
     */
    public function UpdateProfile($firstName, $lastName, $address1, $city, $state, $zip, $countryID, $marketingConsent = NULL, $address2 = NULL, $company = NULL, $website = NULL, $logoUrl = NULL, $taxCode = NULL, $phone = NULL) {
        return $this->request('account/updateprofile', array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'address1' => $address1,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'countryID' => $countryID,
            'marketingConsent' => $marketingConsent,
            'address2' => $address2,
            'company' => $company,
            'website' => $website,
            'logoUrl' => $logoUrl,
            'taxCode' => $taxCode,
            'phone' => $phone
        ));
    }
    
    /**
     * Updates settings of specified subaccount
     *
     * @param bool $requiresEmailCredits   True, if account needs credits to send emails. Otherwise, false
     * @param int $monthlyRefillCredits    Amount of credits added to account automatically
     * @param bool $requiresLitmusCredits  True, if account needs credits to send emails. Otherwise, false
     * @param bool $enableLitmusTest       True, if account is able to send template tests to Litmus. Otherwise, false
     * @param ?int $dailySendLimit Amount of emails account can send daily
     * @param int $emailSizeLimit          Maximum size of email including attachments in MB's
     * @param bool $enablePrivateIPRequest True, if account can request for private IP on its own. Otherwise, false
     * @param int $maxContacts             Maximum number of contacts the account can have
     * @param string $subAccountEmail      Email address of sub-account
     * @param string $publicAccountID      Public key of sub-account to update. Use subAccountEmail or publicAccountID not both.
     * @param ?ApiTypes\SendingPermission $sendingPermission Sending permission setting for account
     * @param ?bool $enableContactFeatures True, if you want to use Contact Delivery Tools.  Otherwise, false
     * @param string $poolName             Name of your custom IP Pool to be used in the sending process
     */
    public function UpdateSubAccountSettings(
        $requiresEmailCredits = false, $monthlyRefillCredits = 0, $requiresLitmusCredits = false, $enableLitmusTest = false, $dailySendLimit = NULL, $emailSizeLimit = 10, $enablePrivateIPRequest = false, $maxContacts = 0, $subAccountEmail = NULL, $publicAccountID = NULL, $sendingPermission = NULL,
        $enableContactFeatures = NULL, $poolName = NULL
    ) {
        return $this->request('account/updatesubaccountsettings', array(
            'requiresEmailCredits' => $requiresEmailCredits,
            'monthlyRefillCredits' => $monthlyRefillCredits,
            'requiresLitmusCredits' => $requiresLitmusCredits,
            'enableLitmusTest' => $enableLitmusTest,
            'dailySendLimit' => $dailySendLimit,
            'emailSizeLimit' => $emailSizeLimit,
            'enablePrivateIPRequest' => $enablePrivateIPRequest,
            'maxContacts' => $maxContacts,
            'subAccountEmail' => $subAccountEmail,
            'publicAccountID' => $publicAccountID,
            'sendingPermission' => $sendingPermission,
            'enableContactFeatures' => $enableContactFeatures,
            'poolName' => $poolName
        ));
    }
    
}