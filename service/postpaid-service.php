<?php

require_once("db-service.php");
if (!isset($_SESSION)) {
  session_start();
}

class PostpaidService
{
  function __construct()
  {
    $this->db = new Database();
    $this->connection = $this->db->getConnection();
  }

  function savePostpaidPayment($postpaid)
  {
    $today = date("Y/m/d");
    $sql = "INSERT INTO `postpaid_payment` (`mobile_no`, `amount`, `date`) VALUES (?, ?, ?)";
    $stmt = $this->connection->prepare($sql);
    $stmt->bind_param("sis", $postpaid->mobileno, $postpaid->amount, $today);
    $stmt->execute(); 
  }
}

function savePostpaidPaymentHandler()
{
  $postpaidDataXmlStr = $_POST['postpaid-data'];
  $postpaidDataXml = new SimpleXMLElement($postpaidDataXmlStr);
  $postpaids = $postpaidDataXml->xpath('/postpaidpayment');
  $postpaid = $postpaids[0];

  $postpaidService = new PostpaidService();
  $postpaidService->savePostpaidPayment($postpaid);

  echo "success";
}

if (isset($_POST['action'])) {
  if ($_POST['action'] == "save-postpaid-payment") savePostpaidPaymentHandler();
}
