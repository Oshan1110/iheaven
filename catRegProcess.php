<?php

include "connection.php";

$category = $_POST["cat"];

if (empty($category)) {
    echo("Please Enter Your Category");
} else if (strlen($category) > 50) {
    echo ("Your Category Should be less than 50 Characters");
}else {
    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name` = '".$category."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Category is Already Exists");
    } else {
        Database::iud("INSERT INTO `category` (`cat_name`) VALUES ('".$category."')");
        echo ("Success");
    }
    
}


?>