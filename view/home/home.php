<?php
$path = $_SERVER['DOCUMENT_ROOT'];

// Load XML file
$itemXml = new DOMDocument;
$itemXml->load($path . '/view/shared/item/item.xml');

// Load XSL file
$itemXsl = new DOMDocument;
$itemXsl->load($path . '/view/shared/item/item.xsl');

// Configure the transformer
$proc = new XSLTProcessor;

// Attach the xsl rules
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