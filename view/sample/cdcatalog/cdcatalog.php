<?php

// Load XML file
$xml = new DOMDocument;
$xml->load('cdcatalog.xml');

// Validate
$valid = false;
if ($xml->validate()) { 
  $valid = true;
}

// Load XSL file
$xsl = new DOMDocument;
$xsl->load('cdcatalog.xsl');

// Configure the transformer
$proc = new XSLTProcessor;

// Attach the xsl rules
$proc->importStyleSheet($xsl);
$transformedXml = $proc->transformToXML($xml);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>title</title>
</head>

<body>
  <h1>PHP:</h1>
  <h1>CD Catalog is Valid XML with DTD: <?php echo $valid ? "true" : "false"; ?></h1>
  <?php echo $transformedXml; ?>
</body>

</html>