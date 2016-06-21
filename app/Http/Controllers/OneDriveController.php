<?php


namespace App\Http\Controllers;


use App\Http\Support\CompareFile;
use App\Http\Support\OneDrive;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OneDriveController
{
    public function options(){
            $response = new Response();

            $response->headers->set('Access-Control-Allow-Origin','*');
            $response->headers->set('Access-Control-Allow-Headers','token');

            return $response;
    }
    public function file(Request $request,$file){
        $token = $request->headers->get('token');

        $content = $request->get('content');

        $response = new Response(
            CompareFile::compare(
                OneDrive::file($token,$file),
                $content
            )
        );

        $response->headers->set('Access-Control-Allow-Origin','*');
        $response->headers->set('Content-Type','application/json');
        return $response;
    }
}