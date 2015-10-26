<?php
session_start();
$_SESSION["State"] = $_POST["state"];
header("Location: ../signup/");
?>