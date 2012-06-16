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

				$name = $facebook->api("/$id", 'GET');
				$name = $name['name'];
				$element = $facebook->api("/$element_id", 'GET');
				$category = $element['category'];
				$element = $element['name'];

?>

<form method="post" action="postToFb.php?id=<?php echo $id ?>">
<textarea name="message" rows="10" cols="30">

Hacky Birthday <?php echo $name ?>!
<?php 
	switch ($category) {
		case 'Movie':
			echo 'I noticed you liked '.$element.', I love that movie! We should hang out and catch a movie sometime.';
			break;
		case 'Tv show':
			break;
	}
?> 
</textarea>
<input type="submit" value="Say Hacky Birthday!" />
</form>

<!--
Hacky Birthday [name]! 

we're both in [group], we should grab some other people from the group and hang out sometime!
you like [movie], we should hang out and watch a movie sometime!
you like [tv show], have you seen the last episode?
we're both went to [event], we should do it again! That was awesome!
you like [band/musician], lets hit up thier concert!
you like [game]. We should play together sometime!
you read [book]. It was pretty amazing, huh?



 I never knew that 
 I noticed
 I just found out
 Isn't it cool that
 


 -->

