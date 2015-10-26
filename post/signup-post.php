<?php

require '../lib/site.inc.php';

session_start();

$user = new NewUser($_POST);

$user->SetPassword($_POST);

$user->SendConfirmEmail();

$confirm = $user->GetConfirm();

$users = new NewUsers();

$users->SaveUserToDB($user);


$survey = new Survey($_SESSION["Condition"]);

$survey->getQuestions();


$consultation = new Consultation($_POST);

$consultation->SetBinaryData($_POST);

$consultation ->SendConsultation();

$consultation->UploadPhotoToServer();

$consultation->SetPlan();

$consultations = new Consultations();

$consultations->SaveConsultation($consultation);

$consultation->SetSession();


if ($_SESSION["redirect"] == 1) {
  $_SESSION["Message"] = "Thanks, your consultation has been submitted. <a href=\"https://belodoc.com/pro/confirmation.php?passkey=".$confirm."\">Please confirm your account.</a> Your doctor will respond within 2 business days.";
  header("Location: ../thanks.php");
}

























/*

  session_start();

  $firstname = $_POST['firstName'];
  $lastname = $_POST['last-name'];
  $name = "$firstname $lastname";
  $email = $_POST['email'];
  $primary = $_POST['condition'];
  $secondary = $_POST['secondary'];
  $oil = $_POST['oil'];
  $sensitivity = $_POST['sensitivity'];
  $sun = $_POST['sun'];
  $eyes = $_POST['eyes'];
  $neck = $_POST['neck'];
  $derm = $_POST['derm'];
  $notes = $_POST['notes'];
  $username = $_POST['email'];
  $password1 = $_POST['password'];
  $password2 = $_POST['confirm-password'];
  $formcontent = "
  New consultation submission from $name. To view the full report, 
  follow this link http://belodoc.com/dh_phpmyadmin/mysql.belodoc.com/ \n \n 
  Name: $name \n
  Email: $email \n
  Primary Condition: $primary \n
  Secondary Condition: $secondary \n
  Oil: $oil \n
  Sensitivity: $sensitivity \n
  Sun: $sun \n
  Eyes: $eyes \n
  Neck: $neck \n
  Derm: $derm \n
  Additional Notes: $notes \n";

  $to = "info@belodoc.com";
  $subject = "New Consultation Submission: $name";
  $header = "From: info@belodoc.com \r\n";
  $header .= "Reply-To: mitchell@belodoc.com";
  mail($to, $subject, $formcontent, $header);

  $_SESSION['email'] = $email;
  $_SESSION['name'] = $name;

  $encoded_data = $_POST['mydata'];
  $binary_data = base64_decode($encoded_data);

  $encoded_data_two = $_POST['mydatatwo'];
  $binary_data_two = base64_decode($encoded_data_two);

  $target_dir = "uploads/";
  $target_file = $target_dir . $lastname.'_one.jpg';
  $target_file1 = $target_dir . $lastname.'_two.jpg';
  $target_file2 = $target_dir . $lastname.'_three.jpg';
  $target_webcam = $target_dir . 'webcam_'.$lastname.'.jpg' ;
  $target_webcam_two = $target_dir . 'webcam2_'.$lastname.'.jpg';

  if(file_exists($target_file)) {
        $temp = explode(".",$_FILES["fileUpload"]["name"][0]);
        $newfilename = rand(1,99999) . '.' .end($temp);
        $target_file = $target_dir . $newfilename;
    } 
    if($_FILES["fileUpload"]["name"][0] == $_FILES["fileUpload"]["name"][1]) {
        $temp = explode(".",$_FILES["fileUpload"]["name"][1]);
        $newfilename = rand(1,99999) . '.' .end($temp);
        $target_file1 = $target_dir . $newfilename;
    }
    if($_FILES["fileUpload"]["name"][0] == $_FILES["fileUpload"]["name"][2]) {
       $temp = explode(".",$_FILES["fileUpload"]["name"][2]);
        $newfilename = rand(1,99999) . '.' .end($temp);
        $target_file2 = $target_dir . $newfilename;
    }
    if($_FILES["fileUpload"]["name"][1] == $_FILES["fileUpload"]["name"][2]) {
        $temp = explode(".",$_FILES["fileUpload"]["name"][2]);
        $newfilename = rand(1,99999) . '.' .end($temp);
        $target_file2 = $target_dir . $newfilename;
    }
    if(file_exists($target_webcam)) {
      $newFileNameWebcam = rand(1,99999) . '.jpg';
      $target_webcam = $target_dir . $newFileNameWebcam;
    }
    if(file_exists($target_webcam_two)) {
      $newFileNameWebcam = rand(1,99999) . '.jpg';
      $target_webcam_two = $target_dir . $newFileNameWebcam;
    }

    $imageOne = "$target_file";
    $imageTwo = "$target_file1";
    $imageThree = "$target_file2";
    $webcamOne = "$target_webcam";
    $webcamTwo = "$target_webcam_two";

  $hash = hash('sha256', $password1);

  function createSalt ()
  {
    $text = md5(uniqid(rand(), true));
    return substr($text, 0, 3);
  }
  $salt = createSalt();
  $password = hash('sha256', $salt . $hash);

  $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
  $myusername = "zneff";   // the username specified when setting-up the database
  $dbpassword = "Z483026074!";   // the password specified when setting-up the database
  $database = "belo"; 

  $confirm = md5(uniqid(rand()));

  $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

  $username = mysqli_real_escape_string($conn, $username);
  $name = mysqli_real_escape_string($conn, $name);
  $notes = mysqli_real_escape_string($conn, $notes);
  $email = mysqli_real_escape_string($conn, $email);

    $sql = "INSERT INTO member (confirm, username, password, salt, name)
    VALUES ('$confirm', '$username', '$password', '$salt', '$name');";

    $query = "INSERT INTO consultations (`name`, `email`, `primary`, `secondary`, `oil`, `sensitivity`, `sun`, `eyes`, `neck`, `derm`, `imageOne`, `imageTwo`, `imageThree`, `webcamOne`, `webcamTwo`, `notes`) 
    VALUES ('$name', '$email', '$primary', '$secondary', '$oil', '$sensitivity', '$sun', '$eyes', '$neck', '$derm', '$imageOne', '$imageTwo', '$imageThree', '$webcamOne', '$webcamTwo', '$notes' )";

    if (!mysqli_query($conn, $sql)) {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    if(!mysqli_query($conn, $query)) {
       echo "Error: " . $query . "<br>" . mysqli_error($conn);
    } 
     
    mysqli_close($conn);


  $uploadOk = 1;
  $uploadOk1 = 1;
  $uploadOk2 = 1;

  $ftp_server = "lintilla.dreamhost.com";
  $ftp_username = "belodoc";
  $ftp_pass = "Z483026074!";

  $conn_id = ftp_connect($ftp_server);
  $login_result = ftp_login($conn_id, $ftp_username, $ftp_pass);

      $result = file_put_contents($target_webcam, $binary_data);
      $result_two = file_put_contents($target_webcam_two, $binary_data_two);

      $one = move_uploaded_file($_FILES['fileUpload']['tmp_name'][0], $target_file);
      $two = move_uploaded_file($_FILES['fileUpload']['tmp_name'][1], $target_file1);
      $three = move_uploaded_file($_FILES['fileUpload']['tmp_name'][2], $target_file2);

      if ($one || $two || $three) {
        header("Location: checkout.php");
      } 
      else if ($result) {
        header("Location: checkout.php");
      } 
      else if ($result_two) {
        header("Location: checkout.php");
      }
      else {
        echo "There was an error uploading your file. To receive a consultation, please signup through our signup page. If you think this is a mistake, please email info@belodoc.com";
      }
 
  ftp_close($conn_id);


$to = $email;
$subject = "Confirm your account on BeloDoc";

$headers = "From: info@belodoc.com\r\n";
$headers .= "Reply-To: info@belodoc.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>'."\r\n";
$message .= '<img src="http://belodoc.com/beta/images/logo1.png" alt="BeloDoc Logo" />'."\r\n";
$message .= '<hr />'."\r\n";
$message .= '<table rules="all" style="border: 5px solid #1abc9c;">'."\r\n";
$message .= '<tr style="padding:10px; border: white;"><td style="padding:30px 30px 0px 30px;"><h1 style="font-size: 22px; font-family:Helvetica, sans-serif; font-weight: 300;">Hi '.$name.',</h1><br/><p style="margin-top: 0px;font-size: 18px; font-weight: 300; line-height:1.5; font-family: Helvetica, sans-serif;">Thanks for creating your BeloDoc account. We have received your information and are excited to get you started on the simple path to beautiful skin. Before we can do so, please confirm you account by following the link below.'."\r\n".' Also, in order to ensure your consultation was submitted, if you have not yet, please submit your payment to <a href="https://belodoc.com/beta/checkout.php">BeloDoc</a>.</p><p style="margin-top: 0px;font-size: 18px; font-weight: 300; line-height:1.5; font-family: Helvetica, sans-serif;"><a href="https://belodoc.com/beta/confirmation.php?passkey='.$confirm.'">Confirm Your Account Here</a></p></td></tr>'."\r\n";
$message .= '<tr style="padding:10px;"><td style="padding:0px 30px 0px 30px;"><p style="font-size: 18px; font-weight: 300; line-height:1.5; font-family: Helvetica, sans-serif; margin-top: 5px;">Thanks,<br/>The BeloDoc Team</p></td></tr>'."\r\n";
$message .= '</table>'."\r\n";
$message .= '</body></html>'."\r\n";

mail($to, $subject, $message, $headers);

?>*/
?>
