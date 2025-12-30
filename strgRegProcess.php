<?php

include "connection.php";

$storage = $_POST["strg"];

if (empty($storage)) {
    echo("Please Enter Your Storage");
} else if (strlen($storage) > 20) {
    echo ("Your Storage Should be less than 20 Characters");
}else {
    $rs = Database::search("SELECT * FROM `storage` WHERE `storage_size` = '".$storage."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Storage is Already Exists");
    } else {
        Database::iud("INSERT INTO `storage` (`storage_size`) VALUES ('".$storage."')");
        echo ("Success");
    }
    
}


?>