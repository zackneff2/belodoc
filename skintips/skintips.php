<?php
      session_start();
      $tab = $_SESSION["tab"];
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple, daily skintips from BeloDoc.">
    <meta name="keywords" content="Dermatology,Skincare,Skin,Personalized,Regimen,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <title>BeloDoc Skintips</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="skintips">
  
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img class="logohome" src="images/logo1.png" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="index.php#about">About</a>
            </li>
            <li class="hidden2">
              <a href="index.php#howitworks">How It Works</a>
            </li>
            <li>
              <a href="index.php#doctor">Our Doctor</a>
            </li>
            <li class="hidden1">
              <a href="index.php#contact">Contact</a>
            </li>
            <li class="hiddennn">
              <a href="faq.php">FAQ</a>
            </li>
            <li class="button"><a href="signin.php"><button type="button" class="top btn btn-default navbar-btn">Sign in</button></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="skintips">
        <div class="row">
        <div class="col-md-3 col-sm-3">
          <div role="tabpanel" class="tabs">
        <ul class="nav nav-tabs nav-stacked" role="tablist">
          <li class="tip-tab active" role="presentation" id="acne"><a href="#acne1"  role="tab" data-toggle="tab">Acne</a></li>
          <li class="tip-tab" role="presentation" id="aging"><a href="#aging1" role="tab" data-toggle="tab">Aging and Wrinkles</a></li>
          <li class="tip-tab" role="presentation" id="skin-tone"><a href="#skin-tone1" role="tab" data-toggle="tab">Dry skin and Redness</a></li>
        </ul>
          </div>
        <div class="newsletter newsletter-hidden">
            <h1 class="newsletter">Skin Tips Newsletter</h1> 
            <form id="newsletter" action="newsletter.php" method="post">
            <input type="email" id="email" name="email" class="email form-control" placeholder="Email Address" />
            <input type="text" id="name" name="name" class="name form-control" placeholder="Name (optional)" />
            <input type="submit" id="submit" class="newsletter" />
            </form>
            <h2 class="newsletter">Stay in touch</h2>
              <ul class="social-icons">
                <li><a href="http://twitter.com/belodoc" target="_blank"><i class="fa fa-2x fa-twitter"></i></a></li>
                <li><a href="http://facebook.com/belodoc" target="_blank"><i class="fa fa-2x fa-facebook"></i></a></li>
              </ul>
        </div>
        </div>
        <div class="col-md-9 col-sm-9 ">
            <div class="tab-content">
            <div class="tab-pane tips <?php if ($tab == 'acne') {echo 'active';}?>" role="tabpanel" id="acne1">
              <h1 class="acne"><strong>Acne - Causes and Tips</strong></h1>
              <p class="acne">Acne is the most common skin condition in the United States. It is characterized by blackheads, whiteheads, pimples, and possible scarring.  While it is most common in adolescents, many adults also suffer from acne.</p>
              <div class="acne-pictures row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <img src="images/acne1.jpg" class="img-responsive" />
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <img src="images/acne2.jpg" class="img-responsive" />
                </div>
              </div>
              <p class="acne"><strong>Causes:</strong> <br />
              The basic cause of acne is a plugged pore. When your pores are blocked, the obstruction can lead to a blackhead, red pimple or even a deep cyst. This "pore plugging" can be caused by hormonal stimuli that can cause excess oil production. Once this happens, there is often a secondary bacterial infection which causes your acne to become more inflamed.</p> 
              <p class="acne">Our philosophy at BeloDoc, is that if you keep your pores open and unplugged, you can eliminate the early and later stages of acne. The high quality medical grade topical cosmetic products that we use not only clean out your pores, but improve the quality of your skin and reduce redness and inflammation and improve scarring.  By customizing your treatment based on acne severity and skin sensitivity, we can greatly improve your appearance without causing any unnecessary irritation.</p>
              <p class="acne"><strong>Treatment Tips:</strong> <br />
              - Don't touch your face unless your hands are clean <br />
              - Don't pop or squeeze acne, it can make it worse and cause scarring <br />
              - Wash with a gentile cleanser so you don't dry out your skin <br />
              - Clean your face twice a day <br />
              - Wash as soon as possible after sweating <br />
              </p>
            </div>
            <div class="tab-pane tips <?php if ($tab == 'aging') {echo 'active';}?>" role="tabpanel" id="aging1">
        	   <h1 class="acne"><strong>Aging and Wrinkles - Causes and Tips</strong></h1>
        	   <p class="acne">Most wrinkles are caused by a combination of a lifetime of sun exposure, the passage of time and the loss of collagen as we grow older. When we are young, we make collagen at a very rapid rate and break it down very slowly. Unfortunately, as we get older, the production/breakdown ratio reverses.  We don't make as much collagen as we used to and break it down at a rapid pace. </p>
            <div class="acne-pictures row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <img src="images/aging.jpg" class="img-responsive" />
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <img src="images/aging1.jpg" class="img-responsive" />
              </div>
            </div>
        	   <p class="acne"><strong>Treatment Tips:</strong> <br />
        	   While it is impossible to completley avoid signs of aging, there are ways to make your skin look younger. <br />
        	   - Avoid excessive sun exposure, and always be sure to apply sunscreen <br />
        	   - Use a daily mosturizer <br />
        	   - Eat well <br />
        	   - Exercise often <br />
        	   </p>
            </div>
            <div class="tab-pane tips <?php if ($tab == 'dry') {echo 'active';}?>" role="tabpanel" id="skin-tone1">
        	   <h1 class="acne"><strong>Dry skin and Redness - Causes and Tips</strong></h1>
        	   <p class="acne">Dry skin and Redness can be caused by a number of various factors such as hygeine, weather conditions, age, and sun exposure. With the wide variety of causes to dry skin, many of which can create mild to severe irritation, it is vital to use products that help to combat these effects, while also healing the skin. At BeloDoc, we will utilize our considerable expertise with products that heal and moisterize to even out your skin color and return your face to a more even, youthful appearance. </p>
            <div class="acne-pictures row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <img src="images/dry.jpg" class="img-responsive" />
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <img src="images/dry1.jpg" class="img-responsive" />
              </div>
            </div>
            </div>
            </div>
        </div>
        <div class="newsletter newsletter-hidden1">
            <h1 class="newsletter">Skin Tips Newsletter</h1> 
            <form id="newsletter" action="newsletter.php" method="post">
            <input type="email" id="email" name="email" class="email form-control" placeholder="Email Address" />
            <input type="text" id="name" name="name" class="name form-control" placeholder="Name (optional)" />
            <input type="submit" id="submit" class="newsletter" />
            </form>
            <h2 class="newsletter">Stay in touch</h2>
              <ul class="social-icons">
                <li><i class="fa fa-2x fa-twitter"></i></li>
                <li><i class="fa fa-2x fa-facebook"></i></li>
              </ul>
        </div>
        </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="footer">BELODOC LLC &copy; 2015</p>
        <ul class="nav nav-pills pull-right">
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#about">About</a></li>
          <li><a href="signin.php">Sign In</a></li>
          <li><a href="signup.php">Sign Up</a></li>
        </ul>
      </div>
    </div>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

    </body>
</html>
