<?php

// Require the config file
require_once('config.php');

function establishMySQLConnection()
{
	// Establish a MySQL Connection
	mysql_connect(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD) or die('Cannot connnect to database!');
	mysql_select_db(MYSQL_DB_NAME) or die('Unable to select the database');
}

function closeMySQLConnection()
{
	mysql_close();
}
?>