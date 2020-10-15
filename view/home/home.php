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

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('../shared/head.php'); ?>

<head>
  <link href="home.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <?php include_once('../shared/header.php'); ?>

    <?php echo $transformedItemXml; ?>
    </br>
  </div>

  <?php include_once('../shared/footer.php'); ?>
</body>

</html>