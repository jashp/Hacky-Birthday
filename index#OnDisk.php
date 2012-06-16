<?php 

if (isset($_REQUEST['username'])) {
  $username = $_REQUEST['username'];
}


include_once('php-sdk/facebook.php');

date_default_timezone_set('UTC');
$app_url = "https://csclub.uwaterloo.ca/~y5pei"; // no slash at the end, e.g. 'https://social-cafe.herokuapp.com'
$app_id = "152916161509664";
$app_secret = "673c3da0f16c3a6fd357dda1e6cdfffc";
$app_namespace = "hbd-fbhack"; // no colon at the end, e.g. 'social-cafe'


$facebook = new Facebook( array(
                           'appId' => $app_id,
                           'secret' => $app_secret,
                         ));
  
  $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_actions,user_birthday,user_likes,friends_birthday,friends_relationships,friends_likes') );

    if(!$facebook->getUser()) {
     echo '<a href="' . $login_url . '">Login Testing</a>';
   } else {
      
      if($_GET["at"]) {
        echo '<p><pre>access token: ' . $facebook->getAccessToken() . '</pre></p>';
      }
      
      $me = $facebook->api("/me",'GET');
      $me['likes'] = $facebook->api("/me/likes", 'GET');
      $me['friends'] = $facebook->api('/me/friends?fields=id,name,birthday', 'GET');

		  // get todays date
		  $today = date("m/d");
      $birthdyppl = array();
		
      foreach($me['friends']['data'] as $person){
        if(isset($person['birthday']) && substr($person['birthday'], 0, 5) == $today){
          $birthdayppl[] = $person;
        }
      }

      print_r($birthdayppl);


   }

?>

