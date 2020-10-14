<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path . "/service/item-service.php");

$itemService = new ItemService();
$itemArr = $itemService->getItem(1);

// initializing or creating array
$data = array(
    array(
        'slug' => 'index',
        'title' => 'Site Index',
        'template' => 'interior'
    ),

    array(
        'slug' => 'a',
        'title' => '100% Wide (Layout A)',
        'template' => 'interior'
    ),

    array(
        'slug' => 'homepage',
        'title' => 'Homepage',
        'template' => 'homepage'
    )
);
$data = $itemArr;

function getXml($data, $parentName, $childName)
{
    // creating object of SimpleXMLElement
    $xmlData = new SimpleXMLElement('<?xml version="1.0"?><' . $parentName . '></' . $parentName . '>');

    // function call to convert array to xml
    arrayToXml($data, $childName, $xmlData);

    $result = $xmlData->asXML();

    // Create a new DOMDocument 
    $dom = new DOMDocument;

    $dom_sxe = dom_import_simplexml($xmlData);
    $dom_sxe = $dom->importNode($dom_sxe, true);

    $implementation = new DOMImplementation();
    $dom->appendChild($implementation->createDocumentType('items', null, "items.dtd"));
    $dom->appendChild($dom_sxe);

    $dom->formatOutput = true;
    $dom->save('items.xml'); // save as file

    // Check if XML follows the DTD rule 
    // if ($dom->validate()) {
    // echo "This document is valid!\n";
    // }

    $domWithDTD = new DOMDocument;
    $domWithDTD->load("items.xml");
    if ($domWithDTD->validate()) {
        echo "This document is valid!\n";
    }

    return $result;
}

// function defination to convert array to xml
function arrayToXml($data, $objectName, &$xmlData)
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            if (is_numeric($key)) {
                // $key = 'item' . $key; //dealing with <0/>..<n/> issues
                $key = $objectName;
            }
            $subnode = $xmlData->addChild($key);
            arrayToXml($value, $objectName, $subnode);
        } else {
            $xmlData->addChild("$key", htmlspecialchars("$value"));
        }
    }
}

$result = getXml($data, 'items', 'item');

echo "<pre>";
print_r($result);
echo "</pre>";

// Load XML file
$itemXml = new DOMDocument;
$itemXml->load('items.xml');

// Load XSL file
$itemXsl = new DOMDocument;
$itemXsl->load('items.xsl');

// Configure the transformer
$proc = new XSLTProcessor;

// Attach the xsl rules
$proc->importStyleSheet($itemXsl);
$transformedItemXml = $proc->transformToXML($itemXml);

?>
<!DOCTYPE html>
<html lang="en">

<body>
    <?php echo $transformedItemXml; ?>
</body>

</html>