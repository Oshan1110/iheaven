<?php

session_start();

if (isset($_SESSION["a"])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Store - Admin Dashboard</title>
        <link rel="stylesheet" href="stylehd.css" />
        <link rel="stylesheet" href="bootstrap.css" />
    </head>

    <body class="adminBody">
        <!-- nav bar -->
        <?php include "adminHeader.php" ?>
        <!-- nav bar -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <h2 class="text-center">Reports</h2>

                    <div class="row d-flex justify-content-center mt-5">
                        <div class="col-md-4 mt-2">
                            <a href="adminStockReport.php"><button class="btn btn-outline-dark rounded-5 col-12">Stock Report</button></a>
                        </div>

                        <div class="col-md-4 mt-2">
                            <a href="adminProductReport.php"><button class="btn btn-outline-dark rounded-5 col-12">Product Report</button></a>
                        </div>

                        <div class="col-md-4 mt-2">
                            <a href="adminUserReport.php"><button class="btn btn-outline-dark rounded-5 col-12">User Report</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer  -->
        <div class="fixed-bottom col-12">
            <p class="text-center mb-0 py-2">&copy; 2024 iHeaven.lk || All Right Reserved</p>
        </div>
        <!-- footer  -->


        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php

} else {
    echo ("You are not a Valid Admin");
}

?>