<?php
require_once 'Databases.php';

class Products {

	public function __construct() {

	}

  public function getID($array) {
    $database = new Databases();

    $productid = $array["product"];
    $productid2 = $array["product2"];
    $productid3 = $array["product3"];
    
    $query = "SELECT * FROM products WHERE productid = '$productid'";

    $query2 = "SELECT * FROM products WHERE productid = '$productid2'";

    $query3 = "SELECT * FROM products WHERE productid = '$productid3'";

    $result = mysqli_query($database->conn, $query);

    $result2 = mysqli_query($database->conn, $query2);

    $result3 = mysqli_query($database->conn, $query3);

    if (!$result) {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    else if (!$result2) {
      echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
    }
    else if (!$result3) {
      echo "Error: " . $query3 . "<br>" . mysqli_error($conn);
    }
    else {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
      $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
      $_SESSION["Productid"] = $row["productid"];
      $_SESSION["Productid2"] = $row2["productid"];
      $_SESSION["Productid3"] = $row3["productid"];
    }
    $database->closeConnection();
  }

  public function getPrices() {
    $database = new Databases();

    $productid = $_SESSION["Productid"];
    $productid2 = $_SESSION["Productid2"];
    $productid3 = $_SESSION["Productid3"];

    $query = "SELECT * FROM products WHERE productid = '$productid'";

    $query2 = "SELECT * FROM products WHERE productid = '$productid2'";

    $query3 = "SELECT * FROM products WHERE productid = '$productid3'";

    $result = mysqli_query($database->conn, $query);

    $result2 = mysqli_query($database->conn, $query2);

    $result3 = mysqli_query($database->conn, $query3);

    if (!$result) {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    else if (!$result2) {
      echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
    }
    else if (!$result3) {
      echo "Error: " . $query3 . "<br>" . mysqli_error($conn);
    }
    else {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
      $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);


      $_SESSION["Product"] = $row["productName"];
      $_SESSION["Price"] = $row["price"];
      $_SESSION["Product2"] = $row2["productName"];
      $_SESSION["Price2"] = $row2["price"];
      $_SESSION["Product3"] = $row3["productName"];
      $_SESSION["Price3"] = $row3["price"];
      $_SESSION["ImageOne"] = $row["imageName"];
      $_SESSION["ImageTwo"] = $row2["imageName"];
      $_SESSION["ImageThree"] = $row3["imageName"];
    }

    $database->closeConnection();
  }
}