<?php
    require("connection.php");

    $conn->query("DROP TABLE IF EXISTS users");
    $conn->query("CREATE TABLE users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, surname VARCHAR(30) NOT NULL, phone_number VARCHAR(30) NOT NULL)");

    echo "Database reset successfully.";
?>