<?php include 'checkLogged.php'; ?>
<!DOCTYPE html>
<html>
  <head>
		<title>Dashboard</title>
    <link href="style.css" type="text/css" rel="stylesheet"</link>
  </head>
	<body>
    <h1 class="title">Virtual Library</h1>

    <ul class="navBar">
        <li class="navBarList"><a class="navBarElement" href="dashboard.php" target="_self">Dashboard</a></li>
  	    <li class="navBarList"><a class="navBarElement" href="library.php" target="_self">Library</a></li>
        <li class="navBarList"><a class="navBarElement" href="request.php" target="_self">Request</a></li>
        <li class="navBarListLog"><a class="navBarElement" href="logout.php" target="_self">Log Out</a></li>
	</ul>

  <h2>Reserved Books:</h2>
  
  <div class="bookContainer">
    <?php include 'dashboardinfo.php' ?>
  </div>
	</body>
</html>