<?php

namespace App\Http;

use App\Core\Http\HttpKernel;
use App\Http\Middleware\StartSession;

class Kernel extends HttpKernel
{
    private $middlewareGroups = [
      StartSession::class
    ];
}