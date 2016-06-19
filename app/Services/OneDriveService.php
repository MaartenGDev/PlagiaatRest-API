<?php


namespace App\Services;


class OneDriveService
{
    private $api = 'https://api.onedrive.com/v1.0/';
    private $client;

    public function __construct()
    {
        $this->client = new HttpQueryBuilder($this->api);

    }

    public function sendAuthRequest($token,$path){

        $this->client->setUri($this->api . $path);

        $this->client->setHeaders(
            [
                'Authorization: Bearer ' . $token
            ]
        );
        return $this->client->get();
    }
    public function search($token,$path){
        return $this->sendAuthRequest($token,$path);
    }
}