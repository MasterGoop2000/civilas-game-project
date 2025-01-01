<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Civilas Login</title>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        Username: <input name="username">
        Password: <input name="password">
        <input type="submit">
    </form>

    <?php
    
        
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

       
        if(!$conn->select_db($dbname)){
        if($conn->query("CREATE DATABASE userdata") === TRUE){
            echo "sql is successful";
        } else {
            echo "sql failed";
        }
    }

        $tableCreate = "CREATE TABLE loginData (
            username VARCHAR(100) NOT NULL,
            password VARCHAR(100) NOT NULL
        )";

        if($conn->query($tableCreate) === TRUE){
            echo "Table created";
        }

        if($conn->query("INSERT INTO loginData(username, password)
        VALUES ('abc', '123')") === TRUE){
            echo "setting failed";
        }

        if($conn->query($tableCreate) === FALSE){
            echo "Database failed";
        }

        $result = $conn->query("SELECT username, password FROM loginData");
        
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row['password'] == "abc"){
                    echo "SKIBIDI";
                }
            }
        }
        
    ?>
</body>
</html>