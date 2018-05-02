<?php
namespace ZanySoft\ElasticEmail\ApiTypes;

/**
 * Number of Contacts, grouped by Status;
 */
class ContactStatusCounts
{
    /**
     * Number of engaged contacts
     */
    public /*long*/
        $Engaged;

    /**
     * Number of active contacts
     */
    public /*long*/
        $Active;

    /**
     * Number of complaint messages
     */
    public /*long*/
        $Complaint;

    /**
     * Number of unsubscribed messages
     */
    public /*long*/
        $Unsubscribed;

    /**
     * Number of bounced messages
     */
    public /*long*/
        $Bounced;

    /**
     * Number of inactive contacts
     */
    public /*long*/
        $Inactive;

    /**
     * Number of transactional contacts
     */
    public /*long*/
        $Transactional;

    /**
     *
     */
    public /*long*/
        $Stale;

    /**
     *
     */
    public /*long*/
        $NotConfirmed;

}

/**
 * Number of Unsubscribed or Complaint Contacts, grouped by Unsubscribe Reason;
 */
class ContactUnsubscribeReasonCounts
{
    /**
     *
     */
    public /*long*/
        $Unknown;

    /**
     *
     */
    public /*long*/
        $NoLongerWant;

    /**
     *
     */
    public /*long*/
        $IrrelevantContent;

    /**
     *
     */
    public /*long*/
        $TooFrequent;

    /**
     *
     */
    public /*long*/
        $NeverConsented;

    /**
     *
     */
    public /*long*/
        $DeceptiveContent;

    /**
     *
     */
    public /*long*/
        $AbuseReported;

    /**
     *
     */
    public /*long*/
        $ThirdParty;

    /**
     *
     */
    public /*long*/
        $ListUnsubscribe;

    /**
     *
     */
    public /*long*/
        $FromJourney;

}

/**
 * Type of credits
 * Enum class
 */
abstract class CreditType
{
    /**
     * Used to send emails.  One credit = one email.
     */
    const Email = 9;

    /**
     * Used to run a litmus test on a template.  1 credit = 1 test.
     */
    const Litmus = 17;

}

/**
 * Daily summary of log status, based on specified date range.
 */
class DailyLogStatusSummary
{
    /**
     * Date in YYYY-MM-DDThh:ii:ss format
     */
    public /*string*/
        $Date;

    /**
     * Proper email address.
     */
    public /*int*/
        $Email;

    /**
     * Number of SMS
     */
    public /*int*/
        $Sms;

    /**
     * Number of delivered messages
     */
    public /*int*/
        $Delivered;

    /**
     * Number of opened messages
     */
    public /*int*/
        $Opened;

    /**
     * Number of clicked messages
     */
    public /*int*/
        $Clicked;

    /**
     * Number of unsubscribed messages
     */
    public /*int*/
        $Unsubscribed;

    /**
     * Number of complaint messages
     */
    public /*int*/
        $Complaint;

    /**
     * Number of bounced messages
     */
    public /*int*/
        $Bounced;

    /**
     * Number of inbound messages
     */
    public /*int*/
        $Inbound;

    /**
     * Number of manually cancelled messages
     */
    public /*int*/
        $ManualCancel;

    /**
     * Number of messages flagged with 'Not Delivered'
     */
    public /*int*/
        $NotDelivered;

}

/**
 * Domain data, with information about domain records.
 */
class DomainDetail
{
    /**
     * Name of selected domain.
     */
    public /*string*/
        $Domain;

    /**
     * True, if domain is used as default. Otherwise, false,
     */
    public /*bool*/
        $DefaultDomain;

    /**
     * True, if SPF record is verified
     */
    public /*bool*/
        $Spf;

    /**
     * True, if DKIM record is verified
     */
    public /*bool*/
        $Dkim;

    /**
     * True, if MX record is verified
     */
    public /*bool*/
        $MX;

    /**
     *
     */
    public /*bool*/
        $DMARC;

    /**
     * True, if tracking CNAME record is verified
     */
    public /*bool*/
        $IsRewriteDomainValid;

    /**
     * True, if verification is available
     */
    public /*bool*/
        $Verify;

    /**
     *
     */
    public /*ApiTypes\TrackingType*/
        $Type;

    /**
     * 0 - NotValidated, 1 - Validated successfully, 2 - Invalid, 3 - Broken (tracking was frequnetly verfied in given period and still is invalid)
     * For statuses: 0, 1, 3 tracking will be verified in normal periods
     * For status 2 tracking will be verified in high frequent periods
     */
    public /*ApiTypes\TrackingValidationStatus*/
        $TrackingStatus;

    /**
     *
     */
    public /*ApiTypes\CertificateValidationStatus*/
        $CertificateStatus;

    /**
     *
     */
    public /*string*/
        $CertificateValidationError;

    /**
     *
     */
    public /*?ApiTypes\TrackingType*/
        $TrackingTypeUserRequest;

}

/**
 * Detailed information about email credits
 */
class EmailCredits
{
    /**
     * Date in YYYY-MM-DDThh:ii:ss format
     */
    public /*DateTime*/
        $Date;

    /**
     * Amount of money in transaction
     */
    public /*decimal*/
        $Amount;

    /**
     * Source of URL of payment
     */
    public /*string*/
        $Source;

    /**
     * Free form field of notes
     */
    public /*string*/
        $Notes;

}

/**
 *
 */
class EmailJobFailedStatus
{
    /**
     *
     */
    public /*string*/
        $Address;

    /**
     *
     */
    public /*string*/
        $Error;

    /**
     * RFC Error code
     */
    public /*int*/
        $ErrorCode;

