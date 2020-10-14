<?php

require_once("db-service.php");
if (!isset($_SESSION)) {
  session_start();
}

class SellerService
{
  function __construct()
  {
    $this->db = new Database();
    $this->connection = $this->db->getConnection();
  }

  function getSeller($id)
  {
    $sellers = array();
    $sql = "SELECT * FROM seller WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($sellers, $row);
      }
      return $sellers;
    }

    return null;
  }

  function getSellers()
  {
    $sellers = array();
    $sql = "SELECT * FROM seller";
    $result = $this->connection->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($sellers, $row);
      }
      return $sellers;
    }

    return null;
  }
}
