<?php
session_start();
require 'lib/site.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dermatologist online. Get Acne and Anti-Aging treatment from a board-certified dermatologist today! Try it for free!">
    <meta name="keywords" content="Dermatology, Dermatologist, Acne treatment, anti-aging treatment, anti-aging, Skincare,Skin,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <meta name="google-site-verification" content="8PbCU4Q79dy39GxWTOOp7tutBpJ9F6ZTcKIYwIih3Q8" />
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
    <style>
    div#home {
      position: absolute;
      height:100%;
      width: 100%;
    }
    #index #home div.hot.girl button#temp-post-btn {
      position: relative;display: inline-block;height: 40px;margin: 0 5px;padding: 0px 20px 0px 20px;background: #1abc9c;font-size: 16px;font-weight: 300;line-height: 16px;color: #fff;-moz-border-radius: 4px;-webkit-border-radius: 4px;border-radius: 4px;
    }
    input#temp-post-input {
      width: 40%;line-height: 1.5;display: inline-block;margin-bottom: 5px;border: 1px solid #2F3239;border-radius: 5px;color: #55606A;font-size: 16px;padding: 15px;margin-left: -25px;
    }
    @media(max-width: 768px) {
      div#home {
        height: auto;
      }
      div#temp-post-btn {
        display: block;
        margin: auto;
        margin-bottom: 10px;
      }
      input#temp-post-input {
        width: auto;
        display: block;
        margin: auto;
        margin-bottom: 10px;
      }
    }
    </style>
  </head>


  <body id="index">
    <div id="home">
      <div class="hot section girl">
        <div class="container">
            <div style="margin-bottom: 0px;padding-bottom:0px;" class="row header top box fade-in one fadeInUp">
              <div style="margin-top: 20px;margin-bottom: 0px;" class="col-md-7 video-box box fade-in two fadeInUp">
                <h2 style="margin-bottom:5px;">Get treated by a Board-Certified Dermatologist from Home</h2>
                  <h3 style="margin-bottom:10px;">Sign up now to get notified when we're available</h3>
                      <iframe src="https://player.vimeo.com/video/124217619?color=1abc9c&byline=0" width="400" height="225" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                      <span class="divider"></span>
                      <form id="tempform" method="post" action="post/temppost.php" >
                          <input id="temp-post-input" class="form-control" id="email" type="email" name="email" placeholder="Email">
                          <button id="temp-post-btn" type="submit" class="btn belo-btn">Submit</button>
                      </form>
              </div>
              <div class="col-md-5 hidden-sm hidden-xs simple-form wow fadeInUp">
                  <img src="images/girl1.png" alt="Image of girl with nice skin" class="img-responsive girl" />
              </div>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>