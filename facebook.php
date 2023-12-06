<?php
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '2091032341240109',
  'app_secret' => 'b866834e713976280c644d54d9076cbf',
  'default_graph_version' => 'v2.10',
  'default_access_token' => '2091032341240109|SgjEd7CFYs4vgeXMCr4Om_L_T2A', // optional
]);

/*curl -X GET "https://graph.facebook.com/oauth/access_token?client_id=2091032341240109
&client_secret=b866834e713976280c644d54d9076cbf&grant_type=client_credentials"*/

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me', '2091032341240109|SgjEd7CFYs4vgeXMCr4Om_L_T2A');
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
echo 'Logged in as ' . $me->getName();

$fb = new Facebook\Facebook([
  'app_id' => '2091032341240109',
  'app_secret' => 'b866834e713976280c644d54d9076cbf',
  'default_graph_version' => 'v2.10',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://okesmez.com/kullanici2/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';