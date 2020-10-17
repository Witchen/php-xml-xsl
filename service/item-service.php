<?php

require_once("db-service.php");
if (!isset($_SESSION)) {
  session_start();
}

class ItemService
{
  function __construct()
  {
    $this->db = new Database();
    $this->connection = $this->db->getConnection();
    $this->itemDetailPath = "/view/item-detail/item-detail.php";
  }

  function getItem($id)
  {
    $items = array();
    $sql = "SELECT * FROM item WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($items, $row);
      }
      return $this->transformData($items);
    }

    return null;
  }

  function getItems()
  {
    $items = array();
    $sql = "SELECT * FROM item";
    $result = $this->connection->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($items, $row);
      }
      return $this->transformData($items);
    }

    return null;
  }

  function getItemsByCategory($category)
  {
    $items = array();
    $sql = "SELECT * FROM item WHERE category = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($items, $row);
      }
      return $this->transformData($items);
    }

    return null;
  }

  function transformData(&$items)
  {
    $this->transformUrls($items);
    $this->transformStars($items);
    return $items;
  }

  function transformUrls(&$items)
  {
    if (is_array($items)) {
      foreach ($items as &$item) {
        $this->transformUrlSingleItem($item);
      }
    } else {
      $this->transformUrlSingleItem($items);
    }
  }

  function transformUrlSingleItem(&$item)
  {
    $url = $this->itemDetailPath . "?id=" . $item['id'];
    $item['detail_url'] = $url;
  }

  function transformStars(&$items)
  {
    if (is_array($items)) {
      foreach ($items as &$item) {
        $this->transformStarsSingleItem($item);
      }
    } else {
      $this->transformStarsSingleItem($items);
    }
  }

  function transformStarsSingleItem(&$item)
  {
    $stars = '';
    for ($i = 0; $i < $item['stars']; $i++) {
      $stars = $stars . '⭐';
    }
    $item['stars'] = $stars;
  }

  function addItem($category, $title, $price, $brand, $detail, $image){
      $category= mysqli_real_escape_string($this->connection, $category);
      $title = mysqli_real_escape_string($this->connection, $title);
      $price= mysqli_real_escape_string($this->connection, $price);
      $brand= mysqli_real_escape_string($this->connection, $brand);
      $detail= mysqli_real_escape_string($this->connection, $detail);
      $image=$image;

      $sql= "INSERT INTO item(`seller_id`,`category`, `title`, `price`, `brand`,`stars`,`picurl`,`detail`) VALUES ('1','$category','$title','$price','$brand','0','$image','$detail')";
      mysqli_query($this->connection, $sql);

  }
}


if(isset($_POST['addNewItem'])){
    $ItemService = new ItemService();
    $ItemService->addItem($_POST['category'],$_POST['title'],$_POST['price'],$_POST['brand'],$_POST['detail'], $_POST['imageSrc']);
}
