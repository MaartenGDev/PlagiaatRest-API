<?php

namespace App\Http\Controllers;

use App\Core\Support\OneDrive;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index($name){

        return new Response(
            OneDrive::hello('maartentest')
        );
    }
}