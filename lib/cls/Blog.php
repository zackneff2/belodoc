<?php

class Blog {
	public function __construct($array) {
		$this->title = $array['title'];
		$this->desc = $array['desc'];
		$this->auth = $array['auth'];
		$this->cont = $array['cont'];
	}

	public function getAuthor() {
		if ($this->auth == "Zack Neff") {
			$this->auth = 1;
		}
		else if ($this->auth == "Josh Gottesman") {
			$this->auth = 2;
		}
		else if ($this->auth == "Max Shek") {
			$this->auth = 3;
		}
	}

	public function uploadPhoto($array) {
     $target_dir = "/uploads/blog/";
	 $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
	 $uploadOk = 1;
	 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

     $this->img = $target_file;

     $target_dir = "../uploads/blog/";
     $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);

      if(file_exists($target_file)) {
        $temp = explode(".",$_FILES['fileUpload']['name']);
        $newfilename = rand(1,99999) . '.' .end($temp);
        $target_dir = "/uploads/blog/";
	 	$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        $this->img = $target_file;
        $target_dir = "../uploads/blog/";
       	$target_file = $target_dir . $newfilename;
      } 

      $ftp_server = "lintilla.dreamhost.com";
  	  $ftp_username = "belodoc";
      $ftp_pass = "Z483026074!";

  	  $conn_id = ftp_connect($ftp_server);
  	  $login_result = ftp_login($conn_id, $ftp_username, $ftp_pass);

      if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
 		$_SESSION["upload"] = true;
      }
      else {
      	$_SESSION["upload"] = false;
      }

  	  ftp_close($conn_id);
	}

	
	public $title = '';
	public $desc = '';
	public $auth = '';
	public $cont = '';
	public $img = '';
	public $date = '';
}

?>