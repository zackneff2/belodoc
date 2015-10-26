<?php
session_start();
require '../vendor/autoload.php';
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account
\Stripe\Stripe::setApiKey("sk_live_Ah63oxmM5a6oSVBAnXwE8mgM");

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];
$email = $_SESSION["Email"];
$name = $_SESSION["Name"];
$plan = $_SESSION["plan"];

if (isset($_SESSION["price"])) {
	$price = $_SESSION["price"];
}
else {
	$price = 0;
}

$price = $price * 100; // Convert to cents for Stripe charge

if ($plan == "subscription") { 
  try {
  $customer = \Stripe\Customer::create(array(
  "source" => $token,
  "description" => $name,
  "email" => $email,
  "plan" => "belo")
);
  } catch(\Stripe\Error\Card $e) {
  // Since it's a decline, \Stripe\Error\Card will be caught
  $body = $e->getJsonBody();
  $err  = $body['error'];

  print($err['message'] . "\n");
  print("Please follow the link in your confirmation email to complete your checkout and ensure your consultation gets submit. If you have any questions, please reach out to info@belodoc.com.");

} catch (\Stripe\Error\InvalidRequest $e) {
  // Invalid parameters were supplied to Stripe's API
} catch (\Stripe\Error\Authentication $e) {
  // Authentication with Stripe's API failed
  // (maybe you changed API keys recently)
} catch (\Stripe\Error\ApiConnection $e) {
  // Network communication with Stripe failed
} catch (\Stripe\Error\Base $e) {
  // Display a very generic error to the user, and maybe send
  // yourself an email
} catch (Exception $e) {
  // Something else happened, completely unrelated to Stripe
}
}
else  {
$customer = \Stripe\Customer::create(array(
  "source" => $token,
  "description" => $name,
  "email" => $email)
);
}
// Create the charge on Stripe's servers - this will charge the user's card
/*
if ($plan == "per") {
  try {
$charge = \Stripe\Charge::create(array(
  "amount" => $price, // amount in cents, again
  "currency" => "usd",
  "customer" => $customer->id,
  "description" => "info@belodoc.com")
);
} catch(\Stripe\Error\Card $e) {
  // Since it's a decline, \Stripe\Error\Card will be caught
  $body = $e->getJsonBody();
  $err  = $body['error'];

  print($err['message'] . "\n");
  print("Please follow the link in your confirmation email to complete your checkout and ensure your consultation gets submit. If you have any questions, please reach out to info@belodoc.com.");

} catch (\Stripe\Error\InvalidRequest $e) {
  // Invalid parameters were supplied to Stripe's API
} catch (\Stripe\Error\Authentication $e) {
  // Authentication with Stripe's API failed
  // (maybe you changed API keys recently)
} catch (\Stripe\Error\ApiConnection $e) {
  // Network communication with Stripe failed
} catch (\Stripe\Error\Base $e) {
  // Display a very generic error to the user, and maybe send
  // yourself an email
} catch (Exception $e) {
  // Something else happened, completely unrelated to Stripe
}
}
*/

$names = explode(" ", $name);
$firstname = $names[0];

$to = $email;
$subject = "BeloDoc Consultation Receipt";

$headers = "From: info@belodoc.com\r\n";
$headers .= "Reply-To: info@belodoc.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
$message .= '<img src="http://belodoc.com/images/logo.png" alt="BeloDoc Logo" />';
$message .= '<hr />';
$message .= '<table rules="all" style="border: 5px solid #1abc9c;">';
$message .= '<tr style="padding:10px; border: white;"><td style="padding:30px 30px 0px 30px;"><h1 style="font-size: 22px; font-family:Helvetica, sans-serif; font-weight: 300;">Hi '.$name.',</h1><br/><p style="margin-top: 0px;font-size: 18px; font-weight: 300; line-height:1.5; font-family: Helvetica, sans-serif;">We have received your consultation request and it is currently under review by your dermatologist. In the next 48 hours, you will receive an email from your dermatologist outlining your skincare regimen. If you have any questions or concerns, feel free to contact us at any time.</p><p style="margin-top: 5px;font-size: 18px; font-weight: 300; line-height:1.5; font-family: Helvetica, sans-serif;">Thanks for choosing BeloDoc, and we look forward to speaking with you soon!</p><p style="margin-top: 0px;font-size: 18px; font-weight: 300; line-height:1.5; font-family: Helvetica, sans-serif;">Thanks, <br />The BeloDoc Team</p></td></tr>';
$message .= '</table>';
$message .= '</body></html>';

if ($customer) {
  mail($to, $subject, $message, $headers);
  $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
  $myusername = "zneff";   // the username specified when setting-up the database
  $dbpassword = "Z483026074!";   // the password specified when setting-up the database
  $database = "belo"; 

  $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

  $date = date("Y-m-d");
  $price = $price / 100;

  $sql = "INSERT INTO orders (stripeid, orderdate, email, amount)
  VALUES ('$customer->id', '$date', '$email', '$price');";

  if (!mysqli_query($conn, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  else {
    $_SESSION["conversion"] = true;
  }

  mysqli_close($conn);
}





if ($customer) {
  $_SESSION["Message"] = "Thanks, your consultation has been submitted. Your doctor will respond within 2 business days.";
  header("Location: ../thanks.php");
}

?>


