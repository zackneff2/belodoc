<?php
      session_start();

      $_SESSION["Productid"] = $_GET['product'];
      $_SESSION["Productid2"] = $_GET['product2'];
      $_SESSION["Productid3"] = $_GET['product3'];
      $_SESSION["Email"] = $_GET['email'];

      header("Location: ../members/order.php");
?>