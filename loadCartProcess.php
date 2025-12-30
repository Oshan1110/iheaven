<?php
// echo("okphp");

include "connection.php";
session_start();
$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM cart INNER JOIN stock ON cart.stock_stock_id = stock.stock_id INNER JOIN product ON stock.product_id = product.id INNER JOIN 
color ON product.color_id = color.id INNER JOIN `storage` ON product.storage_id = `storage`.id WHERE cart.user_id = '" . $user["id"] . "'");


$num = $rs->num_rows;

if ($num > 0) {
    //    load cart
    // echo ("Load Cart");

?>

    <?php
    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();

        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total;


    ?>
        <!-- Cart Items -->
        <div class="ssproduct-card">
            <div><img src="<?php echo $d["img_path"] ?>" alt="Product Image"></div>
            <div class="sproduct-info">
                <h2 class="stitle"><?php echo $d["title"] ?></h2>
                <p class="sdesc"><?php echo $d["storage_size"] ?> | <?php echo $d["clr_name"] ?></p>
                <?php if ($d["qty"] > 0) {
                ?>
                    <span class="ssstock">In Stock</span>

                <?php
                } else {
                ?>

                    <span class="ssstockout">Out of Stock</span>
                <?php
                } ?>
                <span class="sprice">Rs:<?php echo $d["price"] ?>.00</span> &nbsp;
                <div class="btnbuttn">
                    <button class="plusbtn" onclick="decrementcartqty('<?php echo $d['cart_id'] ?>');">-</button>
                    <input class="caqty" type="text" value="<?php echo $d["cart_qty"] ?>" id="qty<?php echo $d['cart_id'] ?>" disabled>
                    <button class="plusbtn" onclick="incrementcartqty('<?php echo $d['cart_id'] ?>');">+</button>
                </div>
                <!-- <span class="stock"></span> -->
            </div>
            <div>
                <button class="removebtn" onclick="removefromcart('<?php echo $d['cart_id'] ?>');">X</button>
                <h2 class="total">TOTAL: <span class="rs">RS.<?php echo $total ?>.00</span></h2>
            </div>
        </div>

    <?php
    }
    ?>
    <!-- Cart Items -->

    <div>
        <hr>
    </div>

    <!-- checkout -->
    <div class="Ccontainer">
        <div class="net">
            <h6>Number Of Items : <span class="info"> &nbsp; <?php echo $num ?></span></h6>
            <h5>Delivery Fee : <span class="muted">Rs:1000.00</span></h5>
            <h3>Net Total : <span class="warning">Rs:<?php echo ($netTotal + 1000) ?>.00</span></h3>
            <button class="checkout" onclick="checkOut();">CHECKOUT</button>
        </div>
    </div>
    <!-- checkout -->




<?php


} else {
    //    echo("Cart Is Emty");

?>
    <div class="cartempty">
        <h2>Your Cart Is Empty!</h2>
        <a href="home.php" class="shopping">Start Shopping</a>
    </div>
<?php

}


?>