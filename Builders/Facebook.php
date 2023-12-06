<?php
namespace Builder;
session_start();
require_once "Facebook/autoload.php";
require_once "Php_Social_Login/facebook.php";

$fb = new Facebook\Facebook([
    'app_id' => '2091032341240109',
    'app_secret' => 'b866834e713976280c644d54d9076cbf',
    'default_graph_version' => 'v2.10',
    ]);
  
  $helper = $fb->getRedirectLoginHelper();
  
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl('https://okesmez.com/kullanici2/fb-callback.php', $permissions);
  
  echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';