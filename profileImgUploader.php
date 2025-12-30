<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (empty($_FILES["i"])) {
    echo ("empty");
}else {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."'");
    $d = $rs->fetch_assoc();

    if (!empty($d["profile_img"])) {
        unlink($d["profile_img"]); // delete from the project 
    }

    $path = "resources/profileImg//" . uniqid() . ".png";
    move_uploaded_file($_FILES["i"]["tmp_name"],$path);


    Database::iud("UPDATE `user` SET `profile_img` = '".$path."' WHERE `id` = '".$user["id"]."'");
    echo ($path);
}

?>