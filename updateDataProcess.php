<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$pw = $_POST["p"];
$no = $_POST["n"];
$city = $_POST["c"];
$address = $_POST["ad"];

if (empty($fname)) {
    echo ("Please Enter Your First Name");
} else if (strlen($fname) > 45) {
    echo ("Your First Name Should be less than 45 Characters");
} elseif (empty($lname)) {
    echo ("Please Enter Your Last Name");
} else if (strlen($lname) > 45) {
    echo ("Your Last Name Should be less than 45 Characters");
} elseif (empty($email)) {
    echo ("Please Enter Your Email");
} else if (strlen($email) > 45) {
    echo ("Your Email Address Should be less than 45 Characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Your Email Address is Invalid");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile");
} elseif (strlen($mobile) != 10) {
    echo ("Your mobile Number must contain 10 Characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Your Mobile Number is Invalid");
} else if (empty($pw)) {
    echo ("Please Enter Your Password");
} else if (strlen($pw) < 5 || strlen($pw) > 20) {
    echo ("Your Password must contain 5 - 20 Characters");
} else if (empty($city)) {
    echo ("Please Enter Your City");
} else if (strlen($city) > 45) {
    echo ("Your City Should be less than 45 Characters");
} else if (empty($no)) {
    echo ("Please Enter Your Address No");
} else if (strlen($no) > 10) {
    echo ("Your Address No Should be less than 10 Characters");
} else if (empty($address)) {
    echo ("Please Enter Your Address");
} else if (strlen($address) > 100) {
    echo ("Your Address Should be less than 100 Characters");
} else {

    Database::iud("UPDATE `user` SET `fname` = '" . $fname . "', `lname` ='" . $lname . "', `email`='" . $email . "', `password` ='" . $pw . "' , `mobile` = '" . $mobile . "', `city` = '".$city."', `no` = '".$no."', `address` = '".$address."' WHERE `id` = '" . $user["id"] . "'");

    $rs = Database::search("SELECT * FROM `user` WHERE `id`= '".$user["id"]."'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo ("success");
}
