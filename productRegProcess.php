<?php

include "connection.php";

$pname = $_POST["pname"];
$category = $_POST["cat"];
$model = $_POST["mod"];
$storage = $_POST["st"];
$color = $_POST["clr"];
$df = $_POST["df"];

if (empty($pname)) {
    echo ("Please Enter Your Product Name");
}elseif (empty($df)) {
    echo ("Please Enter Delivery Fee");
}elseif (empty($_FILES["image"])) {
    echo ("Please Upload Your Product Image");
}else {

    $rs = Database::search("SELECT * FROM `product` WHERE `title` = '".$pname."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Product Name is Already Exixts");
    }else {
        $path = "resources/product/productimg/" . uniqid() . ".png";
        move_uploaded_file($_FILES["image"]["tmp_name"], $path);

        Database::iud("INSERT INTO `product` (`title`, `datetime_added`, `delivery_fee`, `category_cat_id`, `storage_id`, `model_model_id`, `color_id`, `img_path`)
        VALUES ('".$pname."', NOW(), '".$df."', '".$category."', '".$storage."', '".$model."', '".$color."', '".$path."')");

        echo ("Success");
    }

}

?>