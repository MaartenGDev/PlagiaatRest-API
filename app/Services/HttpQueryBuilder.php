<?php


namespace App\Services;

use App\Core\Http\Helpers\HttpRequest;

class HttpQueryBuilder
{
    private $request;
    private $uri;
    private $arguments = [];

    public function __construct()
    {
        $this->request = new HttpRequest();
    }

    public function setUri($uri){
        $this->uri = $uri;
    }
    public function setHeaders($headers){
        $this->request->headers($headers);
    }
    public function addParam($key,$value){
        $this->arguments[$key] = $value;
    }

    public function build(){
        return $this->uri . $this->formatArguments();
    }

    public function formatArguments(){
        $parameters = '';
        $firstArgument = true;

        foreach($this->arguments as $key => $argument){
            $glue = $firstArgument ? '?' : '&';

            $parameters .= $glue . $key . '=' .$argument;
        }
        return $parameters;
    }

    public function get(){
        $this->request->setUri($this->build());

        return $this->request->send();
    }
}
