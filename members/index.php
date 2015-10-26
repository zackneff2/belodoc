<?php
session_start();

require '../lib/site.inc.php';

if ($_SESSION["loggedIn"] != 1) {
  require ('../signin/index.php');
  exit;
}
if($_SESSION["Message"] && $_SESSION["MessageFlag"] == 1) {
  unset($_SESSION["Message"]);
}
if ($_SESSION["Message"]) {
  $_SESSION["MessageFlag"] = 1;
}

$user = new NewUsers();

$user->GetInfo();

$consultations = new Consultations();

$consultations->SetSession();

$profile = new Profiles();

$success = $profile->getProfile();

if ($success != false) {
  $imageOne = strtolower($_SESSION["Product"]);
  $imageTwo = strtolower($_SESSION["Product2"]);
  $imageThree = strtolower($_SESSION["Product3"]);
}

/*
$originalDate = date_create($_SESSION["OrderDate"]);

$orderDate = $originalDate->format('l, F j Y');

$_SESSION["OrderDate"] = $orderDate;

$date = date_add($originalDate, date_interval_create_from_date_string("3 months"));

$paymentDate = $date->format('l, F j Y');

$_SESSION["NextPayment"] = $paymentDate;

$ship = date_create($_SESSION["OrderDate"]);

$shipdate = $ship->format('l, F j Y');

$_SESSION["Shipdate"] = $shipdate;
*/

if (!isset($_SESSION["Shipdate"])) {
  $_SESSION["Shipdate"] = "N/A";
}

