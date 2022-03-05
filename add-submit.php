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
        $st = $conn->prepare("INSERT INTO users (name, surname, phone_number) VALUES (?, ?, ?)");
        $st->bind_param("sss", $_REQUEST['name'], $_REQUEST['surname'], $_REQUEST['phone-number']);
        $st->execute();

        echo get_info_banner("Record updated successfully.");
        
        header("Location: index.php");
        die();
    }
?>