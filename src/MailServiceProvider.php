<?php

namespace ZanySoft\ElasticEmail;

use Illuminate\Mail\MailServiceProvider as LaravelMailServiceProvider;

class MailServiceProvider extends LaravelMailServiceProvider
{
    /**
     * Register the Swift Transport instance.
     * @return void
     */
    protected function registerSwiftTransport() {
        $this->app->singleton('swift.transport', function ($app) {
            return new TransportManager($app);
        });
    }
    
    public function boot() {
        
        /*--------------------------------------------------------------------------
        | Pulish configuration file
        |--------------------------------------------------------------------------*/
        
        $this->publishes([
            __DIR__ . '/Config/elastic-email.php' => config_path('elastic-email.php'),
        ], 'laravel-mail');
    }
}
