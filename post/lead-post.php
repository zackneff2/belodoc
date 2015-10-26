<?php
 /*
  session_start();
  $email = $_POST['email'];
  $state = $_POST['state'];
  $formcontent = "
  State: $state \n
  Email: $email \n";

    $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
    $myusername = "zneff";   // the username specified when setting-up the database
    $dbpassword = "Z483026074!";   // the password specified when setting-up the database
    $database = "belo"; 

    $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

 $sql = "INSERT INTO lead (email, state)
 VALUES ('$email', '$state');";


if (!mysqli_query($conn, $sql)) {
    return "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

  $to = "info@belodoc.com";
  $subject = "New State Lead Submission: $name";
  $header = "From: info@belodoc.com \r\n";
  $header .= "Reply-To: $email \r\n";
  mail($to, $subject, $formcontent, $header);

  $to = "$email";
  $subject = "Your Online Dermatologist - Coming to you soon";
  $header = "From: info@belodoc.com \r\n";
  $header .= "Reply-To: info@belodoc.com \r\n";
  $formcontent = "Hi, \n\nThanks for your interest in BeloDoc! Unfortunately, we are not yet able to treat patients in ".$state.". We will notify you when our services are available in your state. \n\n
  In the meantime, check out our blog at https://belodoc.com/blog for our daily skin tips.  \n\n
  Wishing you the best on the path to beautiful skin, \n
  The BeloDoc Team \r\n";
  mail($to, $subject, $formcontent, $header);

  $_SESSION["Message"] = "Thanks, we'll let you know when we're available for treatment in your state.";

  header("Location: ../thanks.php");

  */
  ?>