<?php

namespace ZanySoft\ElasticEmail\Facades;

use Illuminate\Support\Facades\Facade;

class ElasticEmail extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'ElasticEmail';
    }
}
