<?php


namespace App\Test;

use GuzzleHttp\Client;
use PHPUnit_Framework_TestCase;

class RequestTest extends PHPUnit_Framework_TestCase
{
    protected $token = '';
    public function testApiReturnsNotFoundWhenPageIsNotFound(){
        $client = new Client();
        $request = $client->request('GET','http://fast.dev/',[
            'http_errors' => false,
        ]);

        $this->assertEquals(404,$request->getStatusCode());
    }
    public function testApiReturnsUnauthorizedWhenNoTokenIsSend(){
        $client = new Client();
        $request = $client->request('GET','http://fast.dev/file/87B8378140BF8085!116/percentage',[
            'http_errors' => false,
        ]);

        $this->assertEquals(401,$request->getStatusCode());
    }
    public function testApiReturnsPercentageWhenCorrectTokenIsSend(){
        $client = new Client();
        $request = $client->request('POST','http://fast.dev/file/87B8378140BF8085!116/percentage',[
            'headers' => [
                'token' => $this->token
            ],
            'http_errors' => false,
        ]);
        $percentage = json_decode($request->getBody()->getContents());

        $this->assertEquals(0,$percentage->percentage);
    }
}