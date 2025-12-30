<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylehd.css">
</head>

<body>
  <footer>
    <nav class="navbar1">
      <div class="brand">
        <?php
        include "connection.php";
        session_start();

        if (isset($_SESSION["u"])) {
          $data = $_SESSION["u"];

          $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $data["id"] . "'");
          $b = $rs->fetch_assoc();


        ?>
          <div>
            <button class="btn3" onclick="signout();">Signout</button> |
            <span class="logo2">iHeaven</span>
          </div>
        <?php
        } else {

        ?>
          <div>
            <button class="btn3" id="changePageButton">Sign In</button> |
            <span class="logo2">iHeaven</span>
          </div>
        <?php
        }

        ?>
      </div>
      <div id="menu-toggle" class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
      </div>
      <ul class="menu">
        <li><a href="home.php" class="link">Home</a></li>
        <li><a href="iphone.php" class="link">iPhone</a></li>
        <li><a href="ipad.php" class="link">iPad</a></li>
        <li><a href="macbook.php" class="link">MacBook</a></li>
        <li><a href="iwatch.php" class="link">iWatch</a></li>
        <li><a href="airpods.php" class="link">AirPods</a></li>
        <li><a href="appletv.php" class="link">Tv & Home</a></li>
        <li><a href="cart.php" class="link"><i class="bi bi-cart-fill"></i></a></li>
        <li><a href="orderhistory.php" class="link"><i class="bi bi-clock-history"></i></a></li>
        <li><a href="profile.php" class="link"><img src="<?php
                                                          if (!empty($b["profile_img"])) {
                                                            echo $b["profile_img"];
                                                          } else {
                                                            echo ("resources/profileImg/profile.png");
                                                          }
                                                          ?>" class="profile-image"></a></li>
      </ul>
    </nav>
  </footer>
  <script src="script.js"></script>
</body>

</html>