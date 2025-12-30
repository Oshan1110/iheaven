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
        <!-- nav bar -->
        <?php include "adminHeader.php" ?>
        <!-- nav bar -->

        <div class="container">
            <h2 class="text-center mt-5">Product Management</h2>

            <div class="row mt-5">
                <!-- category register -->
                <div class="col-md-4 offset-md-1 col-12 mt-4">
                    <label for="category" class="form-label fw-bold">Category:</label>
                    <input type="text" class="form-control mb-3 bg-transparent" id="category" />

                    <div class="d-none" id="msgDiv1">
                        <div class="alert alert-danger" id="msg1" onclick="reload();"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-dark col-12 rounded-5" onclick="catReg();">Category Register</button>
                    </div>
                </div>
                <!-- category register -->

                <!-- color register -->
                <div class="col-md-4 offset-md-2 col-12 mt-4">
                    <label for="colour" class="form-label fw-bold">Colour:</label>
                    <input type="text" class="form-control mb-3 bg-transparent" id="colour" />

                    <div class="d-none" id="msgDiv2">
                        <div class="alert alert-danger" id="msg2" onclick="reload();"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-dark col-12 rounded-5" onclick="clrReg();">Colour Register</button>
                    </div>
                </div>
                <!-- color register -->
            </div>

            <div class="row mt-5">
                <!-- model register -->
                <div class="col-md-4 offset-md-1 col-12 mt-4">
                    <label for="model" class="form-label fw-bold">Model:</label>
                    <input type="text" class="form-control mb-3 bg-transparent" id="model" />

                    <div class="d-none" id="msgDiv3">
                        <div class="alert alert-danger" id="msg3" onclick="reload();"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-dark col-12 rounded-5" onclick="modelReg();">Model Register</button>
                    </div>
                </div>
                <!-- model register -->

                <!-- storage register -->
                <div class="col-md-4 offset-md-2 col-12 mt-4">
                    <label for="storage" class="form-label fw-bold">Storage:</label>
                    <input type="text" class="form-control mb-3 bg-transparent" id="storage" />

                    <div class="d-none" id="msgDiv4">
                        <div class="alert alert-danger" id="msg4" onclick="reload();"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-dark col-12 rounded-5" onclick="strgReg();">Storage Register</button>
                    </div>
                </div>
                <!-- storage register -->
            </div>
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
    <div class="fixed-bottom col-12">
        <p class="text-center mb-0 py-2">&copy; 2024 iHeaven.lk || All Right Reserved</p>
    </div>
    <!-- footer  -->

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>