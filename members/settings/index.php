<?php
session_start();
require '../../lib/site.inc.php';

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/cls/settings.php');

$settings = new Settings();
$settings->getSettings();

$address = $_SESSION["Address"];
$city = $_SESSION["City"];
$state = $_SESSION["State"];
$email = $_SESSION["Email"];
$zip = $_SESSION["Zip"];
$phone = $_SESSION["Phone"];
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Your online dermatology profile. Manage your account settings">
    <meta name="keywords" content="Dermatology,Skincare,Skin,Personalized,Regimen,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <title>BeloDoc - Members - Account Settings</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>

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
          <a class="navbar-brand" href="/"><img class="logohome" src="/images/logo1.png" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <li>
              <a href="/members#profile">My Dashboard</a>
            </li>
            <!--<li class="hidden1">
              <a data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" href="#deals">View our Deals</a>
            </li>-->
            <li>
              <a href="/faq">FAQ</a>
            </li>
            <li role="presentation" class="button dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><button type="button" class="top btn btn-default navbar-btn"><?php echo $_SESSION["Email"] ?> <span class="caret"></span></button></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/pro/logout.php">Logout</a></li>
                <li><a href="#">Settings</a></li>
              </ul>
            </li>   
          </ul>
        </div>
      </div>
    </nav>

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
            <a data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" href="#profile"><h1 class="learn">My Dashboard</h1><i class="fa fa-angle-down fa-2x fa-learn"></i></a>
          </div>
        </div>
      </div>-->

      <span class="anchor" id="profile"></span>
      <div class="section profile">
        <div class="container">
          <div class="row header">
            <h1 class="profile"><?php echo $_SESSION["Name"]; ?></h1>
            <h2 class="profile"><?php echo $_SESSION["Email"]; ?></h2>
          </div>
          <div class="row">
          <hr class="profile" />
            <div class="settings box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                  <li role="presentation" class="active"><h2><a href="#contact-info" aria-controls="contact-info" role="tab" data-toggle="tab">Contact Info</a></h2></li>
                  <li role="presentation"><h2><a href="#account" aria-controls="account" role="tab" data-toggle="tab">Account</a></h2></li>
                  <!--<li role="presentation"><a href="#payment-settings" aria-controls="payment-settings" role="tab" data-toggle="tab">Payment</a></li>-->
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="contact-info">
                    <form id="settings-form" name="settings-form" action="/post/settings-post.php" method="post">
                      <label for="address">Address</label>
                      <input type="text" name="address" id="address" placeholder="Address Line 1" value="<?php echo $address;?>" />
                      <input type="text" name="address2" id="address2" placeholder="Address Line 2"/>
                      <div class="col-md-4">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" placeholder="City" value="<?php echo $city;?>"/>
                      </div>
                      <div class="col-md-4">
                        <label for="state">State</label>
                        <input type="text" name="state" id="state" placeholder="MI" value="<?php echo $state;?>"/>
                      </div>
                      <div class="col-md-4">
                        <label for="zip">Zip</label>
                        <input type="number" name="zip" id="zip" placeholder="Zip Code" value="<?php echo $zip;?>"/>
                      </div>
                      <label for="email">Email (This will change your username)</label>
                      <input type="email" name="email" id="email" placeholder="email" value="<?php echo $email;?>"/>
                      <label for="phone">Phone</label>
                      <input type="phone" name="phone" id="phone" placeholder="phone" value="<?php echo $phone;?>"/>
                      <input type="submit" id="submit" class="belo-btn" />
                    </form>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="account">
                    <form id="account-settings-form" name="account-settings-form" action="/post/account-settings-post.php" method="post">
                      <label for="email">Email</label>
                      <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email;?>"/>
                      <label for="password">Passowrd</label>
                      <input type="password" name="password" id="password" placeholder="Password" />
                      <hr class="account-settings-form" />
                      <label for="new-password">New Password</label>
                      <input type="password" name="new-password" id="new-password" placeholder="New Password" />
                      <label for="password">Confirm New Password</label>
                      <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" />
                      <input type="submit" id="submit" class="belo-btn" />
                    </form>
                  </div>
                  <!--<div role="tabpanel" class="tab-pane fade" id="payment-settings">
                    
                  </div>-->
                </div>
            </div>
      </div>
    </div>

     <!-- <span class="anchor" id="settings"></span>
      <div class="section settings">
        <div class="container">
          <div class="row header">
            <h1 class="settings">My Settings</h1>
          </div>
          <div class="row">
          </div>
        </div>
      </div>  -->

      <!--<span class="anchor" id="deals"></span>
      <div class="section deals">
      <h1>Deals</h1>
      </div>-->

  </div>


<?php echo Format::footer(); ?>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/smooth-scroll.js"></script>
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