
<!DOCTYPE html>


<?php

// Require the config file, cause we need that and stuff
require_once('config.php');

// Establish a MySQL Connection
mysql_connect(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD) or die('Cannot connnect to database!');
mysql_select_db(MYSQL_DB_NAME) or die('Unable to select the database');


?>

<html lang="en">
  <head>
	<meta charset="utf-8">
	<title>IlliniNaps: The best places to sleep at UIUC!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="IlliniNaps">
	<meta name="author" content="Mattehew Dierker">

	<!-- Le styles -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<style>
	  body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	  }
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons 
	<link rel="shortcut icon" href="../assets/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png" >  -->
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
		  <a class="brand" href="#">IlliniNaps</a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class="active"><a href="#">Home</a></li>
			  <li><a href="#about">About</a></li>
			  <li><a href="#contact">Contact</a></li>
			</ul>
		  </div><!--/.nav-collapse -->
		</div>
	  </div>
	</div>

	<div class="container">

	  <h1>Welcome to IlliniNaps!</h1>
	  <p>Inspired by the ever useful <a href="http://illinidumps.com">IlliniDumps</a>, the founder of IlliniNaps had an idea... What's one thing students do on campus more than poop? Why sleep of course! What students really need is a website to find spots to nap, and so IlliniNaps was born! </p>
	  <p></p>

	  	<div id="topLabel" style="margin-bottom: 15px">
	  		<h2>Top Sleep Spots</h2>
	  	</div>

	  	<?php listLocations(); ?>

	</div> <!-- /container -->

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/bootstrap-transition.js"></script>
	<script src="../assets/js/bootstrap-alert.js"></script>
	<script src="../assets/js/bootstrap-modal.js"></script>
	<script src="../assets/js/bootstrap-dropdown.js"></script>
	<script src="../assets/js/bootstrap-scrollspy.js"></script>
	<script src="../assets/js/bootstrap-tab.js"></script>
	<script src="../assets/js/bootstrap-tooltip.js"></script>
	<script src="../assets/js/bootstrap-popover.js"></script>
	<script src="../assets/js/bootstrap-button.js"></script>
	<script src="../assets/js/bootstrap-collapse.js"></script>
	<script src="../assets/js/bootstrap-carousel.js"></script>
	<script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>

<?php

// Close the MySQL Connection
mysql_close();

function listLocations()
{
	// Query the database
	$query = mysql_query("SELECT * FROM locations ORDER BY loc_rating, loc_id DESC LIMIT 25");

	// Show each of the results
	while($location = mysql_fetch_array($query))
		listLocation($location);
}


function listLocation($location)
{
	$loc_name = $location['loc_name'];

	?>

	<div class="napLoc" style="clear: left; font-size: 150%; margin-bottom: 50px;">
			<div class="napLocContainer" style="float:left;">

				<span style="border-right: 1px solid gray; padding-right: 10px; display: inline;">
					<img src="img/upvote.png">
					<img src="img/downvote.png">
				</span>

				<span style="display: inline; margin-left: 10px">
					<?php echo $loc_name ?>
				</span>
				
			</div>
		</div>

	<?php
}

?>
