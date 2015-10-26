<?php
session_start();
require '../lib/site.inc.php';

require_once ('../lib/cls/blog.php');
require_once ('../lib/cls/blogs.php');
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
    <meta name="description" content="Anti-Aging, Acne, and general skincare daily tips. Follow our BeloDoc blog.">
    <meta name="keywords" content="Dermatology, Dermatologist, Acne treatment, anti-aging treatment, anti-aging, Skincare,Skin,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <meta name="google-site-verification" content="8PbCU4Q79dy39GxWTOOp7tutBpJ9F6ZTcKIYwIih3Q8" />
    <title>BeloDoc - Your Online Dermatologist - Blog</title>
    
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500" rel="stylesheet">
    <script src="../js/wow.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="index">
    <!--<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
    </nav>-->

    <nav class="navbar navbar-default blog" role="navigation">
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav nav-pills nav-justified">
            <?php if ($_SESSION["loggedIn"] == 1) {?><li><a href="/members">My Dashboard</a></li><?php } ?>
            <li>
              <a href="../faq">FAQ</a>
            </li>
            <li>
              <a href="../#treat">What We Treat</a>
            </li>
            <li>
              <a href="../#contact">Contact Us</a>
            </li>
            <?php if ($_SESSION["loggedIn"] != 1) {?><li><a href="#pricing" data-options="{ &quot;easing&quot; &quot;easeOutCubic&quot; }">Sign Up</a></li><?php } ?>
            <?php if ($_SESSION["loggedIn"] != 1) {?><li><a href="/signin">Sign in</a></li><?php } ?>
            <?php if ($_SESSION["loggedIn"] == 1) {?><li><a href="/pro/logout.php">Sign Out</a></li><?php } ?>
          </ul>
        </div>
      </nav>

      <img class="bloglogo" src="../images/logo11.png" alt="BeloDoc Logo" />

  <div id="blog">
    <div class="hot section">
      <div class="container">
        <div class="row blog">
          <div class="col-md-8 posts main">
            <?php
            $post = new Blogs();
            $post->getPosts();
            ?>
          </div>
          <div class="col-md-4 blog-sidebar">
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