<?php
namespace Builder;

class Twitch {
    public $token_url;
    public $authorize_url;
    public $client_id;
    public $client_secret;
    public $redirect_uri; // your redirect url

    public function __construct(){
        $env = parse_ini_file('.env');
        $this->client_id      =  $env["twitch_client_id"];
        $this->client_secret  =  $env["twitch_client_secret"];
        $this->authorize_url  =  $env["twitch_authorize_url"];
        $this->token_url      =  $env["twitch_token_url"];

        if($env["twitch_redirect_uri"]){
            $this->redirect_uri = $env["twitch_redirect_uri"];
        }
    }
}

