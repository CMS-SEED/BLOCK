<?php

namespace Cms_Framework_Seed\Block\Facades;

use Illuminate\Support\Facades\Facade;

class Block extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'block';
    }
}
