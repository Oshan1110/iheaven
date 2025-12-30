
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="resources/a.png">
</head>

<body class="home-body" onload="loadCart();">

    <?php
    include "header.php";
    include "connection.php";

    $user = $_SESSION["u"];

    if (isset($user)) {
    ?>

        <h2 class="wishtext">SHOPPING CART</h2>

        <!-- card  -->
        <div class="ssproduct-container" id="cartBody">
            
        </div>
        <!-- card  -->
        

        

        


        <?php include "footer.php" ?>

        <script src="scriptH.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</body>

</html>

<?php


    } else {
        header("location: index.php");
    }


?>