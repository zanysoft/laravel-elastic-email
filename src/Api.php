<?php
namespace ZanySoft\ElasticEmail;

use ZanySoft\ElasticEmail\Actions\Account;
use ZanySoft\ElasticEmail\Actions\ApiClient;
use ZanySoft\ElasticEmail\Actions\Channel;
use ZanySoft\ElasticEmail\Actions\Contact;
use ZanySoft\ElasticEmail\Actions\EEList;
use ZanySoft\ElasticEmail\Actions\Email;

class Api
{
    
    /**
     * The Elastic Email API key.
     * @var string
     */
    protected $apiKey;
    
    /**
     * The Elastic Email username.
     * @var string
     */
    protected $account;
    
    /**
     * THe Elastic Email API end-point.
     * @var string
     */
    protected $apiUri = 'https://api.elasticemail.com/v2/';
    
    public function __construct() {
        
        $config = app('config')->get('services.elastic_email', []);
        
        $this->apiKey  = $config['key'];
        $this->account = $config['account'];
        //dd('api');
    }
    
    public function client() {
        return new ApiClient($this->apiKey, $this->account);
    }
    
    public function account() {
        return new Account($this->apiKey, $this->account);
    }
    
    public function email() {
        return new Email($this->apiKey, $this->account);
    }
    
    public function channel() {
        return new Channel($this->apiKey, $this->account);
    }
    
    public function contact() {
        return new Contact($this->apiKey, $this->account);
    }
    
    public function email_list() {
        return new EEList($this->apiKey, $this->account);
    }
    
}

