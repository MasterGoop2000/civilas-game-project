<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Civilas Login</title>
</head>
<body>
    
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        Username: <input name="username">
        Password: <input name="password">
        <input type="submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        echo "hi";
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "userdata";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
            echo "Database initialisation failed: " . $conn->connect_error;
        } else {
            echo "database created successfully";
        }

        if($conn->query("CREATE DATABASE userdata") === TRUE){
            echo "sql is successful";
        } else {
            echo "sql failed";
        }

        $tableCreate = "CREATE TABLE loginData (
            username VARCHAR(100) NOT NULL,
            password VARCHAR(100) NOT NULL
        )";

        if($conn->query($tableCreate) === FALSE){
            echo "Database failed";
        }

    }
    ?>
</body>
</html>