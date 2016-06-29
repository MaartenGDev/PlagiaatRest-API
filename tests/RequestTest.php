<?php


namespace App\Test;

use GuzzleHttp\Client;
use PHPUnit_Framework_TestCase;

class RequestTest extends PHPUnit_Framework_TestCase
{
    protected $token = 'EwBwAq1DBAAUGCCXc8wU/zFu9QnLdZXy+YnElFkAAfNm9gjPRpzOm4+OdVGTQcOu4LaXbQKbFDaK+Kg8Vv1Cl0Ge2Z0258GSVqXjQt7J1Hda//KarECk4FjbrkEUt7uHkd9nZ7H8u8V2ta6LZmgpQVLr8Ou/p6ExDQ4dwRT1cxnmVZSuMDYBEmlOdn4AmzP6Wfm2ji/hwzljGa+bQ+E85DCH4zFOR3tz5mD+okPnuoXRssalOkaYHHXgW+ZYM5aUR7geKbDaAXPkNgzJ1RXsyhfR/SiGhe/qORHrtdDGLztPh82qgv0p4u8b+/S24s+/kCGY5le19EZmwoWMba1lzR+9dJpOi5zk7Gb5Jnn2GHVXPfjw7DHSxXcN9FHTQoEDZgAACPZNbHvAWPshQAEZiCFNcwjSWl/Q1VGwxN5GSkwBdnhNx24kl1Oal3oJ+6S0MrXhXWFEUsl4hZn6kFbJHBGq7VhjsxNz9xL/Hta7adlXEQ2Pb5eVgqPt8Z0C4D5skpvAXJmU5MNpFxSo8YYVhs6ypNciXyGkp6ffRS6dc8sqepxAGit+EohNYZ64OX1BF13fBTRn02BsLnjU/N442HAyH7u0j4hoAEjjCdVBzMnKyBz/dg8gIBNPiXb5HmRGEXk3uXqYlQaB6Td0NRVNP31UJlU5ZF9P50Fva4de4OMUVv0GgOhNZCzCGEIWgVihSr5abMEsWukFMN1LF5cxvHyYCKX8lGy2IYWpZukB9uXcR7/8811InyZnWlKs9hp42oj+ImwZGlgEiA76KgrJNCHZC6GoeVdY0iWnPP/cj0/5oEMBZY/SQd80D3fLGHcB';

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
    public function testApiReturnsBadRequestWhenNoContentIsSend(){
        $client = new Client();
        $request = $client->request('POST','http://fast.dev/file/87B8378140BF8085!116/percentage',[
            'headers' => [
                'token' => $this->token
            ],
            'http_errors' => false,
        ]);

        $this->assertEquals(400,$request->getStatusCode());
    }
}