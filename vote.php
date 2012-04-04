<?php

require_once("functions.php");

establishMySQLConnection();

// Get whether the vote should increase or decrease the rating by 1
$vote = ($_GET['vote'] == '1' ? 1 : -1);

// Get the location's ID
$loc_id = mysql_real_escape_string($_GET['loc_id']);

// Query the database to get the location
$query = mysql_query("SELECT * FROM locations WHERE loc_id='$loc_id'");

// Get the record
$row = mysql_fetch_array($query);

// If the location exists
if($row)
{
	// Calculate the new rating
	$new_rating = $row['loc_rating'] + $vote;

	// Update the database with the new rating
	$query = mysql_query("UPDATE locations SET loc_rating='$new_rating' WHERE loc_id='$loc_id'");
}

// Redirect to the index if this isn't an AJAX request
if(!$_GET['isAjax'])
	header('Location: index.php');

// Sets a unique session ID, can be updated when Facebook is added later
function setSessionID()
{
	if(session_id() == "")
		session_id(uniqid());
}
?>