    /**
     *
     */
    public /*string*/
        $Category;

}

/**
 *
 */
class EmailJobStatus
{
    /**
     * ID number of your attachment
     */
    public /*string*/
        $ID;

    /**
     * Name of status: submitted, complete, in_progress
     */
    public /*string*/
        $Status;

    /**
     *
     */
    public /*int*/
        $RecipientsCount;

    /**
     *
     */
    public /*Array<ApiTypes\EmailJobFailedStatus>*/
        $Failed;

    /**
     * Total emails sent.
     */
    public /*int*/
        $FailedCount;

    /**
     *
     */
    public /*Array<string>*/
        $Sent;

    /**
     * Total emails sent.
     */
    public /*int*/
        $SentCount;

    /**
     * Number of delivered messages
     */
    public /*Array<string>*/
        $Delivered;

    /**
     *
     */
    public /*int*/
        $DeliveredCount;

    /**
     *
     */
    public /*Array<string>*/
        $Pending;

    /**
     *
     */
    public /*int*/
        $PendingCount;

    /**
     * Number of opened messages
     */
    public /*Array<string>*/
        $Opened;

    /**
     * Total emails opened.
     */
    public /*int*/
        $OpenedCount;

    /**
     * Number of clicked messages
     */
    public /*Array<string>*/
        $Clicked;

    /**
     * Total emails clicked
     */
    public /*int*/
        $ClickedCount;

    /**
     * Number of unsubscribed messages
     */
    public /*Array<string>*/
        $Unsubscribed;

    /**
     * Total emails clicked
     */
    public /*int*/
        $UnsubscribedCount;

    /**
     *
     */
    public /*Array<string>*/
        $AbuseReports;

    /**
     *
     */
    public /*int*/
        $AbuseReportsCount;

    /**
     * List of all MessageIDs for this job.
     */
    public /*Array<string>*/
        $MessageIDs;

}

/**
 *
 */
class EmailSend
{
    /**
     * ID number of transaction
     */
    public /*string*/
        $TransactionID;

    /**
     * Unique identifier for this email.
     */
    public /*string*/
        $MessageID;

}

/**
 * Status information of the specified email
 */
class EmailStatus
{
    /**
     * Email address this email was sent from.
     */
    public /*string*/
        $From;

    /**
     * Email address this email was sent to.
     */
    public /*string*/
        $To;

    /**
     * Date the email was submitted.
     */
    public /*DateTime*/
        $Date;

    /**
     * Value of email's status
     */
    public /*ApiTypes\LogJobStatus*/
        $Status;

    /**
     * Name of email's status
     */
    public /*string*/
        $StatusName;

    /**
     * Date of last status change.
     */
    public /*DateTime*/
        $StatusChangeDate;

    /**
     * Detailed error or bounced message.
     */
    public /*string*/
        $ErrorMessage;

    /**
     * ID number of transaction
     */
    public /*Guid*/
        $TransactionID;

}

/**
 * Email details formatted in json
 */
class EmailView
{
    /**
     * Body (text) of your message.
     */
    public /*string*/
        $Body;

    /**
     * Default subject of email.
     */
    public /*string*/
        $Subject;

    /**
     * Starting date for search in YYYY-MM-DDThh:mm:ss format.
     */
    public /*string*/
        $From;

}

/**
 * Encoding type for the email headers
 * Enum class
 */
abstract class EncodingType
{
    /**
     * Encoding of the email is provided by the sender and not altered.
     */
    const UserProvided = -1;

    /**
     * No endcoding is set for the email.
     */
    const None = 0;

    /**
     * Encoding of the email is in Raw7bit format.
     */
    const Raw7bit = 1;

    /**
     * Encoding of the email is in Raw8bit format.
     */
    const Raw8bit = 2;

    /**
     * Encoding of the email is in QuotedPrintable format.
     */
    const QuotedPrintable = 3;

    /**
     * Encoding of the email is in Base64 format.
     */
    const Base64 = 4;

    /**
     * Encoding of the email is in Uue format.
     */
    const Uue = 5;

}

/**
 * Record of exported data from the system.
 */
class Export
{
    /**
     *
     */
    public /*Guid*/
        $PublicExportID;

    /**
     * Date the export was created
     */
    public /*DateTime*/
        $DateAdded;

    /**
     * Type of export
     */
    public /*string*/
        $Type;

    /**
     * Current status of export
     */
    public /*string*/
        $Status;

    /**
     * Long description of the export
     */
    public /*string*/
        $Info;

    /**
     * Name of the file
     */
    public /*string*/
        $Filename;

    /**
     * Link to download the export
     */
    public /*string*/
        $Link;

}

/**
 * Type of export
 * Enum class
 */
abstract class ExportFileFormats
{
    /**
     * Export in comma separated values format.
     */
    const Csv = 1;

    /**
     * Export in xml format
     */
    const Xml = 2;

    /**
     * Export in json format
     */
    const Json = 3;

}

/**
 *
 */
class ExportLink
{
    /**
     * Direct URL to the exported file
     */
    public /*string*/
        $Link;

}

/**
 * Current status of export
 * Enum class
 */
abstract class ExportStatus
{
    /**
     * Export had an error and can not be downloaded.
     */
    const Error = -1;

    /**
     * Export is currently loading and can not be downloaded.
     */
    const Loading = 0;

    /**
     * Export is currently available for downloading.
     */
    const Ready = 1;

    /**
     * Export is no longer available for downloading.
     */
    const Expired = 2;

}

/**
 * Number of Exports, grouped by export type
 */
class ExportTypeCounts
{
    /**
     *
     */
    public /*long*/
        $Log;

    /**
     *
     */
    public /*long*/
        $Contact;

