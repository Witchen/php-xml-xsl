<?php

if (isset($_POST['payment-data'])) {
  $xml_str = $_POST['payment-data'];
  $xml = new SimpleXMLElement($xml_str);
  $payments = $xml->xpath('/payment');
  $payment = $payments[0];    // There is only one payment data

  // Mark Payment as success
  $xml->addChild("referenceid", uniqid());
  $xml->addChild("status","success");

  // print_r($payment); echo "\n";
  echo $payment->asXML();
} else {
  echo "Payment data is not found";
}
