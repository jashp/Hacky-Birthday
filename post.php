<?php
	include_once('config.php');
	
	if (isset($_REQUEST['id']) && isset($_REQUEST['message'])) {
		$id = $_REQUEST['id'];
		$message = $_REQUEST['message'];
		
		$parameters['message'] = $message;
		$parameters['name'] = "Hacky Birthday";
		$parameters['description'] = "Posted by Hacky Birthday!";
		$facebook->api('/'.$id.'/feed', 'POST', $parameters);
		$out = "Your message was sucessfully posted!";
	} else {
		$out = "There was an error posting your message.";
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
				<?php print $out; ?>
				<a data-role="button" data-transition="fade" href="index.php" data-icon="home" data-iconpos="left">
						Return Home
				</a>
            </div>
        </div>
        <script>
            //App custom javascript
        </script>
    </body>
</html>
