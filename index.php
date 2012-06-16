<?php 

if (isset($_REQUEST['username'])) {
  $username = $_REQUEST['username'];
}


include_once('php-sdk/facebook.php');


$app_url = "https://csclub.uwaterloo.ca/~y5pei"; // no slash at the end, e.g. 'https://social-cafe.herokuapp.com'
$app_id = "461083867237962";
$app_secret = "743e4313676ae4c393708e31ca6d6613";
$app_namespace = "testmeet-app"; // no colon at the end, e.g. 'social-cafe'


$facebook = new Facebook( array(
                           'appId' => $app_id,
                           'secret' => $app_secret,
                         ));
  
  $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_actions,user_birthday,user_likes,friends_birthday,friends_relationships') );

    if(!$facebook->getUser()) {
     echo '<a href="' . $login_url . '">Login Testing</a>';
   } else {
      
      if($_GET["at"]) {
        echo '<p><pre>access token: ' . $facebook->getAccessToken() . '</pre></p>';
      }
      
      $me = $facebook->api("/me",'GET');
      $me['likes'] = $facebook->api("/me/likes", 'GET');
      $me['friends'] = $facebook->api('/me/friends?fields=id,name,birthday', 'GET');

      print_r($me);
      
   }
?>

