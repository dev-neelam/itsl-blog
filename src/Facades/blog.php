<?php

namespace itsl\blog\Facades;

use Illuminate\Support\Facades\Facade;

class blog extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'blog';
    }
}
