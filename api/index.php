<?

/*
$fb = new Facebook\Facebook([
  'app_id' => '220576288348676',
  'app_secret' => '9c1ed583370c2633a400b052e3c9ef06',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getCanvasHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  echo 'No OAuth data could be obtained from the signed request. User has not authorized your app yet.';
  exit;
}

// Logged in
echo '<h3>Signed Request</h3>';
var_dump($helper->getSignedRequest());

echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());
*/

?>
<html>
<head>
	<title>
		kp-storeroom.com
	</title>

	<style>
	* { font-family: verdana; font-size: 10pt; COLOR: gray; }
	b { font-weight: bold; }
	table { height: 50%; border: 1px solid gray;}
	td { text-align: center; padding: 25;}

	</style>
</head>
<body>
<center>
<br><br><br><br>
	<table>
	<tr><td>Welcome to the home of <b>kp-storeroom.com wait edit รอการแก้ไข</b></td></tr>
	<tr><td>To change this page, upload your website into the public_html directory</td></tr>
	<tr><td><img src="logo.png"></td></tr>
	<tr><td style="font-size: 8pt">Date Created: Thu Dec 29 17:42:42 2016</td></tr>
	</table>
<br><br>

</center>

<!--script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '220576288348676',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/th_TH/sdk/debug.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

// Only works after `FB.init` is called
function myFacebookLogin() {
  FB.login(function(){
  // Note: The call will only work if you accept the permission request
  FB.api('/me/feed', 'post', {message: 'Hello, world!'});
}, {scope: 'publish_actions'});
}
</script>
<button onclick="myFacebookLogin()">Login with Facebook</button>

<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div-->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.8&appId=220591388347166";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

1111 <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>


</body>

</html>
