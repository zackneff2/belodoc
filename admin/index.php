<?php
session_start();
require '../lib/site.inc.php';
if ($_SERVER["SERVER_PORT"] != 443) {
    $redir = "Location: https://" . $_SERVER['HTTP_HOST'];
    header($redir);
    exit();
}
if ($_SESSION["admin"] != true) {
  require  ('../adminsignin.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BeloDoc Admin. Add consultations and information sent from our dermatologist.">
    <meta name="keywords" content="BeloDoc, Admin, Dermatology, settings">
    <meta name="google-site-verification" content="8PbCU4Q79dy39GxWTOOp7tutBpJ9F6ZTcKIYwIih3Q8" />
    <title>BeloDoc - Admin</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

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
          <a class="navbar-brand" href="/admin"><img class="logohome" src="../images/logo1.png" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="/faq">FAQ</a>
            </li>
            <li>
              <a href="blog/">Blog Admin</a>
            </li>
            <?php if ($_SESSION["loggedIn"] != 1) {?><li class="button"><a href="#pricing" data-options="{ &quot;easing&quot; &quot;easeOutCubic&quot; }"><button type="button" class="top btn btn-default navbar-btn">Sign Up</button></a></li><?php } ?>
            <?php if ($_SESSION["loggedIn"] != 1) {?><li class="button"><a href="/signin"><button type="button" class="top btn btn-default navbar-btn">Sign in</button></a></li><?php } ?>
            <?php if ($_SESSION["loggedIn"] == 1) {?><li class="button"><a href="../pro/logout.php"><button type="button" class="top btn btn-default navbar-btn">Sign Out</button></a></li><?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <span class="anchor" id="admin"></span>
    <div class="admin section bottom">
      <div class="container">
        <div class="row header">
          <h1 class="draw">Submit consultation information here</h1>
        </div>
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <form id="admin-form" name="admin-form" onsubmit="return validateForm()" method="post" action="../post/adminform-post.php">
              <input class="form-control" type="email" id="email" name="email" placeholder="Enter user email address" />
              <textarea class="form-control"rows="4" id="message" name="message" placeholder="Mitchell's message to patient"></textarea>
              <select class="form-control" name="product" id="product">
                <option value="" selected disabled>Select product recommendation #1</option>
                <option value="NBL">NeoCutis Biocream Large</option>
                <option value="NBG">NeoCutis BioGel</option>
                <option value="NBR">NeoCutis Biocream Riche</option>
                <option value="NBE">NeoCutis Blanche</option>
                <option value="NCL">NeoCutis Cleanser</option>
                <option value="NJO">NeoCutis Journee</option>
                <option value="NLE">NeoCutis Lumiere Eye</option>
                <option value="NLR">NeoCutis Lumiere Riche</option>
                <option value="NNV">NeoCutis Nouvelle</option>
                <option value="NPC">NeoCutis Peche</option>
                <option value="NRV">NeoCutis Reactive Vit C</option>
                <option value="NIEC">NIA24 Eye Cream</option>
                <option value="NIGC">NIA24 Gentle Cleansing Cream</option>
                <option value="NIJA">NIA24 Jar</option>
                <option value="NILO">NIA24 Lotion</option>
                <option value="NIPC">NIA24 Physical Cleansing Scrub</option>
                <option value="NISR">NIA24 Sun Repair</option>
                <option value="NISP">NIA24 SPF30 Sun Damage</option>
                <option value="NIES">NIA24 Exfoliating Serum</option>
                <option value="OBL">Obagi Blender</option>
                <option value="OCL">Obagi Cleanser</option>
                <option value="OCR">Obagi Clear</option>
                <option value="OEL">Obagi Elastiserum</option>
                <option value="OEX">Obagi Exfoderm</option>
                <option value="OHS">Obagi SPF35 Healthy Skin</option>
                <option value="OSP">Obagi SPF50</option>
                <option value="OSF">Obagi Sun Fader</option>
                <option value="OTO">Obagi Toner</option>
                <option value="NEDN">Neova DNA Repair</option>
                <option value="NEIE">Neova Illum. Eye</option>
                <option value="NEEL">Neova Eye Lift</option>
                <option value="NEBL">Neova Max Body Lotion</option>
                <option value="NENT">Neova Night Therapy</option>
                <option value="NESC">Neova Serious Clairity 4x</option>
              </select>
              <textarea class="form-control" rows="4" id="instruct" name="instruct" placeholder="Instructions for product 1"></textarea>
              <select class="form-control" name="product2" id="product2">
                <option value="" selected disabled>Select product recommendation #1</option>
                <option value="NBL">NeoCutis Biocream Large</option>
                <option value="NBG">NeoCutis BioGel</option>
                <option value="NBR">NeoCutis Biocream Riche</option>
                <option value="NBE">NeoCutis Blanche</option>
                <option value="NCL">NeoCutis Cleanser</option>
                <option value="NJO">NeoCutis Journee</option>
                <option value="NLE">NeoCutis Lumiere Eye</option>
                <option value="NLR">NeoCutis Lumiere Riche</option>
                <option value="NNV">NeoCutis Nouvelle</option>
                <option value="NPC">NeoCutis Peche</option>
                <option value="NRV">NeoCutis Reactive Vit C</option>
                <option value="NIEC">NIA24 Eye Cream</option>
                <option value="NIGC">NIA24 Gentle Cleansing Cream</option>
                <option value="NIJA">NIA24 Jar</option>
                <option value="NILO">NIA24 Lotion</option>
                <option value="NIPC">NIA24 Physical Cleansing Scrub</option>
                <option value="NISR">NIA24 Sun Repair</option>
                <option value="NISP">NIA24 SPF30 Sun Damage</option>
                <option value="NIES">NIA24 Exfoliating Serum</option>
                <option value="OBL">Obagi Blender</option>
                <option value="OCL">Obagi Cleanser</option>
                <option value="OCR">Obagi Clear</option>
                <option value="OEL">Obagi Elastiserum</option>
                <option value="OEX">Obagi Exfoderm</option>
                <option value="OHS">Obagi SPF35 Healthy Skin</option>
                <option value="OSP">Obagi SPF50</option>
                <option value="OSF">Obagi Sun Fader</option>
                <option value="OTO">Obagi Toner</option>
                <option value="NEDN">Neova DNA Repair</option>
                <option value="NEIE">Neova Illum. Eye</option>
                <option value="NEEL">Neova Eye Lift</option>
                <option value="NEBL">Neova Max Body Lotion</option>
                <option value="NENT">Neova Night Therapy</option>
                <option value="NESC">Neova Serious Clairity 4x</option>
              </select>
              <textarea class="form-control" rows="4" id="instruct2" name="instruct2" placeholder="Instructions for product 2"></textarea>
              <select class="form-control" name="product3" id="product3">
                <option value="" selected disabled>Select product recommendation #1</option>
                <option value="NBL">NeoCutis Biocream Large</option>
                <option value="NBG">NeoCutis BioGel</option>
                <option value="NBR">NeoCutis Biocream Riche</option>
                <option value="NBE">NeoCutis Blanche</option>
                <option value="NCL">NeoCutis Cleanser</option>
                <option value="NJO">NeoCutis Journee</option>
                <option value="NLE">NeoCutis Lumiere Eye</option>
                <option value="NLR">NeoCutis Lumiere Riche</option>
                <option value="NNV">NeoCutis Nouvelle</option>
                <option value="NPC">NeoCutis Peche</option>
                <option value="NRV">NeoCutis Reactive Vit C</option>
                <option value="NIEC">NIA24 Eye Cream</option>
                <option value="NIGC">NIA24 Gentle Cleansing Cream</option>
                <option value="NIJA">NIA24 Jar</option>
                <option value="NILO">NIA24 Lotion</option>
                <option value="NIPC">NIA24 Physical Cleansing Scrub</option>
                <option value="NISR">NIA24 Sun Repair</option>
                <option value="NISP">NIA24 SPF30 Sun Damage</option>
                <option value="NIES">NIA24 Exfoliating Serum</option>
                <option value="OBL">Obagi Blender</option>
                <option value="OCL">Obagi Cleanser</option>
                <option value="OCR">Obagi Clear</option>
                <option value="OEL">Obagi Elastiserum</option>
                <option value="OEX">Obagi Exfoderm</option>
                <option value="OHS">Obagi SPF35 Healthy Skin</option>
                <option value="OSP">Obagi SPF50</option>
                <option value="OSF">Obagi Sun Fader</option>
                <option value="OTO">Obagi Toner</option>
                <option value="NEDN">Neova DNA Repair</option>
                <option value="NEIE">Neova Illum. Eye</option>
                <option value="NEEL">Neova Eye Lift</option>
                <option value="NEBL">Neova Max Body Lotion</option>
                <option value="NENT">Neova Night Therapy</option>
                <option value="NESC">Neova Serious Clairity 4x</option>
              </select>
              <textarea class="form-control" rows="4" id="instruct3" name="instruct3" placeholder="Instructions for product 3"></textarea>
              <input type="submit" id="submit" />
            </form>
          </div>


          <div class="col-md-4 hidden-sm hidden-xs">

          </div>
        </div>
      </div>
    </div>

    <script>
    function validateForm() {
      var email = document.forms["admin-form "]["email"].value;
      var product = document.forms["admin-form"]["product"].value;
      var message = document.forms["admin-form"]["message"].value; 
      var instruct = document.forms["admin-form"]["instruct"].value;

      if (product == null || product == "") {
        alert("Please enter a primary product");
        return false;
      }
      if (email == null || email == "") {
        alert("Please enter the users email address");
        return false
      }
      if (message == null || message == "") {
        alert("Please enter a message from Mitchell to the patient");
        return false;
      }
      if (instruct == null || instruct == "") {
        alert("Please enter instructions for product #1");
        return false;
      }

      return true;
    }
    </script>


<?php echo Format::footer(); ?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script>
      smoothScroll.init({
        speed: 1000,
        easing: 'easeInOutCubic',
        offset: 0,
        updateURL: true,
        callbackBefore: function ( toggle, anchor ) {},
        callbackAfter: function ( toggle, anchor ) {}
      });

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60485321-1', 'auto');
  ga('send', 'pageview');


    </script>
  </body>
</html>