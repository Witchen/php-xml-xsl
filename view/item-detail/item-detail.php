<?php
$path = $_SERVER['DOCUMENT_ROOT'];

require_once($path . "/service/item-service.php");
require_once($path . "/service/seller-service.php");

$itemId = $_GET['id'];

$itemService = new ItemService();
$items = $itemService->getItem($itemId);
$item = $items[0];

$sellerService = new SellerService();
$sellers = $sellerService->getSeller($item['seller_id']);
$seller = $sellers[0];

$emptyDetail = $item['detail'] == null;
$itemDetailList = '<li>' . str_replace("\n", "</li>\n<li>", trim($item['detail'], "\n")) . '</li>';

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('../shared/head.php'); ?>

<head>
  <link href="item-detail.css" rel="stylesheet">
  <title>Item Detail</title>
</head>

<body>
  <div class="container">
    <?php include_once('../shared/header.php'); ?>

    <div class="item-container">
      <div class="item-summary">
        <div class="left-panel">
          <div class="item-image-container">
            <img class="item-card-img-responsive" src="<?php echo $item['picurl'] ?>"></img>
          </div>
          <div class="item-description">
            <h3><?php echo $item['title'] ?></h3>
            <p><?php echo $item['stars'] ?></p>
            <p>Brand: <?php echo $item['brand'] ?></p>
            <p class="item-price">RM <?php echo $item['price'] ?></p>
            <div class="d-flex align-items-center mb-3 qty-input">
              <label for="qty">Quantity</label>
              <div class="input-group ml-3">
                <input type="number" class="form-control" id="qty">
              </div>
            </div>
            <button class="btn item-buy-btn" id="buy-btn">Buy Now</button>
          </div>
        </div>
        <div class="right-panel">
          <div class="card seller-detail">
            <div>Seller:</div>
            <div><?php echo $seller['name'] ?></div>
            <div><?php echo $seller['email'] ?></div>
            <div><?php echo $seller['rating'] ?>/100</div>
          </div>
          <div class="card delivery-detail">
            <div>Delivery:</div>
            <div>WP Kuala Lumpur</div>
            <div>Standard Delivery (1-3 days)</div>
          </div>
        </div>
      </div>
      <?php if (!$emptyDetail) { ?>
      <div class="item-detail">
        <div class="item-detail-title">Product Details: </div>
        <div>
          <ul class="item-detail-list">
            <?php echo $itemDetailList ?>
          </ul>
        </div>
      </div>
      <?php } ?>
    </div>
    </br>
  </div>
  <?php include_once('../shared/footer.php'); ?>

  <script>
    $(document).ready(function() {
      $("#buy-btn").on("click", buy);
    });

    function buy() {
      var qty = $("#qty").val();
      if (qty == null || qty < 1) {
        alert("Please input at least 1 for quantity");
        return;
      }
      window.location.href = "/view/thirdparty/payment/payment.php?id=<?php echo $item['id'] ?>&qty=" + qty;
    }
  </script>
</body>

</html>