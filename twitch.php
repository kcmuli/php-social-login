<?php
use Factory\PlatformFactory;
use Platform\Twitch;
if(isset($_GET['code'])){
    require_once 'Factories/PlatformFactory.php';
    require_once 'Platforms/Twitch.php';
    require_once 'Builders/Twitch.php';
    // Access Token alınıyor.
    $factory          = new PlatformFactory('twitch');
    $factory->code    = $_GET['code'];
    $access_token     = $factory->getToken();

    if($access_token){
        $factory->access_token = $access_token;
        $user                  = $factory->getUser();
        // All user informations
        var_dump($user->data[0]);
    }
}