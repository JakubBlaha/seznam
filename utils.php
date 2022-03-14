<?php
    function getPhoneNumberParams() {
        $phone_numbers = [];
        foreach ($_REQUEST as $key => $value) {
            if (strpos($key, "phone-number-") === 0) {
                // $phone_numbers[] = (object) [
                //     "id" => $key,
                //     "value" => $value
                // ];
                $phone_numbers[] = $value;
            }
        }
        return $phone_numbers;

    }
?>