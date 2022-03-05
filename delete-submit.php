<?php
    require_once("connection.php");
    require_once("info-banner.php");

    $id = $_REQUEST['id'];

    $st = $conn->prepare("DELETE FROM users WHERE id = ?");
    $st->bind_param("i", $id);
    $st->execute();

    echo get_info_banner("Record deleted successfully.");

    header("Location: index.php");
    die();
?>
