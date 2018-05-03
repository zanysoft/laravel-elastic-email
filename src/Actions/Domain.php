<?php
namespace ZanySoft\ElasticEmail\Actions;

class Domain extends ApiClient

{
    /**
     * Add new domain to account
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $domain Name of selected domain.
     * @param $trackingType  None = -2, EEDelete = -1, Http = 0, ExternalHttps = 1, InternalCertHttps = 2, LetsEncryptCert = 3
     */
    public function Add($domain, $trackingType = 0) {
        return $this->request('domain/add', array(
            'domain' => $domain,
            'trackingType' => $trackingType
        ));
    }
    
    /**
     * Deletes configured domain from account
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $domain Name of selected domain.
     */
    public function EEDelete($domain) {
        return $this->request('domain/delete', array(
            'domain' => $domain
        ));
    }
    
    /**
     * Lists all domains configured for this account.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     *
     * @return array DomainDetail
     */
    public function EEList() {
        return $this->request('domain/list');
    }
    
    /**
     * Verification of email addres set for domain.
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $domain Default email sender, example: mail@yourdomain.com
     */
    public function SetDefault($domain) {
        return $this->request('domain/setdefault', array(
            'domain' => $domain
        ));
    }
    
    /**
     * Verification of DKIM record for domain
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $domain Name of selected domain.
     */
    public function VerifyDkim($domain) {
        return $this->request('domain/verifydkim', array(
            'domain' => $domain
        ));
    }
    
    /**
     * Verification of MX record for domain
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $domain Name of selected domain.
     */
    public function VerifyMX($domain) {
        return $this->request('domain/verifymx', array(
            'domain' => $domain
        ));
    }
    
    /**
     * Verification of SPF record for domain
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $domain Name of selected domain.
     */
    public function VerifySpf($domain) {
        return $this->request('domain/verifyspf', array(
            'domain' => $domain
        ));
    }
    
    /**
     * Verification of tracking CNAME record for domain
     *
     * @param string $apikey ApiKey that gives you access to our SMTP and HTTP API's.
     * @param string $domain Name of selected domain.
     * @param $trackingType  None = -2, EEDelete = -1, Http = 0, ExternalHttps = 1, InternalCertHttps = 2, LetsEncryptCert = 3
     */
    public function VerifyTracking($domain, $trackingType = 0) {
        return $this->request('domain/verifytracking', array(
            'domain' => $domain,
            'trackingType' => $trackingType
        ));
    }
    
}
    
    