    /**
     * Json representation of a campaign
     */
    public /*long*/
        $Campaign;

    /**
     * True, if you have enabled link tracking. Otherwise, false
     */
    public /*long*/
        $LinkTracking;

    /**
     * Json representation of a survey
     */
    public /*long*/
        $Survey;

}

/**
 * Enum class
 */
abstract class IntervalType
{
    /**
     * Daily overview
     */
    const Summary = 0;

    /**
     * Hourly, detailed information
     */
    const Hourly = 1;

}

/**
 * Object containig tracking data.
 */
class LinkTrackingDetails
{
    /**
     * Number of items.
     */
    public /*int*/
        $Count;

    /**
     * True, if there are more detailed data available. Otherwise, false
     */
    public /*bool*/
        $MoreAvailable;

    /**
     *
     */
    public /*Array<ApiTypes\TrackedLink>*/
        $TrackedLink;

}

/**
 * List of Lists, with detailed data about its contents.
 */
class EEList
{
    /**
     * ID number of selected list.
     */
    public /*int*/
        $ListID;

    /**
     * Name of your list.
     */
    public /*string*/
        $ListName;

    /**
     * Number of items.
     */
    public /*int*/
        $Count;

    /**
     * ID code of list
     */
    public /*?Guid*/
        $PublicListID;

    /**
     * Date of creation in YYYY-MM-DDThh:ii:ss format
     */
    public /*DateTime*/
        $DateAdded;

    /**
     * True: Allow unsubscribing from this list. Otherwise, false
     */
    public /*bool*/
        $AllowUnsubscribe;

    /**
     * Query used for filtering.
     */
    public /*string*/
        $Rule;

}

/**
 * Detailed information about litmus credits
 */
class LitmusCredits
{
    /**
     * Date in YYYY-MM-DDThh:ii:ss format
     */
    public /*DateTime*/
        $Date;

    /**
     * Amount of money in transaction
     */
    public /*decimal*/
        $Amount;

}

/**
 * Logs for selected date range
 */
class Log
{
    /**
     * Starting date for search in YYYY-MM-DDThh:mm:ss format.
     */
    public /*?DateTime*/
        $From;

    /**
     * Ending date for search in YYYY-MM-DDThh:mm:ss format.
     */
    public /*?DateTime*/
        $To;

    /**
     * Number of recipients
     */
    public /*Array<ApiTypes\Recipient>*/
        $Recipients;

}

/**
 * Enum class
 */
abstract class LogJobStatus
{
    /**
     * All emails
     */
    const All = 0;

    /**
     * Email has been submitted successfully and is queued for sending.
     */
    const ReadyToSend = 1;

    /**
     * Email has soft bounced and is scheduled to retry.
     */
    const WaitingToRetry = 2;

    /**
     * Email is currently sending.
     */
    const Sending = 3;

    /**
     * Email has errored or bounced for some reason.
     */
    const Error = 4;

    /**
     * Email has been successfully delivered.
     */
    const Sent = 5;

    /**
     * Email has been opened by the recipient.
     */
    const Opened = 6;

    /**
     * Email has had at least one link clicked by the recipient.
     */
    const Clicked = 7;

    /**
     * Email has been unsubscribed by the recipient.
     */
    const Unsubscribed = 8;

    /**
     * Email has been complained about or marked as spam by the recipient.
     */
    const AbuseReport = 9;

}

/**
 * Summary of log status, based on specified date range.
 */
class LogStatusSummary
{
    /**
     * Starting date for search in YYYY-MM-DDThh:mm:ss format.
     */
    public /*string*/
        $From;

    /**
     * Ending date for search in YYYY-MM-DDThh:mm:ss format.
     */
    public /*string*/
        $To;

    /**
     * Overall duration
     */
    public /*double*/
        $Duration;

    /**
     * Number of recipients
     */
    public /*long*/
        $Recipients;

    /**
     * Number of emails
     */
    public /*long*/
        $EmailTotal;

    /**
     * Number of SMS
     */
    public /*long*/
        $SmsTotal;

    /**
     * Number of delivered messages
     */
    public /*long*/
        $Delivered;

    /**
     * Number of bounced messages
     */
    public /*long*/
        $Bounced;

    /**
     * Number of messages in progress
     */
    public /*long*/
        $InProgress;

    /**
     * Number of opened messages
     */
    public /*long*/
        $Opened;

    /**
     * Number of clicked messages
     */
    public /*long*/
        $Clicked;

    /**
     * Number of unsubscribed messages
     */
    public /*long*/
        $Unsubscribed;

    /**
     * Number of complaint messages
     */
    public /*long*/
        $Complaints;

    /**
     * Number of inbound messages
     */
    public /*long*/
        $Inbound;

    /**
     * Number of manually cancelled messages
     */
    public /*long*/
        $ManualCancel;

    /**
     * Number of messages flagged with 'Not Delivered'
     */
    public /*long*/
        $NotDelivered;

    /**
     * ID number of template used
     */
    public /*bool*/
        $TemplateChannel;

}

/**
 * Overall log summary information.
 */
class LogSummary
{
    /**
     * Summary of log status, based on specified date range.
     */
    public /*ApiTypes\LogStatusSummary*/
        $LogStatusSummary;

    /**
     * Summary of bounced categories, based on specified date range.
     */
    public /*ApiTypes\BouncedCategorySummary*/
        $BouncedCategorySummary;

    /**
     * Daily summary of log status, based on specified date range.
     */
    public /*Array<ApiTypes\DailyLogStatusSummary>*/
        $DailyLogStatusSummary;

}

/**
 * Enum class
 */
