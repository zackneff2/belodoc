<?php
session_start();
require '../vendor/autoload.php';
require '../lib/site.inc.php';
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account
\Stripe\Stripe::setApiKey("sk_live_Ah63oxmM5a6oSVBAnXwE8mgM");

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];

$products = new Products();

$products->getID($_POST);

$products->getPrices();

$price = 0;

if ($_POST["product"]) {
	$price += $_SESSION["Price"];
}
if ($_POST["product2"]) {
	$price += $_SESSION["Price2"];
}
if ($_POST["product3"]) {
	$price += $_SESSION["Price3"];
}
$_SESSION["Price"] = $price;

$price = $price * 100; // Convert to cents for Stripe charge

$profile = new Profiles();

if($profile->getStripeID()) {
	$stripeid = $_SESSION["Stripeid"];

	$order = new Orders();

	$order->saveOrder($stripeid);

	try {
		$charge = \Stripe\Charge::create(array(
	  "amount" => $price, // amount in cents, again
	  "currency" => "usd",
	  "customer" => $stripeid,
	  "description" => "info@belodoc.com")
	); 
	}
	catch(\Stripe\Error\Card $e) {
	  // The card has been declined
	}

}
else {
	try {
		$charge = \Stripe\Charge::create(array(
	  "amount" => $price, // amount in cents, again
	  "currency" => "usd",
	  "source" => $token,
	  "description" => "info@belodoc.com")
	); 
	}
	catch(\Stripe\Error\Card $e) {
	  // The card has been declined
	}
}





$to = $email;
$subject = "BeloDoc Order Receipt";

$headers = "From: info@belodoc.com\r\n";
$headers .= "Reply-To: info@belodoc.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
$message .= '<img src="http://belodoc.com/images/logo1.png" alt="BeloDoc Logo" />';
$message .= '<hr />';
$message .= '<table rules="all" style="border: 5px solid #1abc9c;">';
$message .= '<tr style="padding:10px; border: white;"><td style="padding:30px 30px 0px 30px;"><h1 style="font-size: 22px; font-family:Helvetica, sans-serif; font-weight: 300;">Hi '.$name.',</h1><br/><p style="margin-top: 0px;font-size: 18px; font-weight: 300; line-height:1.5; font-family: Helvetica, sans-serif;">Thanks for placing your order. Your products will arrive within 5 business days. Well notify you with tracking information once your order has shipped.</p><p style="margin-top: 0px;font-size: 18px; font-weight: 300; line-height:1.5; font-family: Helvetica, sans-serif;">Thanks, <br />The BeloDoc Team</p></td></tr>';
$message .= '</table>';
$message .= '</body></html>';

mail($to, $subject, $message, $headers);

$to = "info@belodoc.com";

mail($to, $subject, $message, $headers);

if ($charge) {
	$_SESSION["Message"] = "Thanks for placing your order. Your products will arrive within 5 business days. Well notify you with tracking information once your order has shipped.";
  header("Location: ../thanks.php");
}

?>
