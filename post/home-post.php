<?php

  session_start();
  $email = $_POST['simple-email'];
  $primary = $_POST['primary'];
  $userZip= $_POST['zip'];
  $formcontent = "
  Email: $email \n
  Primary: $primary \n
  Zip: $userZip \n";

  $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
  $myusername = "zneff";   // the username specified when setting-up the database
  $dbpassword = "Z483026074!";   // the password specified when setting-up the database
  $database = "belo"; 

  $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

  $sql = "INSERT INTO lead (`email`, `primary`, `zip`)
  VALUES ('$email', '$primary', '$userZip');";

  if (!mysqli_query($conn, $sql)) {
    return "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

  $to = "info@belodoc.com";
  $subject = "New Zip/Primary Lead Signup";
  $header = "From: info@belodoc.com \r\n";
  $header .= "Reply-To: $email \r\n";
  mail($to, $subject, $formcontent, $header);


for ($zip = 48000; $zip < 50000; $zip++) {
	if ($userZip == $zip) {
		$_SESSION["Redirect"] = 1;
	}
}
if ($_SESSION["Redirect"] == 1) {
  header("Location: ../signup");
}
else {
  $_SESSION["Message"] = "We're currently available in Michigan. Soon, we'll be coming to California, New York, Illinois, Florida, and more. We'll let you know as soon as we're available for treatment in your state.";
  
  $to = "$email";
  $subject = "Your Online Dermatologist - Coming to you soon";
  $header = "From: info@belodoc.com \r\n";
  $header .= "Reply-To: info@belodoc.com \r\n";
  $formcontent = "Hi, \n\nThanks for your interest in BeloDoc. Unfortunately, we're not yet able to treat patients in your state. We will notify you when our services are available near you. \n\n
  In the meantime, check out our blog at https://belodoc.com/blog for our daily skin tips. \n\n
  Wishing you the best on the path to beautiful skin, \n
  The BeloDoc Team \r\n";
  mail($to, $subject, $formcontent, $header);

  header("Location: ../thanks.php");
}
?>