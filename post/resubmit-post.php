<?php
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];

 	$hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
  $myusername = "zneff";   // the username specified when setting-up the database
  $dbpassword = "Z483026074!";   // the password specified when setting-up the database
  $database = "belo"; 

  $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

  $hash = hash('sha256', $password);

  function createSalt ()
  {
    $text = md5(uniqid(rand(), true));
    return substr($text, 0, 3);
  }
  $salt = createSalt();
  $password = hash('sha256', $salt . $hash);

  $sql = "UPDATE memberConfirmed SET password='$password', salt='$salt' WHERE username = '$username'";


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BeloDoc</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome-4.1.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="index">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img class="logohome" src="images/logo1.png" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <li>
              <a href="/">Home</a>
            </a>
            <li class="button"><a href="/signin"><button type="button" class="top btn btn-default navbar-btn">Sign in</button></a></li>
            <li class="button"><a href="logout.php"><button type="button" class="top btn btn-default navbar-btn">Sign Out</button></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="resubmit">
      <div class="container">
        <div class="row">
          <h2><?php if (mysqli_query($conn, $sql)) {
                      echo "Password was resubmitted, try logging in again with your new password";
                    } else {
                      echo "Error: " . $query . "<br>" . mysqli_error($conn);
                    }?>
          </h2>
        </div>
      </div>
    </div>
