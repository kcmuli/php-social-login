<?php
#echo $_GET["platform"];
use Factory\PlatformFactory;
use Platform\Twitch;
use Platform\Google;
use Platform\Facebook;
use Platform\Social;

// https://developers.google.com/identity/sign-in/web/sign-in?hl=tr
// https://developers.google.com/api-client-library?hl=tr
// https://developers.facebook.com/docs/graph-api/guides/our-sdks/

require_once 'Factories/PlatformFactory.php';
require_once 'Platforms/Google.php';
require_once 'Platforms/Twitch.php';
require_once 'Platforms/Facebook.php';
require_once 'Builders/Facebook.php';
require_once 'Builders/Google.php';
require_once 'Builders/Twitch.php';
$factory = new PlatformFactory($_GET["platform"]);

$factory->authanticate();
?> 
