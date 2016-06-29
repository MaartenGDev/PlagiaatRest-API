<?php
if(!function_exists('contains')){

    function contains($haystack,$needle){
        return strpos($haystack,$needle) !== false;
    }

}

if(!function_exists('home')){

    function home(){
        return __DIR__ . '/../../../';
    }

}
if(!function_exists('path')){


    function path($key){
        $items = [
          'logs' => 'storage/logs/'
        ];

        return home() . $items[$key];
    }

}