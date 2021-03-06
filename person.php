<?php
	include_once('config.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} 

	$likeMap;
	function sortByCategory($likes){
		global $likeMap;
		$r = array();
		foreach($likes as $like){
			if(isset($r[$like['category']])){
				$r[$like['category']][] = $like['id'];
			} else {
				$r[$like['category']] = array($like['id']);
			}
			$likeMap[$like['id']] = $like['name'];
		}
		return $r;
	}
		
	$isLoggedIn = $facebook->getUser() && isset($id);
	if ($isLoggedIn) {
        $me = $facebook->api("/me/likes", 'GET');
        $me = sortByCategory($me['data']);
        $them = $facebook->api("/$id/likes", 'GET');
        $them = sortByCategory($them['data']);
        $out = array();
        
        foreach ($me as $key => $meCategory) {
            if(isset($them[$key])){
                $themCategory = $them[$key];
                $out[$key] = array_intersect($meCategory, $themCategory);
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
            #interest-list-them {
                display:none;
            }
            #interest-list-me {
                display:none;
            }
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
					<div id="#display-likes-button" data-role="fieldcontain">
						<fieldset data-role="controlgroup" data-type="horizontal">
							<legend>
								Whose likes do you want to show?
							</legend>
							<input name="radiobuttons1" id="radio2" value="radio2" type="radio" onclick="onThemClicked()" />
							<label for="radio2">
								Their's
							</label>
							<input name="radiobuttons1" id="radio1" value="radio1" type="radio" onclick="onCommonClicked()" checked />
							<label for="radio1">
								Common
							</label>
							<input name="radiobuttons1" id="radio3" value="radio3" type="radio" onclick="onMeClicked()" />
							<label for="radio3">
								Your's
							</label>
						</fieldset>
					</div>
					<ul id="interest-list-common" data-role="listview" data-divider-theme="a" data-inset="true">
						<?php 
						foreach ($out as $interestName => $interest) {
							if (!empty($interest)) {
						?>
								<li data-role="list-divider" role="heading">
									<?php print ucfirst($interestName); ?>
								</li>
								<?php foreach ($interest as $item) { ?>
									<li data-theme="c">
										<a href="<?php print "message.php?id=".$id."&item=".$item; ?>" data-transition="slide">
											<?php print $likeMap[$item]; ?>
										</a>
									</li>
								<?php }
							}
						} ?>
					</ul>
                    <ul id="interest-list-them" data-role="listview" data-divider-theme="a" data-inset="true">
						<?php 
						foreach ($them as $interestName => $interest) {
							if (!empty($interest)) {
						?>
								<li data-role="list-divider" role="heading">
									<?php print ucfirst($interestName); ?>
								</li>
								<?php foreach ($interest as $item) { ?>
									<li data-theme="c">
										<a href="<?php print "message.php?id=".$id."&item=".$item; ?>" data-transition="slide">
											<?php print $likeMap[$item]; ?>
										</a>
									</li>
								<?php }
							}
						} ?>
					</ul>
                    <ul id="interest-list-me" data-role="listview" data-divider-theme="a" data-inset="true">
						<?php 
						foreach ($me as $interestName => $interest) {
							if (!empty($interest)) {
						?>
								<li data-role="list-divider" role="heading">
									<?php print ucfirst($interestName); ?>
								</li>
								<?php foreach ($interest as $item) { ?>
									<li data-theme="c">
										<a href="<?php print "message.php?id=".$id."&item=".$item; ?>" data-transition="slide">
											<?php print $likeMap[$item]; ?>
										</a>
									</li>
								<?php }
							}
						} ?>
					</ul>
				</div>
				<?php } else { ?>
					<a data-role="button" data-transition="fade" href="<?php print getLoginUrl(); ?>" data-icon="plus" data-iconpos="left">
						Login with Facebook
					</a>
				<?php } ?>
            </div>
        </div>
        <script>
        
            function onThemClicked() {
                $('#interest-list-me').hide();
                $('#interest-list-common').hide();
                $('#interest-list-them').show();
            }
            function onMeClicked() {
                $('#interest-list-them').hide();
                $('#interest-list-common').hide();
                $('#interest-list-me').show();
            }
            function onCommonClicked() {
                $('#interest-list-me').hide();
                $('#interest-list-them').hide();
                $('#interest-list-common').show();
            }
        </script>
    </body>
</html>
