<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . "/service/report-services.php");
require_once($path . "/service/xml-service.php");

// Get Items
$ReportService = new ReportService();

$items = $ReportService->getReports();


$transformedItemXml = null;

if(isset($_SESSION['item'])){
   $transformedItemXml = '<div class="noDataComponent">You have no Item yet</div>';
}else{
    $xmlService = new XMLService();
    $xmlService->produceXml($items, 'reports', 'tableItem');
    // Validate XML
    $xmlService->validateXml('reports');

    // Load XML file
    $itemXml = new DOMDocument;
    $itemXml->load($path . '/xml/reports/reports.xml');

    // Load XSL file
    $itemXsl = new DOMDocument;
    $itemXsl->load($path . '/xml/reports/reports.xsl');

    // Attach the XSL rules
    $proc = new XSLTProcessor;
    $proc->importStyleSheet($itemXsl);
    $transformedItemXml = $proc->transformToXML($itemXml);
}

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