abstract class MessageCategory
{
    /**
     *
     */
    const Unknown = 0;

    /**
     *
     */
    const Ignore = 1;

    /**
     * Number of messages marked as SPAM
     */
    const Spam = 2;

    /**
     * Number of blacklisted messages
     */
    const BlackListed = 3;

    /**
     * Number of messages flagged with 'No Mailbox'
     */
    const NoMailbox = 4;

    /**
     * Number of messages flagged with 'Grey Listed'
     */
    const GreyListed = 5;

    /**
     * Number of messages flagged with 'Throttled'
     */
    const Throttled = 6;

    /**
     * Number of messages flagged with 'Timeout'
     */
    const Timeout = 7;

    /**
     * Number of messages flagged with 'Connection Problem'
     */
    const ConnectionProblem = 8;

    /**
     * Number of messages flagged with 'SPF Problem'
     */
    const SPFProblem = 9;

    /**
     * Number of messages flagged with 'Account Problem'
     */
    const AccountProblem = 10;

    /**
     * Number of messages flagged with 'DNS Problem'
     */
    const DNSProblem = 11;

    /**
     *
     */
    const NotDeliveredCancelled = 12;

    /**
     * Number of messages flagged with 'Code Error'
     */
    const CodeError = 13;

    /**
     * Number of manually cancelled messages
     */
    const ManualCancel = 14;

    /**
     * Number of messages flagged with 'Connection terminated'
     */
    const ConnectionTerminated = 15;

    /**
     * Number of messages flagged with 'Not Delivered'
     */
    const NotDelivered = 16;

}

/**
 * Queue of notifications
 */
class NotificationQueue
{
    /**
     * Creation date.
     */
    public /*string*/
        $DateCreated;

    /**
     * Date of last status change.
     */
    public /*string*/
        $StatusChangeDate;

    /**
     * Actual status.
     */
    public /*string*/
        $NewStatus;

    /**
     *
     */
    public /*string*/
        $Reference;

    /**
     * Error message.
     */
    public /*string*/
        $ErrorMessage;

    /**
     * Number of previous delivery attempts
     */
    public /*string*/
        $RetryCount;

}

/**
 * Enum class
 */
abstract class NotificationType
{
    /**
     * Both, email and web, notifications
     */
    const All = 0;

    /**
     * Only email notifications
     */
    const Email = 1;

    /**
     * Only web notifications
     */
    const Web = 2;

}

/**
 * Detailed information about existing money transfers.
 */
class Payment
{
    /**
     * Date in YYYY-MM-DDThh:ii:ss format
     */
    public /*DateTime*/
        $Date;

    /**
     * Amount of money in transaction
     */
    public /*decimal*/
        $Amount;

    /**
     * Source of URL of payment
     */
    public /*string*/
        $Source;

}

/**
 * Basic information about your profile
 */
class Profile
{
    /**
     * First name.
     */
    public /*string*/
        $FirstName;

    /**
     * Last name.
     */
    public /*string*/
        $LastName;

    /**
     * Company name.
     */
    public /*string*/
        $Company;

    /**
     * First line of address.
     */
    public /*string*/
        $Address1;

    /**
     * Second line of address.
     */
    public /*string*/
        $Address2;

    /**
     * City.
     */
    public /*string*/
        $City;

    /**
     * State or province.
     */
    public /*string*/
        $State;

    /**
     * Zip/postal code.
     */
    public /*string*/
        $Zip;

    /**
     * Numeric ID of country. A file with the list of countries is available <a href="http://api.elasticemail.com/public/countries"><b>here</b></a>
     */
    public /*?int*/
        $CountryID;

    /**
     * Phone number
     */
    public /*string*/
        $Phone;

    /**
     * Proper email address.
     */
    public /*string*/
        $Email;

    /**
     * Code used for tax purposes.
     */
    public /*string*/
        $TaxCode;

}

/**
 * Enum class
 */
abstract class QuestionType
{
    /**
     *
     */
    const RadioButtons = 1;

    /**
     *
     */
    const DropdownMenu = 2;

    /**
     *
     */
    const Checkboxes = 3;

    /**
     *
     */
    const LongAnswer = 4;

    /**
     *
     */
    const Textbox = 5;

    /**
     * Date in YYYY-MM-DDThh:ii:ss format
     */
    const Date = 6;

}

/**
 * Detailed information about message recipient
 */
class Recipient
{
    /**
     * True, if message is SMS. Otherwise, false
     */
    public /*bool*/
        $IsSms;

    /**
     * ID number of selected message.
     */
    public /*string*/
        $MsgID;

    /**
     * Ending date for search in YYYY-MM-DDThh:mm:ss format.
     */
    public /*string*/
        $To;

    /**
     * Name of recipient's status: Submitted, ReadyToSend, WaitingToRetry, Sending, Bounced, Sent, Opened, Clicked, Unsubscribed, AbuseReport
     */
    public /*string*/
        $Status;

    /**
     * Name of selected Channel.
     */
    public /*string*/
        $Channel;

    /**
     * Creation date
     */
    public /*string*/
        $Date;

    /**
     *
     */
    public /*string*/
        $DateSent;

    /**
     *
     */
    public /*string*/
        $DateOpened;

    /**
     *
     */
    public /*string*/
        $DateClicked;

    /**
     * Content of message, HTML encoded
     */
    public /*string*/
        $Message;

    /**
     * True, if message category should be shown. Otherwise, false
     */
    public /*bool*/
        $ShowCategory;

    /**
     * Name of message category
     */
    public /*string*/
        $MessageCategory;

    /**
     * ID of message category
     */
    public /*ApiTypes\MessageCategory*/
        $MessageCategoryID;

