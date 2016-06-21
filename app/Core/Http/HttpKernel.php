<?php


namespace App\Core\Http;

use App\Core\Http\Routing\ArgumentResolver;
use App\Core\Http\Routing\ControllerResolver;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HttpKernel
{
    public function sendRequestThroughRouter(Request $request){

        $routeMatcher = new ControllerResolver($request);
        list($controller,$request) = $routeMatcher->getController($this->getRoutes(),$request);

        $arguments = new ArgumentResolver($controller,$request);

        return call_user_func_array($controller,$arguments->all());
    }

    public function getRoutes(){
        $routes = require_once home().'app/Http/routes.php';

        return $routes;
    }

    public function registerErrorHandler(){
        set_exception_handler(function(Exception $e){
            $response = new Response(json_encode([
                'message' => $e->getMessage()
            ]),$e->getCode());
            $response->headers->set('Content-Type','application/json');
            $response->send();
        });
    }
    public function handle(Request $request){
       return $this->sendRequestThroughRouter($request);
    }
}