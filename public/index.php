<?php
use App\Http\Kernel;
use Symfony\Component\HttpFoundation\Request;

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


// Exception handler:
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


/*
|---------------------------------------------
| Run The Application
|---------------------------------------------
|
| Run the application using the Kernel class.
|
*/


$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::createFromGlobals()
);





$response->send();

$kernel->terminate($request, $response);


