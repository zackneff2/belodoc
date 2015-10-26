<?php 

class Settings {

	public function __construct() {

	}

  public function getSettings() {
    $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
    $myusername = "zneff";   // the username specified when setting-up the database
    $dbpassword = "Z483026074!";   // the password specified when setting-up the database
    $database = "belo"; 

    $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

    $email = $_SESSION["Email"];

    $sql = "SELECT * FROM settings WHERE email = '$email'";

    $query = mysqli_query($conn, $sql);

    if ($query) {
      $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
      $_SESSION["Address"] = $row["address"];
      $_SESSION["City"] = $row["city"];
      $_SESSION["State"] = $row["state"];
      $_SESSION["Zip"] = $row["zip"];
      $_SESSION["Phone"] = $row["phone"];
    }

    mysqli_close($conn);
  }

	public function saveSettings($setting) {
	  $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
    $myusername = "zneff";   // the username specified when setting-up the database
    $dbpassword = "Z483026074!";   // the password specified when setting-up the database
    $database = "belo"; 

    $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

    $account = $_SESSION["Email"];
    $email = mysqli_real_escape_string($conn, $setting->email);
  	$phone = mysqli_real_escape_string($conn, $setting->phone);
  	$address = mysqli_real_escape_string($conn, $setting->address);
    $city = mysqli_real_escape_string($conn, $setting->city);
  	$state = mysqli_real_escape_string($conn, $setting->state);
 	  $zip = mysqli_real_escape_string($conn, $setting->zip);

   	$checkUser = "SELECT COUNT(*) AS num FROM settings WHERE email = '$account'";

   	$query = mysqli_query($conn, $checkUser);

    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

    $count = $row["num"];

   	if ($count == 0) {
      $sql = "INSERT INTO settings (email, phone, address, city, state, zip)
      VALUES ('$email', '$phone', '$address', '$city', '$state', '$zip')";
      
      $query = mysqli_query($conn, $sql);

      $sql = "UPDATE  memberConfirmed
      SET username = '$email' 
      WHERE username = '$account'";

      $query = mysqli_query($conn, $sql);
   	} else {
      $sql = "UPDATE  settings 
      SET email = '$email', phone = '$phone', address = '$address', city = '$city', state = '$state', zip = '$zip' 
      WHERE email = '$account'";

      $query = mysqli_query($conn, $sql); 

      $sql = "UPDATE  memberConfirmed
      SET username = '$email' 
      WHERE username = '$account'";

      $query = mysqli_query($conn, $sql);
   	}

   	if ($query) {
      $_SESSION["Email"] = $email;
   		$_SESSION["Redirect"] = 1;
   	}
    else {
      $_SESSION["Redirect"] = 0;
    }

   	mysqli_close($conn);
    }
}
?>