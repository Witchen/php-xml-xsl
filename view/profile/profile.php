<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . "/service/profile-service.php");
require_once($path . "/service/xml-service.php");

// Get Items
$ProfileService = new ProfileService();

$items = $ProfileService->getProfile();


$transformedItemXml = null;

$xmlName='profile';
$xmlValue='profileItem';
$xmlPath='/xml/profile/profile.xml';
$xslPath='/xml/profile/profile.xsl';

if($_SESSION['role'] == 'buyer'){
    $xmlName='buyerProfile';
    $xmlValue='buyerProfileItem';
    $xmlPath='/xml/buyerProfile/buyerProfile.xml';
    $xslPath='/xml/buyerProfile/buyerProfile.xsl';
}

$xmlService = new XMLService();
$xmlService->produceXml($items, $xmlName, $xmlValue);
// Validate XML
$xmlService->validateXml($xmlName);

// Load XML file
$itemXml = new DOMDocument;
$itemXml->load($path . $xmlPath);

// Load XSL file
$itemXsl = new DOMDocument;
$itemXsl->load($path . $xslPath);

// Attach the XSL rules
$proc = new XSLTProcessor;
$proc->importStyleSheet($itemXsl);
$transformedItemXml = $proc->transformToXML($itemXml);

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('../shared/head.php'); ?>

<head>
  <link href="profile.css" rel="stylesheet">
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