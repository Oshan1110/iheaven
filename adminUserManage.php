<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehd.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <title>iHeaven - Admin User Managent</title>

    <link rel="icon" href="resources/a.png">
</head>

<body class="adminBody" onload="loadUser();">

    <?php

    session_start();

    if (isset($_SESSION["a"])) {

    ?>

        <?php include "adminHeader.php" ?>

        <div class="col-10">
            <h2 class="text-center mt-4">User Management</h2>

            <div class="row d-flex justify-content-end mt-4">
                <div class="d-none" id="msgDiv" onclick="reload();">
                    <div class="alert alert-danger" id="msg"></div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 mb-2 mb-md-0">
                    <input type="text" class="form-control bg-transparent" placeholder="User Id" id="uid">
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <button class="btn btn-outline-dark btn-block rounded-5" onclick="updateuserstatus();">Change Status</button>
                </div>
            </div>

            <div class="mt-3">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">User Id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Joined Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody id="tb">
                        </tbody>
                    </table>
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
            <p class="text-center">&copy; 2024 iHeaven.lk || All Right Reserved</p>
        </div>
        <!-- footer  -->

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>