    /**
     * Date of last status change.
     */
    public /*string*/
        $StatusChangeDate;

    /**
     * Date of next try
     */
    public /*string*/
        $NextTryOn;

    /**
     * Default subject of email.
     */
    public /*string*/
        $Subject;

    /**
     * Default From: email address.
     */
    public /*string*/
        $FromEmail;

    /**
     * ID of certain mail job
     */
    public /*string*/
        $JobID;

    /**
     * True, if message is a SMS and status is not yet confirmed. Otherwise, false
     */
    public /*bool*/
        $SmsUpdateRequired;

    /**
     * Content of message
     */
    public /*string*/
        $TextMessage;

    /**
     * Comma separated ID numbers of messages.
     */
    public /*string*/
        $MessageSid;

    /**
     * Recipient's last bounce error because of which this e-mail was suppressed
     */
    public /*string*/
        $ContactLastError;

}

/**
 * Referral details for this account.
 */
class Referral
{
    /**
     * Current amount of dolars you have from referring.
     */
    public /*decimal*/
        $CurrentReferralCredit;

    /**
     * Number of active referrals.
     */
    public /*long*/
        $CurrentReferralCount;

}

/**
 * Detailed sending reputation of your account.
 */
class ReputationDetail
{
    /**
     * Overall reputation impact, based on the most important factors.
     */
    public /*ApiTypes\ReputationImpact*/
        $Impact;

    /**
     * Percent of Complaining users - those, who do not want to receive email from you.
     */
    public /*double*/
        $AbusePercent;

    /**
     * Percent of Unknown users - users that couldn't be found
     */
    public /*double*/
        $UnknownUsersPercent;

    /**
     *
     */
    public /*double*/
        $OpenedPercent;

    /**
     *
     */
    public /*double*/
        $ClickedPercent;

    /**
     * Penalty from messages marked as spam.
     */
    public /*double*/
        $AverageSpamScore;

    /**
     * Percent of Bounced users
     */
    public /*double*/
        $FailedSpamPercent;

    /**
     * Points from quantity of your emails.
     */
    public /*double*/
        $RepEmailsSent;

    /**
     * Average reputation.
     */
    public /*double*/
        $AverageReputation;

    /**
     * Actual price level.
     */
    public /*double*/
        $PriceLevelReputation;

    /**
     * Reputation needed to change pricing.
     */
    public /*double*/
        $NextPriceLevelReputation;

    /**
     * Amount of emails sent from this account
     */
    public /*string*/
        $PriceLevel;

    /**
     * True, if tracking domain is correctly configured. Otherwise, false.
     */
    public /*bool*/
        $TrackingDomainValid;

    /**
     * True, if sending domain is correctly configured. Otherwise, false.
     */
    public /*bool*/
        $SenderDomainValid;

}

/**
 * Reputation history of your account.
 */
class ReputationHistory
{
    /**
     * Creation date.
     */
    public /*string*/
        $DateCreated;

    /**
     * Percent of Complaining users - those, who do not want to receive email from you.
     */
    public /*double*/
        $AbusePercent;

    /**
     * Percent of Unknown users - users that couldn't be found
     */
    public /*double*/
        $UnknownUsersPercent;

    /**
     *
     */
    public /*double*/
        $OpenedPercent;

    /**
     *
     */
    public /*double*/
        $ClickedPercent;

    /**
     * Penalty from messages marked as spam.
     */
    public /*double*/
        $AverageSpamScore;

    /**
     * Points from proper setup of your account
     */
    public /*double*/
        $SetupScore;

    /**
     * Points from quantity of your emails.
     */
    public /*double*/
        $RepEmailsSent;

    /**
     * Numeric reputation
     */
    public /*double*/
        $Reputation;

}

/**
 * Overall reputation impact, based on the most important factors.
 */
class ReputationImpact
{
    /**
     * Abuses - mails sent to user without their consent
     */
    public /*double*/
        $Abuse;

    /**
     * Users, that could not be reached.
     */
    public /*double*/
        $UnknownUsers;

    /**
     * Number of opened messages
     */
    public /*double*/
        $Opened;

    /**
     * Number of clicked messages
     */
    public /*double*/
        $Clicked;

    /**
     * Penalty from messages marked as spam.
     */
    public /*double*/
        $AverageSpamScore;

    /**
     * Content analysis.
     */
    public /*double*/
        $ServerFilter;

    /**
     * Tracking domain.
     */
    public /*double*/
        $TrackingDomain;

    /**
     * Sending domain.
     */
    public /*double*/
        $SenderDomain;

}

/**
 * Information about Contact Segment, selected by RULE.
 */
class Segment
{
    /**
     * ID number of your segment.
     */
    public /*int*/
        $SegmentID;

    /**
     * Filename
     */
    public /*string*/
        $Name;

    /**
     * Query used for filtering.
     */
    public /*string*/
        $Rule;

    /**
     * Number of items from last check.
     */
    public /*long*/
        $LastCount;

    /**
     * History of segment information.
     */
    public /*Array<ApiTypes\SegmentHistory>*/
        $History;

}

/**
 * Segment History
 */
class SegmentHistory
{
    /**
     * ID number of history.
     */
    public /*int*/
        $SegmentHistoryID;

    /**
     * ID number of your segment.
     */
    public /*int*/
        $SegmentID;

    /**
     * Date in YYYY-MM-DD format
     */
    public /*int*/
        $Day;

    /**
     * Number of items.
     */
    public /*long*/
        $Count;

    /**
     *
     */
    public /*long*/
        $EngagedCount;

    /**
     *
     */
    public /*long*/
        $ActiveCount;

