<!DOCTYPE html>
<html>
    <head>
	<title>UCD Flight Tracker</title>

	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="bootstrap.css"/>
	<script src="jquery-2.1.3.js"/></script>
	<script src="bootstrap.js"></script>
	<link rel="stylesheet" href="styles.css"/>
	<link rel="stylesheet" href="flipclock.css"/>
	<script src="flipclock.min.js"></script>
	<script src="flight_tracker.js"></script>
	<?php
	    require_once('flight_tracker.php');

	    $post = $_POST;
	    $email = $post['email'];
	    $userSource = $post['origin'];
	    $userDestination = $post['destination'];
	    $userID = createNewSearch($post);
	?>

	<script>
	    window.onload = function() {
		var xmlhttp;
		if (window.XMLHttpRequest)
		{ xmlhttp = new XMLHttpRequest(); }
		else
		{ xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
		xmlhttp.onreadystatechange = function() {
		    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		    { 
			document.getElementById("test").innerHTML = xmlhttp.responseText;
		    }
		}
		var str = "id=<?php echo $userID; ?>&email=<?php echo $email; ?>";
		str += "&source=<?php echo $userSource; ?>&destination=<?php echo $userDestination; ?>";
		xmlhttp.open("GET","background_search.php?" + str,true);
		xmlhttp.send();
	    }; // sendMessage()
	</script>
    </head>

    <body>
	<nav class="navbar navbar-inverse" style="visibility: hidden;"></nav>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	    <div id="main" class="container-fluid">
		<div class="navbar-header">
		    <button type="button" class="navbar-toggle" 
			data-toggle="collapse" data-target="#mynavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="index.php">Flight Tracker</a>
		</div>

		<div class="collapse navbar-collapse" id="mynavbar">
		    <ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Find a Flight</a></li>
			<?php
			    // if session is set
				//echo "<li><a href=\"results.php\">My Search</a></li>";
			    // else
				echo "<li><a href=\"signin.php\">My Search</a></li>";
			?>
			<li><a href="about.php">About</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
			<li><a href="contact.php">Contact</a></li>
		    </ul>
		</div>
	    </div>
	</nav>

	
	<div class="containter">
	    <div class="jumbotron countdown">
		<h1>Search Time Remaining</h1>
		<div class="clock"></div>
		<p>We have begun your background search and will notify you once
		   we have either found your results or reached the end of your 
		   search time. We have provided a summary of your search 
		   parameters below. Please stay near your phone or computer 
		   since we will contact you via email. Be sure to have your 
		   Request ID and Email ready when you return for the updated 
		   search results.
		</p>
		<h3>Summary of Itinerary</h3>

		<?php
		    // start countdown clock
		    $remaining = getRemainingTime($userID,$post['email']);
		    echo "<script>CountdownClock({$remaining})</script>";


		    echo <<<_SECTION1
		    <div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-3">
			    <ul>
				<li>Request ID: {$userID}</li>
				<li>Email: {$post['email']}</li>
				<li>Search Time: {$post['search_time']} hours</li>
				<li>Origin: {$post['origin']}</li>
				<li>Destination: {$post['destination']}</li>
			    </ul>
			</div>

			<div class="col-md-3">
			    <ul>
				<li>Date of Departure: {$post['depart_date']}</li>
				<li>Date of Return: {$post['return_date']}</li>
_SECTION1;

				$type = array(1 => 'Adults', 2 => 'Children', 3 => 'Seniors', 4 => 'Seat Infants', 5 => 'Lap Infants');
				foreach ($type as $t)
				    if (isset($post[$t]) && $post[$t] > 0)
					echo "<li>Number of {$t}: {$post[$t]}</li>";

				$i = 1;
				foreach ($post['airline'] as $airline) {
				    if (count($post['airline']) > 1)
					echo "<li>Airline Preference {$i}: {$airline}</li>";
				    else
					echo "<li>Airline Preference: {$airline}</li>";
				    $i++;
				} // foreach airline

				echo <<<_SECTION2
				<li>Maximum Price Limit: \${$post['price']}</li>
			    </ul>
			</div>
			<div class="col-md-3"></div>
		    </div>
		    <!--
		    <div id="test" class="row" style="margin-left: 200px;">stuff</div>
		    -->
_SECTION2;
		?>
	    </div>
	</div>
</html>
