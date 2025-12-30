<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iHeaven - Admin SignIn</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="resources/a.png">

</head>

<body class="main-body">

    <div class="title01">
        Welcome to iHeaven
    </div>

    <div class="logo"></div>

    <div class="container" id="signInBox">
        <h2>Admin Log In</h2>

        <div class="col-12 d-none" id="amsgdiv">
            <div class="alert alert-danger" role="alert" id="amsg"></div>
        </div>

        <form action="#">
            <input type="text" placeholder="Email" id="em"/>
            <input type="password" placeholder="Password" id="pw"/>

            <div class="buttons">
                <button class="btn1" type="button" onclick="adminSignIn();">Sign In</button>
            </div>
        </form>
    </div>

   <script src="script.js"></script> 
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>