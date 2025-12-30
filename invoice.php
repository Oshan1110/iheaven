<?php

session_start();
include "connection.php";
$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style2.css">
        <link rel="icon" href="resources/a.png">
        <title>iHeaven - Invoice</title>
    </head>

    <body>

        <div class="container text-end mt-2">
            <a href="home.php"><button class="btn btn-outline-dark btn-sm" id="hbtn">Home</button></a>
            <button class="btn btn-outline-dark btn-sm col-2" onclick="printinvoice();" id="pbtn">Print</button>
        </div>

        <div class="container mt-3 mb-5">
            <div class="border border-2 border-dark p-4 rounded">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Order ID #<?php echo $d["order_id"] ?></h3>
                        <h5><?php echo $d["order_date"] ?></h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <h1 class="fw-bold">I N V O I C E</h1>
                        <h4 class="fw-bold">iHeaven</h4>
                        <h5>Libary Plaza , First Floor,</h5>
                        <h5>Colombo 07</h5>
                    </div>
                </div>
                <hr>
                <div class="mb-4">
                    <h4><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h4>
                    <h6><?php echo $user["mobile"] ?></h6>
                    <h6><?php echo $user["email"] ?></h6>
                    <h6>No.<?php echo $user["no"] ?>,</h6>
                    <h6><?php echo $user["address"] ?></h6>
                    <h6><?php echo $user["city"] ?></h6>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered border-dark">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Model</th>
                                <th scope="col">Storage</th>
                                <th scope="col">Color</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rs2 = Database::search("SELECT * FROM order_item INNER JOIN stock ON order_item.stock_stock_id = stock.stock_id INNER JOIN product ON stock.product_id = product.id INNER JOIN
                            category ON product.category_cat_id = category.cat_id INNER JOIN color ON product.color_id = color.id INNER JOIN model ON product.model_model_id = model.model_id
                            INNER JOIN `storage` ON product.storage_id = `storage`.id WHERE order_item.order_history_ohid = '" . $orderHistoryId . "'");

                            $num2 = $rs2->num_rows;

                            for ($i = 0; $i < $num2; $i++) {
                                $d2 = $rs2->fetch_assoc();
                            ?>

                                <tr>
                                    <td><?php echo $d2["title"] ?></td>
                                    <td><?php echo $d2["cat_name"] ?></td>
                                    <td><?php echo $d2["model_name"] ?></td>
                                    <td><?php echo $d2["storage_size"] ?></td>
                                    <td><?php echo $d2["clr_name"] ?></td>
                                    <td><?php echo $d2["oi_qty"] ?></td>
                                    <td>Rs. <?php echo ($d2["price"] * $d2["oi_qty"]) ?>.00</td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>

                <div class="text-end mt-4">
                    <h6>Number Of Items: <span class="text-muted"><?php echo $num2 ?></span></h6>
                    <h5>Delivery Fee: <span class="text-muted">Rs. 1000.00</span></h5>
                    <h5>Total Amount: <span class="text-muted">Rs. <?php echo $d["amount"] ?>.00</span></h5>
                </div>
            </div>
        </div>

<script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    header("location: home.php");
}


?>