<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iHeaven</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="resources/a.png">

</head>

<body class="main-body">

    <div class="title01">
        Welcome to iHeaven
    </div>

    <div class="logo"></div>

    <div class="d-none d-lg-block background"></div>
    <div class="container" id="signUpBox">
        <h2>Create new account</h2>
        <div class="col-12 d-none" id="msgdiv" onclick="reload();">
            <div class="alert alert-danger" role="alert" id="msg"></div>
        </div>
        <form action="#">
            <input type="text" placeholder="First Name" id="fname" />
            <input type="text" placeholder="Last Name" id="lname" />
            <input type="email" placeholder="Email" id="email" />
            <input type="password" placeholder="Password" id="password" />
            <input type="tel" placeholder="Mobile Number" id="mobile" />
            <div class="buttons">
                <button class="btn1" type="button" onclick="signup();">Sign Up</button>
                <button class="btn2" type="button" onclick="changeView();">Already have an account?</button>
            </div>
        </form>
    </div>

    <div class="d-none container" id="signInBox">
        <h2>Sign In</h2>

        <div class="col-12 d-none" id="msgdiv2" onclick="reload();">
            <div class="alert alert-danger" role="alert" id="msg2"></div>
        </div>

        <?php
        
        $email ="";
        $password ="";

        if(isset($_COOKIE["email"])){
            $email = $_COOKIE["email"];
        }

        if(isset($_COOKIE["password"])){
            $password = $_COOKIE["password"];
        }     
        
        ?>

        <form action="#">
            <input type="email" placeholder="Email" id="email2" value="<?php echo $email; ?>" />
            <input type="password" placeholder="Password" id="password2" value="<?php echo $password; ?>" />

            <div class="col-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberme" />
                    <label class="form-check-label">Remember Me</label>
                </div>
            </div>
            <div class="col-12 text-end">
                <a href="#" class="link-primary l1" onclick="forgotPassword();">Forgot Password?</a>
            </div>

            <div class="buttons">
                <button class="btn1" type="button" onclick="signin();">Sign In</button>
                <button class="btn2" onclick="changeView();">New user? Join Now</button>
            </div>
        </form>
    </div>
    <!-- modal -->

        <div class="modal" tabindex="-1" id="fpmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Forgot Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">

                            <div class="col-6">
                                <label class="form-label">New Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="np" />
                                    <button id="npb" class="btn btn-outline-secondary" onclick="showPassword();">Show</button>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Re-Type New Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="rnp" />
                                    <button id="rnpb" class="btn btn-outline-secondary" onclick="showPassword2();">Show</button>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="from-control" id="vcode"/>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- modal -->

   <script src="script.js"></script>  
   <script src="bootstrap.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
