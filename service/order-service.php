<?php

require_once("db-service.php");
require_once("item-service.php");
if (!isset($_SESSION)) {
  session_start();
}

class OrderService
{
  function __construct()
  {
    $this->db = new Database();
    $this->connection = $this->db->getConnection();
    $this->itemService = new ItemService();
  }

  function saveOrder($order)
  {
    $sql = "INSERT INTO `item_order` (`buyer_id`, `item_id`, `quantity`, `amount_paid`, `order_date`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->connection->prepare($sql);
    $stmt->bind_param("iiiis", $order->buyerid, $order->itemid, $order->quantity, $order->amountpaid, $order->orderdate);
    $stmt->execute();
    $this->itemService->updateItemStock($order->itemid, -$order->quantity);
  }
}

function saveOrderHandler()
{
  $orderDataXmlStr = $_POST['order-data'];
  $orderDataXml = new SimpleXMLElement($orderDataXmlStr);
  $orders = $orderDataXml->xpath('/order');
  $order = $orders[0];

  $orderService = new OrderService();
  $orderService->saveOrder($order);

  echo "success";
}

if (isset($_POST['action'])) {
  if ($_POST['action'] == "saveorder") saveOrderHandler();
}
