let slideIndex = 0;
const slides = document.querySelectorAll('.carousel-slide img');

function showSlides() {
  if (slideIndex >= slides.length) {
    slideIndex = 0;
  } else if (slideIndex < 0) {
    slideIndex = slides.length - 1;
  }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = 'none';
  }

  slides[slideIndex].style.display = 'block';
}

function nextSlide() {
  slideIndex++;
  showSlides();
}

function prevSlide() {
  slideIndex--;
  showSlides();
}

setInterval(nextSlide, 9000);

showSlides();

const words = ["IPHONE", "IPAD", "MACBOOK", "AIRPOD", "TV & HOME"];
const el = document.querySelector("#typewriter");

const sleepTime = 100;
let currWordIndex = 0;

const sleep = (time) => {
  return new Promise((resolve) => setTimeout(resolve, time));
};

const effect = async () => {
  while (true) {
    currWord = words[currWordIndex];

    for (let i = 0; i < currWord.length; i++) {
      el.innerText = currWord.substring(0, i + 1);
      await sleep(sleepTime);
    }

    await sleep(1500);

    if (currWordIndex >= words.length - 1) {
      currWordIndex = 0;
      await sleep(2000);
    } else currWordIndex++;
  }
};

effect();

function search(x) {

  var txt = document.getElementById("search_txt");

  var form = new FormData();
  form.append("t", txt.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      document.getElementById("searchResult").innerHTML = response;
    }
  }

  request.open("POST", "searchResult.php", true);
  request.send(form);
}

function filterButton() {
  var advsearch = document.getElementById("advsearchdiv");
  if (advsearch.style.display === 'none') {
    advsearch.style.display = 'block';
  } else {
    advsearch.style.display = 'none';
  }
};

function advSearch(x) {

  var cat = document.getElementById("category");
  var model = document.getElementById("model");
  var storage = document.getElementById("storage");
  var color = document.getElementById("color");
  var min = document.getElementById("min");
  var max = document.getElementById("max");

  var f = new FormData();
  f.append("cat", cat.value);
  f.append("mod", model.value);
  f.append("st", storage.value);
  f.append("c", color.value);
  f.append("min", min.value);
  f.append("max", max.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("searchResult").innerHTML = response;
      cat.value = "0";
      model.value = "0";
      storage.value = "0";
      color.value = "0";
      min.value = "";
      max.value = "";
    }
  };

  request.open("POST", "advSearchProductProcess.php", true);
  request.send(f);
}

function updateData() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var pw = document.getElementById("pw");
  var no = document.getElementById("no");
  var city = document.getElementById("city");
  var address = document.getElementById("address");

  var f = new FormData();
  f.append("f", fname.value);
  f.append("l", lname.value);
  f.append("e", email.value);
  f.append("m", mobile.value);
  f.append("p", pw.value);
  f.append("n", no.value);
  f.append("c", city.value);
  f.append("ad", address.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      if (response == "success") {
        swal("Successfull", response, "success");
        var modal = document.getElementById("fpmodal");
      } else {
        swal("", response, "error");
        var modal = document.getElementById("fpmodal");
      }
    }
  };

  request.open("POST", "updateDataProcess.php", true);
  request.send(f);
}

function uploadImg() {
  var img = document.getElementById("imgUploader");

  var f = new FormData();
  f.append("i", img.files[0]);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      if (response == "empty") {
        swal("Please Select Your Profile Image", response, "error");
        var modal = document.getElementById("fpmodal");
      } else {
        document.getElementById("i").src = response;
        img.value = "";
        reload();
      }
    }
  };

  request.open("POST", "profileImgUploader.php", true);
  request.send(f);
}

function loadCart() {
  // alert("ok");

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      // alert(response);
      document.getElementById("cartBody").innerHTML = response;
    }
  }

  request.open("POST", "loadCartProcess.php", true);
  request.send();
}

