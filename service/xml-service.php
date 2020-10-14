<?php

if (!isset($_SESSION)) {
  session_start();
}

class XmlService
{
  function __construct()
  {
    $this->xmlPath = $_SERVER['DOCUMENT_ROOT'] . "/xml/";
  }

  function produceXml($data, $xmlName, $valueName)
  {
    // creating object of SimpleXMLElement
    $xmlData = new SimpleXMLElement('<?xml version="1.0"?><' . $xmlName . '></' . $xmlName . '>');

    // function call to convert array to xml
    $this->arrayToXml($data, $valueName, $xmlData);

    // $result = $xmlData->asXML();

    // Create a new DOMDocument 
    $dom = new DOMDocument;
    $dom_sxe = dom_import_simplexml($xmlData);
    $dom_sxe = $dom->importNode($dom_sxe, true);

    $implementation = new DOMImplementation();
    $dom->appendChild($implementation->createDocumentType($xmlName, null, $xmlName . ".dtd"));
    $dom->appendChild($dom_sxe);

    $dom->formatOutput = true;
    $dom->save($this->xmlPath . $xmlName . "/" . $xmlName . '.xml'); // save as file
  }

  function arrayToXml($data, $objectName, &$xmlData)
  {
    foreach ($data as $key => $value) {
      if (is_array($value)) {
        if (is_numeric($key)) {
          // $key = 'item' . $key; //dealing with <0/>..<n/> issues
          $key = $objectName;
        }
        $subnode = $xmlData->addChild($key);
        $this->arrayToXml($value, $objectName, $subnode);
      } else {
        $xmlData->addChild("$key", htmlspecialchars("$value"));
      }
    }
  }

  function validateXml($xmlName)
  {
    $dom = new DOMDocument;
    $dom->load($this->xmlPath . $xmlName . "/" . $xmlName . ".xml");
    if ($dom->validate()) {
      echo "<script>console.log('This " . $xmlName . " XML document is valid!')</script>";
    } else {
      echo "<script>console.log('This " . $xmlName . " XML document is invalid!')</script>";
    }
  }
}
