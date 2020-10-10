<?php

namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;

class DirectoryManagerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'DirectoryManager';
    }
}
