<?php


namespace App\Http\Support;

use App\Core\Support\Facade;
use App\Services\OneDriveService;

class OneDrive extends Facade
{
    public static function getFacadeAccessor(){

        return OneDriveService::class;
    }
}