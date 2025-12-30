<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehd.css">
    <link rel="stylesheet" href="bootstrap.css">
    <title>iHeaven - Stock Report</title>

    <link rel="icon" href="resources/a.png">
</head>

<body class="adminBodystock">
    <?php

    include "connection.php";
    session_start();

    if (isset($_SESSION["a"])) {

        $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`");
        $num = $rs->num_rows;

    ?>
        <div class="container mt-3">
        <button class="btn btn-outline-dark rounded-5 col-sm-2 col-md-1 col-lg-1 d-block" id="backbtn" onclick="backbtn()">Back</button>
            <h2 class="text-center">Stock Report</h2>
            <div class="table-responsive mt-5">
                <table class="table table-striped table-bordered">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>Stock Id</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d["id"]; ?></td>
                                <td><?php echo $d["title"]; ?></td>
                                <td><?php echo $d["qty"]; ?></td>
                                <td><?php echo $d["price"]; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end container mt-3 mb-5 d-block" id="print">
            <button class="btn btn-outline-dark col-2 rounded-5" onclick="printTable();">Print</button>
        </div>


    <?php
    } else {
    ?>

        <div class="adminError">
            <h1>Error</h1>
            <p>You Are Not a Valid Vdmin</p>
        </div>

    <?php
    }

    ?>


    <!-- footer  -->
    <div class="fixed-bottom col-12 d-block" id="footer">
        <p class="text-center mb-0 py-2">&copy; 2024 iHeaven.lk || All Right Reserved</p>
    </div>
    <!-- footer  -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>