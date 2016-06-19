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