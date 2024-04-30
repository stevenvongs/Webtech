<!DOCTYPE html>
<html>
  <head>
		<title>Login</title>
    <link href="style.css" type="text/css" rel="stylesheet"</link>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
	<body>
    <div class="dropdown">
      <button type="button" class="btn btn-primary dropdown-toggle" id ="drop" data-bs-toggle="dropdown">
        Account
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="login.php">User</a></li>
        <li><a class="dropdown-item" href="admin.php">Admin</a></li>
      </ul>
    </div>
    
    <h1 class="titleLogin">Virtual Library</h1>
    <h2 class="welcome">Welcome to Virtual Library!</h2>

    <div class="login">
    <h2> Login </h2>
      <form action="login.php" method="post">
          <input type="text" name="username" placeholder="Username" required>
          <input type="password" name="password" placeholder="Password" required>
          <input type="submit" value="Login">
          <a href="create.php">Or create account</a>
      </form>
    </div>

    <!-- Print error if invalid login  -->
    <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
        <p class="error">Invalid username or password. Please try again.</p>
    <?php endif; ?>
   
    <?php
    // Create connection
    $conn = new mysqli("localhost", "root", "", "library_database");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Get username and password from the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // get username and passwrod from form
        $email = $_POST['username'];
        $password = $_POST['password'];

        // Process the form data (e.g., save to database, send email, etc.)
        $sql = "SELECT * FROM user_info WHERE user_email ='$email' AND user_pwd='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User exists, authentication successful
            $authenticated = true;
            session_start();
            $_SESSION['username'] = $email;
            header("Location: dashboard.php");
        } else {
            // User does not exist or incorrect credentials
            $authenticated = false;
            header("Location: login.php?error=1");
        }
    }
    // Close database connection
    $conn->close();
    ?>
  </body>
</html>