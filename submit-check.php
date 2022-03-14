<?php
    require_once("utils.php");

    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];

    if ($name == "") {
        $error = "Name is required";
    } else if ($surname == "") {
        $error = "Surname is required";
    }

    $phoneNumbers = getPhoneNumberParams();

    foreach ($phoneNumbers as $phoneNumber) {
        if (!is_numeric($phoneNumber)) {
            $error = "Phone number is not valid";
        }
    }
?>