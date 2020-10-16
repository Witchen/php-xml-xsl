<?php
$path = $_SERVER['DOCUMENT_ROOT'];

require_once($path . "/service/item-service.php");
require_once($path . "/service/seller-service.php");

if (isset($_GET['id']) && isset($_GET['qty'])) {
  $itemId = $_GET['id'];
  $qty = $_GET['qty'];
} else {
  header("Location: /index.php");
}

$itemService = new ItemService();
$items = $itemService->getItem($itemId);
$item = $items[0];

$sellerService = new SellerService();
$sellers = $sellerService->getSeller($item['seller_id']);
$seller = $sellers[0];

$subtotal = $item['price'] * $qty;
$tax = $subtotal * 0.06;
$total = $subtotal + $tax;

$itemPriceTxt = number_format((float)$item['price'], 2, '.', '');
$subtotalTxt = number_format((float)$subtotal, 2, '.', '');
$taxTxt = number_format((float)$tax, 2, '.', '');
$totalTxt = number_format((float)$total, 2, '.', '');

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('../../shared/head.php'); ?>

<head>
  <link href="payment.css" rel="stylesheet">
  <title>Payment</title>
</head>

<body>
  <div class="container">
    <?php include_once('../../shared/header.php'); ?>

    <div class="payment-container">
      <div class="card receiver-info-card">
        <div class="receiver-info-container">
          <div class="title-bar">Vendor Information</div>
          <div class="d-flex justify-content-between receiver-name">
            <span class="label">Vendor: </span>
            <span class="value"><?php echo $seller['name'] ?></span>
          </div>
          <div class="d-flex justify-content-between effective-date">
            <span class="label">Effective Date: </span>
            <span class="value"><?php echo date("d/M/Y") ?></span>
          </div>
          <div class="d-flex justify-content-between receiver-email">
            <span class="label">Email: </span>
            <span class="value"><?php echo $seller['email'] ?></span>
          </div>
        </div>
        <div class="receiver-info-border"></div>
        <div class="amount-info-container">
          <div class="title-bar">Payment Information</div>
          <div class="d-flex justify-content-between payment-amount">
            <span class="label">Amount: </span>
            <span class="value"><?php echo $itemPriceTxt ?> MYR</span>
          </div>
          <div class="d-flex justify-content-between qty">
            <span class="label">Quantity: </span>
            <span class="value"><?php echo $qty ?></span>
          </div>
          <div class="payment-info-border"></div>
          <div class="d-flex justify-content-between sub-total-payment">
            <span class="label">Sub Total: </span>
            <span class="value"><?php echo $subtotalTxt ?> MYR</span>
          </div>
          <div class="d-flex justify-content-between payment-tax">
            <span class="label">Tax: </span>
            <span class="value"><?php echo $taxTxt ?> MYR</span>
          </div>
          <div class="payment-info-border"></div>
          <div class="d-flex justify-content-between total-payment">
            <span class="label">Total Payment: </span>
            <span class="value"><?php echo $totalTxt ?> MYR</span>
          </div>
        </div>
      </div>
      <div class="card payer-info-card">
        <div class="title-bar">Payment</div>
        <div class="payment-input-form">
          <div class="d-flex name-input-line">
            <div class="first-name-input">
              <label for="first-name">First Name</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="first-name">
              </div>
            </div>
            <div class="last-name-input">
              <label for="last-name">Last Name</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="last-name">
              </div>
            </div>
          </div>
          <div class="d-flex address-city-input-line">
            <div class="address-input">
              <label for="address">Address</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="address">
              </div>
            </div>
            <div class="city-input">
              <label for="city">City</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="city">
              </div>
            </div>
          </div>
          <div class="d-flex state-country-input-line">
            <div class="state-input">
              <label for="state">State</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="state">
              </div>
            </div>
            <div class="zip-code-input">
              <label for="zip-code">Zip Code</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="zip-code">
              </div>
            </div>
            <div class="country-input">
              <label for="country">Country</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="country">
              </div>
            </div>
          </div>
          <div class="d-flex email-input-line">
            <div class="email-input">
              <label for="email">Email</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="email">
              </div>
            </div>
          </div>
          <div class="d-flex cc-input-line">
            <div class="cc-no-input">
              <label for="cc">Credit Card Number</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="cc">
              </div>
            </div>
            <div class="exp-input">
              <label for="exp">Expiry (MMYYYY)</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="exp">
              </div>
            </div>
            <div class="ccv-no-input">
              <label for="ccv">CCV</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="ccv">
              </div>
            </div>
          </div>
          <div class="d-flex">
            <button class="btn payment-btn" id="confirm-payment-btn">Confirm Payment</button>
          </div>
        </div>
      </div>
    </div>
    </br>
  </div>
  <?php include_once('../../shared/footer.php'); ?>

  <script>
    $(document).ready(function() {
      initInputValidationHandler();
      initBtnHandler();
    });

    function initInputValidationHandler() {
      $("#zip-code").inputFilter(function(value) {
        return /^\d*$/.test(value); // Allow digits only, using a RegExp
      });
      $("#cc").inputFilter(function(value) {
        return /^\d{0,16}$/.test(value); // Allow 16 digits only, using a RegExp
      });
      $("#exp").inputFilter(function(value) {
        return /^\d{0,6}$/.test(value); // Allow 6 digits only, using a RegExp
      });
      $("#ccv").inputFilter(function(value) {
        return /^\d{0,3}$/.test(value); // Allow 3 digits only, using a RegExp
      });
    }

    function initBtnHandler() {
      $("#confirm-payment-btn").on("click", confirmPayment);
    }

    function confirmPayment() {
      postPaymentData3rdParty(getPaymentData());
    }

    function postPaymentData3rdParty(xmlText) {
      if (!xmlText || xmlText.length == 0) return;

      var requestType = "POST"
      var url = '/service/third-party/ext-payment-service.php';
      var params = 'payment-data=' + xmlText;
      var onReadyFn = function(paymentResponse) {
        var parser = new DOMParser();
        var paymentResponseXml = parser.parseFromString(paymentResponse, 'text/xml');
        var paymentStatus = paymentResponseXml.getElementsByTagName('status')[0].textContent;
        var referenceId = paymentResponseXml.getElementsByTagName('referenceid')[0].textContent;
        if (paymentStatus == 'success') {
          // postPaymentDataInternal(paymentResponse);
          alert('Your payment is success. Reference ID: ' + referenceId);
          window.location.href ='/view/thirdparty/payment/receipt.php?referenceId=' + referenceId;
        }
      }
      sendXmlRequest(requestType, url, params, onReadyFn);
    }

    // TODO
    function postPaymentDataInternal(xmlText) {
      if (!xmlText || xmlText.length == 0) return;
      
      var requestType = "POST"
      var url = '?';
      var params = 'payment-data=' + xmlText;
      var onReadyFn = function(paymentResponse) {
        // TODO
      }
      sendXmlRequest(requestType, url, params, onReadyFn);
    }

    function getPaymentData() {
      var xmlDoc = document.implementation.createDocument(null, "payment");
      var paymentElements = xmlDoc.getElementsByTagName("payment");
      var paymentElement = paymentElements[0]

      var vendorInfoElement = xmlDoc.createElement("vendor");
      paymentElement.appendChild(vendorInfoElement);
      appendXmlData(xmlDoc, vendorInfoElement, "name", "PC Master SDN BHD");
      appendXmlData(xmlDoc, vendorInfoElement, "email", "support@pcmaster.com");

      var payerInfoElement = xmlDoc.createElement("payer");
      paymentElement.appendChild(payerInfoElement);

      var validData = validateData();
      if (!validData) return;

      appendXmlData(xmlDoc, payerInfoElement, "firstname", $("#first-name").val());
      appendXmlData(xmlDoc, payerInfoElement, "lastname", $("#last-name").val());
      appendXmlData(xmlDoc, payerInfoElement, "address", $("#address").val());
      appendXmlData(xmlDoc, payerInfoElement, "city", $("#city").val());
      appendXmlData(xmlDoc, payerInfoElement, "state", $("#state").val());
      appendXmlData(xmlDoc, payerInfoElement, "zipcode", $("#zip-code").val());
      appendXmlData(xmlDoc, payerInfoElement, "country", $("#country").val());
      appendXmlData(xmlDoc, payerInfoElement, "email", $("#email").val());
      appendXmlData(xmlDoc, payerInfoElement, "ccno", $("#cc").val());
      appendXmlData(xmlDoc, payerInfoElement, "ccexp", $("#exp").val());
      appendXmlData(xmlDoc, payerInfoElement, "ccv", $("#ccv").val());
      appendXmlData(xmlDoc, paymentElement, "amount", <?php echo $totalTxt ?>);

      var xmlText = new XMLSerializer().serializeToString(xmlDoc);
      // console.log("xmlText: " + xmlText);
      return xmlText;
    }

    function validateData() {
      var fields = ["first-name", "last-name", "address", "city",
        "state", "zip-code", "country", "email", "cc", "exp", "ccv"
      ];
      for (field of fields) {
        var value = $("#" + field).val();
        if (value == null || value == "") {
          alert("Please input all the fields");
          return false;
        }
      }

      return true;
    }

    function appendXmlData(xmlDoc, paymentElement, elementName, value) {
      var newNodeElement = xmlDoc.createElement(elementName);
      newNodeElement.textContent = value;
      paymentElement.appendChild(newNodeElement);
    }

    function populateTestData() {
      $("#first-name").val("My First Name");
      $("#last-name").val("My Last Name");
      $("#address").val("Endah Promenade");
      $("#city").val("Kuala Lumpur");
      $("#state").val("WP Kuala Lumpur");
      $("#zip-code").val("58000");
      $("#country").val("Malaysia");
      $("#email").val("myemail@gmail.com");
      $("#cc").val("1234123412341234");
      $("#exp").val("0924");
      $("#ccv").val("162");
    }
  </script>

</body>

</html>