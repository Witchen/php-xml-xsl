<?php

require_once("db-service.php");
if (!isset($_SESSION)) {
  session_start();
}

class ReportService
{
  function __construct()
  {
    $this->db = new Database();
    $this->connection = $this->db->getConnection();
    $this->itemDetailPath = "/view/report/report.php";
  }

   function getReports()
    {
      $items = array();
      $sql = "";


      $userId=$_SESSION['userId'];
      $sql = "SELECT * FROM seller WHERE userid ='$userId'";
      $result = mysqli_query($this->connection, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($sellerRow = mysqli_fetch_assoc($result)) {
            $sellerId = $sellerRow['id'];

             $sql = "SELECT DISTINCT item_order.item_id as id, item.category,item.title, item.stock,item.price, SUM(item_order.quantity) as quantity, SUM(item_order.amount_paid) as revenue
                     FROM item
                     INNER JOIN item_order ON item.id = item_order.item_id
                     WHERE seller_id ='$sellerId' group by id";

      }

       $result = $this->connection->query($sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck < 1){
          $_SESSION['item']='empty';
       }else{
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  array_push($items, $row);
                }

                return $items;
                if(isset($_SESSION['item'])){
                  unset($_SESSION["item"]);
                }
             }
       }

      return null;
    }

}


if(isset($_POST['addNewItem'])){
    $ItemService = new ItemService();
    $ItemService->addItem($_SESSION['userId'],$_POST['category'],$_POST['title'],$_POST['price'],$_POST['brand'],$_POST['detail'], $_POST['imageSrc']);
}
