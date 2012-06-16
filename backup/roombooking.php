<?php
	session_start();
	$_SESSION['proceed'] = $_POST['proceed'];
	$_SESSION['proceed'] = 1;



?>
		<link type="text/css" href="jqueryui/css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="jqueryui/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="jqueryui/js/jquery-ui-1.8.18.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){

				// Datepicker

				$('#datepicker').datepicker({
					inline: true,
					minDate: "+1D",
					maxDate: "+4M"
				});
				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
			});
		</script>

<html>

<body>

<p> Insert calendar here </p>

<form action='day.php' method='post'>
<p>Date: <input type="text" id="datepicker" name="date"></p>
<p>Contact Email: <input name="email" id="email" size="48">
<p>Organization: <input name="organization" id="organization" size="48">

<p>Room: 
<?php  

	
    include("pass.php");
     
    $connection = mysql_connect($sqlHost, $sqlUser, $sqlPass);
    mysql_select_db($sqlDB);

    $array = mysql_fetch_array(mysql_query('SELECT roomName, roomID FROM roomInfo'));

    print_r($array);


?>

<input name="roomID" value="1" type=radio> MC3001 (Comfy Lounge)
<input name="roomID" value="2" type=radio> MC3002 (C&D Lounge)
</p>

<input type='submit'> 

</form>


</body>

</html>
