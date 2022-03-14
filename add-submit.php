<?php
    require("connection.php");
    require("tailwind.php");
    require("submit-check.php");
    require_once("error-banner.php");
    require_once("info-banner.php");

    if (isset($error)) {
        echo get_error_banner($error);
        require("add.php");
    } else {
        $st = $conn->prepare("INSERT INTO users (name, surname) VALUES (?, ?)");
        $st->bind_param("ss", $_REQUEST['name'], $_REQUEST['surname']);
        $st->execute();
        $insert_id = $st->insert_id;

        $st = $conn->prepare("INSERT INTO numbers (number, user_id) VALUES (?, ?)");
        $st->bind_param("si", $_REQUEST['phone-number'], $insert_id);
        $st->execute();

        echo get_info_banner("Record updated successfully.");
        
        header("Location: index.php");
        die();
    }
?>