    /**
     *
     */
    public /*long*/
        $BouncedCount;

    /**
     * Total emails clicked
     */
    public /*long*/
        $UnsubscribedCount;

    /**
     *
     */
    public /*long*/
        $AbuseCount;

    /**
     *
     */
    public /*long*/
        $InactiveCount;

}

/**
 * Enum class
 */
abstract class SendingPermission
{
    /**
     * Sending not allowed.
     */
    const None = 0;

    /**
     * Allow sending via SMTP only.
     */
    const Smtp = 1;

    /**
     * Allow sending via HTTP API only.
     */
    const HttpApi = 2;

    /**
     * Allow sending via SMTP and HTTP API.
     */
    const SmtpAndHttpApi = 3;

    /**
     * Allow sending via the website interface only.
     */
    const EEInterface = 4;

    /**
     * Allow sending via SMTP and the website interface.
     */
    const SmtpAndInterface = 5;

    /**
     * Allow sendnig via HTTP API and the website interface.
     */
    const HttpApiAndInterface = 6;

    /**
     * Sending allowed via SMTP, HTTP API and the website interface.
     */
    const All = 255;

}

/**
 * Spam check of specified message.
 */
class SpamCheck
{
    /**
     * Total spam score from
     */
    public /*string*/
        $TotalScore;

    /**
     * Date in YYYY-MM-DDThh:ii:ss format
     */
    public /*string*/
        $Date;

    /**
     * Default subject of email.
     */
    public /*string*/
        $Subject;

    /**
     * Default From: email address.
     */
    public /*string*/
        $FromEmail;

    /**
     * ID number of selected message.
     */
    public /*string*/
        $MsgID;

    /**
     * Name of selected channel.
     */
    public /*string*/
        $ChannelName;

    /**
     *
     */
    public /*Array<ApiTypes\SpamRule>*/
        $Rules;

}

/**
 * Single spam score
 */
class SpamRule
{
    /**
     * Spam score
     */
    public /*string*/
        $Score;

    /**
     * Name of rule
     */
    public /*string*/
        $Key;

    /**
     * Description of rule.
     */
    public /*string*/
        $Description;

}

/**
 * Enum class
 */
abstract class SplitOptimization
{
    /**
     * Number of opened messages
     */
    const Opened = 0;

    /**
     * Number of clicked messages
     */
    const Clicked = 1;

}

/**
 * Subaccount. Contains detailed data of your Subaccount.
 */
class SubAccount
{
    /**
     * Public key for limited access to your account such as contact/add so you can use it safely on public websites.
     */
    public /*string*/
        $PublicAccountID;

    /**
     * ApiKey that gives you access to our SMTP and HTTP API's.
     */
    public /*string*/
        $ApiKey;

    /**
     * Proper email address.
     */
    public /*string*/
        $Email;

    /**
     * ID number of mailer
     */
    public /*string*/
        $MailerID;

    /**
     * Name of your custom IP Pool to be used in the sending process
     */
    public /*string*/
        $PoolName;

    /**
     * Date of last activity on account
     */
    public /*string*/
        $LastActivity;

    /**
     * Amount of email credits
     */
    public /*string*/
        $EmailCredits;

    /**
     * True, if account needs credits to send emails. Otherwise, false
     */
    public /*bool*/
        $RequiresEmailCredits;

    /**
     * Amount of credits added to account automatically
     */
    public /*double*/
        $MonthlyRefillCredits;

    /**
     * True, if account needs credits to buy templates. Otherwise, false
     */
    public /*bool*/
        $RequiresTemplateCredits;

    /**
     * Amount of Litmus credits
     */
    public /*decimal*/
        $LitmusCredits;

    /**
     * True, if account is able to send template tests to Litmus. Otherwise, false
     */
    public /*bool*/
        $EnableLitmusTest;

    /**
     * True, if account needs credits to send emails. Otherwise, false
     */
    public /*bool*/
        $RequiresLitmusCredits;

    /**
     * True, if account can buy templates on its own. Otherwise, false
     */
    public /*bool*/
        $EnablePremiumTemplates;

    /**
     * True, if account can request for private IP on its own. Otherwise, false
     */
    public /*bool*/
        $EnablePrivateIPRequest;

    /**
     * Amount of emails sent from this account
     */
    public /*long*/
        $TotalEmailsSent;

    /**
     * Percent of Unknown users - users that couldn't be found
     */
    public /*double*/
        $UnknownUsersPercent;

    /**
     * Percent of Complaining users - those, who do not want to receive email from you.
     */
    public /*double*/
        $AbusePercent;

    /**
     * Percent of Bounced users
     */
    public /*double*/
        $FailedSpamPercent;

    /**
     * Numeric reputation
     */
    public /*double*/
        $Reputation;

    /**
     * Amount of emails account can send daily
     */
    public /*long*/
        $DailySendLimit;

    /**
     * Name of account's status: Deleted, Disabled, UnderReview, NoPaymentsAllowed, NeverSignedIn, Active, SystemPaused
     */
    public /*string*/
        $Status;

    /**
     * Maximum size of email including attachments in MB's
     */
    public /*int*/
        $EmailSizeLimit;

    /**
     * Maximum number of contacts the account can have
     */
    public /*int*/
        $MaxContacts;

    /**
     * True, if you want to use Contact Delivery Tools.  Otherwise, false
     */
    public /*bool*/
        $EnableContactFeatures;

    /**
     * Sending permission setting for account
     */
    public /*ApiTypes\SendingPermission*/
        $SendingPermission;

}

/**
 * Detailed account settings.
 */
class SubAccountSettings
{
    /**
     * Proper email address.
     */
    public /*string*/
        $Email;

