<?php
namespace Factory;
class PlatformFactory {
    private $platform;
    private $class;
    public $code;
    public $access_token;

    public function __construct($platform){
        $this->platform = ucfirst($platform);
        $this->class    = "\\Platform\\".$this->platform;
    }

    public function authanticate(){
        $platform_class = new $this->class();
        return $platform_class->authanticate();
    }

    public function getToken() {
        $platform_class = new $this->class();
        return $platform_class->getToken($this->code);
    }

    public function getUser() {
        $platform_class = new $this->class();
        return $platform_class->getUser($this->access_token);
    }

}
