 <?php

 include_once('php-sdk/facebook.php');
			date_default_timezone_set('UTC');
			if (isset($_REQUEST['id'])) {
			  $b['id'] = $_REQUEST['id'];
			  $id = $_REQUEST['id'];
			}

			if (isset($_REQUEST['element_id'])) {
			  $element_id = $_REQUEST['element_id'];
			}

			$app_url = "https://csclub.uwaterloo.ca/~y5pei"; // no slash at the end, e.g. 'https://social-cafe.herokuapp.com'
			$app_id = "152916161509664";
			$app_secret = "673c3da0f16c3a6fd357dda1e6cdfffc";
			$app_namespace = "hbd-fbhack"; // no colon at the end, e.g. 'social-cafe'


			$facebook = new Facebook( array(
									   'appId' => $app_id,
									   'secret' => $app_secret,
									 ));
			  
			  $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_actions,user_birthday,user_likes,friends_birthday,friends_relationships,friends_likes,publish_stream') );


 $id = $_REQUEST['id'];
 $msg = $_REQUEST['message'];

 $parameters['message'] = $msg;
		$parameters['name'] = "Hacky Birthday";
		$parameters['description'] = "It's your special day.";
		$facebook->api('/'.$id.'/feed', 'POST', $parameters);


?>
