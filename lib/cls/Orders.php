<?php

class Orders {

	public function __construct() {

	}

  public function saveOrder($id) {
    $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
    $myusername = "zneff";   // the username specified when setting-up the database
    $dbpassword = "Z483026074!";   // the password specified when setting-up the database
    $database = "belo"; 

    $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

    $stripeid = $id;

    $orderDate = date("Y-m-d");

    $amount = $_SESSION["Price"];
    $email = $_SESSION["Email"];

    $sql = "INSERT INTO orders (stripeid, email, orderdate, amount)
    VALUES ('$stripeid', '$email', $orderDate', '$amount')";

    $query = mysqli_query($conn, $sql);

    mysqli_close($conn);
  }
}
?>