<?php
use App\Http\Kernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Whoops\Handler\JsonResponseHandler;

/*
|--------------------------------------------------|
|               Load the autoloader                |
|--------------------------------------------------|
|
|   Composer provides an easy autoloader
|   that loads the right files for the
|   requested class.
|
*/
require_once __DIR__.'/../vendor/autoload.php';

/* Get the app Instance */
$app = require_once __DIR__.'/../bootstrap/app.php';


/*
|---------------------------------------------
| Run The Application
|---------------------------------------------
|
| Run the application using the Kernel class.
|
*/


$kernel = new Kernel();

$kernel->registerErrorHandler();

$response = $kernel->handle(
    $request = Request::createFromGlobals()
);

$response->send();

$kernel->terminate($request, $response);


