<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="resources/a.png">
</head>

<body class="home-body">

    <?php
    include "header.php";
    include "connection.php";
    $user = $_SESSION["u"];

    if (isset($_SESSION["u"])) {

        $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
        $d = $rs->fetch_assoc();


    ?>

        <div class="pcontainer">
            <h2 class="ptitle">User Profile Update</h2></br>
            <div class="d-none" id="msgDiv">
                <div class="alert alert-danger" id="msg" onclick="reload();"></div>
            </div>
            <div class="form-group">
                <input type="text" id="fname" value="<?php echo $d["fname"] ?>" placeholder="First Name">
                <input type="text" id="lname" value="<?php echo $d["lname"] ?>" placeholder="Last Name">
                <input type="email" id="email" value="<?php echo $d["email"] ?>" placeholder="Email" disabled>
                <input type="password" id="pw" value="<?php echo $d["password"] ?>" placeholder="Password" disabled>
                <input type="tel" id="mobile" value="<?php echo $d["mobile"] ?>" placeholder="Mobile">
                <h2 class="ptitle">Shipping Address</h2>
                <input type="text" id="city" placeholder="City">
                <input type="text" id="no" placeholder="No">
                <input type="text" id="address" placeholder="Address">
            </div>
            <button type="button" class="updateprofile" onclick="updateData();">Update Profile</button>

        </div>
        <div>
            <div class="image-upload">
                <img src="<?php
                            if (!empty($d["profile_img"])) {
                                echo $d["profile_img"];
                            } else {
                                echo ("resources/profile.png");
                            }
                            ?>" id="i" class="profileImg"></br>
                <label for="imgUploader">Pick Your Image</label>
                <input type="file" id="imgUploader">
                <button type="button" class="updateimg" onclick="uploadImg()" ;>Update Image</button>
            </div>
        </div>



        <?php include "footer.php" ?>

        <script src="scriptH.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>

<?php

    } else {

        header("location: index.php");
    }

?>