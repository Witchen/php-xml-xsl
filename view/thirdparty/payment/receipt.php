<?php
$path = $_SERVER['DOCUMENT_ROOT'];

if (isset($_GET['referenceId'])) {
  $referenceId = $_GET['referenceId'];
} else {
  header("Location: /index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('../../shared/head.php'); ?>

<head>
  <link href="receipt.css" rel="stylesheet">
  <title>Receipt</title>
</head>

<body>
  <div class="container">
    <?php include_once('../../shared/header.php'); ?>

    <div class="receipt-container">
      <div class="card receipt-card">
        <h3 class="mt-3 mb-3">Your payment is success</h3>
        <img class="check-img mb-3" src="/assets/image/check.png"></img>
        <h5>Reference ID: <?php echo $referenceId ?></h5>
      </div>
    </div>

    </br>
  </div>
  <?php include_once('../../shared/footer.php'); ?>

</body>

</html>