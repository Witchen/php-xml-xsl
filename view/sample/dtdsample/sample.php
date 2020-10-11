<?php 
  
// Create a new DOMDocument 
$doc = new DOMDocument; 
  
// Load the XML with DTD rule to have 
// a root element with first, second, 
// and third as its three children 
$doc->loadXML("<?xml version=\"1.0\"?> 
<!DOCTYPE root [ 
<!ELEMENT root (first, second, third)> 
<!ELEMENT first (#PCDATA)> 
<!ELEMENT second (#PCDATA)> 
<!ELEMENT third (#PCDATA)> 
]> 
  
<!-- Create a XML following the DTD --> 
<root> 
<first>Hello</first> 
<second>There</second> 
<third>World</third> 
</root>"); 
  
// Check if XML follows the DTD rule 
if ($doc->validate()) { 
    echo "This document is valid!\n"; 
}
