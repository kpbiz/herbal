<?php  session_start();   ?>
<html>
<head>
	<meta charset="utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<title>Home</title>


</head>

<body>
	<script type="text/javascript" src="./fb/fb.js" > </script>

	<div id="content" style="width:78%; float:left; " >
		<h2>Welcome <?php  if(isset($_SESSION['name'])) {  echo $_SESSION['name'];   } ?></h2>
	</div>

	<div id="sidebar" style="width:20%; float:right; " > 
		
		<span  >
			<div id="fb-login" class="fb-login-button" data-scope="public_profile,email" onlogin="checkLoginState();" onclick="login()"  ></div>
			<!--div id="fb-login" class="fb-login-button" data-scope="public_profile,email" onlogin="checkLoginState();"  ></div-->
		</span>		 
	</div>


	<div
	  class="fb-like"
	  data-share="true"
	  data-width="450"
	  data-show-faces="true" >
	</div>

	<div id="status" ></div>
	<button onclick="getInfo()">Get info with picture</button>
	<button onclick="login()" id="login" >Login</button>

	<!--fb:login-button ></fb:login-button>
	<div id="fb-root"></div-->

	<script type="text/javascript"   > 

	// login with facebook with extra permissions
    function login() {
      FB.login(function(response) {
        if (response.status === 'connected') {
            document.getElementById('status').innerHTML = 'We are connected.';            
            document.getElementById('login').style.visibility = 'hidden';
            document.getElementById('fb-login').style.display = 'none';
          } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = 'We are not logged in.'
            document.getElementById('fb-login').style.display = 'none';

          } else {
            document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
          }
      }, {scope: 'email'});
    }
    
    // getting basic user info
    function getInfo() {
      FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,picture.width(150).height(150)'}, function(response) {
        document.getElementById('status').innerHTML = "<img src='" + response.picture.data.url + "'>";
      });
    }

	</script>

</body>


</html>