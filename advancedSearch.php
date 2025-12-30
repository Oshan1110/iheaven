<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>

    <!-- advanced search  -->
    <div class="d-none" id="filterId">
        <div class="border border-dark rounded-3 mt-4 p-5 col-10 offset-1">

            <div class="row col-12 ">
                <div class="row col-6 ms-auto">
                    <label class="col-3 form-label">Color:</label>
                    <select name="form-select" class="form-select col-9" id="color">
                        <option value="0">Select Color</option>
                        <?php

                        $rs = Database::search("SELECT * FROM `color`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <option value="<?php echo $d["id"] ?>"><?php echo $d["clr_name"] ?></option>
                        <?php

                        }

                        ?>

                    </select>
                </div>

                <div class="row col-6 ms-auto">
                    <label class="col-3 form-label">Category:</label>
                    <select class="form-select col-9" id="cat">
                        <option value="0">Select Category</option>
                        <?php
                        $rs2 = Database::search("SELECT * FROM `category`");
                        $num2 = $rs2->num_rows;

                        for ($i = 0; $i < $num2; $i++) {
                            $d2 = $rs2->fetch_assoc();
                        ?>
                            <option value="<?php echo $d2["cat_id"] ?> "><?php echo $d2["cat_name"] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row col-12 mt-4">
                <div class="row col-6 ms-auto">
                    <label class="col-3 form-label">Storage:</label>
                    <select name="form-select" class="form-select col-9" id="brand">
                        <option value="0">Select Barnd</option>
                        <?php
                        $rs3 = Database::search("SELECT * FROM `storage`");
                        $num3 = $rs3->num_rows;

                        for ($i = 0; $i < $num3; $i++) {
                            $d3 = $rs3->fetch_assoc();
                        ?>
                            <option value="<?php echo $d3["id"] ?> "><?php echo $d3["storage_size"] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="row col-6 ms-auto">
                    <label class="col-3 form-label">Model:</label>
                    <select class="form-select col-9" id="size">
                        <option value="0">Select Size</option>
                        <?php
                        $rs4 = Database::search("SELECT * FROM `model`");
                        $num4 = $rs4->num_rows;

                        for ($i = 0; $i < $num4; $i++) {
                            $d4 = $rs4->fetch_assoc();
                        ?>
                            <option value="<?php echo $d4["model_id"] ?> "><?php echo $d4["model_name"] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mt-4 row col-12 m-auto">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Min Price" id="min" />
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Max Price" id="max" />
                </div>
                <button class="btn btn-outline-dark col-2" onclick="advSearchProduct(0);">Search</button>
            </div>
        </div>
    </div>
    <!-- advanced search  -->

</body>

</html>