<?php

class Database
{

  static $connection;

  public static function getConnection()
  {
    return Database::openDBConnection();
  }

  private static function openDBConnection()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "laxada";
    if (!isset($connection)) {
      $connection = new mysqli($servername, $username, $password, $dbname);
      if ($connection->connect_error) {
        die("connection failed status: " . $connection->connect_error);
      }
    }
    return $connection;
  }
}
