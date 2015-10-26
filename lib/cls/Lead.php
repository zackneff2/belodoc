<?php

    class Lead {

        public function __construct() {


        }

    public function setHomeLead($array) {
        $this->email = $array['simple-email'];
        $this->primary = $array['priamry'];
        $this->zip = $array['zip'];
    }

    public function setStateLead($array) {
        $this->email = $array['email'];
        $this->zip = $array['state'];
    }

    public function SaveLead() {

    $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
    $myusername = "zneff";   // the username specified when setting-up the database
    $dbpassword = "Z483026074!";   // the password specified when setting-up the database
    $database = "belo"; 

    $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

    $email = $this->email;
    $primary = $this->primary;
    $zip = $this->zip;

    $sql = "INSERT INTO lead (email, primary, zip)
    VALUES ('$email', '$primary', '$zip');";

    $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION["Redirect"] = 1;
        }
        else {
            $_SESSION["Redirect"] = 0;
            return "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

    }

    public $email = '';
    public $primary = '';
    public $zip = '';
}

?>