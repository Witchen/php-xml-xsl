<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . "/service/item-service.php");
require_once($path . "/service/xml-service.php");

// Load XML file
$itemXml = new DOMDocument;
$itemXml->load($path . '/xml/reports/tableItems.xml');

// Load XSL file
$itemXsl = new DOMDocument;
$itemXsl->load($path . '/xml/reports/table.xsl');

// Attach the XSL rules
$proc = new XSLTProcessor;
$proc->importStyleSheet($itemXsl);
$transformedItemXml = $proc->transformToXML($itemXml);
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('../shared/head.php'); ?>

<head>
  <link href="report.css" rel="stylesheet">
  <title>Ecommerce Homepage</title>
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