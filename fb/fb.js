function statusChangeCallback(response) {

	console.log('statusChangeCallback');
    console.log(response);

    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
    	// Logged into your app and Facebook.
      window.location.replace('./fb/login-callback.php');
      console.log(' connected ');

    } else if (response.status === 'not_authorized') {
      	// The person is logged into Facebook, but not your app.
        //document.getElementById('status').innerHTML = 'We are not logged in.'
        //document.getElementById('fb-login').style.display = 'none';
    } else {
      	// The person is not logged into Facebook, so we're not sure if
      	// they are logged into this app or not.
        //document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
    }


}

function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
      console.log(' checkLoginState() ');
    });
}

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '220576288348676',
      cookie     : true,  // enable cookies to allow the server to access 
      session    : true,  // the session
      status     : true,  // check login status
      cookie     : true,  // enable cookies                           
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8',

    });
    
    //FB.AppEvents.logPageView();

    FB.getLoginStatus(function(response) {
      if (response.status === 'connected') {
        // Logged into your app and Facebook.
          document.getElementById('status').innerHTML = 'We are connected.';            
          document.getElementById('login').style.visibility = 'hidden';
          document.getElementById('fb-login').style.display = 'none';
      } else if (response.status === 'not_authorized') {
          // The person is logged into Facebook, but not your app.
          document.getElementById('status').innerHTML = 'We are not logged in.'
          document.getElementById('fb-login').style.display = 'none';
      } else {
          // The person is not logged into Facebook, so we're not sure if
          // they are logged into this app or not.
          document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
      }
    });

    // Put additional init code here

    FB.Event.subscribe('auth.sessionChange', function(response) {
      if (response.session) {
        // A user has logged in, and a new cookie has been saved
        console.log('logged in session '+response.session);
      } else {
        // The user has logged out, and the cookie has been cleared
        console.log('logged out session ' );
      }
    });

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); 
     js.id = id;
     js.src = "//connect.facebook.net/th_TH/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  /*
  // login with facebook with extra permissions
    function login() {
      FB.login(function(response) {
        if (response.status === 'connected') {
            document.getElementById('status').innerHTML = 'We are connected.';            
            document.getElementById('login').style.visibility = 'hidden';
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
    }*/
