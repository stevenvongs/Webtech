<?php
//Variables
$bookAuthor = $_POST["bookAuthor"];
$bookTitle = $_POST["bookTitle"];

//This file must be able to access database.php
$mysqli = require __DIR__ . "/requestDatabase.php";

//Inserts a new account
$sql = "INSERT INTO requests (book_author, book_title)
        VALUES (?, ?)";

//state object while calling the database connection
$state = $mysqli->stmt_init();

//prepare for execution and passing in $sql as an argument
//checks for SQL syntax
$state = $mysqli->stmt_init();
if (!$state->prepare($sql)) {
    die("SQL preparation failed: " . $mysqli->error);
}

//passes the parameters, "ss" represents a string
$state->bind_param("ss", $bookAuthor, $bookTitle);

//Executes the method and tells user it is successful or not
if ($state->execute()) {
    header("Location: requestSuccess.html");
    exit;
} else {
    exit;
}
?>