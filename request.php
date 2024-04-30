<?php
    include 'checkLogged.php';
?>

<!DOCTYPE html>
<html>
  <head>
		<title>Dashboard</title>
    <link href="style.css" type="text/css" rel="stylesheet">
  </head>
	<body>
    <h1 class="title">Virtual Library</h1>

    <ul class="navBar">
        <li class="navBarList"><a class="navBarElement" href="dashboard.php" target="_self">Dashboard</a></li>
  	    <li class="navBarList"><a class="navBarElement" href="library.php" target="_self">Library</a></li>
        <li class="navBarList"><a class="navBarElement" href="request.php" target="_self">Request</a></li>
        <li class="navBarListLog"><a class="navBarElement" href="logout.php" target="_self">Log Out</a></li>
	  </ul>

    <div class="login" style="margin-top: 30px;">
      <h2>Create A Book Request</h2>
      <form action="request.php" method="post">
          <input type="text" name="bookAuthor" placeholder="Book Author" required>
          <input type="text" name="bookTitle" placeholder="Book Title" required>
          <input type="submit" value="Request a Book!">
          <a href="library.php">Check out Our Library</a>
      </form>
    </div>


<?php
//Connect to database
//Variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$host ="localhost";
$dbname = "library_database";
$username = "root";
$password = "";
$bookAuthor = $_POST["bookAuthor"];
$bookTitle = $_POST["bookTitle"];
//Database login
$mysqli = new mysqli($host, $username, $password, $dbname);

//Checks to see if there was an issue connecting to the database
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_errno);
}

//Inserts a new request
$sql = "INSERT INTO requests (book_author, book_title)
        VALUES (?, ?)";

$state = $mysqli->stmt_init();
if ($state->prepare($sql)) {
// Bind the parameters
$state->bind_param("ss", $bookAuthor, $bookTitle);

// Execute the statement
if ($state->execute()) {
    echo '<p class="success">Request Successful</p>';
} else {
    echo '<p class="error">Request Failed: ' . $state->error . '</p>';
}

// Close the statement
$state->close();
} else {
echo '<p class="error">SQL preparation failed: ' . $mysqli->error . '</p>';
}

// Close the database connection
$mysqli->close();
}
?>

  </body>
</html>