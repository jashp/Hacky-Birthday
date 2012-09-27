<?php
	include_once('php-sdk/facebook.php');
	date_default_timezone_set('America/Toronto');
	$app_id = "";
	$app_secret = "";
	$app_namespace = "";
	$facebook = new Facebook( array( 'appId' => $app_id, 'secret' => $app_secret, ));
	function getLoginUrl(){
		global $facebook;
		return $facebook->getLoginUrl( array( 'scope' => 'publish_actions,user_likes,friends_birthday,friends_likes,publish_stream') );
	}
?>