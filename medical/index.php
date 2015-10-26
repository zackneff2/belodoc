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
    <meta name="description" content="Dermatologist online. Our mission is to provide the highest quality skincare treatment from the convenience of your own home.">
    <meta name="keywords" content="Dermatology, Dermatologist, Acne treatment, anti-aging treatment, anti-aging, Skincare,Skin,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <meta name="google-site-verification" content="8PbCU4Q79dy39GxWTOOp7tutBpJ9F6ZTcKIYwIih3Q8" />
    <title>BeloDoc - Your Online Dermatologist</title>
    
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
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
              <a href="../#treat">What We Treat</a>
            </li>
            <li>
              <a href="../#contact">Contact Us</a>
            </li>
            <?php if ($_SESSION["loggedIn"] != 1) {?><li><a href="../#pricing">Sign Up</a></li><?php } ?>
            <li class="button"><a href="../signin"><button type="button" class="top btn btn-default navbar-btn">Sign in</button></a></li>
            <?php if ($_SESSION["loggedIn"] == 1) {?><li class="button"><a href="../pro/logout.php"><button type="button" class="top btn btn-default navbar-btn">Sign Out</button></a></li><?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <div id="cmo">
      <div class="section">
        <div class="container">
          <div class="row header top footer">
            <h1>Our Chief Medical Officer</h1>
          </div>
          <div class="row cmo-text">
            <div class="col-sm-7 cmos-text">
              <h2>Dr. Mitchell Shek</h2>
              <h3>M.D., F.A.C.P.</h3>
              <p>Dr. Shek received his medical degree from the Health Science Center at Syracuse, New York and graduated at the top of his class. He completed his internal medicine residency at Oakwood Hospital in Dearborn, MI where he served as chief resident. He then completed his dermatology residency at Detroit Receiving Hospital. He has advanced training in cosmetic dermatology and skin cancer excisional surgery.</p>
              <p>Certified by the American Board of Internal Medicine and Dermatology, Dr. Shek is a member of the American Medical Association and the Michigan State Medical Society. He is a fellow in the American College of Physicians and the American Society for Laser Medicine and Surgery. Dr. Shek is a published author in both the field of dermatology and internal medicine. He is on staff at William Beaumont Hospital and a volunteer faculty member for the dermatology department of Wayne State University.</p>
              <p>Dr. Shek has a wealth of clinical experience having treated over 150,000 medical cases and has also performed over 10,000 cosmetic procedures. He has locally pioneered the procedures known as “facial sculpting” and “the liquid face lift.”</p>
            </div>
            <div class="col-sm-5">
              <img class="img-responsive missions" alt="Dr. Mitchell Shek M.D., F.A.C.P." src="../images/shek1.jpg" />
              <img class="img-responsive missions" alt="Dr. Mitchell Shek" src="http://www.dermatologyassociatesbirmingham.com/sites/default/files/Shek.jpg" />
            </div>
          </div>
        </div>
      </div>
    </div>


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