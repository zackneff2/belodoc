<?php
      session_start();

      $_SESSION["Email"] = $_GET['email'];
      $_SESSION["plan"] = $_GET['plan'];

      header("Location: ../signup/checkout.php");
?>