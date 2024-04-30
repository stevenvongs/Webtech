<?php
    include 'checkLoggedAdmin.php';
<<<<<<< HEAD
=======
    $host = "localhost";
    $dbname = "library_database";
    $username = "root";
    $password = "";

    // Database connection
    $mysqli = new mysqli($host, $username, $password, $dbname);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Remove user if the remove button is clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["removeUserId"])) {
        $removeUserId = $_POST["removeUserId"];
        $sql = "DELETE FROM requests WHERE book_id = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("i", $removeUserId);
            $stmt->execute();
            $stmt->close();
            header("Refresh:0"); // Refresh the page after deletion
        }
    }

    // Fetch all users to display
    $sql = "SELECT * FROM requests";
    $result = $mysqli->query($sql);
>>>>>>> taylor
?>
<!DOCTYPE html>
<html>
  <head>
<<<<<<< HEAD
		<title>Admin's Requests</title>
    <link href="style.css" type="text/css" rel="stylesheet"</link>
=======
		<title>Admin's Users</title>
    <link href="style.css" type="text/css" rel="stylesheet">
>>>>>>> taylor
  </head>
	<body>
    <h1 class="title">Virtual Library</h1>
    <h2 class="welcome" style="padding: 0px;">Administrator</h2>
<<<<<<< HEAD

    <!-- This is my navigation bar. -->   
    <ul class="navBar">
  	    <li class="navBarList"><a class="navBarElement" href="adminLibrary.php" target="_self">Library</a></li>
=======
    <ul class="navBar">
        <li class="navBarList"><a class="navBarElement" href="adminLibrary.php" target="_self">Library</a></li>
>>>>>>> taylor
        <li class="navBarList"><a class="navBarElement" href="adminRequests.php" target="_self">Requests</a></li>
        <li class="navBarList"><a class="navBarElement" href="adminUsers.php" target="_self">Users</a></li>
        <li class="navBarListLog"><a class="navBarElement" href="logout.php" target="_self">Log Out</a></li>
	</ul>
<<<<<<< HEAD
=======

<!-- Table to display users -->
    <table>
        <tr>
            <th>Request ID</th>
            <th>Book Author</th>
            <th>Book Title</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["book_id"] . "</td>";
                echo "<td>" . $row["book_author"] . "</td>";
                echo "<td>" . $row["book_title"] . "</td>";
                echo "<td>
                        <form action='' method='post'>
                            <input type='hidden' name='removeUserId' value='" . $row["book_id"] . "'>
                            <input type='submit' value='Remove'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        }
        ?>
</div> <!-- Ensure this div closes after the table -->

>>>>>>> taylor
	</body>
</html>
