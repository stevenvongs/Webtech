<?php

$fullName = $email = $password = $passhash "";
$fullName = $_POST["fullName"];

//Checks for the proper email format
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
} else {
    $email = $_POST["email"]
}

//Checks to see if Password is atlease 8 Characters long
if(strlen($_POST["password"]) < 8) {
    die("Password must be atleast 8 Characters");
}

//Verifies the Password
if($_POST["password"] !== $_POST["Vpassword"]) {
    die("Passwords Do Not Match");
} else {
    $password = $_POST["password"];
}

//Encrypts the password
//Something we didn't learn in class!!
$passhash = password_hash($password, PASSWORD_DEFAULT);

?>