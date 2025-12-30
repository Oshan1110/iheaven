<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="resources/a.png">
</head>

<body class="home-body">

    <?php
    include "header.php";
    include "connection.php";

    $user = $_SESSION["u"];

    if (isset($user)) {
    ?>



        <?php
        $rs =  Database::search("SELECT * FROM `order_history` WHERE `user_id`='" . $user["id"] . "'");
        $num = $rs->num_rows;

        if ($num > 0) {
            //Not Empty
        ?>

            <h2 class="wishtext">ORDER HISTORY</h2>

            <?php
            for ($i = 0; $i < $num; $i++) {
                $d = $rs->fetch_assoc();

            ?>
                <!-- order History card -->
                <div class="transparent-div">
                    <div class="tabletitle">
                        <h4>ORDER ID <span>#<?php echo $d["order_id"] ?></span></h4>
                        <p class="tabledate"><?php echo $d["order_date"] ?></p>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rs2 =  Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.stock_stock_id=`stock`.stock_id 
                                    INNER JOIN `product` ON `stock`.product_id=`product`.id WHERE `order_item`.order_history_ohid='" . $d["ohid"] . "'");
                            $num2 = $rs2->num_rows;

                            for ($x = 0; $x < $num2; $x++) {
                                $d2 = $rs2->fetch_assoc();

                            ?>
                                <tr>
                                    <td><?php echo $d2["title"] ?></td>
                                    <td><?php echo $d2["oi_qty"] ?></td>
                                    <td>Rs: <?php echo ($d2["price"] * $d2["oi_qty"]) ?> .00</td>
                                </tr>
                            <?php
                            }

                            ?>

                        </tbody>
                    </table>


                    <div class="hnet">
                        <h6>Deliver Fee : <span class="info">Rs:1000.00</span></h6>
                        <h5>Net Total : <span class="muted">Rs:<?php echo $d["amount"] ?>.00</span></h5>

                    </div>
                </div>

                <!-- order History card -->
            <?php


            }


            ?>






        <?php
        } else {
            //empty

        ?>

            <div class="cartempty">
                <h2>Your Have Not Placed Any Order!</h2>
                <a href="home.php" class="shopping">Start Shopping</a>
            </div>
        <?php
        }

        ?>



        <?php include "footer.php" ?>

        <script src="scriptH.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>

<?php


    } else {
        header("location: index.php");
    }


?>