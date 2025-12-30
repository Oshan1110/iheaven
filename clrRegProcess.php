<?php

include "connection.php";

$color = $_POST["clr"];

if (empty($color)) {
    echo("Please Enter Your Colour");
} else if (strlen($color) > 45) {
    echo ("Your Colour Should be less than 45 Characters");
}else {
    $rs = Database::search("SELECT * FROM `color` WHERE `clr_name` = '".$color."' AND `id` = '*'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Colour is Already Exists");
    } else {
        Database::iud("INSERT INTO `color` (`clr_name`) VALUES ('".$color."')");
        echo ("Success");
    }
    
}


?>