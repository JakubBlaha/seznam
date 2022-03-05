<?php
    require("connection.php");
    require("tailwind.php");
    require("submit-check.php");
    require("error-banner.php");
    require("info-banner.php");

    if (isset($error)) {
        echo get_error_banner($error);
        require("edit.php");
    } else {
        $st = $conn->prepare("UPDATE users SET name = ?, surname = ?, phone_number = ? WHERE id = ?");
        $st->bind_param("sssi", $_REQUEST['name'], $_REQUEST['surname'], $_REQUEST['phone-number'], $_REQUEST['id']);
        $st->execute();

        echo get_info_banner("Record updated successfully.");
        
        header("Location: index.php");
        die();
    }
?>
