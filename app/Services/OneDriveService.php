<?php


namespace App\Services;


use App\Http\Support\File;
use GuzzleHttp\Client;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class OneDriveService
{
    private $api = 'https://api.onedrive.com/v1.0/';
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function sendAuthRequest($method, $token, $path)
    {

        if (is_null($token)) {
            throw new AccessDeniedHttpException('Invalid Token', null, 401);
        }

        $response = $this->client->request($method, $this->api . $path, [
            'headers' => [
                'Authorization' => 'bearer ' . $token
            ]
        ]);
        return $response->getBody();
    }

    public function file($token, $id)
    {
        return File::content(
            $this->sendAuthRequest('GET', $token, 'drive/items/' . $id . '/content')
        );
    }

    public function getChildren($token, $path = 'root')
    {

        $request = $this->sendAuthRequest(
            'GET', $token, 'drive/' . $path . '/children'
        );
        $data = json_decode($request)->value;

        return array_map(function ($item) use ($token) {
            return [
                'name' => $item->name,
                'id' => $item->id,
                'isFolder' => property_exists($item, 'folder'),
            ];

        }, $data);
    }

    public function rootFiles($token){
        return $this->getChildren($token);
    }

    public function files($token, $files){
        return $this->getChildren($token, $files);
    }
}















