<?php
class NewUser {

	public function __construct($array) {
		$this->username = $array['email'];
		$this->name = $array['full-name'];
		$names = explode(" ", $array['full-name']);
		$this->firstname = $names[0];
		$this->lastname = $names[1];
		$this->confirm = md5(uniqid(rand()));
	}

	public function GetUsername() {
		return $this->username;
	}
	public function GetSalt() {
		return $this->salt;
	}
	public function GetPassword() {
		return $this->password;
	}
	public function GetFirstName() {
		return $this->firstname;
	}
	public function GetName() {
		return $this->name;
	}
	public function GetConfirm() {
		return $this->confirm;
	}

	public function SetPassword($array) {
		$not_hash_password = $array['password'];
		$hash = hash('sha256', $not_hash_password);

    	$text = md5(uniqid(rand(), true));
    	$this->salt = substr($text, 0, 16);

  		$this->password = hash('sha256', $this->GetSalt() . $hash);
	}

	public function SetConfirmCode() {
		$this->confirm = md5(uniqid(rand()));
	}

	public function SendConfirmEmail() {
    	$to = $this->GetUsername();

    	$confirm = $this->GetConfirm();

    	$name = $this->GetFirstName();

    	$plan = $_SESSION["plan"];

    	$names = explode(" ", $name);

		$subject = "Confirm your account on BeloDoc";

		$headers = "From: info@belodoc.com\r\n";
		$headers .= "Reply-To: info@belodoc.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$message = '<html><body>'."\r\n";
		$message .= '<img src="http://belodoc.com/images/logo1.png" alt="BeloDoc Logo" />'."\r\n";
		$message .= '<hr />'."\r\n";
		$message .= '<table rules="all" style="border: 5px solid #1abc9c;">'."\r\n";
		$message .= '<tr style="padding:10px; border: white;"><td style="padding:30px 30px 0px 30px;"><h1 style="font-size: 22px; font-family:Helvetica, sans-serif; font-weight: 300;">Hi '.$names[0].',</h1><br/><p style="margin-top: 0px;font-size: 18px; font-weight: 300; line-height:1.5; font-family: Helvetica, sans-serif;">Thanks for creating your BeloDoc account. We have received your information and are excited to get you started on the simple path to beautiful skin. Before we can do so, please confirm you account by following the link below.'."\r\n".' Also, in order to ensure your consultation was submitted, if you have not yet, please submit your payment to <a href="https://belodoc.com/get/checkout-get.php?plan='.$plan.'&email='.$to.'">BeloDoc</a>.</p><p style="margin-top: 0px;font-size: 18px; font-weight: 300; line-height:1.5; font-family: Helvetica, sans-serif;"><a href="https://belodoc.com/pro/confirmation.php?passkey='.$confirm.'">Confirm Your Account Here</a></p></td></tr>'."\r\n";
		$message .= '<tr style="padding:10px;"><td style="padding:0px 30px 0px 30px;"><p style="font-size: 18px; font-weight: 300; line-height:1.5; font-family: Helvetica, sans-serif; margin-top: 5px;">Thanks,<br/>The BeloDoc Team</p></td></tr>'."\r\n";
		$message .= '</table>'."\r\n";
		$message .= '</body></html>'."\r\n";

		mail($to, $subject, $message, $headers);
    }

    	private $username = '';
		private $password = '';
		private $name = '';
		private $firstname = '';
		private $lastname = '';
		private $confirm = '';
		private $salt = '';
}