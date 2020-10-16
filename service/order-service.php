<?php

require_once("db-service.php");
if (!isset($_SESSION)) {
  session_start();
}

class OrderService
{
  function __construct()
  {
    $this->db = new Database();
    $this->connection = $this->db->getConnection();
  }

  // TODO
  function saveOrder($order) {

  }
}