function incrementcartqty(x) {
  // alert(x);

  var cartId = x;
  var qty = document.getElementById("qty" + x);

  var newQty = parseInt(qty.value) + 1;
  // alert(newQty);

  var f = new FormData();
  f.append("cid", cartId);
  f.append("q", newQty);
  // alert(qty.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        qty.value = parseInt(qty.value) + 1;
        loadCart();
      } else if(response === "Success") {
        swal("Success", response, "success");
      }else if(response === "Your Product Qty Excceded!"){
        swal("Error", response, "error");
      }
    }
  }

  request.open("POST", "incrementcartqtyprocess.php", true);
  request.send(f);
}

function addtoCart(x) {
  //  alert(x);

  var stockId = x;
  var qty = document.getElementById("qty");

  if (qty.value > 0) {
    // alert("ok");

    var f = new FormData();
    f.append("s", stockId);
    f.append("q", qty.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        // alert(responece);
        if (response) {
          if (response === "Cart Item Added Successfully") {
            swal("Success", response, "success");
          } else if (response === "Out Of Stock!") {
            swal("Error", response, "error");
          }
        }


        qty.value = "1";

      }
    }

    request.open("POST", "addtoCartProcess.php", true);
    request.send(f);

  } else {
    swal({
      title: "",
      text: "Please Enter Valid Quantity",
      icon: "warning"
    });
  }

}

function decrementcartqty(x) {
  var cartId = x;
  var qty = document.getElementById("qty" + x);

  var newQty = parseInt(qty.value) - 1;
  //alert(newQty);

  var f = new FormData();
  f.append("cid", cartId);
  f.append("q", newQty);
  // alert(qty.value);
  if (newQty > 0) {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.status == 200 && request.readyState == 4) {
        var response = request.responseText;
        // alert(response);
        if (response == "Success") {
          qty.value = parseInt(qty.value) - 1;
          loadCart();
        } else {
          alert(response);
        }
      }
    }

    request.open("POST", "incrementcartqtyprocess.php", true);
    request.send(f);
  }

}

function removefromcart(x) {
  // alert(x);
  var f = new FormData();
  f.append("c", x);
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      swal({
        title: "Item Deleted!",
        text: response,
        icon: "success"
      }).then(function () {
        reload();
      });

    }
  }

  request.open("POST", "RemoveCartprocess.php", true);
  request.send(f);
}

function checkOut() {
 
  var f = new FormData();
  f.append("cart", true);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.status == 200 && request.readyState == 4) {
          var responese = request.responseText;
          // alert(responese);
          var payment = JSON.parse(responese);
          doCheckout(payment,"checkoutProcess.php");
          
      }
  }

  request.open("POST", "PaymentProcess.php", true);
  request.send(f);
}

function doCheckout(payment,path) {

  payhere.onCompleted = function onCompleted(orderId) {
      console.log("Payment completed. OrderID:" + orderId);
      // Note: validate the payment and show success or failure page to the customer

      var f = new FormData();
      f.append("payment", JSON.stringify(payment));
  
      var request = new XMLHttpRequest();
      request.onreadystatechange = function () {
          if (request.status == 200 && request.readyState == 4) {
              var responese = request.responseText;
              var order = JSON.parse(responese);
               if (order.resp == "Success") {
                  // reload();
                  window.location = "invoice.php?orderId="+order.order_id;
               } else {
                  alert(responese);
               }    
          }
      }
  
      request.open("POST", path, true);
      request.send(f);

  };
  // Payment window closed
  payhere.onDismissed = function onDismissed() {
      // Note: Prompt user to pay again or show an error page
      console.log("Payment dismissed");
  };
  // Error occurred
  payhere.onError = function onError(error) {
      // Note: show an error page
      console.log("Error:"  + error);
  };
      payhere.startPayment(payment);
}

function buyNow(stockId){
  // alert(stockId);

  var qty = document.getElementById("qty");

  if (qty.value > 0) {
    
    var f = new FormData();
    f.append("cart",false);
    f.append("stockId",stockId);
    f.append("qty",qty.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
      if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;
        // alert(response); 
        var payment = JSON.parse(response);
        payment.stock_id = stockId;
        payment.qty = qty.value;
        doCheckout(payment,"buynowProcess.php");
      }
    };

    request.open("POST","PaymentProcess.php",true);
    request.send(f);

  } else {
    swal({
      title: "",
      text: "Please Enter Valid Quantity",
      icon: "warning"
    });
  }


}