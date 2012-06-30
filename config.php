<?php
	include_once('php-sdk/facebook.php');
	date_default_timezone_set('America/Toronto');
	$app_id = "000000000000000";
	$app_secret = "00000000000000000000000000000000";
	$app_namespace = "APP-NAME-SPACE";
	$facebook = new Facebook( array( 'appId' => $app_id, 'secret' => $app_secret, ));
	function getLoginUrl(){
		global $facebook;
		return $facebook->getLoginUrl( array( 'scope' => 'publish_actions,user_likes,friends_birthday,friends_likes,publish_stream') );
	}
?>