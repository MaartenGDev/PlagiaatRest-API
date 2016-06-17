<?php
if(!function_exists('contains')){

    function contains($haystack,$needle){
        return strpos($haystack,$needle) !== false;
    }

}