<?php

namespace ZanySoft\ElasticEmail;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register the Swift Transport instance.
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ElasticEmail', function () {
            return new ElasticApi();
        });
    }
}
