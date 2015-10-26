<?php

Class Users {

	function __construct($User) { // Receives an instance of uFlex
        $this->user = $User;
    }

    private function ConnectToDB() {
    	$hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
  		$myusername = "zneff";   // the username specified when setting-up the database
  		$dbpassword = "Z483026074!";   // the password specified when setting-up the database
  		$database = "belo"; 

  		$conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);
  		return $conn;
    }

    public function SaveUserToDB($User) {
    	
    	$sql = "INSERT INTO member (confirm, username, password, salt, name)
    	VALUES ('$confirm', '$username', '$password', '$salt', '$name');";

    	$conn = ConnectToDB();

    	if (!mysqli_query($conn, $sql)) {
      		return "Error: " . $sql . "<br>" . mysqli_error($conn);
    	}

    	mysqli_close($conn);
    }

    public function ValidatePassword($username, $password, $salt) {
    	
    	$conn = ConnectToDB();

    	$sql = mysql_query("SELECT * FROM memberConfirmed WHERE username = '$username'");

		$row = mysqli_fetch_array($conn, $sql);

		$hash = hash('sha256', $password);

		$salt = $salt;

		$password = hash('sha256', $salt . $hash);

		if ($password == $row['password']) {
			return true;		
    	}
    	else {
    		return false;	
    	}
	}

	public function LogUserIn($username, $password) {
		$conn = ConnectToDB();

		$sql = mysql_query("SELECT * FROM memberConfirmed WHERE username = '$username'");

		$row = mysqli_fetch_array($conn, $sql);

		if ($username == $row['username']) {
			if (ValidatePassword($username, $password, $row['salt'])) {
				session_start();
    				$_SESSION["loggedIn"] = true;
    				$_SESSION["username"] = $username;
    				$_SESSION["name"] = $row['name'];
    			header('Location: http://belodoc.com/beta/templates/members.php');
			}
		} 
            else {
                echo "Your password is incorrect!";
            }
        else if (empty($row['username'])) {
            echo "Our records do not show an account with the given username and password. Please register here!";
        }
	}

    public $conn;

}