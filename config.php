<?php
	include_once('php-sdk/facebook.php');
	date_default_timezone_set('UTC');
	$app_id = "152916161509664";
	$app_secret = "673c3da0f16c3a6fd357dda1e6cdfffc";
	$app_namespace = "hbd-fbhack";
	$facebook = new Facebook( array( 'appId' => $app_id, 'secret' => $app_secret, ));
	$login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_actions,user_birthday,user_likes,friends_birthday,friends_likes,publish_stream,friends_photos') );
	$logout_url = $facebook->getLogoutUrl(  array( 'scope' => 'publish_actions,user_birthday,user_likes,friends_birthday,friends_likes,publish_stream,friends_photos') );
?>