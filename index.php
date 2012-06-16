<?php
include_once('php-sdk/facebook.php');

if (isset($_REQUEST['username'])) {
  $username = $_REQUEST['username'];
}



date_default_timezone_set('UTC');
$app_url = "https://csclub.uwaterloo.ca/~y5pei"; // no slash at the end, e.g. 'https://social-cafe.herokuapp.com'
$app_id = "152916161509664";
$app_secret = "673c3da0f16c3a6fd357dda1e6cdfffc";
$app_namespace = "hbd-fbhack"; // no colon at the end, e.g. 'social-cafe'


$facebook = new Facebook( array(
                           'appId' => $app_id,
                           'secret' => $app_secret,
                         ));
  
  $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_actions,user_birthday,user_likes,friends_birthday,friends_relationships,friends_likes,publish_stream,friends_photos') );

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
    
      <p>Here's a list of everybody who has a birthday today!<br><br></p>
      
      <div class="row">
<?php 

    if(!$facebook->getUser()) {
     echo '<a href="' . $login_url . '">Login Testing</a>';
   } else {
      
			  // if($_GET["at"]) {
				// echo '<p><pre>access token: ' . $facebook->getAccessToken() . '</pre></p>';
			  // }
			  
			  // $me = $facebook->api("/me",'GET');
			  // $me['likes'] = $facebook->api("/me/likes", 'GET');
			  $me['friends'] = $facebook->api('/me/friends?fields=id,name,birthday', 'GET');

				  // get todays date
				  $today = date("m/d");
			  $birthdayppl = array();

			  foreach($me['friends']['data'] as $person){
				if(isset($person['birthday']) && substr($person['birthday'], 0, 5) == $today){
				  $birthdayppl[] = $person;
				}
			  }

        
			  foreach($birthdayppl as $b) { 
				?>
				<div class="row">
					
						<div class="span3"> 
						  <?php echo $b['name'] ?>
						</div>
						<div class="span3">
						  <div class="btn-group">
							<form method= "post" action="person.php?<?php echo 'id='.$b['id']; ?>">
							<button class="btn">Say Happy Birthday!</button>
							</form>
						  </div>
						</div>
					
				</div>
				<?php
			  }

			  
			// function getCommon($personId, $connections){
				
			  // global $facebook;
			  // $common = array();
				// $them = $facebook->api("/$personId/$connections", 'GET');
				// $me = $facebook->api("/me/$connections", 'GET');

				// foreach($them['data'] as $t) {
					// foreach($me['data'] as $m){
						// if ($t['id'] == $m['id']) {
							// $common['id'] = $t['id'];
				  // $common['name'] = $t['name'];
						// }
					// }
				// }

			// return $common;
			// }

		  // foreach($birthdayppl as $b) {
			// $groups = getCommon($b['id'], "groups");
			// $music = getCommon($b['id'], "music");
			// $books = getCommon($b['id'], "books");
			// $games = getCommon($b['id'], "games");
			// $movies = getCommon($b['id'], "movies");
			// $television = getCommon($b['id'], "television");
			// $events = getCommon($b['id'], "events");
		  // /*
		  // print_r($groups);
		  // print_r($books);
		  // print_r($games);
		  // print_r($movies);
		  // print_r($music);
		  // print_r($television);
		  // print_r($events);*/
		  // }
		  
			
			
		 
		   
		// $parameters['message'] = "hi, this is a test. please ignore it";
		// $parameters['name'] = "hello";
		// $parameters['description'] = "this is supposed to be a description";
		// $facebook->api('/100003947989938/feed', 'POST', $parameters);


		//$facebook->api('/jashPatel/feed', 'POST', $parameters);
	}
?>      
  </div>
      
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



    
  
