<?php
    include 'checkLogged.php';
?>

<!DOCTYPE html>
<html>
     <head>
		<title>Dashboard</title>
        <link href="style.css" type="text/css" rel="stylesheet"</link>
        <script>
            function reserveBook(bookId, username) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            alert(xhr.responseText); // You can replace this with any appropriate action
                        } else {
                            alert('Error: ' + xhr.statusText);
                        }
                    }
                };
                xhr.open('POST', 'reserveBook.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.send('bookId=' + bookId + '&username=' + username);
                location.reload();
            }
        </script>
    </head>
    <body>
        <h1 class="title">Virtual Library</h1>

        <ul class="navBar">
            <li class="navBarList"><a class="navBarElement" href="library.php" target="_self">Back</a></li>
        </ul>
        <?php
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

            if(isset($_GET['book_id'])) {
                $bookId = $_GET['book_id'];
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM book WHERE book_id = $bookId";
                
                $result = $conn->query($sql);
                
                $sql2 = "SELECT COUNT(*) as book_availability FROM book_issue WHERE book_id = $bookId AND availibility = 1;";

                $result2 = $conn->query($sql2);

                $sql3 = "SELECT COUNT(*) AS checkout_count FROM book_issue WHERE book_id = $bookId AND issued_to = '$username';";

                $result3 = $conn->query($sql3);

                if ($result->num_rows > 0) {
                    echo"<div class = 'single'>";
                    $row = $result->fetch_assoc();
                    $bookTitle = $row["book_title"];
                    $bookAuthor = $row["book_author"];
                    $bookGenre = $row["book_genre"];
                    $bookImage = $row["book_image"];
                    $bookDescription = $row["book_description"];
                    $bookLength = $row["book_length"];
                    $row2 = $result2->fetch_assoc();
                    $availability = $row2["book_availability"];
                    $row3 = $result3->fetch_assoc();
                    $userChecked = $row3["checkout_count"];
                    if ($availability > 0) {
                        if ($userChecked > 0) {
                            $availabilityStatus = 'checked-out';
                        } else {
                            $availabilityStatus = 'available';
                        }
                    } else {
                        $availabilityStatus = 'not-available';
                    }
                    echo '<h2>'.$bookTitle.'</h2>';
                    echo '<img src="'.$bookImage.'" alt="'.$bookTitle.'" class="bookImageSingle">';
                    echo '<p>Author: '.$bookAuthor.'</p>';
                    echo '<p>Genre: '.$bookGenre.'</p>';
                    echo '<p>Description: '.$bookDescription.'</p>';
                    echo '<p>Length: '.$bookLength.'</p>';
                    echo '<p>Availability: '.$availability.'</p>';
                    if($availabilityStatus ==  'checked-out') {
                        echo "<button id='availabilityButton' class='button' style ='background-color: lightgrey;'>Checked Out</button>";
                    } else if ($availabilityStatus ==  'not-available') {
                        echo "<button id='availabilityButton' class='button'style ='background-color: lightgrey;'>Unavailable</button>";
                    } else {
                        echo "<button id='availabilityButton1' class='button' onclick='reserveBook($bookId, \"$username\")'>Reserve</button>";
                    }                        
                    echo"</div>";
                    echo "<script>";
                } else {
                    echo "No book found with the provided ID.";
                } }else {
                echo "No book ID provided.";
            }

            // Close connection
            $conn->close();
            ?>

	</body>
    
</html>
