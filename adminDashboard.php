<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehd.css">
    <link rel="stylesheet" href="bootstrap.css">
    <title>iHeaven - Admin Product Management</title>

    <link rel="icon" href="resources/a.png">
</head>

<body class="adminBody">

    <?php

    include "connection.php";
    session_start();

    if (isset($_SESSION["a"])) {

    ?>

        <?php include "adminHeader.php";


        $q = "SELECT * FROM stock INNER JOIN product ON stock.product_id = product.id INNER JOIN category 
        ON product.category_cat_id = category.cat_id
        INNER JOIN color ON product.color_id = color.id INNER JOIN model ON product.model_model_id = model.model_id 
        INNER JOIN `storage` ON product.storage_id = `storage`.id";

        $rs = Database::search($q);
        if ($rs) {
            while ($d = $rs->fetch_assoc()) {
                if ($d["qty"] == 0) {
        ?>
                    <div class="container fixed-top mt-5">
                        <div class="row">
                            <div class="col-12 text-center mt-5 text-light">
                                <h3>Out Of stock Products</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 mt-5 d-flex justify-content-center">
                        <div class="rounded-4 card bg-transparent border-dark" style="width: 300px;">
                            <img src="<?php echo $d["img_path"]; ?>" class="card-img-top mx-auto d-block mt-2" style="width: 180px;" />
                            <div class="card-body">
                                <h5 class="cart-title fw-bold"><?php echo $d["title"]; ?></h5>
                                <p class="card-text fw-bold"><?php echo $d["storage_size"]; ?></p>
                                <p class="card-text fw-bold"><?php echo $d["clr_name"]; ?></p>
                                <p class="card-text fw-bold">Rs:<?php echo $d["price"]; ?>.00</p>
                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        }
    } else {
        ?>

        <div class="adminError">
            <h1>Error</h1>
            <p>You Are Not a Valid Admin</p>
        </div>

    <?php
    }

    ?>


    <!-- footer  -->
    <div class="fixed-bottom col-12">
        <p class="text-center mb-0 py-2">&copy; 2024 iHeaven.lk || All Right Reserved</p>
    </div>
    <!-- footer  -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>