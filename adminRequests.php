<?php
    include 'checkLoggedAdmin.php';
?>
<!DOCTYPE html>
<html>
  <head>
		<title>Admin's Requests</title>
    <link href="style.css" type="text/css" rel="stylesheet"</link>
  </head>
	<body>
    <h1 class="title">Virtual Library</h1>
    <h2 class="welcome" style="padding: 0px;">Administrator</h2>

    <!-- This is my navigation bar. -->   
    <ul class="navBar">
  	    <li class="navBarList"><a class="navBarElement" href="adminLibrary.php" target="_self">Library</a></li>
        <li class="navBarList"><a class="navBarElement" href="adminRequests.php" target="_self">Requests</a></li>
        <li class="navBarList"><a class="navBarElement" href="adminUsers.php" target="_self">Users</a></li>
        <li class="navBarListLog"><a class="navBarElement" href="logout.php" target="_self">Log Out</a></li>
	</ul>
	</body>
</html>