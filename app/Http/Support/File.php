<?php


namespace App\Http\Support;

use App\Core\Support\Facade;
use App\Services\FileService;

class File extends Facade
{

    static function getFacadeAccessor()
    {
        return FileService::class;
    }
}