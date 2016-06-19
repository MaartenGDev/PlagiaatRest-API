<?php


namespace App\Http\Controllers;


use App\Core\Support\OneDrive;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class OneDriveController
{
    public function folder(Request $request,$folder){

        $token = $request->headers->get('token');

        if(is_null($token)){
            throw new AccessDeniedHttpException('Invalid Token');
        }

        $response = new Response(OneDrive::search($token,'drive/root/view.search?q=de'));

        $response->headers->set('Access-Control-Allow-Origin','*');

        return $response;
    }
}