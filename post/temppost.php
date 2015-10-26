<?php
  session_start();
  $email = $_POST['email'];
  $formcontent = "
  Email: $email \n";

  $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
  $myusername = "zneff";   // the username specified when setting-up the database
  $dbpassword = "Z483026074!";   // the password specified when setting-up the database
  $database = "belo"; 

  $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

  $sql = "INSERT INTO lead (`email`)
  VALUES ('$email');";

  if (!mysqli_query($conn, $sql)) {
    $_SESSION["Message"] = "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("Location: ../thanks.php");
  }

  mysqli_close($conn);

  $to = "info@belodoc.com";
  $subject = "New Zip/Primary Lead Signup";
  $header = "From: info@belodoc.com \r\n";
  $header .= "Reply-To: $email \r\n";
  mail($to, $subject, $formcontent, $header);

  $_SESSION["Message"] = "Thanks, your email has been submitted. We will let you know as soon as treatment is available in your state.";
  header("Location: ../thanks.php");
?>