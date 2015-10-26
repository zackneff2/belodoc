<?php
require_once('../lib/cls/Databases.php');
require_once('../lib/cls/Users.php');
session_start();

$database = new Databases();

$passkey = $_GET['passkey'];

$sql = "SELECT * FROM member WHERE confirm = '$passkey'";

$result = mysqli_query($database->conn, $sql);

if (mysqli_num_rows($result) != 0) {
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $name = $row["fullName"];
  $email = $row["email"];
  $password = $row["encryptedPassword"];
  $salt = $row["salt"];
  $state = $row["state"];
  $joined = date("Y-m-d");
  $role = 0;

  $sql = "INSERT INTO memberConfirmed (email, fullName, encryptedPassword, salt, state, joined, role)
  VALUES ('$email', '$name', '$password', '$salt', '$state', '$joined', '$role')";

  $result = mysqli_query($database->conn, $sql);

  $sql = "DELETE FROM member WHERE confirm = '$passkey';";

  $result = mysqli_query($database->conn, $sql);

  $sql = "SELECT id FROM memberConfirmed WHERE email = '$email'";

  $result = mysqli_query($database->conn, $sql);

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $patientid = $row["id"];

  $sql = "UPDATE survey SET patientid = '$patientid' WHERE email = '$email'";

  $result = mysqli_query($database->conn, $sql);
}

if($result) {
  $_SESSION["loggedIn"] = 1;
  $_SESSION["Message"] = "";
  $database->closeConnection();
  header("Location: ../members");
} 
else {
  $_SESSION["MemberConfirmed"] = false;
  $database->closeConnection();
  header("Location: ../");
}
?>
