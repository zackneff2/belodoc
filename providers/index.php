<?php
session_start();

require '../lib/site.inc.php';

if ($_SERVER["SERVER_PORT"] != 443) {
    $redir = "Location: https://" . $_SERVER['HTTP_HOST'];
    header($redir);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dermatologist online. We're looking for Board-Certified Dermatologists. Patients are looking for you. Let us help you connect.">
    <meta name="keywords" content="Dermatology, Dermatologist, Acne treatment, anti-aging treatment, anti-aging, Skincare,Skin,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <meta name="google-site-verification" content="8PbCU4Q79dy39GxWTOOp7tutBpJ9F6ZTcKIYwIih3Q8" />
    <title>BeloDoc - Your Online Dermatologist - Providers</title>
    
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500" rel="stylesheet">
    <script src="../js/wow.min.js"></script>

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
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img class="logohome" src="../images/logo1.png" alt="Belodoc logo"/></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <li>
              <a href="../faq">FAQ</a>
            </li>
            <li>
              <a href="../#solution">Our Solution</a>
            </li>
            <li>
              <a data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" ref="#contact">Contact Us</a>
            </li>
            <?php if ($_SESSION["loggedIn"] != 1) {?><li><a href="../#pricing">Sign Up</a></li><?php } ?>
            <li class="button"><a href="../signin"><button type="button" class="top btn btn-default navbar-btn">Sign in</button></a></li>
            <?php if ($_SESSION["loggedIn"] == 1) {?><li class="button"><a href="../pro/logout.php"><button type="button" class="top btn btn-default navbar-btn">Sign Out</button></a></li><?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <div id="providers">
      <div class="hot section">
        <div class="container">
          <div class="row">
            <h1>We're looking for Board-Certified Dermatologists. Patients are looking for you. Let us help you connect.</h1>
            <h3>Treat patients from home, build your local search and online presence, and get more customers in your door.</h3>
            <a href="#contact" data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" class="btn belo-btn">Start now!</a>
            <a href="#search" data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" class="btn belo-btn-inverse">Learn More</a>
          </div>
        </div>
      </div>

      <span class="anchor" id="search"></span>
      <div class="providers-search section">
        <div class="container">
          <div class="row">
            <h1>With BeloDoc, you'll be seen by everyone.</h1>
            <ul class="search">
              <li><h3>Our innovation and traffic, your brand. It's the perfect match</h3></li>
              <li><h3>Within weeks, you’ll get boosted to the top of your local search network</h3></li>
            </ul>
            <a href="" class="btn belo-btn-inverse" data-toggle="modal" data-target="#searchmodal">How does that work?</a>
              <div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="searchmodal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 id="searchlabel">We provide SEO, online brand management, and marketing services for our providers</h3>
                    </div>
                    <div class="modal-body">
                      <p>Our site will be getting hundreds of visitors a day. Compared to local dermatologists, that’s as high as it gets. By using various SEO tactics, we’re able to leverage our traffic to boost your online profile and get your name ahead of everyone else’s. </p>
                      <p>Get more reviews and get seen by more customers which means more customers in your door</p>
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

      <div class="relationships section">
        <div class="container">
          <div class="row">
            <h1>Create valuable relationships with local patients</h1>
            <span class="divider"></span>
            <h2>We provide patients with access to professional dermatology services and improve the patient - provider relationship through innovative technologies</h2>
            <ul class="search">
              <li><h3>We send any patient that can not be treated through a visual consultation directly to you</h3></li>
              <li><h3>Our treatment solution including seamless communication creates stronger relationships with your patients, giving you more repeat business</h3></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="simplicity section">
        <div class="container">
          <div class="row">
            <h1>Easy to Use</h1>
            <ul class="search">
              <li><h3>Spend your time helping and treating patients</h3></li>
              <li><h3>Our team will handle all of the behind the scenes and administrative work</h3></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="paid section">
        <div class="container">
          <div class="row">
            <h1>How do I get paid?</h1>
            <ul class="search">
              <li><h3>We recommend medical grade products that customers can purchase directly from us</h3></li>
              <li><h3>A portion of our sales goes to you</h3></li>
            </ul>
          </div>
        </div>
      </div>

    <span class="anchor" id="contact"></span>
    <div class="contact section">
      <div class="container">
        <div class="row header box fade-in one fadeInUp">
          <h2>Interested in working with us?</h2>
          <span class="divider"></span>
        </div>
        <div class="row">
            <h3>Call our customer care team or fill out the form below. Our management team will contact you soon.</h3>
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


      return true;

    }
    </script>

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