<!DOCTYPE html>
<html>
<head>
    <!-- 1. This is my title. -->
    <title>Create</title>
    <link href="style.css" type="text/css" rel="stylesheet"></link>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="titleLogin" style="margin: auto;">Virtual Library</h1>
    <h2 class="welcome">Welcome to Virtual Library!</h2>

    <div class="login">
        <h2>Create An Account</h2>
        <form action="create.php" method="post">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="Vpassword" placeholder="Verify Password" required>
            <input type="submit" value="Login">
            <a href="login.php">Have an Account?!</a>
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library_database"; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data and sanitize
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $Vpassword = $conn->real_escape_string($_POST['Vpassword']);

    // Check for the proper email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="error">Valid email is required</div>';
        die();
    }

    // Check if username already exists
    $sql = "SELECT * FROM user_info WHERE user_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists, display error message
        echo '<div class="error">Email already exists. Please choose a different one.</div>';
    } else {
        // Verify passwords match
        if ($password !== $Vpassword) {
            echo '<div class="error">Passwords do not match</div>';
        } else {
            // Check if Password is at least 8 Characters long
            if (strlen($password) < 8) {
                echo '<div class="error">Password must be at least 8 Characters</div>';
            } else {

                // Insert new user into the database using prepared statement
                $insert_sql = "INSERT INTO user_info (user_email, user_pwd) VALUES (?, ?)";
                $insert_stmt = $conn->prepare($insert_sql);
                $insert_stmt->bind_param("ss", $email, $password);
                if ($insert_stmt->execute()) {
                    echo "New record created successfully";
                } else {
                    echo '<div class="error">Error: ' . $insert_stmt->error . '</div>';
                }
            }
        }
    }

    // Close the database connection
    $conn->close();
}
?>
