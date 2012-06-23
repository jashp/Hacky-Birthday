<?php
	include_once('config.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	if (isset($_GET['item'])) {
		$itemId = $_GET['item'];
	}
	$isLoggedIn = $facebook->getUser() && isset($id) && isset($itemId);
	
	function getMessage($item){
		switch ($item['category']) {
			case 'Movie':
				return 'I noticed you liked ' . $item['name'] . ', I love that movie! We should hang out and catch a movie sometime.';
			case 'Tv show':
				return 'You like ' . $item['name'] . ', have you seen the last episode?';
			case 'Group':
				return 'We\'re both in ' . $item['name'] . ', we should grab some other people from the group and hang out sometime!';
			case 'Musician/band':
				return 'You like ' . $item['name'] . ', lets hit up their concert!';
			case 'Game':
				return 'You like ' . $item['name'] . '. We should play together sometime!';
			case 'Book':
				return 'you read ' . $item['name'] . '. It was pretty amazing, huh?';
			default:
				return 'Did you know that we both like ' . $item['name'] . '? Let\'s talk about it more soon!';
		}
	}

	if($isLoggedIn) {	
		$person = $facebook->api("/$id", 'GET');
		$item = $facebook->api("/$itemId", 'GET');
		$message = 'Happy Birthday '.$person['first_name'].'! '.getMessage($item); 
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
        </title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
        <link rel="stylesheet" href="css/local.css" />
        <style>
            /* App custom styles */
        </style>
		<script type="text/javascript">
			//Fixes facebook/jquery bug
			if (window.location.hash == '#_=_')window.location.hash = '';
		</script>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
        </script>
        <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js">
        </script>
    </head>
    <body>
        <!-- Home -->
		<div data-role="page" id="page1">
            <div data-theme="a" data-role="header">
                <h3>
                    Hacky Birthday!
                </h3>
            </div>
            <div data-role="content" style="padding: 15px">
				<?php if($isLoggedIn) { ?>
					<form method="post" action="post.php" data-ajax="false">
						<textarea name="message" id="message" placeholder=""><?php print $message; ?></textarea>
						<input type="hidden" name="id" value="<?php print $id; ?>" /> 
						<input type="submit" data-theme="a" data-icon="check" data-iconpos="left" value="Say Hacky Birthday!" />
					</form>
				<?php } else { ?>
					<a data-role="button" data-transition="fade" href="<?php print getLoginUrl(); ?>" data-icon="plus" data-iconpos="left">
						Login with Facebook
					</a>
				<?php } ?>
            </div>
        </div>
        <script>
            //App custom javascript
        </script>
    </body>
</html>