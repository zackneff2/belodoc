<?php
session_start();
require '../lib/cls/Format.php';

if (!isset($_SESSION["loggedIn"])) {
  $_SESSION["loggedIn"] = "";
}

$_SESSION["ActivePage"] = "/faq/index.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dermatologist Online. Frequently asked questions from BeloDoc.">
    <meta name="keywords" content="belodoc, online dermatology, dermatologist, acne treatment, anti-aging treatment, faq, what is belodoc, Skincare,Skin,Personalized,Regimen,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <title>BeloDoc - FAQ</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="../css/style.css" rel="stylesheet">

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
  <body id="faq">

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
            <li class="button"><a href="/signin"><button type="button" class="top btn btn-default navbar-btn">Sign in</button></a></li>
          </ul>
        </div>
      </div>
    </nav>-->

  
    <div class="questions section top">
      <div class="container">
        <div class="row faq-header header">
          <h1>Frequently Asked Questions</h1>
          <span class="divider"></span>
        </div>
        <div class="row">
          <div class="panel-group" id="accordion">
          <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                <div class="panel-heading">
                <h4 class="panel-title">
                  What products are used in treatment plans?
                </h4>
                </div>
              </a>
              <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
              BeloDoc uses physician strength products, often called cosmeceuticals, for treatment. We use these products because they are of the highest quality and will thus provide patients with the best and quickest results. Example brands include Obagi, Neova, and NIA24.
              </div>
              </div>
          </div>
          <div class="panel panel-default">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              <div class="panel-heading">
                <h4 class="panel-title">
                  How do products recommended by BeloDoc compare to perscription skincare products?
                </h4>
              </div>
            </a>
              <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">
              These products can not only improve acne prone skin, uneven pigmentation and wrinkles but they also contain many ingredients that reverse the aging process, stimulate collagen production and help in healing deep-rooted issues of the skin. If your condition is more severe and you’re looking for a more aggressive approach, please contact a dermatologist in your area to receive a prescription.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
              <div class="panel-heading">
                <h4 class="panel-title">
                  Is BeloDoc covered by insurance?
                </h4>
              </div>
              </a>
              <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body">
              BeloDoc consultations are not currently covered by insurance. All product costs must come out of pocket; however, we offer our products at industry low prices.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#faqSub">
              <div class="panel-heading">
                <h4 class="panel-title">
                  How does the subscription work?
                </h4>
              </div>
              </a>
              <div id="faqSub" class="panel-collapse collapse">
              <div class="panel-body">
              The first quarter of the subscription is free to all users. Users who sign up for the quarterly subscription will receive a personalized skin care regimen with instructions on when and how to use products specific to their needs. The subscription will include unlimited contact with our dermatologist, discounted product pricing, and an additional consultation one month after the initial one to monitor your progress. 
              </div>
            </div>
          </div>
          <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#faqContact">
              <div class="panel-heading">
                <h4 class="panel-title">
                  How do you contact your dermatologist?
                </h4>
              </div>
              </a>
              <div id="faqContact" class="panel-collapse collapse">
              <div class="panel-body">
              All communication with your dermatologist is done through email. Once you register, we will give you access to your local dermatologist's contact information so you can reach out to him or her whenever you wish.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#faqWhere">
              <div class="panel-heading">
                <h4 class="panel-title">
                  Where is BeloDoc currently available?
                </h4>
              </div>
              </a>
              <div id="faqWhere" class="panel-collapse collapse">
              <div class="panel-body">
              BeloDoc is currently only available to patients living in Michigan.  However, we will be available to treat patients in New York, California, Florida, and Illinois in the next few months. 
              </div>
            </div>
          </div>
          <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#faqMobile">
              <div class="panel-heading">
                <h4 class="panel-title">
                  Can I use BeloDoc on my smart phone?
                </h4>
              </div>
              </a>
              <div id="faqMobile" class="panel-collapse collapse">
              <div class="panel-body">
              Yes! BeloDoc can be used on a smart phone the same way it is available on a laptop or personal computer. 
              </div>
            </div>
          </div>
          <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
              <div class="panel-heading">
                <h4 class="panel-title">
                  Who can use BeloDoc?
                </h4>
              </div>
              </a>
              <div id="collapseFour" class="panel-collapse collapse">
              <div class="panel-body">
              Anyone can use BeloDoc.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
              <div class="panel-heading">
                <h4 class="panel-title">
                  How long will it take to receive the products detailed in my treatment plan?
                </h4>
              </div>
              </a>
              <div id="collapseFive" class="panel-collapse collapse">
              <div class="panel-body">
              Once you receive your personalized treatment plan you will have the option to purchase the products outlined in your regimen at our discounted rates. Once the order is placed, your products will be delivered in 5-7 business days.
              </div>
          </div>
          </div>
            <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
              <div class="panel-heading">
                <h4 class="panel-title">
                  Can I trust that my information is being kept private?
                </h4>
              </div>
              </a>
              <div id="collapseSix" class="panel-collapse collapse">
              <div class="panel-body">
              All information submitted to BeloDoc is completeley private. Our doctor is the only person given access to the information submitted through the website. For more information please read our <a href="/terms#privacy">privacy policy</a>.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
              <div class="panel-heading">
                <h4 class="panel-title">
                  What areas of the body does BeloDoc treat?
                </h4>
              </div>
              </a>
              <div id="collapseSeven" class="panel-collapse collapse">
              <div class="panel-body">
              BeloDoc treats acne, aging and wrinkles, uneven skin tone, redness, and irritaiton of the face and neck. We do not treat other areas at this time because they often require in person medical attention. For more information, please see our <a href="/terms">terms of use</a>.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
              <div class="panel-heading">
                <h4 class="panel-title">
                  How is the personalized treatment plan created?
                </h4>
              </div>
              </a>
              <div id="collapseEight" class="panel-collapse collapse">
              <div class="panel-body">
              No computerized methods are used in creating the treatment plans. After analyzing your pictures and reveiwing your survey answers, our board certified dermatologist will utilize various products that are best suited to maximize your results. Each product has a main ingredient focused on both cleansing the face and opening pores along with rejuvinating the skin by using antioxidants and retinoids to increase collagen production. By customizing your treatment using a variety of physician strength cosmetic products we can greatly improve your appearance without any unnecessary irritation.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
             <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
              <div class="panel-heading">
                <h4 class="panel-title">
                  Is BeloDoc a replacement for my dermatologist?
                </h4>
              </div>
              </a>
              <div id="collapseNine" class="panel-collapse collapse">
              <div class="panel-body">
             Belodoc is not a replacement for your dermatologist.  Skin cancer and other serious conditions can only be detected by visiting your doctor and we encourage you to do so on a regular basis. Our mission is to treat aging, uneven pigmentation and acne using the highest medical grade cosmetic products. Please continue to see your doctor for regular skin exams to minimize the possibility of missing any underlying medical conditions or skin cancer.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php echo Format::footer(); ?>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/smooth-init.js"></script>
    <script type="text/javascript" src="../js/smooth-scroll.js"></script>
    <script>
          smoothScroll.init({
        speed: 1000,
        easing: 'easeInOutCubic',
        offset: 0,
        updateURL: true,
        callbackBefore: function ( toggle, anchor ) {},
        callbackAfter: function ( toggle, anchor ) {}
      });

        $('#collapseOne').collapse("hide");
    </script>

        <script>

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