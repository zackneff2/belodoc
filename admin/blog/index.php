<?php
session_start();

require '../../lib/site.inc.php';

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
    <title>BeloDoc - Blog Admin</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

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
          <a class="navbar-brand" href="/admin"><img class="logohome" src="/images/logo1.png" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <li>
              <a href="/">Home</a>
            </li>
            <li>
              <a href="/faq">FAQ</a>
            </li>
            <?php if ($_SESSION["loggedIn"] != 1) {?><li class="button"><a href="#pricing" data-options="{ &quot;easing&quot; &quot;easeOutCubic&quot; }"><button type="button" class="top btn btn-default navbar-btn">Sign Up</button></a></li><?php } ?>
            <?php if ($_SESSION["loggedIn"] != 1) {?><li class="button"><a href="/signin"><button type="button" class="top btn btn-default navbar-btn">Sign in</button></a></li><?php } ?>
            <?php if ($_SESSION["loggedIn"] == 1) {?><li class="button"><a href="/pro/logout.php"><button type="button" class="top btn btn-default navbar-btn">Sign Out</button></a></li><?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <span class="anchor" id="admin"></span>
    <div class="admin section bottom">
      <div class="container">
        <div class="row header">
          <h1 class="draw">Submit blog post here</h1>
        </div>
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <form id="blog-form" name="blog-form" onsubmit="return validateForm()" enctype="multipart/form-data" method="post" action="/post/blogform-post.php">

            <label for="title">Blog Post Title</label>
            <input type="text" class="form-control" name="title" id="title" />

            <label for="desc">Post Description</label>
            <textarea name="desc" class="form-control" id="desc" style="width:80%;" rows="4"></textarea>

            <label for="cont">Post Content</label>
            <textarea name="cont" class="form-control" id="cont" style="width:100%;" rows="30"></textarea>

            <label for="auth">Author</label>
            <select name="auth" id="auth">
              <option selected disabled>Please choose an author..</option>
              <option value="Josh Gottesman">Josh Gottesman</option>
              <option value="Zack Neff">Zack Neff</option>
              <option value="Max Shek">Max Shek</option>
            </select>
            <input type="file" class="form-control file" name="fileUpload" id="fileUpload" />
            <input type="submit" name="submit" id="submit" />
            </form>
          </div>


          <div class="col-md-4 hidden-sm hidden-xs">

          </div>
        </div>
      </div>
    </div>

    <script>
    function validateForm() {
      var title = document.forms["blog-form"]["title"].value;
      var desc = document.forms["blog-form"]["desc"].value;
      var auth = document.forms["blog-form"]["auth"].value; 
      var cont = document.forms["blog-form"]["cont"].value;

      if (title == null || title == "") {
        alert("Please enter a title");
        return false;
      }
      if (desc == null || desc == "") {
        alert("Please enter a description");
        return false
      }
      if (auth == null || auth == "") {
        alert("Please select an author");
        return false;
      }
      if (cont == null || cont == "") {
        alert("Please enter a blog post");
        return false;
      }

      return true;
    }
    </script>


<?php echo Format::footer();?>




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
  </body>
</html>