<?php


namespace App\Http\Support;

use App\Core\Support\Facade;
use App\Services\CompareFileService;

class CompareFile extends Facade
{

    static function getFacadeAccessor()
    {
        return CompareFileService::class;
    }
}