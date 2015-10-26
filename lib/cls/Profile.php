<?php

class Profile {

	public function __construct($array) {
		$this->email = $array['email'];
		$this->consultationResponse = $array['message'];
		$this->product = $array['product'];
		$this->instruct = $array['instruct'];
		$this->product2 = $array['product2'];
		$this->instruct2 = $array['instruct2'];
		$this->product3 = $array['product3'];
		$this->instruct3 = $array['instruct3'];
	}

	public function sendResponse() {
		$to = $this->email;

		$email = $to;

    	$response = $this->consultationResponse;

    	$instruct = $this->instruct;

    	$instruct2 = $this->instruct2;

    	$instruct3 = $this->instruct3;

    	$product = $_SESSION["Productid"];
    	$product2 = $_SESSION["Productid2"];
    	$product3 = $_SESSION["Productid3"];

    	$imageOne = strtolower($product);
    	$imageTwo = strtolower($product2);
    	$imageThree = strtolower($product3);

		$subject = "Your Consultation Response";

		$headers = "From: info@belodoc.com\r\n";
		$headers .= "Reply-To: info@belodoc.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$message = '<html><head>'."\r\n";
		$message .= '<style>p[class="instruct"]{font-size: 18px;font-weight: 200;line-height: 1.5;font-family: Open-Sans, sans-serif;margin-top: 5px;display: inline-block;padding: 15px 30px 45px 30px;}'."\r\n";
		$message .= '</style>'."\r\n";
		$message .= '</head><body>'."\r\n";
		$message .= '<div style="width: 100%;">'."\r\n";
		$message .= '<div style="border: 5px solid #1abc9c;">'."\r\n";
		$message .= '<table rules="all">'."\r\n";
		$message .= '<tr style="padding:0px 10px 10px 10px;"><td style="padding:0px 30px 0px 30px;border:none;"><img src="https://belodoc.com/images/logo1.png" alt="BeloDoc Logo" /></td><td style="padding:0px 30px 0px 30px;border:none;"><button style="position: relative;display: inline-block;height: 50px;margin: auto;padding: 16px 20px 16px 20px;background: #1abc9c;font-size: 16px;font-weight: 300;line-height: 16px;border-radius: 4px;"><a style="text-decoration:none;color:#fff;" href="https://belodoc.com/get/order-get.php?product='.$product.'&product2='.$product2.'&product3='.$product3.'">Order Your Products</a></button></td></tr>'."\r\n";
		$message .= '<tr style="padding:10px;"><td colspan="2" style="padding:30px 30px 0px 30px;border-bottom: 5px solid #484f53;"><p style="margin-top: 0px;margin-bottom:10px;font-size: 18px; font-weight: 300; line-height:1.5; font-family: Open-Sans, sans-serif;">'.$response.'</p></tr></td>'."\r\n";
		$message .= '<tr style="padding:10px;"><td style="padding:0px 30px 0px 30px;border:none;"><p class="instruct" style="font-size: 18px;font-weight: 200;line-height: 1.5;font-family: Open-Sans, sans-serif;margin-top: 5px;display: inline-block;padding: 15px 30px 45px 30px;">'.$instruct.'</p></td><td style="padding:0px 30px 0px 30px;border:none;"><img class="prod" src="https://belodoc.com/images/'.$imageOne.'.jpg" /></td></tr>'."\r\n";
		$message .= '<tr style="padding:10px;"><td style="padding:0px 30px 0px 30px;border:none;"><p class="instruct" style="font-size: 18px;font-weight: 200;line-height: 1.5;font-family: Open-Sans, sans-serif;margin-top: 5px;display: inline-block;padding: 15px 30px 45px 30px;">'.$instruct2.'</p></td><td style="padding:0px 30px 0px 30px;border:none;"><img class="prod" src="https://belodoc.com/images/'.$imageTwo.'.jpg" /></td></tr>'."\r\n";
		//$message .= '<tr style="padding:10px;"><td style="padding:0px 30px 0px 30px;border:none;"><p class="instruct" style="font-size: 18px;font-weight: 200;line-height: 1.5;font-family: Open-Sans, sans-serif;margin-top: 5px;display: inline-block;padding: 15px 30px 45px 30px;">'.$instruct3.'</p></td><td style="padding:0px 30px 0px 30px;border:none;"><img class="prod" src="https://belodoc.com/images/'.$imageThree.'.jpg" /></td></tr>'."\r\n";
		$message .= '<tr style="padding:10px;"><td colspan="2" style="padding:0px 30px 0px 30px;border:none;"><button style="color:#fff;position: relative;display: inline-block;height: 50px;margin: auto;padding: 16px 20px 16px 20px;background: #1abc9c;font-size: 16px;font-weight: 300;line-height: 16px;border-radius: 4px;margin-top:20px;margin-bottom:20px;"><a style="text-decoration:none;color:#fff;" href="https://belodoc.com/get/order-get.php?product='.$product.'&product2='.$product2.'&product3='.$product3.'&email='.$email.'">Order Your Products</a></button></td></tr>'."\r\n";
		$message .= '</table>'."\r\n";
		$message .= '</div></div>'."\r\n";
		$message .= '</body></html>'."\r\n";
		
		mail($to, $subject, $message, $headers);
	}

	public $yourPlan = '';
	public $product = '';
	public $instruct = '';
	public $product2 = '';
	public $instruct2 = '';
	public $product3 = '';
	public $instruct3 = '';
	public $consultationResponse = '';
	public $email = '';

}
