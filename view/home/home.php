<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . "/service/item-service.php");
require_once($path . "/service/xml-service.php");

if (isset($_GET['category'])) {
  $category = $_GET['category'];
}

// Get Items
$itemService = new ItemService();

$items = isset($category)
      ? $itemService->getItemsByCategory($category)
      : $itemService->getItems();


$transformedItemXml = null;


if(isset($_SESSION['item'])){
   echo $_SESSION['item'];
   $transformedItemXml = '<div>You have no Item yet</div>';
}else{
    // Produce XML
    $xmlService = new XMLService();
    $xmlService->produceXml($items, 'items', 'item');
    // Validate XML
    $xmlService->validateXml('items');
    // Load XML file
    $itemXml = new DOMDocument;
    $itemXml->load($path . '/xml/items/items.xml');
    // Load XSL file
    $itemXsl = new DOMDocument;
    $itemXsl->load($path . '/xml/items/items.xsl');
    // Attach the XSL rules
    $proc = new XSLTProcessor;
    $proc->importStyleSheet($itemXsl);
    $transformedItemXml = $proc->transformToXML($itemXml);
}

$addNewItemButton=null;
if(isset($_SESSION['role'])){
    if($_SESSION['role'] == 'seller'){
         $addNewItemButton='<div class="addItemButtonContainer"><a class="addItemButton" href="../product/addProduct.php">New Item</a></div>';
    }else{
         $addNewItemButton=null;
     }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('../shared/head.php'); ?>

<head>
  <link href="home.css" rel="stylesheet">
  <title>Ecommerce Homepage</title>
</head>

<body>
  <div class="container">
    <?php include_once('../shared/header.php'); ?>
    <?php echo $addNewItemButton; ?>
    <?php echo $transformedItemXml; ?>
    </br>
  </div>

  <?php include_once('../shared/footer.php'); ?>
</body>

</html>