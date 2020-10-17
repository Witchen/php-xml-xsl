<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
  	<link href="./authentication.css" rel="stylesheet" type="text/css" media="all">
  	<link href="../../css/toastr.min.css" rel="stylesheet">
</head>
<body>
    <div class="registrationForm">
        <h3 class="formTitle">Registration Form</h3>
        <form method="POST" action="/service/authentication-service.php">
            <div class="componentWrapper">
                <div class="inputBox">
                    <input type="text" name="fullName" value="">
                    <label>Full Name</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="username" value="">
                    <label>Username</label>
                </div>
            </div>
            <div class="componentWrapper">
                <div class="inputBox">
                    <input type="number" name="phoneNumber" value="">
                    <label>Phone Number</label>
                </div>
                 <div class="inputBox">
                    <input type="email" name="email" value="">
                    <label>Email</label>
                </div>
            </div>
            <div class="componentWrapper">
                <div class="inputBox">
                    <input type="password" name="password" value="">
                    <label>Password</label>
                </div>
                 <div class="inputBox">
                    <input type="password" name="confirmedPassword" value="">
                    <label>Confirmed Password</label>
                </div>
            </div>
             <div class="componentWrapper">
                <div class="inputBox">
                    <input type="text" name="address" value="" style="width: 97.5%;">
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
                        <input type="text" name="storeName" value="">
                        <label>Store Name</label>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="storeEmail" value="">
                        <label>Store Email</label>
                    </div>
                </div>
                 <div class="componentWrapper">
                    <div class="inputBox">
                        <input type="text" name="storeAddress" value="" style="width: 97.5%;">
                        <label>Store Address</label>
                    </div>
                </div>
         </div>
         <input type="submit" name="sign-up" value="Sign Up">
      </form>
    </div>
     <script src="../../js/jquery-3.5.1.min.js"></script>
     <script src="../../js/toastr.min.js"></script>
     <script>
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

          <?php if(isset($_GET['registration'])): ?>
         <?php if($_GET['registration'] == 'shortUserName'): ?>
              toastr.error("Password is too short!",{timeOut: 500});
         <?php endif  ?>
         <?php if($_GET['registration'] == 'passwordNotConfirmed'): ?>
              toastr.error("Password is not confirmed!",{timeOut: 500});
         <?php endif ?>
         <?php if($_GET['registration'] == 'passwordTooShort'): ?>
              toastr.error("Password is too short!",{timeOut: 500});
         <?php endif ?>
         <?php if($_GET['registration'] == 'passwordNotMatch'): ?>
              toastr.error("Password is not match!",{timeOut: 500});
         <?php endif ?>
         <?php if($_GET['registration'] == 'emptyField'): ?>
              toastr.error("Fields cannot be empty!",{timeOut: 500});
         <?php endif ?>
         <?php if($_GET['registration'] == 'success'): ?>
              toastr.success("Registration Complete!",{timeOut: 500});
         <?php endif ?>
        <?php endif ?>

     </script>
</body>
</html>