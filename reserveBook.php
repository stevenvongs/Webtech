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

    $sql = "UPDATE `book_issue` SET `issued_to` = '$username', `availibility` = 0, `issued_time` = CURRENT_TIMESTAMP, `return_by` = DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 7 DAY) WHERE `book_id` = $bookId  AND `availibility` = 1 LIMIT 1;";

    if ($conn->query($sql) === TRUE) {
        echo "Book Successfully reserved!";
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}
?>