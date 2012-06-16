<?php
include_once('php-sdk/facebook.php');
			date_default_timezone_set('UTC');
			if (isset($_REQUEST['id'])) {
			  $b['id'] = $_REQUEST['id'];
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


<?php

			function getCommon($personId, $connections){
				
			  global $facebook;
			  $common = array();
				$them = $facebook->api("/$personId/$connections", 'GET');
				$me = $facebook->api("/me/$connections", 'GET');

				foreach($them['data'] as $t) {
					foreach($me['data'] as $m){
						if ($t['id'] == $m['id']) {
							$tmp = array();
							$tmp['id'] = $t['id'];
				  			$tmp['name'] = $t['name'];
				  			$common[] = $tmp;
						}
					}
				}

			return $common;
			}
			$groups = getCommon($b['id'], "groups");
			$music = getCommon($b['id'], "music");
			$books = getCommon($b['id'], "books");
			$games = getCommon($b['id'], "games");
			$movies = getCommon($b['id'], "movies");
			$television = getCommon($b['id'], "television");
			$events = getCommon($b['id'], "events");
	
	if (!empty($movies) || !empty($music) || !empty($groups) || !empty($books) || !empty($games) || !empty($television) || !empty($events))
		echo '<p> This person has something in common with you! Wish them a happy birthday!!</p>';
	else 
		echo '<p> Darn! You have nothing in common (on Facebook)...say something anyway?</p>'; 

	if (!empty($movies)) {
		echo '<h1>Movies</h1>';
		foreach ($movies as $g) { 
			echo '<div class="row">';
			echo '<div class="span4">';
			echo $g['name'];
			echo '</div>';
			echo '<div class="span8">';
			echo '<div class="btn-group">';
            echo '<form method="post" action="message.php?id='.$b['id'].'&element_id='.$g['id'].'">';
            echo '<button class="btn">Do it!</button>';
            echo '</form>';
          echo'</div>';
          echo'</div>';
echo'</div>';
		}	
	}

	if (!empty($music)) {
		echo '<h1>Music</h1>';
		foreach ($music as $g) { 
			echo '<div class="row">';
			echo '<div class="span4">';
			echo $g['name'];
			echo '</div>';
			echo '<div class="span8">';
			echo '<div class="btn-group">';
            // <form method= "post" action="person.php? echo 'id='.$b['id'];">
            echo '<button class="btn">Do it!</button>';
            //</form>
          echo'</div>';
          echo'</div>';
echo'</div>';

		}	
	}

	if (!empty($groups)) {
		echo '<h1>Groups</h1>';
		foreach ($groups as $g) { 
			echo '<div class="row">';
			echo '<div class="span4">';
			echo $g['name'];
			echo '</div>';
			echo '<div class="span8">';
			echo '<div class="btn-group">';
            // <form method= "post" action="person.php? echo 'id='.$b['id'];">
            echo '<button class="btn">Do it!</button>';
            //</form>
          echo'</div>';
          echo'</div>';
echo'</div>';

		}	
	}

	if (!empty($books)) {
		echo '<h1>Books</h1>';
		foreach ($books as $g) { 
			echo '<div class="row">';
			echo '<div class="span4">';
			echo $g['name'];
			echo '</div>';
			echo '<div class="span8">';
			echo '<div class="btn-group">';
            // <form method= "post" action="person.php? echo 'id='.$b['id'];">
            echo '<button class="btn">Do it!</button>';
            //</form>
          echo'</div>';
          echo'</div>';
echo'</div>';

		}	
	}

	if (!empty($games)) {
		echo '<h1>Games</h1>';
		foreach ($games as $g) { 
			echo '<div class="row">';
			echo '<div class="span4">';
			echo $g['name'];
			echo '</div>';
			echo '<div class="span8">';
			echo '<div class="btn-group">';
            // <form method= "post" action="person.php? echo 'id='.$b['id'];">
            echo '<button class="btn">Do it!</button>';
            //</form>
          echo'</div>';
          echo'</div>';
echo'</div>';

		}	
	}

	if (!empty($television)) {
		echo '<h1>TV</h1>';
		foreach ($television as $g) { 
		echo '<div class="row">';
			echo '<div class="span4">';
			echo $g['name'];
			echo '</div>';
			echo '<div class="span8">';
			echo '<div class="btn-group">';
            // <form method= "post" action="person.php? echo 'id='.$b['id'];">
            echo '<button class="btn">Do it!</button>';
            //</form>
          echo'</div>';
          echo'</div>';
echo'</div>';

		}	
	}

	if (!empty($events)) {
		echo '<h1>Events</h1>';
		foreach ($events as $g) { 
	echo '<div class="row">';
			echo '<div class="span4">';
			echo $g['name'];
			echo '</div>';
			echo '<div class="span8">';
			echo '<div class="btn-group">';
            // <form method= "post" action="person.php? echo 'id='.$b['id'];">
            echo '<button class="btn">Do it!</button>';
            //</form>
          echo'</div>';
          echo'</div>';
echo'</div>';

		}	
	}
?>



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

