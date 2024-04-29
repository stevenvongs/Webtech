<?php
// Establish database connection
$servername = "localhost";
$username = "root";  
$password = "";      
$database = "library_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user_email = $_SESSION['username'];

$sql_reserved_books = "SELECT b.book_id, b.book_title, b.book_author, b.book_genre, b.book_image, bi.issue_id, DATE_FORMAT(bi.return_by, '%M %D') as return_date
                        FROM book_issue bi
                        INNER JOIN book b ON bi.book_id = b.book_id
                        WHERE bi.issued_to = '$user_email' AND bi.availibility = 0";
$result_reserved_books = $conn->query($sql_reserved_books);


// Close connection
$conn->close();

if ($result_reserved_books->num_rows > 0) {
    while($row = $result_reserved_books->fetch_assoc()) {
        $bookTitle = $row["book_title"];
        $bookAuthor = $row["book_author"];
        $bookGenre = $row["book_genre"];
        $bookImage = $row["book_image"];
        $returnBy = $row["return_date"];
        $issue_id = $row["issue_id"];

        // Display book as a card
        echo '<div class="bookCard">';
        echo '<img src="'.$bookImage.'" alt="'.$bookTitle.'" class="bookImage">';
        echo '<div class="bookInfo">';
        echo '<h2 class="bookTitle">'.$bookTitle.'</h2>';
        echo '<p class="bookAuthor">'.$bookAuthor.'</p>';
        echo '<p class="bookGenre">'.$bookGenre.'</p>';
        echo '<p class="returnBy">Return by '.$returnBy.' </p>';
        echo '</div>'; 
        echo '<button class="returnBook" onclick="confirmReturn('.$issue_id.')">Return</button>';
        echo '</div>'; 
    }
} 
else {
    echo "You have no reserved books.";
}
?>

<script>
function confirmReturn(issueID) {
    if (confirm("Are you sure you would like to return this book?")) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location.reload();
            }
        };
        xhttp.open("POST", "returnbook.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("issue_id=" + issueID);
    }
}
</script>
