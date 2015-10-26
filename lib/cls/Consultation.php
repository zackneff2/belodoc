<?php 

class Consultation {

  function __construct($array) {
    $questions = $_SESSION["Questions"]; 
    foreach ($questions as $question) {
      if($question == "location" || $question == "generalCon" || $question ==  "habits" || $question == "symptoms") {
        foreach ($array[$question] as $answer) {
          $this->$question .= ', '.$answer;
        }
      }
      else {
        $this->$question = $array[$question];
      }
    }
    $this->primary = $_SESSION["Condition"];
    $this->birthday = $_POST['birthday'];
    $this->name = $_POST['full-name'];
    $names = explode(" ", $this->name);
    $this->lastname = $names[1];
    $this->firstname = $names[0];
    $this->email = $_POST['email'];
  }

  public function SetPlan() {
    if (isset($_SESSION["plan"])) {
        $this->plan = $_SESSION["plan"];
    }
    else {
        $this->plan = "per";
    }
  }

  public function SetSession() {
    $_SESSION["Condition"] = $this->GetPrimary();
    $_SESSION["Oil"] = $this->GetOil();
    $_SESSION["Sensitivity"] = $this->GetSensitivity();
    $_SESSION["Name"] = $this->GetFirstName().' '.$this->GetLastName();
    $_SESSION["Email"] = $this->GetEmail();
    $_SESSION["Plan"] = $this->plan;
  }

  public function SetBinaryData($array) {
  	$this->encoded_data = $_POST['mydata'];
  	$this->binary_data = base64_decode($this->encoded_data);

  	$this->encoded_data_two = $_POST['mydatatwo'];
  	$this->binary_data_two = base64_decode($this->encoded_data_two);
  }

  public function GetBinaryDataOne() {
    return $this->binary_data;
  }

  public function GetBinaryDataTwo() {
    return $this->binary_data_two;
  }

  public function UploadPhotoToServer() {
  	  
      $target_dir = "../uploads/";

      $lastname = $this->lastname;
 	    
      $target_file = $target_dir . $lastname.'_one.jpg';
      $target_file1 = $target_dir . $lastname.'_two.jpg';
      $target_webcam = $target_dir . 'webcam_'.$lastname.'.jpg' ;
      $target_webcam_two = $target_dir . 'webcam2_'.$lastname.'.jpg';

      $this->imageOne = "$target_file";
      $this->imageTwo = "$target_file1";
      $this->webcamOne = "$target_webcam";
      $this->webcamTwo = "$target_webcam_two";

  if(file_exists($target_file)) {
        $temp = explode(".",$_FILES["fileUpload"]["name"][0]);
        $newfilename = rand(1,99999) . '.' .end($temp);
        $target_file = $target_dir . $newfilename;
        $this->imageOne = $target_file;
    } 
    if($_FILES["fileUpload"]["name"][0] == $_FILES["fileUpload"]["name"][1]) {
        $temp = explode(".",$_FILES["fileUpload"]["name"][1]);
        $newfilename = rand(1,99999) . '.' .end($temp);
        $target_file1 = $target_dir . $newfilename;
        $this->imageTwo = $target_file1;
    }
    if(file_exists($target_webcam)) {
      $newFileNameWebcam = rand(1,99999) . '.jpg';
      $target_webcam = $target_dir . $newFileNameWebcam;
      $this->webcamOne = $target_webcam;
    }
    if(file_exists($target_webcam_two)) {
      $newFileNameWebcam = rand(1,99999) . '.jpg';
      $target_webcam_two = $target_dir . $newFileNameWebcam;
      $this->webcamTwo = $target_webcam_two;
    }

  /*
  $ftp_server = "lintilla.dreamhost.com";
  $ftp_username = "belodoc";
  $ftp_pass = "Z483026074!";

  $conn_id = ftp_connect($ftp_server);
  $login_result = ftp_login($conn_id, $ftp_username, $ftp_pass);

      $result = file_put_contents($target_webcam, $this->binary_data);
      $result_two = file_put_contents($target_webcam_two, $this->binary_data_two);

      $one = move_uploaded_file($_FILES['fileUpload']['tmp_name'][0], $target_file);
      $two = move_uploaded_file($_FILES['fileUpload']['tmp_name'][1], $target_file1);
      $three = move_uploaded_file($_FILES['fileUpload']['tmp_name'][2], $target_file2);
 
  ftp_close($conn_id);
  */
  }

  public function SendConsultation() {
  	  
    $name = $this->name;
    $email = $this->email;
    $primary = $this->primary;
    $birthday = $this->birthday;
    $state = $_SESSION["State"];
    $formcontent = "New consultation submission from $name. To view the full report, follow this link http://belodoc.com/dh_phpmyadmin/mysql.belodoc.com/ \n 
    Name: $name \n
    Email: $email \n
    Primary Condition: $primary \n
    Birthday: $birthday \n
    State: $state\n";
    $questions = $_SESSION["Questions"];
    foreach ($questions as $question) {
      $$question = $this->$question;
      $formcontent .= "$question: ".$$question." \n\n";
    }

  		$to = "info@belodoc.com";
  		$subject = "New Consultation Submission: $name";
  		$header = "From: info@belodoc.com \r\n";
  		$header .= "Reply-To: mitchell@belodoc.com";
  		mail($to, $subject, $formcontent, $header);
  }

  public function GetPrimary() {
    return $this->primary;
  }
  public function GetOil() {
    return $this->oil;
  }
  public function GetSensitivity() {
    return $this->sensitivity;
  }
  public function GetSun() {
    return $this->sun;
  }
  public function GetNotes() {
    return $this->notes;
  }
  public function GetEmail() {
    return $this->email;
  }
  public function GetFirstName() {
    return $this->firstname;
  }
  public function GetLastName() {
    return $this->lastname;
  }
  public function GetName() {
    return $this->name;
  }

  public $primary = '';
  public $oil = '';
  public $sensitivity = '';
  public $sun = '';
  public $notes = '';
  public $firstname = '';
  public $lastname = '';
  public $encoded_data = '';
  public $binary_data = 0;
  public $encoded_data_two = '';
  public $binary_data_two = 0;
  public $name = '';
  public $email = '';
  public $imageOne = '';
  public $imageTwo = '';
  public $imageThree = '';
  public $webcamOne = '';
  public $webcamTwo = '';
  public $plan = '';
  public $birthday = '';
  public $location = '';
  public $generalCon = '';
  public $history = '';
  public $medications = '';
  public $sunscreen = '';
  public $habits = '';
  public $symptoms = '';
}