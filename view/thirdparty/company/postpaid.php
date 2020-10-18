<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="postpaid.css" rel="stylesheet">
  <title>External Postpaid Payment</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <span class="navbar-brand mb-0 h1">Mobile Postpaid Malaysia</span>
      </div>
    </nav>
  </header>
  <div class="container mt-3">
    <div class="postpaid-container">
      <h3 class="mb-5">Postpaid Payment</h3>
      <div class="d-flex align-items-center mb-3 input-container">
        <label class="label" for="number">Mobile Number</label>
        <div class="input-group ml-3 number-input">
          <input type="text" class="form-control" id="number">
        </div>
      </div>
      <div class="d-flex align-items-center mb-3 input-container">
        <label class="label" for="amount">Amount</label>
        <div class="input-group ml-3 number-input">
          <input type="text" class="form-control" id="amount">
        </div>
      </div>
      <button class="btn postpaid-pay-btn" id="pay-btn">Pay Now</button>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      initInputValidationHandler();
      initBtnHandler();
    });

    function initInputValidationHandler() {
      $("#number").inputFilter(function(value) {
        return /^\d*$/.test(value); // Allow digits only, using a RegExp
      });
      $("#amount").inputFilter(function(value) {
        return /^\d*$/.test(value); // Allow digits only, using a RegExp
      });
    }

    function initBtnHandler() {
      $("#pay-btn").on("click", payPostpaid);
    }

    function payPostpaid() {
      var mobileNo = $("#number").val();
      var amount = $("#amount").val();

      validateData(mobileNo, amount);
      var paymentXml = getPaymentData();
      if (!paymentXml || paymentXml.length == 0) return;

      var requestType = "POST"
      var url = '/service/postpaid-service.php';
      var params = 'action=save-postpaid-payment&postpaid-data=' + paymentXml;
      var onReadyFn = function(response) {
        alert("Your payment is successful");
        $("#number").val("");
        $("#amount").val("");
      }
      sendXmlRequest(requestType, url, params, onReadyFn);
    }

    function validateData(mobileNo, amount) {
      if (mobileNo == null || mobileNo == "") {
        alert("Please input mobile number.");
        return;
      }
      if (amount == null || amount == "") {
        alert("Please input amount number.");
        return;
      }
    }

    function getPaymentData() {
      var xmlDoc = document.implementation.createDocument(null, "postpaidpayment");
      var paymentElements = xmlDoc.getElementsByTagName("postpaidpayment");
      var paymentElement = paymentElements[0];

      appendXmlData(xmlDoc, paymentElement, "mobileno", $("#number").val());
      appendXmlData(xmlDoc, paymentElement, "amount", $("#amount").val());
      var xmlText = new XMLSerializer().serializeToString(xmlDoc);
      return xmlText;
    }

    function appendXmlData(xmlDoc, paymentElement, elementName, value) {
      var newNodeElement = xmlDoc.createElement(elementName);
      newNodeElement.textContent = value;
      paymentElement.appendChild(newNodeElement);
    }

    function sendXmlRequest(type, url, params, onReadyFn) {
      var xmlhttp = new XMLHttpRequest();

      xmlhttp.open(type, url, true);
      xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          onReadyFn(this.responseText);
        }
      };
      xmlhttp.send(params);
    }

    // JQuery Input Filter for Input Validation
    (function($) {
      $.fn.inputFilter = function(inputFilter) {
        return this.on(
          'input keydown keyup mousedown mouseup select contextmenu drop',
          function() {
            if (inputFilter(this.value)) {
              this.oldValue = this.value;
              this.oldSelectionStart = this.selectionStart;
              this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty('oldValue')) {
              this.value = this.oldValue;
              this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
              this.value = '';
            }
          }
        );
      };
    })(jQuery);
  </script>

</body>

</html>