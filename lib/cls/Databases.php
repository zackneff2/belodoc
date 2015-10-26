<?php
class Databases {

	public function __construct() {
    	$this->conn = mysqli_connect($this->hostname, $this->username, $this->dbpassword, $this->database, $this->port);
		if ($this->conn == false) {
			return false;
		}
	}

	public function closeConnection() {
		mysqli_close($this->conn);
	}

	public $hostname = "aa11f9vw1kpww7t.c6rezger32ld.us-west-2.rds.amazonaws.com";
	public $username = "zneff";
	public $dbpassword = "DegoRijj1";
	public $database = "belo";
	public $port = 3306;
	public $conn = '';
}
?>