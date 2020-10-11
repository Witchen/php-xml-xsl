<?php 
  
// Create a new DOMDocument 
$doc = new DOMDocument;   
$doc->load("note.xml"); 
  
echo gettype($doc) . '</br>';

// Check if XML follows the DTD rule 
if ($doc->validate()) { 
    echo "This document is valid!\n"; 
}
