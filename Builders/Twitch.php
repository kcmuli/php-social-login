<?php
namespace Builder;

class Twitch {
    public $token_url     = 'https://id.twitch.tv/oauth2/token';
    public $authorize_url = 'https://id.twitch.tv/oauth2/authorize';
    public $client_id     = 'your_client_id';  // set in .env file
    public $client_secret = 'yout_client_secret'; // set in .env file
    public $token_type    = 'Bearer';
    //public $redirect_uri  = "https://www.social.com/twitch.php"; // your redirect url
    public $redirect_uri  = "https://okesmez.com/php-social-login-main/twitch.php"; // your redirect url

    public function __construct(){
        $env = parse_ini_file('.env');
        $this->client_id      =  $env["twitch_client_id"];
        $this->client_secret  =  $env["twitch_client_secret"];
    }
}

