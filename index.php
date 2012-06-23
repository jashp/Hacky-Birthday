<?php
	include_once('config.php');
	
	$isLoggedIn = $facebook->getUser();
	if($isLoggedIn) {
		$friends = $facebook->api('/me/friends?fields=id,name,birthday', 'GET');
		$today = "06/16";
		//date("m/d"); Hard coding date for testing purposes.
		$birthdayppl = array();
		foreach($friends['data'] as $person){
			if(isset($person['birthday']) && substr($person['birthday'], 0, 5) == $today){
				$birthdayppl[] = $person;
			}
		}
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
					<ul data-role="listview" data-divider-theme="a" data-inset="true">
						<li data-role="list-divider" role="heading">
							Birthdays Today
						</li>
						<?php foreach($birthdayppl as $b) { ?>
							<li data-theme="c">
								<a href="person.php?id=<?php echo $b['id']; ?>" >
									<?php echo $b['name']; ?>
								</a>
							</li>
						<?php } ?>
					</ul>
					<a data-role="button" data-transition="fade" href="<?php print $logout_url; ?>" data-icon="minus" data-iconpos="left">
						Logout of Facebook
					</a>
				<?php } else { ?>
					<a data-role="button" data-transition="fade" href="<?php print $login_url; ?>" data-icon="plus" data-iconpos="left">
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