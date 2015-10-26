<?php
      session_start();

      $_SESSION["plan"] = $_GET['plan'];

      header('Location: ../signup/state');
?>