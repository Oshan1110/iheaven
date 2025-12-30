<?php

include "connection.php";

$productId = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["up"];

if (empty($productId)){
    echo ("Select Your Product");
}elseif ($qty < 0) {
    echo ("Quantity cannot be less than 0");
} elseif (!is_numeric($qty)) {
    echo ("Only number can be Entered for Quantity");
} elseif (strlen($qty) > 10) {
    echo ("Your Quantity  should be less than 10 characters");
} elseif (empty($price)) {
    echo ("Please Enter Unit Price");
} elseif (!is_numeric($price)) {
    echo ("Only number can be Entered for Unit Price");
} elseif (strlen($price) > 15) {
    echo ("Your price should be less than 15 characters");
} else {
    $rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$productId."' AND `price` = '".$price."'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {

        Database::iud("UPDATE `stock` SET `qty` = '" . $qty . "' WHERE `stock_id` = '" . $productId . "'");
        echo ("Success1");
    } else {
        Database::iud("INSERT INTO `stock` (`price`, `qty`, `product_id`) VALUES ('" . $price . "', '" . $qty . "', '" . $productId . "')");
        echo ("Success2");
    }
}

