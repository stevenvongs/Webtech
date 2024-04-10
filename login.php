<!DOCTYPE html>
<html>
    <title>
        Login Page
    </title>
    <head>

    </head>
    <body>
    <?php
// define variables and set to empty values
$emailErr = $passwordErr = "";
$email = $password = "";
	
	if ((empty($_POST["email"]))) {
		$emailErr = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		}
	}

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {

    }

//test the data from each input to make sure it is valid
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	E-mail: <input type="text" name="email" value="<?php echo $email;?>">
	<span class="error">* <?php echo $emailErr;?></span>
	<br><br>
    Password: <input type="text" name="password" value="<?php echo $password;?>">
	<span class="error">* <?php echo $passwordErr;?></span>
	<br><br>
	<input type="submit" name="submit" value="Submit">
    
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $email;
echo "<br>";
?>
    </body>
</html>