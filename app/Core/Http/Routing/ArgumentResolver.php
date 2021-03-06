<?php


namespace App\Core\Http\Routing;


use ReflectionClass;
use Symfony\Component\HttpFoundation\Request;

class ArgumentResolver
{
    private $controller;
    private $request;

    public function __construct($controller,Request $request)
    {
        $this->controller = $controller;
        $this->request = $request;
    }

    public function all(){
        return $this->getArguments(...$this->controller);
    }

    public function getArguments($controller,$method){
        $arguments = [];

        $reflection = new ReflectionClass($controller);
        $parameters = $reflection->getMethod($method)->getParameters();

       foreach($parameters as $parameter){
           $value = $this->request->request->get($parameter->name);

           if(!is_null($parameter->getClass()) && $parameter->getClass()->getName() == Request::class){
                $value = $this->request;
           }

           $arguments[$parameter->name] = $value;
        }
        return $arguments;
    }
}