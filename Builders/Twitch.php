<?php
namespace Builder;

class Twitch {
    public $token_url     = 'https://id.twitch.tv/oauth2/token';
    public $authorize_url = 'https://id.twitch.tv/oauth2/authorize';
    public $client_id     = 'your_client_id';
    public $client_secret = 'yout_client_secret';
    public $token_type    = 'Bearer';
    public $redirect_uri  = "https://www.social.com/twitch.php"; // your redirect url

}

