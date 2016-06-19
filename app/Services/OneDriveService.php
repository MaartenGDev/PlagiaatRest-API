<?php


namespace App\Services;


use App\Http\Support\File;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class OneDriveService
{
    private $api = 'https://api.onedrive.com/v1.0/';
    private $client;

    public function __construct()
    {
        $this->client = new HttpQueryBuilderService($this->api);
    }

    public function sendAuthRequest($token,$path){

        if(is_null($token)){
            throw new AccessDeniedHttpException('Invalid Token');
        }
        
        $this->client->setUri($this->api . $path);

        $this->client->setHeaders(
            [
                'Authorization: Bearer ' . $token
            ]
        );
        return $this->client->get();
    }

    public function file($token,$id){

        $file = File::content($this->sendAuthRequest($token,'drive/items/'. $id .'/content'));
        return $file;
    }
}