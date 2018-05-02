<?php
namespace ZanySoft\ElasticEmail\ApiTypes;

/**
 * Contact
 */
class Contact
{
    /**
     *
     */
    public /*int*/
        $ContactScore;

    /**
     * Date of creation in YYYY-MM-DDThh:ii:ss format
     */
    public /*DateTime*/
        $DateAdded;

    /**
     * Proper email address.
     */
    public /*string*/
        $Email;

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
     * Title
     */
    public /*string*/
        $Title;

    /**
     * Name of organization
     */
    public /*string*/
        $OrganizationName;

    /**
     * City.
     */
    public /*string*/
        $City;

    /**
     * Name of country.
     */
    public /*string*/
        $Country;

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
     * Phone number
     */
    public /*string*/
        $Phone;

    /**
     * Date of birth in YYYY-MM-DD format
     */
    public /*?DateTime*/
        $BirthDate;

    /**
     * Your gender
     */
    public /*string*/
        $Gender;

    /**
     * Name of status: Active, Engaged, Inactive, Abuse, Bounced, Unsubscribed.
     */
    public /*ApiTypes\ContactStatus*/
        $Status;

    /**
     * RFC Error code
     */
    public /*?int*/
        $BouncedErrorCode;

    /**
     * RFC error message
     */
    public /*string*/
        $BouncedErrorMessage;

    /**
     * Total emails sent.
     */
    public /*int*/
        $TotalSent;

    /**
     * Total emails sent.
     */
    public /*int*/
        $TotalFailed;

    /**
     * Total emails opened.
     */
    public /*int*/
        $TotalOpened;

    /**
     * Total emails clicked
     */
    public /*int*/
        $TotalClicked;

    /**
     * Date of first failed message
     */
    public /*?DateTime*/
        $FirstFailedDate;

    /**
     * Number of fails in sending to this Contact
     */
    public /*int*/
        $LastFailedCount;

    /**
     * Last change date
     */
    public /*DateTime*/
        $DateUpdated;

    /**
     * Source of URL of payment
     */
    public /*ApiTypes\ContactSource*/
        $Source;

    /**
     * RFC Error code
     */
    public /*?int*/
        $ErrorCode;

    /**
     * RFC error message
     */
    public /*string*/
        $FriendlyErrorMessage;

    /**
     * IP address
     */
    public /*string*/
        $CreatedFromIP;

    /**
     * Yearly revenue for the contact
     */
    public /*decimal*/
        $Revenue;

    /**
     * Number of purchases contact has made
     */
    public /*int*/
        $PurchaseCount;

    /**
     * Mobile phone number
     */
    public /*string*/
        $MobileNumber;

    /**
     * Fax number
     */
    public /*string*/
        $FaxNumber;

    /**
     * Biography for Linked-In
     */
    public /*string*/
        $LinkedInBio;

    /**
     * Number of Linked-In connections
     */
    public /*int*/
        $LinkedInConnections;

    /**
     * Biography for Twitter
     */
    public /*string*/
        $TwitterBio;

    /**
     * User name for Twitter
     */
    public /*string*/
        $TwitterUsername;

    /**
     * URL for Twitter photo
     */
    public /*string*/
        $TwitterProfilePhoto;

    /**
     * Number of Twitter followers
     */
    public /*int*/
        $TwitterFollowerCount;

    /**
     * Unsubscribed date in YYYY-MM-DD format
     */
    public /*?DateTime*/
        $UnsubscribedDate;

    /**
     * Industry contact works in
     */
    public /*string*/
        $Industry;

    /**
     * Number of employees
     */
    public /*int*/
        $NumberOfEmployees;

    /**
     * Annual revenue of contact
     */
    public /*?decimal*/
        $AnnualRevenue;

    /**
     * Date of first purchase in YYYY-MM-DD format
     */
    public /*?DateTime*/
        $FirstPurchase;

    /**
     * Date of last purchase in YYYY-MM-DD format
     */
    public /*?DateTime*/
        $LastPurchase;

    /**
     * Free form field of notes
     */
    public /*string*/
        $Notes;

    /**
     * Website of contact
     */
    public /*string*/
        $WebsiteUrl;

    /**
     * Number of page views
     */
    public /*int*/
        $PageViews;

    /**
     * Number of website visits
     */
    public /*int*/
        $Visits;

    /**
     * Number of messages sent last month
     */
    public /*?int*/
        $LastMonthSent;

    /**
     * Date this contact last opened an email
     */
    public /*?DateTime*/
        $LastOpened;

    /**
     *
     */
    public /*?DateTime*/
        $LastClicked;

    /**
     * Your gravatar hash for image
     */
    public /*string*/
        $GravatarHash;

    /**
     *
     */
    public /*array<string, string>*/
        $CustomFields;

}