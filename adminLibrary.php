<?php
    include 'checkLoggedAdmin.php';
?>
<!DOCTYPE html>
<html>
  <head>
		<title>Admin's Library</title>
    <link href="style.css" type="text/css" rel="stylesheet">
  </head>
	<body>
    <h1 class="title">Virtual Library</h1>
    <h2 class="welcome" style="padding: 0px;">Administrator</h2>

    <!-- This is my navigation bar. -->   
    <ul class="navBar">
  	    <li class="navBarList"><a class="navBarElement" href="adminLibrary.php" target="_self">Library</a></li>
        <li class="navBarList"><a class="navBarElement" href="adminRequests.php" target="_self">Requests</a></li>
        <li class="navBarList"><a class="navBarElement" href="adminUsers.php" target="_self">Users</a></li>
        <li class="navBarListLog"><a class="navBarElement" href="logout.php" target="_self">Log Out</a></li>
	</ul>

  <h2>Add a Book:</h2>
      <form action="adminLibrary.php" method="post">
          <input type="text" name="title" placeholder="Title" required>
          <input type="text" name="author" placeholder="Author" required>
          <input type="text" name="description" placeholder="Brief Description" required>
          <input type="text" name="length" placeholder="Length (Page Count)" required>
          <input type="text" name="genre" placeholder="Genre" required>
          <input type="text" name="image" placeholder="Image (URL)" required>
          <input type="submit" value="Add Book">
      </form>

      <h2>Remove a Book by Title:</h2>
      <form action="adminLibrary.php" method="post">
          <input type="text" name="titleBook" placeholder="Title" required>
          <input type="submit" value="Remove Book">
      </form>
      <div class="bookContainer">
      <?php include 'bookinfo.php'; ?>
  </div>
	</body>
</html>

<!-- Add a book -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Variables
  $host ="localhost";
  $dbname = "library_database";
  $username = "root";
  $password = "";
  $title = $_POST["title"];
  $author = $_POST["author"];
  $description = $_POST["description"];
  $length = $_POST["length"];
  $genre = $_POST["genre"];
  $image = $_POST["image"];
//Database login
$mysqli = new mysqli($host, $username, $password, $dbname);
//Checks to see if there was an issue connecting to the database
if ($mysqli->connect_errno) {
  die("Connection error: " . $mysqli->connect_errno);
}

//Inserts a new account
$sql = "INSERT INTO book (book_title, book_author, book_description, book_length, book_genre, book_image)
        VALUES (?, ?, ?, ?, ?, ?)";

//state object while calling the database connection
$state = $mysqli->stmt_init();

//prepare for execution and passing in $sql as an argument
//checks for SQL syntax
$state->prepare($sql);

//passes the parameters, "s" represents a string
//"i" represents a integer data type
$state->bind_param("sssiss", $title, $author, $description, $length, $genre, $image);

//Executes the method and tells user it is successful or not
if ($state->execute()) {
    header("Location: adminLibrary.php");
    $mysqli->close();
    exit;
}
}
?>

<!-- Remove a Book -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["titleBook"])) {
    //Variables for database connection
    $host = "localhost";
    $dbname = "library_database";
    $username = "root";
    $password = "";
    $titleToRemove = $_POST["titleBook"]; // The title of the book to remove

    //Database login
    $mysqli = new mysqli($host, $username, $password, $dbname);
    //Check for a connection error
    if ($mysqli->connect_errno) {
        die("Connection error: " . $mysqli->connect_error);
    }

    // Prepare the delete statement
    $sql = "DELETE FROM book WHERE book_title = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        // Bind the title to the prepared statement as a string
        $stmt->bind_param("s", $titleToRemove);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: adminLibrary.php"); // Redirect after delete
            exit;
        } else {
            echo "Error executing query: " . $stmt->error; // Error handling
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error; // Error handling
    }

    // Close the connection
    $mysqli->close();
}
?>
