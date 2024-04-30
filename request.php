<?php
    include 'checkLogged.php';
?>

<!DOCTYPE html>
<html>
  <head>
		<title>Dashboard</title>
    <link href="style.css" type="text/css" rel="stylesheet">
  </head>
	<body>
    <h1 class="title">Virtual Library</h1>

    <ul class="navBar">
        <li class="navBarList"><a class="navBarElement" href="dashboard.php" target="_self">Dashboard</a></li>
  	    <li class="navBarList"><a class="navBarElement" href="library.php" target="_self">Library</a></li>
        <li class="navBarList"><a class="navBarElement" href="request.php" target="_self">Request</a></li>
        <li class="navBarListLog"><a class="navBarElement" href="logout.php" target="_self">Log Out</a></li>
	  </ul>

    <div class="login" style="margin-top: 30px;">
      <h2>Create A Book Request</h2>
      <form action="requestSubmit.php" method="post">
          <input type="text" name="bookAuthor" placeholder="Book Author" required>
          <input type="text" name="bookTitle" placeholder="Book Title" required>
          <input type="submit" value="Request a Book!">
          <a href="library.php">Check out Our Library</a>
      </form>
    </div>
	</body>
</html>