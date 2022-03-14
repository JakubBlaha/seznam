<?php
    require("connection.php");

    $conn->query("DROP TABLE IF EXISTS numbers");
    $conn->query("DROP TABLE IF EXISTS users");

    $conn->query("CREATE TABLE users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, surname VARCHAR(30) NOT NULL)");
    $conn->query("CREATE TABLE numbers (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, number VARCHAR(30) NOT NULL, user_id INT(6) UNSIGNED NOT NULL, FOREIGN KEY (user_id) REFERENCES users(id))");

    echo "Database reset successfully.";
?>