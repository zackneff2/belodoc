<?php
class NewUsers {

    public function __construct() {

    }

    public function SaveUserToDB($NewUser) {
        $database = new Databases();

        $email = $NewUser->GetUsername();
        $name = $NewUser->GetName();
        $password = $NewUser->GetPassword();
        $salt = $NewUser->GetSalt();
        $joined = date("Y-m-d");
        $confirm = $NewUser->GetConfirm();
        $state = $_SESSION["State"];

        $sql = "INSERT INTO member (email, fullName, encryptedPassword, salt, joined, confirm, state)
        VALUES ('$email', '$name', '$password', '$salt', '$joined', '$confirm', '$state');";

    	$result = mysqli_query($database->conn, $sql);
        
        if (!$result) {
      		$_SESSION["UserSaved"] = false;
    	}

        $database->closeConnection();
    }

    public function GetInfo() {
        $database = new Databases();

        $email = $_SESSION["username"];
        if (isset($_SESSION["Email"])) {
            $email = $_SESSION["Email"];
        }

        $sql = "SELECT * FROM memberConfirmed WHERE email = '$email'";
        $result = mysqli_query($database->conn, $sql);
        if (mysqli_num_rows($result) != 0) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION["Name"] = $row["fullName"];
            $_SESSION["Email"] = $row["email"];
            $_SESSION["OrderDate"] = $row["joined"];
            $_SESSION["Role"] = $row["role"];
        }

    }

    public function GetPatientID() {
        $database = new Databases();

        $email = $_SESSION["username"];
        if (isset($_SESSION["Email"])) {
            $email = $_SESSION["Email"];
        }

        $sql = "SELECT id FROM memberConfirmed WHERE email = '$email'";
        $result = mysqli_query($database->conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $row["id"];
    }

    public function SaveMiniUser($array) {
        $database = new Databases();
        $email = $array['simple-email'];
        $primary = $array['primary'];
        $zip = $array['zip'];

        $sql = "INSERT INTO leads (email, primaryCondition, state)
        VALUES ('$email', '$primary', '$zip');";


        if (!mysqli_query($conn, $sql)) {
            $_SESSION["UserSaved"] = false;
        }

        $database->closeConnection();
    }
}
?>