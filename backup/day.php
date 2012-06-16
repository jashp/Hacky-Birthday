<?php
/*******************SQL/PHP Stuff: Uncomment when database/forms are set up**************************
$room_id = $_POST['...'];
$date = $_POST['...']

$result = mysql_query(
"SELECT bookingTimeStart, bookingTimeEnd 
FROM bookingInfo 
WHERE (roomID = $room_id)
AND (bookingTimeStart >= $start_day)
AND (bookingTimeStart <= $end_day)");

while ($row = mysql_fetch_array($result)) {
	book($row['bookingTimeStart'], $row['bookingTimeEnd']);
}

mysql_free_result($result);
*/


/*****************Verification to be used on next page

$try_start; //test start time to be tried
$try_end; //test end time to be tried
$room_id;


$result = mysql_query(
"SELECT bookingTimeStart, bookingTimeEnd 
FROM bookingInfo 
WHERE (roomID = $room_id)
AND ($try_start <= bookingTimeEnd)
AND (bookingTimeStart <= $try_end)"
); // If the above query is not empty, there is an overlap

********************************/

?>
<style>
td.is-not-booked{
	background-color: #FFF;
}
td.is-booked{
	background-color: #FFD2D2;
}
</style>

<script TYPE="text/javascript">

var startTime = -1;
var endTime = -1;

function isset(variable) {
    return variable != -1;
}

function setTimes(id){
	if(!isset(startTime)){
		startTime = id;
		var x = 0;
		var e;
		for(x;times[x] < id;x++){
			e = document.getElementById(times[x]);
			if(booked[x] == 0){
				e.disabled = true;
				e.innerHTML = "---";
			}
		}
		for(x; booked[x] != 1;x++){
			e = document.getElementById(times[x]);
			e.innerHTML = "Select End Time";
		}
		for(x;x < times.length; x++){
			e = document.getElementById(times[x]);
			e.disabled = true;
			e.innerHTML = "---";
		}
	} else if (!isset(endTime)) {
		endTime = id;
		var x = 0;
		for(x in times){
			e = document.getElementById(times[x]);
			if((times[x] >= startTime) && (times[x] <= endTime)){
				e.disabled = true;
				e.innerHTML = "Selected";
			} else {
				e.disabled = true;
				e.innerHTML = "---";
			}
		}
	}
}

function resetButtons(){
	startTime = -1;
	endTime = -1;
	for(x in times){
		e = document.getElementById(times[x]);
		if(booked[x] == 1){
			e.disabled = true;
			e.innerHTML = "Booked";
		} else {
			e.disabled = false;
			e.innerHTML = "Select Start Time";
		}
	}

}

</script>

<?php
date_default_timezone_set('America/Toronto');

$hour = 60*60;
$day = 24*$hour;



$date = strtotime("March 30 2012");
$start_day = $date + 6*$hour;
$end_day = $date+1*$day+2*$hour;


for($j = $start_day; $j < $end_day; $j+=$hour/2){ // 6am of today -> 2am of next day
	$cal[$j] = 0;
}

function book($start, $end){
	$hour = 60*60;
	global $cal;
	if($start <= $end){
		for($i = $start; $i <= $end; $i=$i+$hour/2){ 
			$cal[$i] = true;
		}
	}
}

book($start_day,time());

book(strtotime("March 30 2012 2pm"), strtotime("March 30 2012 2:30pm"));


book(strtotime("March 30 2012 6pm"), strtotime("March 30 2012 9pm"));

print '<script type="text/javascript">';
print 'var times = new Array('.join(array_keys($cal),',').');';
print 'var booked = new Array('.join($cal,',').');';
print '</script>';

print "<a href='#'>Previous</a> | ".date("l, F j, Y", $date)." | <a href='#'>Next</a><br />";
print "<button id='reset-buttom' onclick='resetButtons()'>Reset</button>";
print "<button id='continue-buttom' onclick='continue()'>Continue</button>";

print '<table id="day-booking">';

	foreach($cal as $key => $value){
		print '<tr>';		
			if($cal[$key] == false){
				$class = 'is-not-booked';
				$inside = "<button id='$key' onclick='setTimes(this.id)'>Select Start Time</button>";
			} else {
				$class = 'is-not-booked';
				$inside = "<button  id='$key' disabled='disabled'>Booked</button>";
			}
			print '<td>'.date('g:iA', $key).'</td>';
			print "<td class='$class'>$inside</td>";
		print '<tr>';	
	}
print '</table>';




?>