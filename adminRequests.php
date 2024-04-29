<?php
    include 'checkLoggedAdmin.php';
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
?>
<!DOCTYPE html>
<html>
  <head>
		<title>Admin's Users</title>
    <link href="style.css" type="text/css" rel="stylesheet">
  </head>
	<body>
    <h1 class="title">Virtual Library</h1>
    <h2 class="welcome" style="padding: 0px;">Administrator</h2>
    <ul class="navBar">
        <li class="navBarList"><a class="navBarElement" href="adminLibrary.php" target="_self">Library</a></li>
        <li class="navBarList"><a class="navBarElement" href="adminRequests.php" target="_self">Requests</a></li>
        <li class="navBarList"><a class="navBarElement" href="adminUsers.php" target="_self">Users</a></li>
        <li class="navBarListLog"><a class="navBarElement" href="logout.php" target="_self">Log Out</a></li>
	</ul>

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
        $mysqli->close();
        ?>
    </table>
	</body>
</html>
