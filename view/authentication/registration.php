<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<?php include_once('../shared/head.php'); ?>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
  	<link href="./authentication.css" rel="stylesheet" type="text/css" media="all">
  	<link href="../../css/toastr.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <?php include_once('../shared/header.php'); ?>

    <div class="registrationForm">
        <h3 class="formTitle">Registration Form</h3>
        <form method="POST" action="/service/authentication-service.php">
            <div class="componentWrapper">
                <div class="inputBox">
                    <input type="text" id='fullName' name="fullName" value="">
                    <label>Full Name</label>
                </div>
                <div class="inputBox">
                    <input type="text" id='username' name="username" value="">
                    <label>Username</label>
                </div>
            </div>
            <div class="componentWrapper">
                <div class="inputBox">
                    <input type="number" id='phoneNumber' name="phoneNumber" value="">
                    <label>Phone Number</label>
                </div>
                 <div class="inputBox">
                    <input type="email" id='email' name="email" value="">
                    <label>Email</label>
                </div>
            </div>
            <div class="componentWrapper">
                <div class="inputBox">
                    <input type="password" id='password' name="password" value="">
                    <label>Password</label>
                </div>
                 <div class="inputBox">
                    <input type="password" id='confirmedPassword' name="confirmedPassword" value="">
                    <label>Confirmed Password</label>
                </div>
            </div>
             <div class="componentWrapper">
                <div class="inputBox">
                    <input type="text" name="address" id='address' value="" >
                    <label>Address</label>
                </div>
            </div>
            <div class="select">
                 <select name="roles" class='select-css' id="roleSelectElement" onchange='myFunction()'>
                    <option value="" disabled selected>Select Role</option>
                    <option value="buyer">Buyer</option>
                    <option value="seller">Seller</option>
                 </select>
            </div>
            <div id='sellerRegistrationForm' style="display:none;" >
                <div class="componentWrapper">
                    <div class="inputBox">
                        <input type="text" id='storeName' name="storeName" value="">
                        <label>Store Name</label>
                    </div>
                    <div class="inputBox">
                        <input type="email" id='storeEmail' name="storeEmail" value="">
                        <label>Store Email</label>
                    </div>
                </div>
                 <div class="componentWrapper">
                    <div class="inputBox">
                        <input type="text" id='storeAddress' name="storeAddress" value="" >
                        <label>Store Address</label>
                    </div>
                </div>
         </div>
         <input type="submit" id='sign-up' name="sign-up" value="Sign Up">
      </form>
    </div>
     <script src="../../js/jquery-3.5.1.min.js"></script>
     <script src="../../js/toastr.min.js"></script>
     <script>
        $(document).ready(function() {
            initBtnHandler();
        });
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "preventDuplicates": true,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "2000",
          "extendedTimeOut": "60000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

          function myFunction(){
            var x = $('#roleSelectElement').val();
            if(x == 'seller'){
                $('#sellerRegistrationForm').css('display' , 'block');
            }else{
                $('#sellerRegistrationForm').css('display' , 'none');
            }
          }

         function initBtnHandler() {
             $("#sign-up").on("click", validateData);
         }

         function validateData() {
            debugger;
            var fields = ["fullName", "username", "phoneNumber", "email",
              "password", "confirmedPassword",'address','roleSelectElement'
            ];
            for (field of fields) {
              var value = $("#" + field).val();
              if (value == null || value == "") {
                toastr.error("Please input all the fields",{timeOut: 500});
                return false;
              }
            }

            if($("#roleSelectElement").val() === 'seller'){
                var fields = ['storeName','storeEmail','storeAddress'];
                for (field of fields) {
                  var value = $("#" + field).val();
                  if (value == null || value == "") {
                    toastr.error("Please Provide Store Information!",{timeOut: 500});
                    return false;
                  }
                }
            }

            if($("#password").val().length < 6){
                toastr.error("Password is too short!",{timeOut: 500});
                return false;
            }

             if($("#confirmedPassword").val() === ''){
                toastr.error("Password is not confirmed!",{timeOut: 500});
                return false;
            }

            if($("#password").val() !== $("#confirmedPassword").val()){
                toastr.error("Password is not match!",{timeOut: 500});
                return false;
            }

            return true;
         }


     </script>

     </div>
      <?php include_once('../shared/footer.php'); ?>
</body>
</html>