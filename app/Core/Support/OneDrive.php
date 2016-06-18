<?php


namespace App\Core\Support;


use App\Services\OneDriveService;

class OneDrive extends Facade
{
    public static function getFacadeAccessor(){

        return OneDriveService::class;
    }
}