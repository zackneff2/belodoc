<?php
Class Users {

	function __construct($array) { // Receives an instance of uFlex
        $this->username = $array['username'];
        $this->password = $array['password'];
    }

	public function LogUserIn() {
        $database = new Databases();

        $username = $this->username;

		$sql = "SELECT * FROM memberConfirmed WHERE email = '$username'";

        $query = mysqli_query($database->conn, $sql);

		if(mysqli_num_rows($query) != 0) {

            $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

            $hash = hash('sha256', $this->password);

            $salt = $row["salt"];

            $password = hash('sha256', $salt . $hash);

    		if ($this->username == $row["email"] && $password == $row["encryptedPassword"]) {
                session_start();
                $_SESSION["loggedIn"] = 1;
                $_SESSION["username"] = $row["email"];
                $_SESSION["Name"] = $row["fullName"];
                $_SESSION["Email"] = $row["email"];
                $_SESSION["redirect"] = 1;
                $_SESSION["Password-errors"] = "";
                $_SESSION["Username-errors"] = "";
                $_SESSION["redirect"] = 1;
            }
            else {
                $_SESSION["login-error"]  = 1;
                return false;
            }
        }
        else {
            $_SESSION["login-error"] = 1;
            return false;
        }
	}

    public function AdminLogin() {
        $database = new Databases();

        $username = $this->username;

        $sql = "SELECT * FROM memberConfirmed WHERE username = '$username'";

        $query = mysqli_query($database->conn, $sql);

        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

        $hash = hash('sha256', $this->password);

        $salt = $row['salt'];

        $admin = $row['role'];

        $password = hash('sha256', $salt . $hash);

        if ($this->username == $row['username']) {
            if ($password== $row['password']) {
                if ($admin == 1) {
                    session_start();
                    $_SESSION["loggedIn"] = 1;
                    $_SESSION["username"] = $username;
                    $_SESSION["name"] = $row['name'];
                    $_SESSION["admin"] = true;
                }
                else {
                    session_start();
                    $_SESSION["loggedIn"] = 1;
                    $_SESSION["username"] = $username;
                    $_SESSION["name"] = $row['name'];
                }
            }
            else {
                echo "Your Password is incorrect!";   
            } 
        }
        else if (empty($row['username'])) {
            echo "Our records do not show an account with the given username and password. Please register here!";
        } 
    }

    public $conn;
    public $username;
    public $password;

}