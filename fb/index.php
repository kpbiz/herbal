<?php

session_start();

require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '220576288348676',
  'app_secret' => '9c1ed583370c2633a400b052e3c9ef06',
  'default_graph_version' => 'v2.4',
  ]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
	
if( $_POST['Logout'] == true ){
		unset($_SESSION['facebook_access_token']);
}

try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();

  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }

if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;

	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}

	// redirect the user back to the same page if it has "code" GET variable
	if (isset($_GET['code'])) {
		header('Location: ./');
	}

	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=id,name,first_name,last_name,email');
		//$usernode = $profile_request->getGraphNode();
		$profile = $profile_request->getGraphNode()->asArray();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// redirecting user back to app login page
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	// printing $profile array on the screen which holds the basic info about user
	//print_r($profile);
	echo "Logged in as " . $profile['name'] ."<br>";
	
	echo '
	<form method="post" action="" >
	<input type="hidden" name="Logout" value=true />
	<input type="submit" value="Logout with Facebook!!!" /> 
	</form>	
	';

	echo "Name : ".$profile['name']."<br>";
	echo "User ID : ".$profile['id']."<br>";
	echo "Email : ".$profile['email']."<br><br>";

	$image = "https://graph.facebook.com/" . $profile['id'] ."/picture?width=200" ;
	echo "picture<br>";
	echo "<img src='".$image."'  >  <br><br> ";

  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
	// replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
	
	$loginUrl = $helper->getLoginUrl('https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'], $permissions);
	echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	
}

