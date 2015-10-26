<?php
session_start();

require 'lib/site.inc.php';

if (!isset($_SESSION["loggedIn"])) {
  $_SESSION["loggedIn"] = "";
}

$_SESSION["ActivePage"] = "/index.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dermatologist online. Get Acne and Anti-Aging treatment from a board-certified dermatologist today! Try it for free!">
    <meta name="keywords" content="Dermatology, Dermatologist, Acne treatment, anti-aging treatment, anti-aging, Skincare,Skin,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <meta name="google-site-verification" content="Q-LohOrdtSN_2elgzB4wD8XLTUexwFr7Vbh-q4daJ5Q" />
    <title>BeloDoc - Your Online Dermatologist</title>
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <script src="/js/wow.min.js"></script>

    <!-- Begin Inspectlet Embed Code -->
<script type="text/javascript" id="inspectletjs">
window.__insp = window.__insp || [];
__insp.push(['wid', 882206770]);
(function() {
function __ldinsp(){var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); }
if (window.attachEvent) window.attachEvent('onload', __ldinsp);
else window.addEventListener('load', __ldinsp, false);
})();
</script>
<!-- End Inspectlet Embed Code -->

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
          <a class="navbar-brand" href="/"><img class="logohome" src="images/logo1.png" alt="Belodoc logo"/></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <?php if ($_SESSION["loggedIn"] == 1) {?><li><a href="members/">My Dashboard</a></li><?php } ?>
            <li>
              <a href="/faq">FAQ</a>
            </li>
            <li>
              <a data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" href="#contact">Contact Us</a>
            </li>
            <li><a href="/signup">Sign Up</a></li>
           <?php if ($_SESSION["loggedIn"] != 1) {?> <li class="button"><a href="/signin"><button type="button" class="top btn btn-default navbar-btn">Sign in</button></a></li><?php } ?>
            <?php if ($_SESSION["loggedIn"] == 1) {?><li class="button"><a href="/pro/logout.php"><button type="button" class="top btn btn-default navbar-btn">Sign Out</button></a></li><?php } ?>
          </ul>
        </div>
      </div>
    </nav>-->

    <div id="home">
      <div class="hot section girl">
        <div class="container">
          <div class="row">
            <div class="col-sm-7 hot-text wow fadeInUp">
              <h1>Get Beautiful Skin Without Leaving Your Home</h1>
              <div class="hot-description wow fadeInUp">
                <h3>Professional Advice from a Board-Certified Dermatologist. Get access to the best skincare products for you</h3>
                <p><a href="get/signup-get.php?plan=per" class="btn belo-btn">Try your first visit free</a></p>
              </div>
              <!--<div class="action wow fadeInUp">
                <a href="#pricing" data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" class="btn belo-btn">Our Prices</a>
                <a href="#solution" data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" class="btn belo-btn-inverse">Learn More</a>
              </div>-->
            </div>
            <div class="col-sm-5 simple-form wow fadeInUp">
              <img src="images/girl1.png" alt="Image of girl with nice skin" class="img-responsive girl" />
              <!--<div class="home-form">
              <div class="simple-top">  
                <div class="simple-left">
                  <h2>Sign up now</h2>
                  <h4>3 month free trial</h4>
                </div>
                <div class="simple-right">
                  <i class="fa fa-pencil-square"></i>
                </div>
              </div>
              <div class="simple-bottom">
                  <form role="form" action="post/home-post.php" id="simple-form" name="simple-form" class="simple-form" method="post">
                  <div class="form-group">
                    <input type="email" name="simple-email" id="simple-email" class="form-control" placeholder="Email..." required/>
                  </div>
                  <div class="form-group">
                    <select name="primary" id="primary" name="primary" class="form-control" required>
                      <option value="" selected disabled>Primary Condition...</option>
                      <option value="acne">Acne</option>
                      <option value="aging">Aging and Wrinkles</option>
                      <option value="dry">Dryness or Irritation</option>
                      <option value="tone">Uneven Skintone</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip Code..." required/>
                  </div>
                    <button type="submit" class="simple-submit">Start Now!</button>
                  </form>
              </div>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </div>

    <span class="anchor" id="solution"></span>
    <div class="section about1">
      <div class="container">
        <div class="row header top wow fadeInUp">
          <h2>The Simplest, Most Effective Skincare Treatment</h2>
          <span class="divider"></span>
        </div>
        <div class="row top">
          <div class="col-md-4">
            <div class="solution box-grey" id="box-one">
              <div class="icon-box">
                <i class="fa fa-camera-retro"></i>
              </div>
              <div class="icon">
                <h3>Describe Your Case</h3>
                <p>Submit pictures and answer a few questions</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="solution box" id="box-two">
              <div class="icon-box">  
                <i class="fa fa-user-md"></i>
              </div>
              <div class="icon">
                <h3>Professional Review</h3>
                <p>Our award winning dermatologist will review your submission</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="solution box-grey" id="box-three">
              <div class="icon-box">
                <i class="fa fa-file-text"></i>
              </div>
              <div class="icon">
                <h3>Get Results</h3>
                <p>Receive a personalized product routine within 2 business days</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <!--<span class="anchor" id="solution"></span>
      <div class="section about1">
        <div class="container"> 
            <div class="row header top wow fadeInUp">
              <h2>The Simplest, Most Effective Skincare Treatment</h2>
              <span class="divider"></span>
            </div>
            <div class="row top">
              <div class="col-md-4 wow solution box-grey fadeInUp" id="box-one">
                <div class="icon-box">
                <i class="fa fa-camera-retro"></i>
                </div>
                <div class="icon">
                  <h3>Describe Your Case</h3>
                  <p>Submit pictures and answer questions</p>
                </div>
              </div>
             <div class="col-md-4 solution box" id="box-two">
              <div class="icon-box">
                <i class="fa fa-user-md"></i>
              </div>
              <div class="icon">
                  <h3>Professional Review</h3>
                  <p>Our award winning dermatologist will review your submission</p>
              </div>
            </div>  
              <div class="col-md-4 solution box-grey wow fadeInUp" id="box-three">
                <div class="icon-box">
                  <i class="fa fa-file-text"></i>
                </div>
                <div class="icon">
                  <h3>Get Results</h3>
                  <p>Within 2 business days receive a product regimen specific to your needs</p>
                </div>
              </div>
          </div>
        </div>
      </div>-->

      <span class="anchor" id="video"></span>
      <div class="section video">
        <div class="container"> 
          <div class="row header top box fade-in one fadeInUp">
            <h2>Skincare is Complex - We Simplify it for You</h2>
            <span class="divider"></span>
          </div>
          <div class="row">
            <div class="col-sm-12 video-box box fade-in two fadeInUp">
              <iframe src="https://player.vimeo.com/video/124217619?color=1abc9c&byline=0" width="600" height="337.5" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <!--<div class="col-sm-12 col-md-7 video-side box fade-in two fadeInUp">
              <div class="side-text">
                <div class="hidden-xs side-icon">
                  <i class="fa fa-user-md"></i>
                </div>
                  <h3>Overwhelming Variety of Skincare Products</h3>
                <div class="side-description">
                    <p>In the areas of anti-aging, uneven skin color, and acne there is no shortage of products both online and in stores. This can often result in confusing choices and poor results.</p>
                </div>
              </div>
              <div class="side-text">
                <div class="hidden-xs side-icon">
                  <i class="fa fa-user-md"></i>
                </div>
                  <h3>Lack of Access to Professional Advice</h3>
                <div class="side-description">
                  <p>Appointment scheduling with dermatologists can be a long hassle. Unfortunately, this leaves the consumer with no one to guide them in choosing the best products for their particular problem.</p>
                </div>
              </div>
            </div>-->
          </div>
          </div>
        </div>
      </div>

      <span class="anchor" id="treat"></span>
      <div class="section treat">
        <div class="container">
          <div class="row header box fade-in one fadeInUp">
            <h2>Commonly Treated Conditions</h2>
            <span class="divider"></span>
          </div>
          <div class="row box fade-in two fadeInUp">
             <div class="col-sm-3">
              <h3>Acne</h3>
             </div>
             <div class="col-sm-3">
              <h3>Aging and Wrinkles</h3>
             </div>
             <div class="col-sm-3">
              <h3>Uneven Skin Tone</h3>
             </div>
             <div class="col-sm-3">
              <h3>Dryness or Irritation</h3>
             </div>
          </div>
        </div>
      </div>

      <!--<span class="anchor" id="testimony"></span>
      <div class="section testimony">
        <div class="container">
          <div class="row header">
            <h2>Our Services are Receiving Praise</h2>
            <span class="divider"></span>
          </div>
          <div class="row review-quote">
            <h3>"BeloDoc introduced me to a local dermatologist, who was able to treat me online. The products were high quality, and I'm definitely going back there"</h3>
            <p>- Joe Abrash, Bloomfield Hills</p>
          </div>
          <div class="row before-after">
            <div class="col-sm-6">
              <h3>Before:</h3>
              <img class="img-responsive" alt="Before image with acne" src="images/joebefore.jpg" />
            </div>
            <div class="col-sm-6">
              <h3>After:</h3>
              <img class="img-responsive" alt="After image with acne" src="images/joeafter.jpg" />
            </div>
          </div>
        </div>
      </div>-->

      <!--<span class="anchor" id="about"></span>
      <div class="section" id="treatment">
        <div class="container">
          <div class="row header box fade-in one fadeInUp">
            <h2>Our Tailored Plans Use Top Physician Strength Products</h2>
            <span class="divider"></span>
          </div>
          <div class="row products">
            <div class="col-sm-6" style="padding-top: 30px">
              <h3>Our board certified dermatologist, Dr. Mitchell Shek, has decades of experience with different brands and will create a skincare regimen that will work best for your skin type and concerns.</h3>
              <h3>At BeloDoc, we recommend a wide range of products from a collection of top physician strength dermatology brands.</h3></h3>
            </div>
            <div class="brand-modals">
            <h3>Click to learn more:</h3>
            <div class="col-sm-3">
              <a href="" data-toggle="modal" data-target="#obagi"><img class="img-responsive brand" src="images/obagi.png" /></a><br/>
              <a href="" data-toggle="modal" data-target="#neova"><img class="img-responsive brand" src="images/neova.png" /></a>
              <div class="modal fade" id="obagi" tabindex="-1" role="dialog" aria-labelledby="obagiLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 id="obagiLabel">Obagi</h3>
                    </div>
                    <div class="modal-body">
                      <p>Long time leader in anti-aging, combining a wide range of ingredients with enhanced delivery by a proprietary process. Obagi products are mainly used to treat uneven skin tone, wrinkles, and acne.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="neova" tabindex="-1" role="dialog" aria-labelledby="neovaLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 id="neovaLabel">Neova</h3>
                    </div>
                    <div class="modal-body">
                      <p>The cornerstone of all Neova products is a copper peptide complex. This complex is a high potency anti oxident that helps to gently moisturize the skin and decrease signs of sun damage and age.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
                <a href="" data-toggle="modal" data-target="#nia24"><img class="img-responsive brand" src="images/nia24.png" /></a><br />
                <a href="" data-toggle="modal" data-target="#neocutis"><img class="img-responsive brand" src="images/neocutis.png" /></a>
              <div class="modal fade" id="nia24" tabindex="-1" role="dialog" aria-labelledby="nia24Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 id="nia24Label">Nia24</h3>
                    </div>
                    <div class="modal-body">
                      <p>The main ingredient in NIA24 products is Pro-Niacin, a powerful anti-oxidant that works to increase thickness of the superficial skin layer and aids the regeneration of the outer and deeper layers of the skin.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="neocutis" tabindex="-1" role="dialog" aria-labelledby="neocutisLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 id="neocutisLabel">Neocutis</h3>
                    </div>
                    <div class="modal-body">
                      <p>All Neocutis products contain Process Skin Proteins which contain skin nutrients cultured hamn growth factors. PSP's help promote collagen production to create a scar free healing, and dramatic wrinkle reduction.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>-->

      <span class="anchor" id="pricing"></span>
      <div class="section pricing">
        <div class="container">
          <div class="row header box fade-in one fadeInUp">
              <h2>Pricing</h2>
              <span class="divider"></span>
          </div>
          <div class="row">
            <div class="price col-sm-6 col-md-6 box fade-in two fadeInUp">
              <div class="price-inner">
                <div class="black">
                  <span class="dolla">$</span>
                  <h1 style="font-weight:500;">50</h1>
                  <span class="consult"><h2>/Quarter</h2></span>
                </div>
                <h4>Quarterly Subscription</h4>
                <div class="pricing-features">
                  <ul>
                    <li>Personalized skin care regimen</li>
                    <li>One consultation every month</li>
                    <li>Unlimited contact with your doctor</li>
                    <li>Discounted product pricing</li>
                  </ul>
                </div>
                <div class="pricing-signup">
                  <a class="btn belo-btn" href="get/signup-get.php?plan=subscription">TRY FOR FREE</a>
                </div>
              </div>
            </div>
            <div class="price col-sm-6 col-md-6 box fade-in two fadeInUp">
              <div class="price-inner">
                  <div class="black">
                    <span class="dolla">$</span>
                    <h1 style="font-weight:500;">25</h1>
                    <span class="consult"><h2>/Consultation</h2></span>
                  </div>
                  <h4>Pay Per Consultation</h4>
                  <div class="pricing-features">
                    <ul>
                      <li style="border-top: 1px solid #eee;">Personalized skin care regimen</li>
                      <li>One month free communication with your doctor</li>
                      <li>One follow up visit</li>
                    </ul>
                  </div>
                  <div class="pricing-signup">
                    <a class="btn belo-btn btn-2" href="get/signup-get.php?plan=per">TRY FOR FREE</a>
                  </div>
              </div>
            </div>
          </div>

            <!--<div class="col-md-6">
              <div class="treat">
              <div class="row header">
              <h1 class="treat">What we treat</h1>
              <p class="treat">We deal with cosmetic conditions of the face and neck</p>
              </div>
              <div class="conditions">
              <div class="row">
                <i class="fa fa-circle-o"></i>
                <h1 class="condition">Acne</h1>
              </div>
              <div class="row">
                <i class="fa fa-circle-o"></i>
                <h1 class="condition">Aging</h1>
              </div>
              <div class="row">
                <i class="fa fa-circle-o"></i>
                <h1 class="condition">Wrinkles</h1>
              </div>
              <div class="row">
                <i class="fa fa-circle-o"></i>
                <h1 class="condition">Uneven Skin Tone</h1>
              </div>
              </div>-->
        </div>
      </div>


      <!--
      <span class="anchor" id="state"></span>
      <div class="section state">
        <div class="container">
            <div class="state">
              <div class="row header box fade-in one fadeInUp">
                <h2>We're Currently in Michigan and Quickly Expanding</h2>
              </div>
              <div class="row box soon fade-in two fadeInUp">
                <h2>As we grow nationwide, we'll let you know when treatment is available in your state</h2>
                <form id="states" name="launch" method="post" action="post/state-post.php">
                  <input class="form-control" type="text" id="state-email" name="email" placeholder="Email address" required />
                  <select class="form-control" id="state" name="state" required>
                    <option value="" selected disabled>Please select your state...</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                  </select>  
                  <input type="submit" id="state-submit" name="submit" value="submit" />
                </form>     
              </div>
          </div>
        </div>
      </div>
      -->

    <span class="anchor" id="doctor"></span>
    <div class="section doctor">
      <div class="container">
        <div class="row header box fade-in one fadeInUp">
          <h2>Our Medical Leadership is Award Winning</h2>
          <span class="divider">
        </div>
        <div class="row">
          <div class="col-sm-7 doc-box box fade-in two fadeInUp">
            <h2>Mitchell S. Shek</h2>
            <h3>M.D., F.A.C.P.</h3>
            <p>Dr. Shek received his medical degree from the Health Science Center at Syracuse, New York and graduated at the top of his class. He is on staff at William Beaumont Hospital and a volunteer faculty member for the dermatology department of Wayne State University. Dr. Shek has a wealth of clinical experience having treated over 300,000 medical cases and has also performed over 50,000 cosmetic procedures. 
          </div>
          <div class="col-sm-5 doc-box box fade-in two fadeInUp">
            <img class="img-responsive bio" src="images/shek1.jpg" alt="Mitchell S. Shek, M.D." />
          </div>
        </div>
      </div>
    </div>


    <span class="anchor" id="contact"></span>
    <div class="contact section">
      <div class="container">
        <div class="row header box fade-in one fadeInUp">
          <h2>Contact Us</h2>
          <span class="divider"></span>
        </div>
        <div class="row">
            <h3>Call our customer care team or fill out the form below</h3>
            <h3>248-302-6074</h3>
            <form id="contact-form" name="contact-form" onsubmit="return validateForm()" method="post" action="post/contact-post.php">
              <input type="text" id="name" name="name" placeholder="Full Name" />
              <input type="email" id="email" name="email" placeholder="Email Address" />
              <textarea rows="4" id="messages" name="message" placeholder="Your Message Here"></textarea>
              <input type="submit" id="submit" />
            </form>
        </div>
      </div>
    </div>

    <script>
    function validateForm() {
      var name = document.forms["contact-form"]["name"].value;
      var email = document.forms["contact-form"]["email"].value;
      var message = document.forms["contact-form"]["message"].value; 

      if (name == null || name == "") {
        alert("Please enter your name!");
        return false;
      }

      if (email == null || email == "") {
        alert("Please enter your email!");
        return false
      }

      if (message == null || message == "") {
        alert("Please enter a message!");
        return false;
      }

      return true;

    }
    </script>






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

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60485321-1', 'auto');
  ga('send', 'pageview');

    </script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var $_Tawk_API={},$_Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/55808053ca303726127506a2/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

  </body>
</html>