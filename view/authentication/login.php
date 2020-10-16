<?php
$path = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
  	<link href="./authentication.css" rel="stylesheet" type="text/css" media="all">
  	<link href="../../css/toastr.min.css" rel="stylesheet">
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/toastr.min.js"></script>
</head>
<body>
    <div class="divForm">
        <h3 class="formTitle">Login</h3>
        <form method="POST" action="/service/authentication-service.php">
            <div class="inputBox">
                <input type="test" name="username" value="">
                <label>Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="password" value="">
                <label>Password</label>
            </div>
            <input type="submit" name="login" value="Sign In">
         </form>
    </div>
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
            <?php if($_GET['registration'] == 'success'){ ?>
                toastr.success("Registration Complete!",{timeOut: 500})
            <?php } ?>
         </script>
</body>
</html>