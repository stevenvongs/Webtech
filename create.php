    <?php
        // define variables and set to empty values
        $userName = $passWord = $vPass = "";

        $host = "localhost";
        $dbname = "login_db";
        $username = "root";
        $password = "";

        $mysqli = new mysqli(
        hostname: $host,
        username: $username,
        password: $password, 
        database: $dbname);

        if ($mysqli->connect_errno) {
            die("Connection Error: " . $mysqli->connect_errno);
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["username"])) {
                die("Please Enter a valid Username / Email is required");
            }
        
            if (empty($_POST["password"])) {
                die("Please Enter a Password");
            }
        
            if (empty($_POST["Vpassword"])) {
                die("You must verify your Password");
            }

            if($_POST["password"] !== $_POST["Vpassword"]) {
                die("Passwords Do Not Match");
            }
        } {

        } else {

        }
            $passWord = password_hash($_POST["password"], PASSWORD_DEFAULT);
            print_r($_POST);
            var_dump($passWord)



        ?>