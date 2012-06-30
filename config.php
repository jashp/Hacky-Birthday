<?php
	include_once('php-sdk/facebook.php');
	date_default_timezone_set('America/Toronto');
	$app_id = "152916161509664";
	$app_secret = "84b3dca9821b32d86eaf192b288d78a3";
	$app_namespace = "hacky-birthday";
	$facebook = new Facebook( array( 'appId' => $app_id, 'secret' => $app_secret, ));
	function getLoginUrl(){
		global $facebook;
		return $facebook->getLoginUrl( array( 'scope' => 'publish_actions,user_likes,friends_birthday,friends_likes,publish_stream') );
	}
?>