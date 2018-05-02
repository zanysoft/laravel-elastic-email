<?php
namespace ZanySoft\ElasticEmail\ApiTypes;

/**
 * Campaign
 */
class Campaign
{
    /**
     * ID number of selected Channel.
     */
    public /*?int*/
        $ChannelID;
    
    /**
     * Campaign's name
     */
    public /*string*/
        $Name;
    
    /**
     * Name of campaign's status
     */
    public /*ApiTypes\CampaignStatus*/
        $Status;
    
    /**
     * List of Segment and List IDs, preceded with 'l' for Lists and 's' for Segments, comma separated
     */
    public /*Array<string>*/
        $Targets;
    
    /**
     * Number of event, triggering mail sending
     */
    public /*ApiTypes\CampaignTriggerType*/
        $TriggerType;
    
    /**
     * Date of triggered send
     */
    public /*?DateTime*/
        $TriggerDate;
    
    /**
     * How far into the future should the campaign be sent, in minutes
     */
    public /*double*/
        $TriggerDelay;
    
    /**
     * When your next automatic mail will be sent, in minutes
     */
    public /*double*/
        $TriggerFrequency;
    
    /**
     * How many times should the campaign be sent
     */
    public /*int*/
        $TriggerCount;
    
    /**
     * ID number of transaction
     */
    public /*int*/
        $TriggerChannelID;
    
    /**
     * Data for filtering event campaigns such as specific link addresses.
     */
    public /*string*/
        $TriggerData;
    
    /**
     * What should be checked for choosing the winner: opens or clicks
     */
    public /*ApiTypes\SplitOptimization*/
        $SplitOptimization;
    
    /**
     * Number of minutes between sends during optimization period
     */
    public /*int*/
        $SplitOptimizationMinutes;
    
    /**
     *
     */
    public /*int*/
        $TimingOption;
    
    /**
     *
     */
    public /*Array<ApiTypes\CampaignTemplate>*/
        $CampaignTemplates;
    
}