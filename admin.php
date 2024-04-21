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
    <h2>Admin Login</h2>
      <form action="admin.php" method="post">
          <input type="text" name="username" placeholder="Username" required>
          <input type="password" name="password" placeholder="Password" required>
          <input type="submit" value="Login">
      </form>
    </div>
  </body>
</html>