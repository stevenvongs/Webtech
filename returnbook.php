<?php
session_start();

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the book ID from the POST data
    $issueID = $_POST['issue_id'];

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

    // Update the book issue record to mark the book as available
    $sql_update = "UPDATE book_issue SET issued_to = NULL, issued_time = NULL, return_by = NULL, availibility = 1 WHERE issue_id = $issueID";
    if ($conn->query($sql_update) === TRUE) {
        // Book returned successfully
        echo "Book returned successfully.";
    } else {
        // Error updating book status
        echo "Error returning book: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    // Handle invalid request method
    echo "Invalid request method.";
}
?>
