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

  ?>

  <div class="product-container">

    <?php

    $category_rs = Database::search("SELECT * FROM `category`");
    $category_num = $category_rs->num_rows;

    for ($y = 0; $y < $category_num; $y++) {
      $category_data = $category_rs->fetch_assoc();
    }

    ?>

    <?php

    $conn = new mysqli("localhost", "root", "Adhiya2003#", "iheaven", "3306");

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $category_rs = $conn->query("SELECT * FROM `category` WHERE `cat_id` = 5");

    if ($category_rs->num_rows > 0) {
      while ($category_data = $category_rs->fetch_assoc()) {

        $category_id = $category_data["cat_id"];

        $product_rs = "SELECT * FROM `product` INNER JOIN `color` ON product.color_id = color.id INNER JOIN `stock` ON `product`.`id` = `stock`.`product_id` WHERE `category_cat_id`='$category_id' ORDER BY `datetime_added`";
        $product_result = $conn->query($product_rs);

        if ($product_result->num_rows > 0) {
          while ($row = $product_result->fetch_assoc()) {
            echo '<div class="product-card">';
            echo '<a href="singleProductView.php?s=' . $row["stock_id"] . '"><div><img src="' . $row["img_path"] . '" alt="Product Image"></div></a>';
            echo '<div class="product-info">';
            echo '<h2>' . $row["title"] . '</h2>';
            if ($row["storage_id"] == 1) {
              echo '<p class="desc">128GB | ' . $row["clr_name"] . '</p>';
            } elseif ($row["storage_id"] == 2) {
              echo '<p class="desc">256GB | ' . $row["clr_name"] . '</p>';
            } elseif ($row["storage_id"] == 3) {
              echo '<p class="desc">512GB | ' . $row["color_clr_name"] . '</p>';
            } elseif ($row["storage_id"] == 4) {
              echo '<p class="desc">1TB | ' . $row["clr_name"] . '</p>';
            } else {
              echo '<p class="desc">....</p>';
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
            </div></div></div>
            <?php
          }
        }
      }
    }

    $conn->close();

    ?>
  </div>


  <?php include "footer.php" ?>


</body>

</html>