    /**
     * True, if account needs credits to send emails. Otherwise, false
     */
    public /*bool*/
        $RequiresEmailCredits;

    /**
     * True, if account needs credits to buy templates. Otherwise, false
     */
    public /*bool*/
        $RequiresTemplateCredits;

    /**
     * Amount of credits added to account automatically
     */
    public /*double*/
        $MonthlyRefillCredits;

    /**
     * Amount of Litmus credits
     */
    public /*decimal*/
        $LitmusCredits;

    /**
     * True, if account is able to send template tests to Litmus. Otherwise, false
     */
    public /*bool*/
        $EnableLitmusTest;

    /**
     * True, if account needs credits to send emails. Otherwise, false
     */
    public /*bool*/
        $RequiresLitmusCredits;

    /**
     * Maximum size of email including attachments in MB's
     */
    public /*int*/
        $EmailSizeLimit;

    /**
     * Amount of emails account can send daily
     */
    public /*int*/
        $DailySendLimit;

    /**
     * Maximum number of contacts the account can have
     */
    public /*int*/
        $MaxContacts;

    /**
     * True, if account can request for private IP on its own. Otherwise, false
     */
    public /*bool*/
        $EnablePrivateIPRequest;

    /**
     * True, if you want to use Contact Delivery Tools.  Otherwise, false
     */
    public /*bool*/
        $EnableContactFeatures;

    /**
     * Sending permission setting for account
     */
    public /*ApiTypes\SendingPermission*/
        $SendingPermission;

    /**
     * Name of your custom IP Pool to be used in the sending process
     */
    public /*string*/
        $PoolName;

    /**
     * Public key for limited access to your account such as contact/add so you can use it safely on public websites.
     */
    public /*string*/
        $PublicAccountID;

}

/**
 * A survey object
 */
class Survey
{
    /**
     * Survey identifier
     */
    public /*Guid*/
        $PublicSurveyID;

    /**
     * Creation date.
     */
    public /*DateTime*/
        $DateCreated;

    /**
     * Last change date
     */
    public /*?DateTime*/
        $DateUpdated;

    /**
     *
     */
    public /*?DateTime*/
        $ExpiryDate;

    /**
     * Filename
     */
    public /*string*/
        $Name;

    /**
     * Activate, delete, or pause your survey
     */
    public /*ApiTypes\SurveyStatus*/
        $Status;

    /**
     * Number of results count
     */
    public /*int*/
        $ResultCount;

    /**
     *
     */
    public /*Array<ApiTypes\SurveyStep>*/
        $SurveySteps;

    /**
     * URL of the survey
     */
    public /*string*/
        $SurveyLink;

}

/**
 * Object with the single answer's data
 */
class SurveyResultAnswerInfo
{
    /**
     * Answer's content
     */
    public /*string*/
        $content;

    /**
     * Identifier of the step
     */
    public /*int*/
        $surveystepid;

    /**
     * Identifier of the answer of the step
     */
    public /*string*/
        $surveystepanswerid;

}

/**
 * Single answer's data with user's specific info
 */
class SurveyResultInfo
{
    /**
     * Identifier of the result
     */
    public /*string*/
        $SurveyResultID;

    /**
     * IP address
     */
    public /*string*/
        $CreatedFromIP;

    /**
     * Completion date
     */
    public /*DateTime*/
        $DateCompleted;

    /**
     * Start date
     */
    public /*DateTime*/
        $DateStart;

    /**
     * Answers for the survey
     */
    public /*Array<ApiTypes\SurveyResultAnswerInfo>*/
        $SurveyResultAnswers;

}

/**
 *
 */
class SurveyResultsAnswer
{
    /**
     * Identifier of the answer of the step
     */
    public /*string*/
        $SurveyStepAnswerID;

    /**
     * Number of items.
     */
    public /*int*/
        $Count;

    /**
     * Answer's content
     */
    public /*string*/
        $Content;

}

/**
 * Data on the survey's result
 */
class SurveyResultsSummaryInfo
{
    /**
     * Number of items.
     */
    public /*int*/
        $Count;

    /**
     * Summary statistics
     */
    public /*array<int, ApiTypes\List`1>*/
        $Summary;

}

/**
 * Enum class
 */
abstract class SurveyStatus
{
    /**
     * The survey is deleted
     */
    const Deleted = -1;

    /**
     * The survey is not receiving result for now
     */
    const Expired = 0;

    /**
     * The survey is active and receiving answers
     */
    const Active = 1;

}

/**
 * Survey's single step info with the answers
 */
class SurveyStep
{
    /**
     * Identifier of the step
     */
    public /*int*/
        $SurveyStepID;

    /**
     * Type of the step
     */
    public /*ApiTypes\SurveyStepType*/
        $SurveyStepType;

    /**
     * Type of the question
     */
    public /*ApiTypes\QuestionType*/
        $QuestionType;

    /**
     * Answer's content
     */
    public /*string*/
        $Content;

    /**
     * Is the answer required
     */
    public /*bool*/
        $Required;

    /**
     * Sequence of the answers
     */
    public /*int*/
        $Sequence;

    /**
     *
     */
    public /*Array<ApiTypes\SurveyStepAnswer>*/
        $SurveyStepAnswers;

}

/**
 * Single step's answer object
 */
class SurveyStepAnswer
{
    /**
     * Identifier of the answer of the step
     */
    public /*string*/
        $SurveyStepAnswerID;

    /**
     * Answer's content
     */
    public /*string*/
        $Content;

    /**
     * Sequence of the answers
     */
    public /*int*/
        $Sequence;

}

/**
 * Enum class
 */
abstract class SurveyStepType
{
    /**
     *
     */
    const PageBreak = 1;

