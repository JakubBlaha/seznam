<?php 
    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];
    $phone_number = $_REQUEST['phone-number'];

    if ($name == "") {
        $error = "Name is required";
    } else if ($surname == "") {
        $error = "Surname is required";
    } else if ($phone_number == "") {
        $error = "Phone number is required";
    } else if (!preg_match("/^[0-9]{9}$/", $phone_number)) {
        $error = "Phone number must be 9 digits";
    }
?>