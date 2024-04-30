<?php
//Variables
$host ="localhost";
$dbname = "library_database";
$username = "root";
$password = "";

//Database login
$mysqli = new mysqli($host, $username, $password, $dbname);

//Checks to see if there was an issue connecting to the database
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_errno);
}

//return back to createCheck.php
return $mysqli;
?>