<?php
session_start();
require '../lib/site.inc.php';

if (!isset($_SESSION["State"])) {
  header("Location: state/");
}

if (!isset($_SESSION["plan"])) {
  $_SESSION["plan"] = "per";
}

if (!isset($_SESSION["loggedIn"])) {
  $_SESSION["loggedIn"] = "";
}

$_SESSION["ActivePage"] = "/signup/index.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Get beautiful skin without leaving your home. Signup now!">
    <meta name="keywords" content="Dermatologist, Acne treatment, anti-aging treatment, belodoc, Signup,Dermatology,Skincare,Skin,Personalized,Regimen,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <title>BeloDoc - Your Online Dermatologists - Signup</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="../css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../js/webcam.js"></script>

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
          <a class="navbar-brand" href="/"><img class="logohome" src="../images/logo1.png" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <li><a href="/">Home</a></li>
            <li><a href="/faq">FAQ</a></li>
          </ul>
        </div>
      </div>
    </nav>-->

    <div id="free-trial">
      <ul class="nav nav-tabs hidden" id="primary-form-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#primary-form-section" aria-controls="home" role="tab" data-toggle="tab"></a></li>
        <li role="presentation"><a href="#trial-section" aria-controls="profile" role="tab" data-toggle="tab"></a></li>
      </ul>
    <form id="primary-form" name="primary-form" method="post" action="/post/primary-post.php">
      <div class="section">
        <div class="container">
          <div class="tab-content">
            <div id="primary-form-section" role="tabpanel" class="tab-pane active">
              <div class="row header primary" id="primary-form-row">
                <?php if ($_SESSION["State"] == "MI"){echo'<h1>Meet Your Dermatologist</h1>';} ?>
                <label for="primary-condition" class="primary">Hi, what brings you here today?</label>
                <?php if ($_SESSION["State"] != "MI"){echo'<span class="errorWarning" id="warning"></span>';} ?>
                <select class="form-control" id="primary-condition" name="primary-condition" required>
                  <option value="" selected disabled>Please select an option...</option>
                  <option value="aging">Aging</option>
                  <option value="acne">Acne</option>
                  <option value="dry">Dryness</option>
                  <option value="irr">Irritation</option>
                  <option value="tone">Uneven Skintone</option>
                </select>
              </div>
              <?php if ($_SESSION["State"] == "MI"){
                echo '
                <div class="row doctor" id="meet-your-derm">
                <div class="col-sm-7 doc-box">
                  <span class="errorWarning" id="warning"></span>
                  <div class="meet-derm-box">
                    <h2>Mitchell S. Shek</h2>
                    <h3>M.D., F.A.C.P.</h3>
                    <table class="meet-your-derm">
                      <tr>
                        <td><h4>Practice: </h4></td>
                        <td><p>Dermatology Associates of Birmingham</p><p>800 S Adams Rd Suite 101 Birmingham, MI </p></td>
                      </tr>
                      <tr>
                        <td><h4>Focus: </h4></td>
                        <td><p>Cosmetic Dermatology</p></td>
                      </tr>
                      <tr>
                        <td><h4>Education: </h4></td>
                        <td><p>MD from Health Science Center at Syracuse</p></td>
                      </tr>
                    </table>';
                    }
                    ?>
                    <a class="btn belo-btn" id="trial-scroll" href="#trial" data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }">Next Step</a>
                    
                    <?php if ($_SESSION["State"] == "MI"){
                      echo '
                  </div>
                </div>
                <div class="col-sm-5">
                  <img class="img-responsive bio" src="/images/shek1.jpg" alt="Mitchell S. Shek, M.D." />
                </div>
              </div>';
                    }
              ?>
            </div>
            <div id="trial-section" role="tabpanel" class="tab-pane fade">
                <div class="row header trial">
                  <ul class="search">
                    <?php if ($_SESSION["plan"] == "per"){
                      echo "<h3>Your First Consultation Is On Us</h3>
                            <li>Personalized Skincare Regimen</li>
                            <li>Unlimited Contact With Your Dermatologist</li>
                            <li>One Follow Up Visit</li>";
                    } else {
                      echo "<h3>What's included in a free trial?</h3>
                            <li>One Consultation Every Month</li>
                            <li>Personalized Skincare Regimen</li>
                            <li>Unlimited Contact With Your Dermatologist</li>
                            <li>Discounted Product Pricing</li>";
                    }
                    ?>
                  </ul>
                  <input type="submit" value="Continue" id="primary-submit" class="btn belo-btn"/>
                </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

    <script>

    $('#trial-scroll').click(function() {
      $('#primary-form-tabs a:first').tab('show');
      if (document.forms["primary-form"]["primary-condition"].value != "" && document.forms["primary-form"]["primary-condition"].value != null) {
        $('#primary-form-tabs a:last').tab('show');
      }
      else {
        $('#warning').text('Please select a primary condition');
        return false;
      }
    });
    </script>

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