$_SESSION["ActivePage"] = "/members/index.php";
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Your online dermatology profile. Get follow up consultations and contact our doctor.">
    <meta name="keywords" content="Dermatology,Skincare,Skin,Personalized,Regimen,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <title>BeloDoc - Members</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="index">
      
      <?php echo Format::navBar($_SESSION["loggedIn"]);?>

      <!--<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img class="logohome" src="../images/logo1.png" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <li>
              <a data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" href="/members#dashboard">Your Dashboard</a>
            </li>
            <li>
              <a href="/faq">FAQ</a>
            </li>
            <li role="presentation" class="button dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><button type="button" class="top btn btn-default navbar-btn"><?php echo $_SESSION["Email"] ?> <span class="caret"></span></button></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../pro/logout.php">Logout</a></li>
                <li><a href="settings/">Settings</a></li>
              </ul>
            </li>   
          </ul>
        </div>
      </div>
    </nav>-->

    <div id="members">

     <!--<div class="hot section">
        <div class="container">
          <div class="row members">
            <h1 class="sect">Hello <?php
            $name = explode(" ", $_SESSION["Name"]);
            echo $name[0];
            ?>, welcome to BeloDoc!
            </h1>
            <h2 class="sect">
            Get follow up consultations, contact our doctor, and learn about our members deals below!
            </h2>
            <a href="member-signup.php"><button type="button" class="center btn btn-lg btn-primary">Get A Consultation!</button></a>
          </div>
          <div class="row learn">
            <a data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" href="#profile"><h1 class="learn">Your Dashboard</h1><i class="fa fa-angle-down fa-2x fa-learn"></i></a>
          </div>
        </div>
      </div>-->

      <span class="anchor" id="profile"></span>
      <div class="section profile">
        <div class="container">
          <div class="row header">
            <h1 class="profile"><?php echo $_SESSION["Name"]; ?></h1>
            <h2 class="profile"><?php echo $_SESSION["Email"]; ?></h2>
            <h3><?php if(isset($_SESSION["Message"])){echo $_SESSION["Message"];} ?></h3>
          </div>
          <div class="row">
           <hr class="profile" />
            <div class="col-sm-4">
              <img class="shekCircle img-responsive" src="../images/mitchellCircle.png" alt="Mitchell S. Shek MD" />
            </div>
            <a href="/medical"><div class="col-sm-8 col-md-4">
              <h1 class="info">Your Dermatologist</h1>
              <h3>Dr. Mitchell Shek</h3>
            </div></a>
            <div class="hidden-sm col-md-4">
              <ul class="nav nav-justified nav-pills profile">
                <li><a href="/faq">Support</a></li>
                <li><a href="mailto:mitchell@belodoc.com">Contact</a></li>
                <li><a href="checkup/">Checkup</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>


      <span class="anchor" id="dashboard"></span>
      <div class="section dashboard">
        <div class="container">
          <div class="row header dashboard">
            <div class="col-md-6">
              <div id="status">
                <h1 class="info">Your Status</h1>
                <div class="row last-consultation">
                  <h1 class="prof">Last Consultation:</h1>
                  <p class="info"><?php 
                  if ($_SESSION["OrderDate"] == null || $_SESSION["OrderDate"] == "") {
                    echo "N/A";
                  }
                  else {
                    echo $_SESSION["OrderDate"];
                  }
                  ?></p>
                </div>
                <div class="row last-shipment">
                <h1 class="prof">Last Shipment:</h1>
                <p class="info"><?php if ($_SESSION["Shipdate"] == null || $_SESSION["Shipdate"] == "") {
                    echo "N/A";
                  }
                  else {
                    echo $_SESSION["Shipdate"];
                  }
                  ?></p>
                </div>
                <div class="row next-consultation">
                <h1 class="prof">Next Consultation:</h1>
                <p class="info"><a href="checkup/">Get a follow up</a></p>
                <!--<p class="info"><a href="checkup/">Request a new consultation</a></p>-->
                </div>
                <div class="row next-shipment">
                <h1 class="prof">Next Shipment:</h1>
                <p class="info"><?php if ($_SESSION["Response"]) {
                  echo '<a href="../get/order-get.php?product='.$_SESSION["Product"].'&product2='.$_SESSION["Product2"].'&product3='.$_SESSION["Product3"].'">Reorder</a>';
                  }
                  else {
                  echo 'Order Now';
                  }?></p>
                </div>
              </div>
              <div id="plan">
                <h1 class="info">Your Plan</h1>
                <div class="row primary-condition">
                <h1 class="prof">Primary Condition:</h1>
                <p class="info"><?php if ($_SESSION["Condition"] == "acne") {
                    echo "Acne";
                  }
                  else if ($_SESSION["Condition"] == "aging") {
                    echo "Aging";
                  }
                  else if ($_SESSION["Condition"] == "tone") {
                    echo "Uneven Pigmentation";
                  }
                  else if ($_SESSION["Condition"] == "dry") {
                    echo "Dryness";
                  }
                  else if ($_SESSION["Condition"] == "irr") {
                    echo "Irritation";
                  }
                  ?></p>
                </div>
                <div class="row members-plan">
                  <h1 class="prof">Plan:</h1>
                  <p class="info"><?php if ($_SESSION["Plan"] == "Subscription"){ echo "Quarterly Subscription ($50 / quarter)";}
                  else if ($_SESSION["Plan"] == "per"){ echo "Pay per consultation";}?></p>
                </div>
                <div class="row last-payment">
                  <h1 class="prof">Last Payment:</h1>
                  <p class="info">N/A</p>
                </div>
                <div class="row next-payment">
                  <h1 class="prof">Next Payment:</h1>
                  <p class="info"><?php if ($_SESSION["NextPayment"] == null || $_SESSION["NextPayment"] == "") {
                    echo "N/A";
                  }
                  else {
                    echo $_SESSION["NextPayment"];
                  }
                  ?>
                  </p>
                </div>     
              </div>
            </div>
            <div class="col-md-6">
              <?php if ($_SESSION["Response"]) {
                echo '
              <div id="regimen">
                <h1 class="info">Your Regimen</h1>
                <p>'.$_SESSION["Response"].'</p>
                <div class="row">
                  <img class="regimen img-responsive" src="../images/'.$imageOne.'.jpg" />
                  <p class="info">'.$_SESSION["Instruct"].'</p>
                </div>
                <div class="row">
                  <img class="regimen img-responsive" src="../images/'.$imageTwo.'.jpg" />
                  <p class="info">'.$_SESSION["Instruct2"].'</p>
                </div>
                <!--<div class="row">
                  <img class="regimen img-responsive" src="../images/'.$imageThree.'.jpg" />
                  <p class="info">'.$_SESSION["Instruct3"].'</p>
                </div>-->
                <a class="btn belo-btn" href="../get/order-get.php?product='.$_SESSION["Product"].'&product2='.$_SESSION["Product2"].'&product3='.$_SESSION["Product3"].'">Order Your Products</a>
              </div>';
              }
              else {
                echo '
                <div id="regimen">
                <h1 class="info">Your Regimen</h1>
                <p>Our dermatologist will be in touch within two business days of submitting your consultation. Once he has reviewed your case and perscribed your personalized skincare regimen, you will receive an email with further instructions. Your information will display on this page when it is ready.</p>
                <p>Thanks, and if you have any questions, feel free to reach out to us at <a href="mailto:info@belodoc.com">info@belodoc.com</a></p>
                </div>
                ';
              }
              ?>
            </div>
          </div>
        </div>
      </div>

     <!-- <span class="anchor" id="settings"></span>
      <div class="section settings">
        <div class="container">
          <div class="row header">
            <h1 class="settings">Your Settings</h1>
          </div>
          <div class="row">
          </div>
        </div>
      </div>  -->

      <span class="anchor" id="contact"></span>
      <div class="section contact">
        <div class="container">
          <div class="row header">
            <h1 class="members">Questions for Our Doctor?</h1>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <h2><a href="mailto:info@belodoc.com">Contact Me</a></h2>
              <p class="shek">
              My name is Dr. Mitchell Shek, the Board Certified Dermatologist behind Belodoc. I am on staff at Beaumont Hospital and The Dermatology Associates of Birmingham. If you have any questions or concerns about your treatment plan or results, please feel free to email me below! I'll get back to you as soon as I can.
              </p>
            </div>
            <div class="col-sm-6 col-md-6">
              <img class="img-responsive" alt="Dr. Mitchell Shek M.D F.A.C.P" src="../images/shek.jpg" />
            </div>
          </div>
        </div>
      </div>

      <!--<span class="anchor" id="deals"></span>
      <div class="section deals">
      <h1>Deals</h1>
      </div>-->

<?php echo Format::footer(); ?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/smooth-scroll.js"></script>
    <script>
      smoothScroll.init({
        speed: 1000,
        easing: 'easeInOutCubic',
        offset: 0,
        updateURL: true,
        callbackBefore: function ( toggle, anchor ) {},
        callbackAfter: function ( toggle, anchor ) {}
      });
    </script>
  </body>
</html>