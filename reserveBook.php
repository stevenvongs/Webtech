<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $bookId = $_POST['bookId'];
    $username = $_POST['username'];

    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "library_database";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT issue_id FROM book_issue WHERE book_id = $bookId AND availibility = 1 ORDER BY issue_id ASC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $issueId = $row["issue_id"];

        // Reserve the book issue
        $reserveSql = "UPDATE book_issue SET issued_to = '$username', availibility = 0, issued_time = CURRENT_TIMESTAMP, return_by = DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 7 DAY) WHERE issue_id = $issueId";
        if ($conn->query($reserveSql) === TRUE) {
            echo "Book Successfully reserved!";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "No available book issues found for the given book ID.";
    }

    $conn->close();
}
?>