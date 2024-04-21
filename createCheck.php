<?php
//Variables
$email = "";
$Vpassword = "";

//Checks for the proper email format
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
} else {
    $email = $_POST["email"];
}

//Checks to see if Password is atlease 8 Characters long
if(strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 Characters");
}

//Verifies the Passwords
if($_POST["password"] !== $_POST["Vpassword"]) {
    die("Passwords Do Not Match");
} 

$Vpassword = $_POST["Vpassword"];
//Encrypts the password
//Something we didn't learn in class!!
//$passhash = passwordhash($password, PASSWORD_DEFAULT);

//This file must be able to access database.php
$mysqli = require __DIR__ . "/createDatabase.php";

//Inserts a new account
$sql = "INSERT INTO user_info (user_email, user_pwd)
        VALUES (?, ?)";

//state object while calling the database connection
$state = $mysqli->stmt_init();

//prepare for execution and passing in $sql as an argument
//checks for SQL syntax
$state->prepare($sql);
//die("SQL error: " . $mysqli->error);


//passes the parameters, "ss" represents a string
$state->bind_param("ss", $email, $Vpassword);

//Executes the method and tells user it is successful or not
if ($state->execute()) {
    header("Location: createSuccess.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Email already taken");
    }
    die($mysqli->error . " " . $mysqli->errno);
}


?>