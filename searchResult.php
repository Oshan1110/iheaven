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
    $conn = new mysqli("localhost", "root", "Adhiya2003#", "iheaven", "3306");

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $txt = $_POST['t'];

    $query = "SELECT * FROM `product` INNER JOIN `color` ON product.color_id = color.id INNER JOIN `stock` ON `product`.`id` = `stock`.`product_id` WHERE title LIKE '%$txt%'";

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