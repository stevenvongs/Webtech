<!DOCTYPE html>
<html>
  <head>
		<title>Login</title>
    <link href="style.css" type="text/css" rel="stylesheet"</link>
  </head>
	<body>

    <h1 class="titleLogin">Virtual Library</h1>
    <h2 class="welcome">Welcome to Virtual Library!</h2>

    <div class="login">
    <h2> Login </h2>
      <form action="login.php" method="post">
          <input type="text" name="username" placeholder="Username" required>
          <input type="password" name="password" placeholder="Password" required>
          <input type="submit" value="Login">
          <a href="create.html">Or create account</a>
      </form>
    </div>

    <!-- Print error if invalid login  -->
    <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
        <p class="error">Invalid username or password. Please try again.</p>
    <?php endif; ?>
   

    <?php

  

    // Create connection
    $conn = new mysqli("localhost", "root", "", "username");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    /* else {
        echo "Success!";
    } */

    // Get username and password from the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // get username and passwrod from form
        $email = $_POST['username'];
        $password = $_POST['password'];

        // Process the form data (e.g., save to database, send email, etc.)
        // For demonstration purposes, we'll just echo the submitted data

        $sql = "SELECT * FROM userInfo WHERE email ='$email' AND pwd='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User exists, authentication successful
            $authenticated = true;
            header("Location: dashboard.html");
            

        } else {
            // User does not exist or incorrect credentials
            $authenticated = false;
            header("Location: login.php?error=1");
        }

    }




    // Close database connection
    $conn->close();
    
    ?>


  </body>
</html>





<?php


