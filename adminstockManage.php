<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iHeaven - Admin Stock Management</title>

    <link rel="stylesheet" href="stylehd.css">
    <link rel="stylesheet" href="bootstrap.css">

    <link rel="icon" href="resources/a.png">
</head>

<body class="adminBody">
    <?php

    session_start();
    include "connection.php";

    if (isset($_SESSION["a"])) {

    ?>
        <?php include "adminHeader.php"; ?>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center">Product Registration</h2>
                    <form>
                        <div class="d-none" id="amsgDiv" onclick="reload();">
                            <div class="alert alert-danger" id="amsg"></div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label " for="pname">Product Name</label>
                            <input id="pname" type="text" class="form-control bg-transparent">
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label class="form-label" for="cat">Category</label>
                                <select id="cat" class="form-select bg-transparent">
                                    <option value="0">Select</option>
                                    <?php
                                    $rs = Database::search("SELECT * FROM `category`");
                                    $num = $rs->num_rows;
                                    for ($x = 0; $x < $num; $x++) {
                                        $data = $rs->fetch_assoc();
                                        echo "<option value=\"{$data['cat_id']}\">{$data['cat_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label class="form-label" for="mod">Model</label>
                                <select id="mod" class="form-select bg-transparent">
                                    <option value="0">Select</option>
                                    <?php
                                    $rs = Database::search("SELECT * FROM `model`");
                                    $num = $rs->num_rows;
                                    for ($x = 0; $x < $num; $x++) {
                                        $data = $rs->fetch_assoc();
                                        echo "<option value=\"{$data['model_id']}\">{$data['model_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label class="form-label" for="st">Storage</label>
                                <select id="st" class="form-select bg-transparent">
                                    <option value="0">Select</option>
                                    <?php
                                    $rs = Database::search("SELECT * FROM `storage`");
                                    $num = $rs->num_rows;
                                    for ($x = 0; $x < $num; $x++) {
                                        $data = $rs->fetch_assoc();
                                        echo "<option value=\"{$data['id']}\">{$data['storage_size']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-md-6">
                                <label class="form-label" for="clr">Colour</label>
                                <select id="clr" class="form-select bg-transparent">
                                    <option value="0">Select</option>
                                    <?php
                                    $rs = Database::search("SELECT * FROM `color`");
                                    $num = $rs->num_rows;
                                    for ($x = 0; $x < $num; $x++) {
                                        $data = $rs->fetch_assoc();
                                        echo "<option value=\"{$data['id']}\">{$data['clr_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="df">Delivery Fee</label>
                            <input id="df" type="text" class="form-control bg-transparent">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label class="form-label" for="file">Product Image</label>
                                <input id="file" type="file" class="form-control bg-transparent">
                            </div>
                        </div>
                        <div class="d-grid mb-2">
                            <button type="button" class="btn btn-outline-dark col-12 rounded-5" onclick="regProduct();">Register Product</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2 class="text-center mt-2 mb-0">Stock Update</h2>
                    <form>
                        <div class="d-none" id="smsgDiv" onclick="reload();">
                            <div class="alert alert-danger" id="smsg"></div>
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="pname_stock">Product Name</label>
                            <select id="selectProduct" class="form-select bg-transparent">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `product`");
                                $num = $rs->num_rows;
                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                    echo "<option value=\"{$data['id']}\">{$data['title']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mb-5 col-6 mt-2">
                                <label class="form-label" for="qty">Qty</label>
                                <input id="qty" type="text" class="form-control bg-transparent">
                            </div>
                            <div class="mb-5 col-6 mt-2">
                                <label class="form-label" for="unit_price">Unit Price</label>
                                <input id="unit_price" type="text" class="form-control bg-transparent">
                            </div>
                        </div>
                        <div class="d-grid mt-2">
                            <button type="button" class="btn btn-outline-dark col-12 rounded-5" onclick=" updateStock();">Update Stock</button>
                        </div>
                    </form>
                </div>
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