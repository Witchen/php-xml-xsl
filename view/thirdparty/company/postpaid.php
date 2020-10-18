<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
        <label class="label" for="number">Amount</label>
        <div class="input-group ml-3 number-input">
          <input type="text" class="form-control" id="number">
        </div>
      </div>
    </div>
  </div>
</body>

</html>