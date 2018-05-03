<?php
namespace ZanySoft\ElasticEmail\Actions;

/**
 * Methods to organize and get results of your surveys
 */
class Survey extends ApiClient
{
    
    /**
     * Adds a new survey
     *
     * @param $survey        Json representation of a survey
     */
    public function Add($survey) {
        return $this->request('survey/add', array(
            'survey' => $survey
        ));
    }
    
    /**
     * Deletes the survey
     *
     * @param Guid $publicSurveyID Survey identifier
     */
    public function EEDelete($publicSurveyID) {
        return $this->request('survey/delete', array(
            'publicSurveyID' => $publicSurveyID
        ));
    }
    
    /**
     * Export given survey's data to provided format
     *
     * @param $publicSurveyID      Survey identifier
     * @param string $fileName     Name of your file.
     * @param  $fileFormat         Format of the exported file 1=csv, 2=xml, 3=json
     * @param  $compressionFormat  FileResponse compression format. 0=None or 1=Zip.
     */
    public function Export($publicSurveyID, $fileName, $fileFormat = 1, $compressionFormat = 0) {
        return $this->request('survey/export', array(
            'publicSurveyID' => $publicSurveyID,
            'fileName' => $fileName,
            'fileFormat' => $fileFormat,
            'compressionFormat' => $compressionFormat
        ));
    }
    
    /**
     * Shows all your existing surveys
     * @return array
     */
    public function EEList() {
        return $this->request('survey/list');
    }
    
    /**
     * Get list of personal answers for the specific survey
     *
     * @param $publicSurveyID Survey identifier
     *
     * @return array
     */
    public function LoadResponseList($publicSurveyID) {
        return $this->request('survey/loadresponselist', array(
            'publicSurveyID' => $publicSurveyID
        ));
    }
    
    /**
     * Get general results of the specific survey
     *
     * @param Guid $publicSurveyID Survey identifier
     */
    public function LoadResults($publicSurveyID) {
        return $this->request('survey/loadresults', array(
            'publicSurveyID' => $publicSurveyID
        ));
    }
    
    /**
     * Update the survey information
     *
     * @param  $survey       Json representation of a survey
     */
    public function Update($survey) {
        return $this->request('survey/update', array(
            'survey' => $survey
        ));
    }
    
}