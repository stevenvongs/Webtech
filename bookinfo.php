<?php
// Establish database connection (assuming MySQL)
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password
$database = "library_database"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get book data
$sql = "SELECT b.book_id, b.book_title, b.book_author, b.book_genre, b.book_image, COUNT(bi.book_id) AS available
        FROM book b
        LEFT JOIN book_issue bi ON b.book_id = bi.book_id AND bi.availibility = 1
        GROUP BY b.book_id, b.book_title";

$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $bookTitle = $row["book_title"];
        $bookAuthor = $row["book_author"];
        $bookGenre = $row["book_genre"];
        $bookImage = $row["book_image"];
        $available = $row["available"];
        $bookId = $row["book_id"]; // Adding book ID

        // Display book as a card
        echo '<div class="bookCard">';
        echo '<img src="'.$bookImage.'" alt="'.$bookTitle.'" class="bookImage">';
        echo '<div class="bookInfo">';
        echo '<h2 class="bookTitle">'.$bookTitle.'</h2>';
        echo '<p class="bookAuthor">'.$bookAuthor.'</p>';
        echo '<p class="bookGenre">'.$bookGenre.'</p>';
        echo '</div>'; 
        echo '<div class="availability">'.$available.' Available</div>';
        echo '<div class="details"> <a href="singleBookInfo.php?book_id='.$bookId.'" class="btn">Details</a></div>';
        echo '</div>'; 

    }
} else {
    echo "No books found";
}

// Close connection
$conn->close();
?>
