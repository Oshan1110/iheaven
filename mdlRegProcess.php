<?php

include "connection.php";

$model = $_POST["mdl"];

if (empty($model)) {
    echo("Please Enter Your Model");
} else if (strlen($model) > 45) {
    echo ("Your Model Should be less than 45 Characters");
}else {
    $rs = Database::search("SELECT * FROM `model` WHERE `model_name` = '".$model."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Model is Already Exists");
    } else {
        Database::iud("INSERT INTO `model` (`model_name`) VALUES ('".$model."')");
        echo ("Success");
    }
    
}


?>