    /**
     *
     */
    const Question = 2;

    /**
     *
     */
    const TextMedia = 3;

    /**
     *
     */
    const ConfirmationPage = 4;

    /**
     *
     */
    const ExpiredPage = 5;

}

/**
 * Template
 */
class Template
{
    /**
     * ID number of template.
     */
    public /*int*/
        $TemplateID;

    /**
     * 0 for API connections
     */
    public /*ApiTypes\TemplateType*/
        $TemplateType;

    /**
     * Filename
     */
    public /*string*/
        $Name;

    /**
     * Date of creation in YYYY-MM-DDThh:ii:ss format
     */
    public /*DateTime*/
        $DateAdded;

    /**
     * CSS style
     */
    public /*string*/
        $Css;

    /**
     * Default subject of email.
     */
    public /*string*/
        $Subject;

    /**
     * Default From: email address.
     */
    public /*string*/
        $FromEmail;

    /**
     * Default From: name.
     */
    public /*string*/
        $FromName;

    /**
     * HTML code of email (needs escaping).
     */
    public /*string*/
        $BodyHtml;

    /**
     * Text body of email.
     */
    public /*string*/
        $BodyText;

    /**
     * ID number of original template.
     */
    public /*int*/
        $OriginalTemplateID;

    /**
     * Enum: 0 - private, 1 - public, 2 - mockup
     */
    public /*ApiTypes\TemplateScope*/
        $TemplateScope;

}

/**
 * List of templates (including drafts)
 */
class TemplateList
{
    /**
     * List of templates
     */
    public /*Array<ApiTypes\Template>*/
        $Templates;

    /**
     * List of draft templates
     */
    public /*Array<ApiTypes\Template>*/
        $DraftTemplate;

}

/**
 * Enum class
 */
abstract class TemplateScope
{
    /**
     * Template is available for this account only.
     */
    const EEPrivate = 0;

    /**
     * Template is available for this account and it's sub-accounts.
     */
    const EEPublic = 1;

}

/**
 * Enum class
 */
abstract class TemplateType
{
    /**
     * Template supports any valid HTML
     */
    const RawHTML = 0;

    /**
     * Template is created and can only be modified in drag and drop editor
     */
    const DragDropEditor = 1;

}

/**
 * Information about tracking link and its clicks.
 */
class TrackedLink
{
    /**
     * URL clicked
     */
    public /*string*/
        $Link;

    /**
     * Number of clicks
     */
    public /*string*/
        $Clicks;

    /**
     * Percent of clicks
     */
    public /*string*/
        $Percent;

}

/**
 * Enum class
 */
abstract class TrackingType
{
    /**
     *
     */
    const None = -2;

    /**
     *
     */
    const EEDelete = -1;

    /**
     *
     */
    const Http = 0;

    /**
     *
     */
    const ExternalHttps = 1;

    /**
     *
     */
    const InternalCertHttps = 2;

    /**
     *
     */
    const LetsEncryptCert = 3;

}

/**
 * Status of ValidDomain used by DomainValidationService to determine how often tracking validation should be performed.
 * Enum class
 */
abstract class TrackingValidationStatus
{
    /**
     *
     */
    const Validated = 0;

    /**
     *
     */
    const NotValidated = 1;

    /**
     *
     */
    const Invalid = 2;

    /**
     *
     */
    const Broken = 3;

}

/**
 * Account usage
 */
class Usage
{
    /**
     * Proper email address.
     */
    public /*string*/
        $Email;

    /**
     * True, if this account is a sub-account. Otherwise, false
     */
    public /*bool*/
        $IsSubAccount;

    /**
     *
     */
    public /*Array<ApiTypes\UsageData>*/
        $List;

}

/**
 * Detailed data about daily usage
 */
class UsageData
{
    /**
     * Date in YYYY-MM-DDThh:ii:ss format
     */
    public /*DateTime*/
        $Date;

    /**
     * Number of finished tasks
     */
    public /*int*/
        $JobCount;

    /**
     * Overall number of recipients
     */
    public /*int*/
        $RecipientCount;

    /**
     * Number of inbound emails
     */
    public /*int*/
        $InboundCount;

    /**
     * Number of attachments sent
     */
    public /*int*/
        $AttachmentCount;

    /**
     * Size of attachments sent
     */
    public /*long*/
        $AttachmentsSize;

    /**
     * Calculated cost of sending
     */
    public /*decimal*/
        $Cost;

    /**
     * Number of pricate IPs
     */
    public /*?int*/
        $PrivateIPCount;

    /**
     *
     */
    public /*decimal*/
        $PrivateIPCost;

    /**
     * Number of SMS
     */
    public /*?int*/
        $SmsCount;

    /**
     * Overall cost of SMS
     */
    public /*decimal*/
        $SmsCost;

    /**
     * Cost of templates
     */
    public /*decimal*/
        $TemplateCost;

    /**
     * Cost of email credits
     */
    public /*?int*/
        $EmailCreditsCost;

    /**
     * Cost of template credit
     */
    public /*?int*/
        $TemplateCreditsCost;

    /**
     * Cost of litmus credits
     */
    public /*decimal*/
        $LitmusCost;

    /**
     * Cost of 1 litmus credit
     */
    public /*decimal*/
        $LitmusCreditsCost;

    /**
     * Daily cost of Contact Delivery Tools
     */
    public /*decimal*/
        $ContactCost;

    /**
     * Number of contacts
     */
    public /*long*/
        $ContactCount;

    /**
     *
     */
    public /*decimal*/
        $SupportCost;

    /**
     *
     */
    public /*decimal*/
        $EmailCost;

}
