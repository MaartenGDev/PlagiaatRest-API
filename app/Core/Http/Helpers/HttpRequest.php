<?php


namespace App\Core\Http\Helpers;


class HttpRequest
{
    private $handle;

    public function __construct()
    {
        $this->handle = curl_init();
        $this->setDefaults();
    }
    public function setDefaults(){
        $this->addOption(CURLOPT_RETURNTRANSFER,true);
        $this->addOption(CURLOPT_FOLLOWLOCATION,true);
    }
    public function setUri($uri){
        curl_setopt($this->handle,CURLOPT_URL,$uri);
        return $this;
    }
    public function addOption($option, $value) {
        curl_setopt($this->handle, $option, $value);
        return $this;
    }
    
    public function headers($headers){
        curl_setopt($this->handle,CURLOPT_HTTPHEADER,$headers);
        return $this;
    }

    public function post($values) {
        $this->addOption(CURLOPT_POST, true);
        return $this->addOption(CURLOPT_POSTFIELDS, $values);
    }

    public function send(){
        return curl_exec($this->handle);
    }


    public function __destruct() {
        if ($this->handle) {
            curl_close($this->handle);
        }
    }

}