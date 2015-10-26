<?php
session_start();
$_SESSION["Condition"] = $_POST["primary-condition"];
header("Location: ../signup/condition/");
?>