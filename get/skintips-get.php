<?php
      session_start();

      $_SESSION["tab"] = $_GET['active'];

      header("Location: ../skintips");
?>