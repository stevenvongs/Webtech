<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        // Redirect to the login page
        header("Location: admin.php");
        exit;
    }
?>