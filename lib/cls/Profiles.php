<?php
class Profiles {

	public function __construct() {

	}

	public function saveProfile($profile) {
    $database = new Databases();

    $email = mysqli_real_escape_string($database->conn, $profile->email);
  	$message = mysqli_real_escape_string($database->conn, $profile->consultationResponse);

    $sql = "SELECT id FROM memberConfirmed WHERE email = '$email'";

    $result = mysqli_query($database->conn, $sql);

    if ($result) {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $id = $row['id'];

      $sql = "INSERT INTO treatment (patientid, message)
      VALUES ('$id', '$message')";

      $result = mysqli_query($database->conn, $sql);
    }

    if ($result) {
      $instruct = mysqli_real_escape_string($database->conn, $profile->instruct);
      $instruct2 = mysqli_real_escape_string($database->conn, $profile->instruct2);
      $instruct3 = mysqli_real_escape_string($database->conn, $profile->instruct3);

      $product = $profile->product;
      $product2 = $profile->product2;
      $product3 = $profile->product3;

      $sql = "SELECT id FROM treatment WHERE patientid = '$id'";
      $result = mysqli_query($database->conn, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $treatmentid = $row['id'];

      $sql = "INSERT INTO treatment_products (treatmentid, productid, instructions)
      VALUES ('$treatmentid', '$product', '$instruct')";

      $sql2 = "INSERT INTO treatment_products (treatmentid, productid, instructions)
      VALUES ('$treatmentid', '$product2', '$instruct2')";

      $sql3 = "INSERT INTO treatment_products (treatmentid, productid, instructions)
      VALUES ('$treatmentid', '$product3', '$instruct3')";

      $result = mysqli_query($database->conn, $sql);
      $result2 = mysqli_query($database->conn, $sql2);
      $result3 = mysqli_query($database->conn, $sql3);

    }

    if (!$result){
      	$_SESSION["redirect"] = 0;
      	echo "Error: " . $query . "<br>" . mysqli_error($database->conn);
    }
    else {
        $_SESSION["redirect"] = 1;
    }

    $database->closeConnection();
	}

  public function getProfile() {
    $database = new Databases();

    if (isset($_SESSION["username"])) {
      $email = $_SESSION["username"];
      
      $user = new NewUsers();

      $patientid = $user->GetPatientID();

      $query = "SELECT * FROM treatment WHERE patientid = '$patientid'";

      $result = mysqli_query($database->conn, $query);

      if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION["Response"] = $row["message"];
        return true;
      }
      else {
        $_SESSION["Response"] = false;
        return false;
      }
      /*
      $_SESSION["Product"] = $row["product"];
      $_SESSION["Instruct"] = $row["instruct"];
      $_SESSION["Product2"] = $row["product2"];
      $_SESSION["Instruct2"] = $row["instruct2"];
      $_SESSION["Product3"] = $row["product3"];
      $_SESSION["Instruct3"] = $row["instruct3"];
      $_SESSION["ImageOne"] = $row["image"];
      $_SESSION["ImageTwo"] = $row["imagetwo"];
      $_SESSION["ImageThree"] = $row["imagethree"];
      */
    }
    return false;
  }

  public function getName($consultation) {
    $_SESSION["Name"] = $consultation->GetFirstName();
  }

  public function getStripeID() {
    $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
    $myusername = "zneff";   // the username specified when setting-up the database
    $dbpassword = "Z483026074!";   // the password specified when setting-up the database
    $database = "belo"; 

    $database->conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

    $email = $_SESSION["Email"];

    $query = "SELECT * FROM memberConfirmed where username = '$email'";

    $result = mysqli_query($database->conn, $query);

    if (!$result) {
      $query = "SELECT * FROM orders where email = '$email'";
    }
    else {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $_SESSION["Stripeid"] = $row['stripeid'];
    }

    $result = mysqli_query($database->conn, $query);
    if (!$result) {
      return false;
    }
    else {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $_SESSION["Stripeid"] = $row['stripeid'];
      return true;
    }
  }

}
