<?php

include "connection.php";
$stockId = $_GET["s"];

if (isset($stockId)) {

    $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN `category` ON `product`.`category_cat_id` = `category`.`cat_id` 
    INNER JOIN `color` ON `product`.`color_id` = `color`.`id` INNER JOIN `model` ON `product`.`model_model_id` = `model`.`model_id` 
    INNER JOIN `storage` ON `product`.`storage_id` = `storage`.`id` WHERE `stock`.`stock_id` = '" . $stockId . "'");
    $d = $rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style2.css">
        <link rel="icon" href="resources/a.png">
    </head>

    <body class="home-body">

        <?php include "header.php" ?>


        <div class="sproduct-card">
            <div class="sproduct-image">
                <img src="<?php echo $d["img_path"]; ?>">
            </div>
            <?php
            if ($d["qty"] > 0) {
            ?>
                <span class="sstock">In Stock</span>

            <?php
            }else{
                ?>

                <span class="sstockout">Out of Stock</span>
                <?php
            }
            ?>
            <div class="sproduct-details">

                <h2 class="sproduct-name"><?php echo $d["title"]; ?></h2>
                <p class="sproduct-price">Rs.<?php echo $d["price"]; ?>.00</p>
                <p class="sproduct-storage"><?php echo $d["storage_size"]; ?></p>
                <p class="sproduct-color"><?php echo $d["clr_name"]; ?></p>
                <p class="sproduct-quantity">Quantity : <?php echo $d["qty"]; ?></p> &nbsp;&nbsp; <input class="aqty" type="text" id="qty" value="1">
                <div class="sbuttons">
                    <button class="sbuy-btn" onclick="buyNow(<?php echo $d['stock_id']?>);">Buy Now</button>
                    <button class="sadd-to-cart-btn" onclick="addtoCart(<?php echo $d['stock_id']?>)"><i class="bi bi-cart-plus-fill">&nbsp</i>Add cart</button>
                </div>
            </div>
        </div>
        <?php include "footer.php" ?>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="scriptH.js"></script>
    </body>

    </html>
<?php
} else {
    header("location: home.php");
}


?>