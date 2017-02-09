<?php
session_start();

require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '220576288348676',
  'app_secret' => '9c1ed583370c2633a400b052e3c9ef06',
  'default_graph_version' => 'v2.8'
]);

$helper = $fb->getJavaScriptHelper();
$permissions = ['email', 'user_likes']; // optional

try {
  $accessToken = $helper->getAccessToken();
  if(isset( $accessToken) ) {echo "true";} else { echo "false"; }
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

if (isset($accessToken)) {
   $fb->setDefaultAccessToken($accessToken);

  try {
  
    $requestProfile = $fb->get("/me?fields=name,email");
    $profile = $requestProfile->getGraphNode()->asArray();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
  }

  $_SESSION['name'] = $profile['name'];
  setcookie('name' , $profile['name'] , time()+ (3600 * 2) ,"/");

  header('location: https://herbal.kp-storeroom.com/index.php');
  exit;
} else {
    echo "Unauthorized access!!!";
    exit;
}
