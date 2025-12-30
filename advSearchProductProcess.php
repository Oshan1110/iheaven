<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <?php

    include "connection.php";
    ?>

    <div class="product-container">
        <?php

        $conn = new mysqli("localhost", "root", "Adhiya2003#", "iheaven", 3306);


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $cat = $_POST["cat"];
        $model = $_POST["mod"];
        $storage = $_POST["st"];
        $color = $_POST["c"];
        $minPrice = $_POST["min"];
        $maxPrice = $_POST["max"];

        $status = 0;


        $query = "SELECT * FROM stock INNER JOIN product ON stock.product_id = product.id INNER JOIN category ON product.category_cat_id = category.cat_id 
        INNER JOIN color ON product.color_id = color.id INNER JOIN model ON product.model_model_id = model.model_id INNER JOIN storage ON product.storage_id = storage.id";


        // search by color 
        if ($status == 0 && $cat != 0) {
            // 1st time search by color (WHERE) 
            $query .= " WHERE `category`.`cat_id` = '" . $cat . "'";
            $status = 1;
        } else if ($status != 0 && $cat != 0) {
            // 2nd time search by color (AND) 
            $query .= " AND `category`.`cat_id` = '" . $cat . "'";
        }

        // search by category 
        if ($status == 0 && $color != 0) {
            // (WHERE) 
            $query .= " WHERE `color`.`id` = '" . $color . "'";
            $status = 1;
        } else if ($status != 0 && $color != 0) {
            // (AND) 
            $query .= " AND `color`.`id` = '" . $color . "'";
        }

        // search by brand 
        if ($status == 0 && $model != 0) {
            // (WHERE) 
            $query .= " WHERE `model`.`model_id` = '" . $model . "'";
            $status = 1;
        } else if ($status != 0 && $model != 0) {
            // (AND) 
            $query .= " AND `model`.`model_id` = '" . $model . "'";
        }

        // search by size
        if ($status == 0 && $storage != 0) {
            // (WHERE) 
            $query .= " WHERE `storage`.`id` = '" . $storage . "'";
            $status = 1;
        } else if ($status != 0 && $storage != 0) {
            // (AND) 
            $query .= " AND `storage`.`id` = '" . $storage . "'";
        }

        // search by min price 
        if (!empty($minPrice) && empty($maxPrice)) {
            if ($status == 0) {
                $query .= " WHERE `stock`.`price` <= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
                $status = 1;
            } else if ($status != 0) {
                $query .= " AND `stock`.`price` <= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
            }
        }

        // search by max price
        if (empty($minPrice) && !empty($maxPrice)) {
            if ($status == 0) {
                $query .= " WHERE `stock`.`price` >= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
                $status = 1;
            } else if ($status != 0) {
                $query .= " AND `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
            }
        }

        // search by price range 
        if (!empty($minPrice) && !empty($maxPrice)) {
            if ($status == 0) {
                $query .= " WHERE `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
                $status = 1;
            } else if ($status != 0) {
                $query .= " AND `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
            }
        }



        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product-card">';
                echo '<a href="singleProductView.php?s=' . $row["stock_id"] . '"><div><img src="' . $row["img_path"] . '" alt="Product Image"></div></a>';
                echo '<div class="product-info">';
                echo '<h2>' . $row["title"] . '</h2>';
                if ($row["storage_id"] == 1) {
                    echo '<p class="desc">128GB | ' . $row["clr_name"] . '</p>';
                } elseif ($row["storage_id"] == 2) {
                    echo '<p class="desc">256GB | ' . $row["clr_name"] . '</p>';
                } elseif ($row["storage_id"] == 3) {
                    echo '<p class="desc">512GB | ' . $row["clr_name"] . '</p>';
                } elseif ($row["storage_id"] == 4) {
                    echo '<p class="desc">1TB | ' . $row["clr_name"] . '</p>';
                } elseif ($row["storage_id"] == 5) {
                    echo '<p class="desc">16GB | ' . $row["clr_name"] . '</p>';
                } elseif ($row["storage_id"] == 6) {
                    echo '<p class="desc">32GB | ' . $row["clr_name"] . '</p>';
                } elseif ($row["storage_id"] == 7) {
                    echo '<p class="desc">64GB | ' . $row["clr_name"] . '</p>';
                } else {
                    echo '<p class="desc">NONE</p>';
                }
                echo '<span class="price">Rs.' . $row["price"] . '.00</span> &nbsp';
                if ($row["qty"] > 0) {
        ?>
                    <span class="stock">In Stock</span>
                    <div class="buttons">
                        <!-- <button class="buy-btn">Buy Now</button> -->
                    <?php
                } else {
                    ?>
                        <span class="stockout">Out of Stock</span>
                        <div class="buttons">
                            <!-- <button class="buy-btn" disabled>Buy Now</button> -->
                        <?php
                    }

                        ?>
                        <a href='singleProductView.php?s=<?php echo $row["stock_id"]; ?>'><button class="add-to-cart-btn"><i class="bi bi-caret-down-fill"></i>&nbsp;View</button></a>
                        <!-- <button class="wishlist-btn"><i class="bi bi-heart-fill"></i>Wishlist</button> -->
                        </div>
                    </div>
    </div>
<?php
            }
        } else {
?>

<div class="custom-container">
    <h5>Search No Result</h5>
    <p>We're Sorry, We cannot find any matches for your search term...</p>
</div>

<?php
        }


        $conn->close();
?>
</div>
</body>

</html>