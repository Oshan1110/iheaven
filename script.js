function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");
}

function signup() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");

    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("m", mobile.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "success") {
                document.getElementById("msg").innerHTML = "Registration Success !";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
                fname.value = "";
                lname.value = "";
                email.value = "";
                password.value = "";
                mobile.value = "";
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);
}

function signin() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var form = new FormData();
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("r", rememberme.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "Login Success";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgdiv2").className = "d-block";

                window.location = "home.php"
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgdiv2").className = "d-block";
            }
        }
    }

    request.open("POST", "signInProcess.php", true);
    request.send(form);
}

var forgotPasswordmodal;
function forgotPassword() {

    var email = document.getElementById("email2").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response === "success") {
                swal("Email sent successfully. Check your Inbox", "", "success");
                var modal = document.getElementById("fpmodal");
                forgotPasswordmodal = new bootstrap.Modal(modal);
                forgotPasswordmodal.show();
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgdiv2").className = "d-block";
            }
            
        }
    }

    request.open("GET", "forgotPasswordProcess.php?e=" + email, true);
    request.send();
}

function showPassword() {

    var textfield = document.getElementById("np");
    var button = document.getElementById("npb");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = "Hide";
    } else {
        textfield.type = "password";
        button.innerHTML = "Show";
    }
}

function showPassword2() {

    var textfield = document.getElementById("rnp");
    var button = document.getElementById("rnpb");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = "Hide";
    } else {
        textfield.type = "password";
        button.innerHTML = "Show";
    }
}

function resetPassword() {

    var email = document.getElementById("email2");
    var newpassword = document.getElementById("np");
    var retypepassword = document.getElementById("rnp");
    var verificationcode = document.getElementById("vcode");

    var form = new FormData();
    form.append("e", email.value);
    form.append("n", newpassword.value);
    form.append("r", retypepassword.value);
    form.append("v", verificationcode.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                swal("Password updated successfully", "", "success");
            } else {
                swal(response);
            }
        }
    }

    request.open("POST", "resetPasswordProcess.php", true);
    request.send(form);
}

function signout() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {

            var response = request.responseText;

            if (response == "success") {
                window.location.reload();
            }
        }
    }

    request.open("GET", "signOutProcess.php", true);
    request.send();
}
 document.getElementById("menu-toggle").addEventListener("click", function () {
    this.classList.toggle("active");
});
 document.getElementById("changePageButton").addEventListener("click", function () {
     window.location.href = "index.php";
});
function dropdown() {
    const menu = document.getElementById("menu");

    if (menu.classList.contains("show")) {
        menu.classList.remove("show");
        menu.classList.add("hide");
    } else {
        menu.classList.remove("hide");
        menu.classList.add("show");
    }
}

function adminSignIn() {

    var em = document.getElementById("em");
    var pw = document.getElementById("pw");

    var f = new FormData();
    f.append("e", em.value);
    f.append("p", pw.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                window.location = "adminDashboard.php";
            } else {
                document.getElementById("amsg").innerHTML = response;
                document.getElementById("amsgdiv").className = "d-block";
            }
        }
    };

    request.open("POST", "adminSignInProcess.php", true);
    request.send(f);
}

function loadUser() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("tb").innerHTML = response;
        }
    };

    request.open("POST", "loadUserProcess.php", true);
    request.send();
}

function updateuserstatus() {
    var userid = document.getElementById("uid");

    var f = new FormData();
    f.append("u", userid.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (response == "Deactive") {
                document.getElementById("msg").innerHTML = "User Deactivate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();
            } else if (response == "Active") {
                document.getElementById("msg").innerHTML = "User Activate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };

    request.open("POST", "updateUSProcess.php", true);
    request.send(f);
}

function reload() {
    location.reload();
}

function catReg() {
    var category = document.getElementById("category");

    var f = new FormData();
    f.append("cat", category.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Category Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";
                category.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    };

    request.open("POST", "catRegProcess.php", true);
    request.send(f);
}

function clrReg() {
    var color = document.getElementById("colour");

    var f = new FormData();
    f.append("clr", color.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "Colour Registration Successfully";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
                color.value = "";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    };

    request.open("POST", "clrRegProcess.php", true);
    request.send(f);
}

function modelReg() {
    var model = document.getElementById("model");

    var f = new FormData();
    f.append("mdl", model.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "Model Registration Successfully";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";
                model.value = "";
            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgDiv3").className = "d-block";
            }
        }
    };

    request.open("POST", "mdlRegProcess.php", true);
    request.send(f);
}

function strgReg() {
    var storage = document.getElementById("storage");

    var f = new FormData();
    f.append("strg", storage.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                document.getElementById("msg4").innerHTML = "Storage Registration Successfully";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";
                storage.value = "";
            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msgDiv4").className = "d-block";
            }
        }
    };

    request.open("POST", "strgRegProcess.php", true);
    request.send(f);
}

function regProduct() {

    var pname = document.getElementById("pname");
    var cat = document.getElementById("cat");
    var model = document.getElementById("mod");
    var st = document.getElementById("st");
    var color = document.getElementById("clr");
    var df = document.getElementById("df");
    var file = document.getElementById("file");

    var form = new FormData();
    form.append("pname", pname.value);
    form.append("cat", cat.value);
    form.append("mod", model.value);
    form.append("st", st.value);
    form.append("clr", color.value);
    form.append("df", df.value);
    form.append("image", file.files[0]);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var response = req.responseText;
            if (response == "Success") {
                document.getElementById("amsg").innerHTML = "Product Added Successfully";
                document.getElementById("amsg").className = "alert alert-success";
                document.getElementById("amsgDiv").className = "d-block";
                storage.value = "";
            } else {
                document.getElementById("amsg").innerHTML = response;
                document.getElementById("amsgDiv").className = "d-block";
            }
        }
    };

    req.open("POST", "productRegProcess.php", true);
    req.send(form);
}

function updateStock() {
    var pname = document.getElementById("selectProduct");
    var qty = document.getElementById("qty");
    var price = document.getElementById("unit_price");

    var f = new FormData();
    f.append("p", pname.value);
    f.append("q", qty.value);
    f.append("up", price.value);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var response = req.responseText;
            if (response == "Success1") {
                document.getElementById("smsg").innerHTML = "Stock Updated Successfully";
                document.getElementById("smsg").className = "alert alert-success";
                document.getElementById("smsgDiv").className = "d-block";
            } else if (response == "Success2") {
                document.getElementById("smsg").innerHTML = "New Stock Added Successfully";
                document.getElementById("smsg").className = "alert alert-success";
                document.getElementById("smsgDiv").className = "d-block";
            } else {
                document.getElementById("smsg").innerHTML = response;
                document.getElementById("smsgDiv").className = "d-block";
            }
        }
    };

    req.open("POST", "updateStockProcess.php", true);
    req.send(f);
}

function printTable() {
    document.getElementById("backbtn").className = "d-none";
    document.getElementById("footer").className = "d-none";
    document.getElementById("print").className = "d-none";
    window.print();
    window.location.reload();
}

function backbtn() {
    window.location = "adminReportManage.php";
}

function updateqty() {
    alert ("ok");
}

function printinvoice(){
    document.getElementById("hbtn").className = "d-none";
    document.getElementById("pbtn").className = "d-none";
    window.print();
    window.location.reload();
}