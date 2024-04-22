<!DOCTYPE html>
<html>
  <head>
    <!-- 1. This is my title. -->
		<title>Create</title>
    <link href="style.css" type="text/css" rel="stylesheet"</link>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
	<body>
    <h1 class="titleLogin" style="margin: auto;">Virtual Library</h1>
    <h2 class="welcome">Welcome to Virtual Library!</h2>

    <div class="login">
      <h2>Create An Account</h2>
      <form action="create.php" method="post">
          <input type="text" name="username" placeholder="Username / Email" required>
          <input type="password" name="password" placeholder="Password" required>
          <input type="password" name="Vpassword" placeholder="Verify Password" required>
          <input type="submit" value="Login">
          <a href="login.php">Have an Account?!</a>
    </div>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "library_database"; // Database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $username = $_POST['username'];

    // Check if username already exists
    $sql = "SELECT * FROM user_info WHERE user_email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Username already exists, display error message
        echo "Username already exists. Please choose a different one.";
    } else {
        // Username is unique, proceed with signup
        $password = $_POST['password']; 

        // Insert new user into the database
        $insert_sql = "INSERT INTO user_info (user_email, user_pwd) VALUES ('$username', '$password')";
        if ($conn->query($insert_sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>
