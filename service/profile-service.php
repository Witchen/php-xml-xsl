<?php
require_once("db-service.php");
if (!isset($_SESSION)) {
  session_start();
}

class ProfileService
{
  function __construct()
  {
    $this->db = new Database();
    $this->connection = $this->db->getConnection();
  }

   function getProfile()
    {
      $items = array();
      $userId=$_SESSION['userId'];
      $sql ="";

      if($_SESSION['role'] == "seller"){
        $sql = "SELECT users.id, users.full_name, users.username, users.mobile_number, users.email,users.address, users.role,
                seller.name as storeName, seller.location as storeLocation, seller.email as storeEmail  from users
                INNER JOIN seller ON users.id = seller.userid
                WHERE users.id = '$userId'";
      }else{
         $sql = "SELECT users.id, users.full_name, users.username, users.mobile_number, users.email,users.address, users.role
                 from users WHERE users.id = '$userId'";
      }

       $result = $this->connection->query($sql);

       if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
             array_push($items, $row);
           }
           return $items;
       }
        return null;
    }

}
