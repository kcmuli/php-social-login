<?php
namespace Platform;

class Twitch {

    private $config = null;
    public  $access_token = null;
    public function __construct() {
        $this->config = new \Builder\Twitch();
    }

    public function authanticate(){
        $this->authorize();
    }

    public function getToken($code){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->config->token_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'client_id='.$this->config->client_id.'&client_secret='.$this->config->client_secret.'&code='.$code.'&grant_type=authorization_code&redirect_uri='.$this->config->redirect_uri,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response     = curl_exec($curl);
        $access_token = json_decode($response)->access_token;
        return $access_token;
    }

    public function authorize() {
        echo '<a href="'.$this->config->authorize_url.'?response_type=code&client_id='.$this->config->client_id.'&redirect_uri='.$this->config->redirect_uri.'&scope=user:read:email&state='.time().'">Login</>';
    }

    public function getUser($access_token){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twitch.tv/helix/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$access_token,
                'Client-Id: '.$this->config->client_id,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);

    }


}

