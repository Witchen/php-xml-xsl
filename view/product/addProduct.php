<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
	session_start();

	if(isset($_POST['imageSrc'])){
	    echo $_POST['imageSrc'];
	 }

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('../shared/head.php'); ?>

<head>
  <link href="./product.css" rel="stylesheet">
  <link href="../../css/toastr.min.css" rel="stylesheet">
  <title>Ecommerce Homepage</title>
</head>

<body>
  <div class="container">
    <?php include_once('../shared/header.php'); ?>

    <form method="POST" action="/service/item-service.php" class='formContainer'>
        <div class="componentWrapper">
            <div class="inputBox">
                <input type="text" id='category' name="category" value="">
                <label>Category</label>
            </div>
            <div class="inputBox">
                <input type="text" id='title' name="title" value="">
                <label>Title</label>
            </div>
            <div class="inputBox">
                <input type="number" id='price' name="price" value="">
                <label>Price</label>
            </div>
            <div class="inputBox">
                <input type="text" id='brand' name="brand" value="">
                <label>Brand</label>
            </div>
            <div class="inputBox">
                <input type="text" id='detail' name="detail" value="">
                <label>Detail</label>
            </div>
             <div class="inputBox"  style="display:none;">
                <input type="text" name="imageSrc" id='imageSrc' value="">
            </div>
        </div>

         <div class='uploadImageContainer'>
            <input type="file" name="file" id="file" class="inputfile" />
            <label for="file">Choose a file</label>
            <div class='ImageContainer' id='imageContainer'></div>
         </div>
        <input type="submit" name="addNewItem" id="addNewItem" value="Add Item">
     </form>
    </br>
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var size = parseFloat(input.files[0].size / (780 * 582)).toFixed(2);
                    
                    if(size > 1) {
                        toastr.error("Please select a smaller Image Size!",{timeOut: 500});
                        return;
                    }

                   $('#imageContainer').prepend('<div class="selectedImageContainer"><img name="storeImage" id="storeImage" class="selectedImage" src="'+e.target.result+'" /><label>'+input.files[0].name+'</label></div>')
                    document.getElementById("imageSrc").value = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('input[type="file"]').change(function(){
           readURL(this);
        });

        function initBtnHandler() {
           $("#addNewItem").on("click", validateData);
        }
        function validateData() {
          var fields = ["category", "title", "price", "brand",
            "detail", "imageSrc"
          ];
          for (field of fields) {
            var value = $("#" + field).val();
            if (value == null || value == "") {
              toastr.error("Please input all the fields",{timeOut: 500});
              return false;
            }
          }

          return true;
        }
  </script>
  <?php include_once('../shared/footer.php'); ?>
</body>
