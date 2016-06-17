<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index($name){
        return new Response('Hello ' . $name);
    }
}