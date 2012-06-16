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

<head>
    <meta charset="utf-8">
    <title>Hacky Birthday</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/birthday_styles.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  </head>
    <body>
   <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Hacky Birthday!</a>
          <div class="nav-collapse">
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  <div class="container">
    	<div class="modal hide" id="myModal">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal">×</button>
	    <h3>Modal header</h3>
	  </div>
	  <div class="modal-body">
	    <p>One fine body…</p>
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>
	    <a href="#" class="btn btn-primary">Save changes</a>
	  </div>
	</div>

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

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>


</html>
