<?php
include 'checkLoggedAdmin.php';

$host = "localhost";
$dbname = "library_database";
$username = "root";
$password = "";
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check for a connection error
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

// Handle form submissions before any HTML output
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["title"])) {
        // Handle add book logic
        $title = $_POST["title"];
        $author = $_POST["author"];
        $description = $_POST["description"];
        $length = $_POST["length"];
        $genre = $_POST["genre"];
        $image = $_POST["image"];

        $sql = "INSERT INTO book (book_title, book_author, book_description, book_length, book_genre, book_image)
                VALUES (?, ?, ?, ?, ?, ?)";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sssiss", $title, $author, $description, $length, $genre, $image);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: adminLibrary.php");
        exit;
    } elseif (isset($_POST["titleBook"])) {
        // Handle remove book logic
        $titleToRemove = $_POST["titleBook"];
        $sql = "DELETE FROM book WHERE book_title = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $titleToRemove);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: adminLibrary.php");
        exit;
    }
}

$mysqli->close();
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

    <!-- Navigation bar -->   
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