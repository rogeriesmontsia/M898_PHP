<?php
    $servername = "mariadb";
    $database = "testdb";
    $username = "testuser";
    $password = "testpassword";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
