<?php

session_start();

//define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/src/Facebook/');
require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '220576288348676',
  'app_secret' => '9c1ed583370c2633a400b052e3c9ef06',
  'default_graph_version' => 'v2.4',
  ]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional

	$loginUrl = $helper->getLoginUrl('https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'], $permissions);
	echo "loginUrl ".$loginUrl ;
	echo '<br><a href="' . $loginUrl . '">Log in with Facebook!</a>';


?>
