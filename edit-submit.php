<?php
    require("connection.php");
    require("tailwind.php");
    require("submit-check.php");
    require("error-banner.php");
    require("info-banner.php");
    require_once("utils.php");

    if (isset($error)) {
        echo get_error_banner($error);
        require("edit.php");
    } else {
        $st = $conn->prepare("UPDATE users SET name = ?, surname = ? WHERE id = ?");
        $st->bind_param("ssi", $_REQUEST['name'], $_REQUEST['surname'], $_REQUEST['id']);
        $st->execute();

        // delete all numbers for this user
        $st = $conn->prepare("DELETE FROM numbers WHERE user_id = ?");
        $st->bind_param("i", $_REQUEST['id']);
        $st->execute();

        // insert new numbers
        $st = $conn->prepare("INSERT INTO numbers (number, user_id) VALUES (?, ?)");
        foreach ($_REQUEST as $key => $value) {
            if (strpos($key, "phone-number-") === 0) {
                $st->bind_param("si", $value, $_REQUEST['id']);
                $st->execute();
            }
        }

        echo get_info_banner("Record updated successfully.");
        
        header("Location: index.php");
        die();
    }
?>
