<?php
session_start();

if (!isset($_SESSION["price"])) {
  $_SESSION["price"] = 0;
}

if (!isset($_SESSION["Email"])) {
  $_SESSION["Email"] = "";
}

if (!isset($_SESSION["plan"])) {
  $_SESSION["plan"] = "per";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BeloDoc - Checkout</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
      // This identifies your website in the createToken call below
      Stripe.setPublishableKey('pk_live_fN6AjPLZ2cbZh659P5qSlvVu');
      // ...

      function stripeResponseHandler(status, response) {
        var $form = $('#checkoutForm');

        if (validateCheckout()) {
          if (response.error) {
            // Show the errors on the form
            $form.find('.payment-errors').text(response.error.message);
            $form.find('button').prop('disabled', false);
          } else {
          // response contains id and card, which contains additional card details
          var token = response.id;
          // Insert the token into the form so it gets submitted to the server
          $form.append($('<input type="hidden" name="stripeToken" />').val(token));
          // and submit
          $form.get(0).submit();
          }
        }
      };

    
 jQuery(function($) {
  $('#checkoutForm').submit(function(event) {
    var $form = $(this);

    // Disable the submit button to prevent repeated clicks
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken($form, stripeResponseHandler);

    // Prevent the form from submitting with the default action
    return false;
  });
});
    </script>
  </head>
  <body id="signup">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
    </nav>


    <div id="checkout">
      <div class="container">
        <div class="hot section">
        	<div class="row header">
        		<h1>Checkout</h1>
        		<hr class="checkout" />
        	</div>
            <div class="row secure">
              <div class="col-xs-2 col-sm-1 col-md-1">
                <img src="../images/lock.jpg" alt="Secure Site" style="display: inline-block; width: 80px; margin-bottom: 10px; margin-top: 10px;" />
              </div>
              <div class="col-xs-10 col-sm-9 col-md-10 payment">
                <h3>Secure payment info</h3>
                <p>This is a 128-bit SSL encrypted secure credit card form</p>
              </div>
            </div>
            <div class="row checkout-form">
              <div class="col-xs-12 col-sm-8 col-md-8">
              <form id="checkoutForm" method="post" action="../post/checkout-post.php">
                    <div class="row checkout name1">
                        <label for="name" class="name1">Name (as it appears on your card)</label>
                        <input class="form-control" id="name" type="text" data-stripe="name" required/>
                    </div>
                    <div class="row checkout">
                      <label for="number" class="number">Card number (no dashes or spaces)</label>
                      <input class="form-control" id="number" type="text" data-stripe="number" pattern=".{15,}" required/>
                      <img src="../images/cards.jpg" alt="Credit Cards Accepted" style="width: 200px;"/>
                    </div>
                    <div class="row checkout">
                      <label for="month" class="month">Expiration date</label>
                      <select class="form-control" id="month" data-stripe="exp-month" required>
                        <option value="01">01 - January</option>
                        <option value="02">02 - February</option>
                        <option value="03">03 - March</option>
                        <option value="04">04 - April</option>
                        <option value="05">05 - May</option>
                        <option value="06">06 - June</option>
                        <option value="07">07 - July</option>
                        <option value="08">08 - August</option>
                        <option value="09">09 - September</option>
                        <option value="10">10 - October</option>
                        <option value="11">11 - November</option>
                        <option value="12">12 - December</option>
                      </select>
                      <select class="form-control" id="year" data-stripe="exp-year" required>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                      </select>
                    </div>
                    <div class="row checkout">
                      <label for="cvv" class="cvv">Security code (3 on back, Amex: 4 on front)</label>
                      <input class="form-control" type="text" id="cvv" name="cvv" data-stripe="cvc" pattern=".{3,}" placeholder="111" required>
                      <img class="cvv" src="../images/cvv1.jpg" alt="Credit Card Security Code" />
                      <img class="cvv" src="../images/cvv2.jpg" alt="Credit Card Security Code" />
                    </div>
                    <div class="row checkout">
                      <label for="postal" class="postal">Postal Code</label>
                      <input class="form-control" type="text"  name="postal" id="postal" data-stripe="address-zip" placeholder="48025" required>
                    </div>
                  <button type="submit" class="btn belo-btn" id="submitCheckout">Place Order</button>
                </form>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 grey order-box">
                  <p class="your-order"><strong>Your Order:</strong></p>
                  <button type="submit" class="btn belo-btn" id="submitCheckout">Place Order</button>
                  <span class="divider"></span>
                    <h3 class="total">Total Spendings</h3>
                    <div class="spendings-circle">
                      <h3>$<?php echo $_SESSION["price"]; ?></h3>
                    </div>
                    <p class="order"><strong>Email:</strong> <br/><?php echo $_SESSION["Email"]; ?></p>
                    <p class="order"><strong>Plan:</strong> <br/><?php 
                    if ($_SESSION["plan"] == "per") {
                      echo "Pay per consultation";
                    }
                    else {
                      echo "Quarterly Subscription. Billed every 3 months";
                    }
                    ?></p>
                    <p class="price"><strong>Price:</strong> <br/><?php
                    if ($_SESSION["plan"] == "per") {
                      echo "$".$_SESSION["price"]." due today. Your first consultation is free under our trial period.";
                    }
                    else {
                      echo "You're price today is $0. Starting in 3 months, unless the plan has been cancelled, you will be charged $50 quarterly.";
                    }
                    ?></p>
              </div>
            </div>
        </div>
      </div>
    </div>


    <script>
  function validateCheckout() {
    var zip = document.forms["checkoutForm"]["postal"].value;

    var start = 48000;
    var end = 50000;

    var valid = [""];

    for (var i = start; i < end; i++) {
      var j = i.toString();
    
    if (zip == j) {
      return true;
    }  
    }

    alert("We have only launched in Michigan! Please signup on our homepage, and we will let you know when we launch in your state!")
    return false;
  }

    </script>

   <div id="footer">
      <div class="container">
        <div class="row">
        <div class="foot-company">
          <div class="footer-company">
          <h4>Company</h4>
          <ul class="ul-company">
            <li><a href="/mission">Our Mission</a></li>
            <li><a href="/medical">Medical Leadership</a></li>
            <li><a href="/terms">Terms of Use</a></li>
            <li><a href="/terms#privacy">Privacy Policy</a></li>
            <li><a href="/terms/trial.php">Free Trial Terms and Conditions</a></li>
          </ul>
          </div>
        </div>
        <div class="foot-learn">
          <div class="footer-learn">
          <h4>Learn More</h4>
          <ul class="ul-learn">
            <!--<li>Blog</li>-->
            <li><a href="/faq">FAQ</a></li>
            <li><a href="/#contact">Contact Us</a></li>
            <li><a href="/#solution">Our Solution</a></li>
            <!--<li>Press</li>-->
            <li><a href="/press">Media Inquiries</a></li>
          </ul>
          </div>
        </div>
        <div class="foot-providers">
          <div class="footer-providers">
          <h4>Providers</h4>
          <ul class="ul-providers">
            <li><a href="/medical">Our Dermatologists</a></li>
            <!--<li>For our doctors</li>-->
            <!--<li>Learn more</li>-->
          </ul>
          </div>
        </div>
        <div class="foot-mission">
          <div class="footer-mission">
          <h4>Mission Statement</h4>
          <p>Our mission is to provide you the highest quality skin care treatment at your own convenience.</p>
          <p class="footer">BELODOC LLC &copy; 2015</p>
            <ul class="social-footer">
              <li class="footer-twitter"><a href="https://twitter.com/BeloDoc" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li class="footer-facebook"><a href="https://www.facebook.com/belodoc" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li class="footer-yelp"><div id="yelp-biz-badge-plain-hQfdxL_WFjsn5mYhS96HGw"><a href="http://www.yelp.com/biz/belodoc-bloomfield-hills">Check out BeloDoc on Yelp</a></div></li><script type="text/javascript">(function(d, t) {var g = d.createElement(t);var s = d.getElementsByTagName(t)[0];g.id = "yelp-biz-badge-script-plain-hQfdxL_WFjsn5mYhS96HGw";g.src = "//dyn.yelpcdn.com/biz_badge_js/en_US/plain/hQfdxL_WFjsn5mYhS96HGw.js";s.parentNode.insertBefore(g, s);}(document, 'script'));</script>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </div>

    <!--<script>
    braintree.setup(
  "eyJ2ZXJzaW9uIjoyLCJhdXRob3JpemF0aW9uRmluZ2VycHJpbnQiOiIxNzcyNTkyYTBhNTEyY2I1YWQxY2JlMTcwMmM1OWE3MWNhMGVhMzM0ZGI5MmJlOGRmOTRiZmJmOTg2NTU0NDhlfGNyZWF0ZWRfYXQ9MjAxNS0wMy0xM1QxNTozNzozNi4xODU2NzQ1ODcrMDAwMFx1MDAyNm1lcmNoYW50X2lkPWRjcHNweTJicndkanIzcW5cdTAwMjZwdWJsaWNfa2V5PTl3d3J6cWszdnIzdDRuYzgiLCJjb25maWdVcmwiOiJodHRwczovL2FwaS5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tOjQ0My9tZXJjaGFudHMvZGNwc3B5MmJyd2RqcjNxbi9jbGllbnRfYXBpL3YxL2NvbmZpZ3VyYXRpb24iLCJjaGFsbGVuZ2VzIjpbXSwiY2xpZW50QXBpVXJsIjoiaHR0cHM6Ly9hcGkuc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbTo0NDMvbWVyY2hhbnRzL2RjcHNweTJicndkanIzcW4vY2xpZW50X2FwaSIsImFzc2V0c1VybCI6Imh0dHBzOi8vYXNzZXRzLmJyYWludHJlZWdhdGV3YXkuY29tIiwiYXV0aFVybCI6Imh0dHBzOi8vYXV0aC52ZW5tby5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tIiwiYW5hbHl0aWNzIjp7InVybCI6Imh0dHBzOi8vY2xpZW50LWFuYWx5dGljcy5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tIn0sInRocmVlRFNlY3VyZUVuYWJsZWQiOnRydWUsInRocmVlRFNlY3VyZSI6eyJsb29rdXBVcmwiOiJodHRwczovL2FwaS5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tOjQ0My9tZXJjaGFudHMvZGNwc3B5MmJyd2RqcjNxbi90aHJlZV9kX3NlY3VyZS9sb29rdXAifSwicGF5cGFsRW5hYmxlZCI6dHJ1ZSwicGF5cGFsIjp7ImRpc3BsYXlOYW1lIjoiQWNtZSBXaWRnZXRzLCBMdGQuIChTYW5kYm94KSIsImNsaWVudElkIjpudWxsLCJwcml2YWN5VXJsIjoiaHR0cDovL2V4YW1wbGUuY29tL3BwIiwidXNlckFncmVlbWVudFVybCI6Imh0dHA6Ly9leGFtcGxlLmNvbS90b3MiLCJiYXNlVXJsIjoiaHR0cHM6Ly9hc3NldHMuYnJhaW50cmVlZ2F0ZXdheS5jb20iLCJhc3NldHNVcmwiOiJodHRwczovL2NoZWNrb3V0LnBheXBhbC5jb20iLCJkaXJlY3RCYXNlVXJsIjpudWxsLCJhbGxvd0h0dHAiOnRydWUsImVudmlyb25tZW50Tm9OZXR3b3JrIjp0cnVlLCJlbnZpcm9ubWVudCI6Im9mZmxpbmUiLCJ1bnZldHRlZE1lcmNoYW50IjpmYWxzZSwiYnJhaW50cmVlQ2xpZW50SWQiOiJtYXN0ZXJjbGllbnQiLCJtZXJjaGFudEFjY291bnRJZCI6InN0Y2gybmZkZndzenl0dzUiLCJjdXJyZW5jeUlzb0NvZGUiOiJVU0QifSwiY29pbmJhc2VFbmFibGVkIjp0cnVlLCJjb2luYmFzZSI6eyJjbGllbnRJZCI6IjExZDI3MjI5YmE1OGI1NmQ3ZTNjMDFhMDUyN2Y0ZDViNDQ2ZDRmNjg0ODE3Y2I2MjNkMjU1YjU3M2FkZGM1OWIiLCJtZXJjaGFudEFjY291bnQiOiJjb2luYmFzZS1kZXZlbG9wbWVudC1tZXJjaGFudEBnZXRicmFpbnRyZWUuY29tIiwic2NvcGVzIjoiYXV0aG9yaXphdGlvbnM6YnJhaW50cmVlIHVzZXIiLCJyZWRpcmVjdFVybCI6Imh0dHBzOi8vYXNzZXRzLmJyYWludHJlZWdhdGV3YXkuY29tL2NvaW5iYXNlL29hdXRoL3JlZGlyZWN0LWxhbmRpbmcuaHRtbCJ9LCJtZXJjaGFudElkIjoiZGNwc3B5MmJyd2RqcjNxbiIsInZlbm1vIjoib2ZmbGluZSIsImFwcGxlUGF5Ijp7InN0YXR1cyI6Im1vY2siLCJjb3VudHJ5Q29kZSI6IlVTIiwiY3VycmVuY3lDb2RlIjoiVVNEIiwibWVyY2hhbnRJZGVudGlmaWVyIjoibWVyY2hhbnQuY29tLmJyYWludHJlZXBheW1lbnRzLmRldi1kY29wZWxhbmQiLCJzdXBwb3J0ZWROZXR3b3JrcyI6WyJ2aXNhIiwibWFzdGVyY2FyZCIsImFtZXgiXX19",
  'dropin', {
    container: 'dropin'
  });
  </script>-->
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