<?php
$path = $_SERVER['DOCUMENT_ROOT'];

require_once($path . "/service/item-service.php");
require_once($path . "/service/xml-service.php");

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('../shared/head.php'); ?>

<head>
  <link href="prepaid.css" rel="stylesheet">
  <title>Prepaid Reload</title>
</head>

<body>
  <div class="container">
    <?php include_once('../shared/header.php'); ?>

    <div class="prepaid-container">
      <h3 class="mb-3">Prepaid Reload</h3>
      <div class="d-flex align-items-center mb-3">
        <label for="number">Mobile Number</label>
        <div class="input-group ml-3 number-input">
          <input type="text" class="form-control" id="number">
        </div>
      </div>
      <div class="d-flex mb-3">
        <div>Amount</div>
        <div class="btn-group btn-group-toggle amount-selection-container" data-toggle="buttons">
          <label class="btn btn-secondary amount-select-btn">
            <input type="radio" name="options" id="option1" autocomplete="off"> 10
          </label>
          <label class="btn btn-secondary amount-select-btn">
            <input type="radio" name="options" id="option2" autocomplete="off"> 20
          </label>
          <label class="btn btn-secondary amount-select-btn">
            <input type="radio" name="options" id="option3" autocomplete="off"> 30
          </label>
          <label class="btn btn-secondary amount-select-btn">
            <input type="radio" name="options" id="option1" autocomplete="off"> 50
          </label>
          <label class="btn btn-secondary amount-select-btn">
            <input type="radio" name="options" id="option2" autocomplete="off"> 100
          </label>
          <label class="btn btn-secondary amount-select-btn">
            <input type="radio" name="options" id="option3" autocomplete="off"> 200
          </label>
        </div>
      </div>
      <button class="btn item-buy-btn" id="buy-btn">Buy Now</button>
    </div>

    </br>
  </div>

  <?php include_once('../shared/footer.php'); ?>

  <script>
    $(document).ready(function() {
      initInputValidationHandler();
      initBtnHandler();
    });

    function initInputValidationHandler() {
      $("#number").inputFilter(function(value) {
        return /^\d{0,12}$/.test(value); // Allow digits only, using a RegExp
      });
    }

    function initBtnHandler() {
      $("#buy-btn").on("click", buyPrepaid);
    }

    function buyPrepaid() {
      var qty = 1;
      var mobileNo = $("#number").val();
      if (mobileNo == null || mobileNo == "") {
        alert("Please input mobile number.");
        return;
      }

      var amount = $("input[name='options']:checked").parent().text().trim();
      if (!amount || amount == "") {
        alert("Please select the reload amount.");
        return;
      }
      window.location.href = "/view/thirdparty/payment/payment.php?prepaid-amount=" + amount + "&qty=" + qty;
    }
  </script>
</body>

</html>