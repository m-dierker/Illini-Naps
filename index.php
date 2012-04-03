
<!DOCTYPE html>


<?php

// Require functions.php, which establishes a connection to the database and imports config and such
require_once('functions.php');

establishMySQLConnection();


?>

<html lang="en">
  <head>
	<meta charset="utf-8">
	<title>IlliniNaps: The best places to sleep at UIUC!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="IlliniNaps">
	<meta name="author" content="Matthew Dierker">

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
			  <!-- <li><a href="#about">About</a></li> -->
			  <!-- <li><a href="#contact">Contact</a></li> -->
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
	  		<h2>Nap Locations</h2>
	  	</div>

	  	<?php listLocations(); ?>

	  	<div id="footer" style="clear: left; margin-top: 200px">
	  		<h3>
	  			Thought of, founded, created, and programmed by <a href="http://dierkers.com">Matthew Dierker</a>
	  		</h3>
	  		
	  		(and maybe a little credit to Tory and Michaela. Maybe.)

	  		<h4>
	  			A Big Dipper Production
	  		</h4>
	  	</div>

	</div> <!-- /container -->

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

  </body>
</html>

<?php

closeMySQLConnection();

function listLocations()
{
	// Query the database
	$query = mysql_query("SELECT * FROM locations ORDER BY loc_rating DESC LIMIT 25");

	// Show each of the results
	while($location = mysql_fetch_array($query))
		listLocation($location);
}


function listLocation($location)
{
	$loc_name = $location['loc_name'];
	$loc_rating = $location['loc_rating'];
	$loc_id = $location['loc_id'];

	?>

	<div class="loc" style=" ">
		<div class="locContainer" style="float:left; clear: left; margin-bottom: 15px;">

			<span style="display: inline;">
				<a style="text-decoration: none" href="vote.php?vote=1&loc_id=<?php echo $loc_id ?>">
					<img src="img/upvote.png">
				</a>
				<a style="text-decoration: none" href="vote.php?vote=-1&loc_id=<?php echo $loc_id ?>">
					<img src="img/downvote.png">
				</a>
				(Rating: <?php echo $loc_rating ?>)
			</span>

			<span class = "locTitle" style="border-left: 2px solid gray; padding-left: 10px; display: inline; font-size: 150%; margin-left: 10px">
				<?php echo $loc_name ?>
			</span>
				
		</div>
	</div>

	<?php
}

?>
