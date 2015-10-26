<?php

  session_start();
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $formcontent = "
  Name: $name \n
  Email: $email \n
  Message: $message \n";


  $to = "info@belodoc.com";
  $subject = "New Home Page Contact Submission: $name";
  $header = "From: info@belodoc.com \r\n";
  $header .= "Reply-To: $email \r\n";
  mail($to, $subject, $formcontent, $header);

  $_SESSION["Message"] = "Thanks, your submission has been sent. We'll be in contact soon.";

  header("Location: ../thanks.php");
  ?>