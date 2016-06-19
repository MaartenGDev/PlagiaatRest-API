<?php


namespace App\Http\Controllers;


use App\Http\Support\CompareFile;
use App\Http\Support\OneDrive;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OneDriveController
{
    public function file(Request $request,$file,$content){

        $token = $request->headers->get('token');

        $token = 'token';

        $response = new Response(
            CompareFile::compare(
                OneDrive::file($token,$file),
                $content
            )
        );

        $response->headers->set('Access-Control-Allow-Origin','*');
        return $response;
    }
}