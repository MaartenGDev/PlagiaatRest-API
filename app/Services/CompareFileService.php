<?php


namespace App\Services;


class CompareFileService
{
    public function compare($haystack,$needle){

        return json_encode([
           'percentage' =>  strpos($haystack,$needle),
        ]);
    }
}