<?php


namespace App\Core\Http;

use App\Core\Http\Routing\ArgumentResolver;
use App\Core\Http\Routing\ControllerResolver;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class HttpKernel
{
    public function sendRequestThroughRouter(Request $request){

        $routeMatcher = new ControllerResolver($request);
        list($controller,$request) = $routeMatcher->getController($this->getRoutes(),$request);

        $arguments = new ArgumentResolver($controller,$request);

        return call_user_func_array($controller,$arguments->all());
    }
    public function getRoutes(){
        $routes = require_once __DIR__ .'/../../Http/routes.php';

        return $routes;
    }
    public function handle(Request $request){
       return $this->sendRequestThroughRouter($request);
    }
}