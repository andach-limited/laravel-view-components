<?php

namespace Andach\LaravelViewComponents\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Andach\LaravelViewComponents\LaravelViewComponents
 */
class LaravelViewComponents extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Andach\LaravelViewComponents\LaravelViewComponents::class;
    }
}
