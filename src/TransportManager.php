<?php

namespace ZanySoft\ElasticEmail;

use Illuminate\Mail\TransportManager as LaravelTransportManager;

class TransportManager extends LaravelTransportManager
{
    protected function createElasticEmailDriver()
    {
        $config = $this->app['config']->get('services.elastic_email', []);

        return new ElasticTransport(
            $this->guzzle($config),
            $config['key'],
            $config['account']
        );
    }
}
