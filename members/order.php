<?php
session_start();

require '../lib/site.inc.php';

/*
if ($_SESSION["loggedIn"] != 1) {
  require ('../signin/index.php');
  exit;
}
*/

if (!isset($_SESSION["Email"])) {
  $_SESSION["Email"] = "";
}

if (!isset($_SESSION["plan"])) {
  $_SESSION["plan"] = "per";
}

if (!isset($_SESSION["loggedIn"])) {
  $_SESSION["loggedIn"] = "";
}

$_SESSION["ActivePage"] = "/signup/index.php";

$products = new Products();

$products->getPrices();

$product = $_SESSION["Product"];
$product2 = $_SESSION["Product2"];
$product3 = $_SESSION["Product3"];

$productid = $_SESSION["Productid"];
$productid2 = $_SESSION["Productid2"];
$productid3 = $_SESSION["Productid3"];

$price = $_SESSION["Price"];
$price2 = $_SESSION["Price2"];
$price3 = $_SESSION["Price3"];
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Order your personalized skincare treatment plan from BeloDoc.">
    <meta name="keywords" content="Dermatology,Skincare,Skin,Personalized,Regimen,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <title>BeloDoc - Members - Order your products</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
      // This identifies your website in the createToken call below
      Stripe.setPublishableKey('pk_live_fN6AjPLZ2cbZh659P5qSlvVu');
      // ...

      function stripeResponseHandler(status, response) {
      var $form = $('#orderForm');

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
      };

    
 jQuery(function($) {
  $('#orderForm').submit(function(event) {
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
            <li>
              <a href="/members">My Dashboard</a>
            </li>
            <li>
              <a href="/faq">FAQ</a>
            </li>
            <li role="presentation" class="button dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><button type="button" class="top btn btn-default navbar-btn"><?php echo $_SESSION["Email"] ?> <span class="caret"></span></button></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../pro/logout.php">Logout</a></li>
                <li><a href="#">Settings</a></li>
              </ul>
            </li>   
          </ul>
        </div>
      </div>
    </nav>-->

      <div id="checkout">
        <div class="container">
          <div class="hot section">
            <form id="orderForm" method="post" action="../post/order-post.php">
              <div class="row header select-products">
                <h1>Select your products</h1>
                <input type="checkbox" class="product" id="product" name="product" value="<?php echo $productid; ?>" />
                <label style="margin-top: 12px;" class="product" for="product"><?php echo $product; ?>: $<?php echo $price; ?></label>
            
                <input type="checkbox" class="product" id="product2" name="product2" value="<?php echo $productid2; ?>" />
                <label style="margin-top: -8px;" class="product" for="product2"><?php echo $product2; ?>: $<?php echo $price2; ?></label>
                
                <!--<input type="checkbox" class="product" id="product3" name="product3" value="<?php echo $productid3; ?>" />
                <label style="margin-top: -8px;" class="product" for="product3"><?php echo $product3; ?>: $<?php echo $price3; ?></label>-->
                
                <span id="totalPrice"></span>
                <a id="displayPrice" class="btn belo-btn" data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" href="#order-form">Update Order</a>
                <span class="hiddenPrice" id="price"><?php echo $price; ?></span>
                <span class="hiddenPrice" id="price2"><?php echo $price2; ?></span>
                <span class="hiddenPrice" id="price3"><?php echo $price3; ?></span>
                <span class="hiddenPrice" id="productOne"><?php echo $product; ?></span>
                <span class="hiddenPrice" id="productTwo"><?php echo $product2; ?></span>
                <span class="hiddenPrice" id="productThree"><?php echo $product3; ?></span>
                <hr class="checkout" />
              </div>
              <span class="anchor" id="order-form"></span>
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
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 grey order-box">
                  <p class="your-order"><strong>Your Order:</strong></p>
                  <button type="submit" class="btn belo-btn" id="submitCheckout">Place Order</button>
                  <span class="divider"></span>
                    <h3 class="total">Total Spendings</h3>
                    <div class="spendings-circle">
                      <h3 id="priceCircle"></h3>
                    </div>
                    <p class="order"><strong>Email:</strong> <br/><?php echo $_SESSION["Email"]; ?></p>
                    <p class="order"><strong>Products:</strong></p>
                    <p class="order" id="productList"></p>
                    <p class="price"><strong>Price:</strong></p>
                    <p class="price" id="priceBox">
                    </p>
              </div>
            </form>
          </div>
        </div>
      </div>
      <script>
      var price = 0;
      var original = "";
      $('#displayPrice').click(function() {
        price = 0;
        original = "";
        if ($('#product').is(':checked')) {
          price += parseInt($('#price').text());
          original = original + $('#productOne').text() + '<br/>';
        }
        if ($('#product2').is(':checked')) {
          price += parseInt($('#price2').text());
          original = original + $('#productTwo').text() + '<br/>';
        }
        if ($('#product3').is(':checked')) {
          price += parseInt($('#price3').text());
          original = original + $('#productThree').text() + '<br/>';
        }
        if (price != 0) {
          $('#totalPrice').text('Total Price: $' + price);
          $('#priceCircle').text('$' + price);
          $('#productList').html(original);
          $('#priceBox').text('$' + price);
        }
        else {
          return false;
        }
      });
      
      </script>

    <!--<script>
    braintree.setup(
  "eyJ2ZXJzaW9uIjoyLCJhdXRob3JpemF0aW9uRmluZ2VycHJpbnQiOiIxNzcyNTkyYTBhNTEyY2I1YWQxY2JlMTcwMmM1OWE3MWNhMGVhMzM0ZGI5MmJlOGRmOTRiZmJmOTg2NTU0NDhlfGNyZWF0ZWRfYXQ9MjAxNS0wMy0xM1QxNTozNzozNi4xODU2NzQ1ODcrMDAwMFx1MDAyNm1lcmNoYW50X2lkPWRjcHNweTJicndkanIzcW5cdTAwMjZwdWJsaWNfa2V5PTl3d3J6cWszdnIzdDRuYzgiLCJjb25maWdVcmwiOiJodHRwczovL2FwaS5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tOjQ0My9tZXJjaGFudHMvZGNwc3B5MmJyd2RqcjNxbi9jbGllbnRfYXBpL3YxL2NvbmZpZ3VyYXRpb24iLCJjaGFsbGVuZ2VzIjpbXSwiY2xpZW50QXBpVXJsIjoiaHR0cHM6Ly9hcGkuc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbTo0NDMvbWVyY2hhbnRzL2RjcHNweTJicndkanIzcW4vY2xpZW50X2FwaSIsImFzc2V0c1VybCI6Imh0dHBzOi8vYXNzZXRzLmJyYWludHJlZWdhdGV3YXkuY29tIiwiYXV0aFVybCI6Imh0dHBzOi8vYXV0aC52ZW5tby5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tIiwiYW5hbHl0aWNzIjp7InVybCI6Imh0dHBzOi8vY2xpZW50LWFuYWx5dGljcy5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tIn0sInRocmVlRFNlY3VyZUVuYWJsZWQiOnRydWUsInRocmVlRFNlY3VyZSI6eyJsb29rdXBVcmwiOiJodHRwczovL2FwaS5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tOjQ0My9tZXJjaGFudHMvZGNwc3B5MmJyd2RqcjNxbi90aHJlZV9kX3NlY3VyZS9sb29rdXAifSwicGF5cGFsRW5hYmxlZCI6dHJ1ZSwicGF5cGFsIjp7ImRpc3BsYXlOYW1lIjoiQWNtZSBXaWRnZXRzLCBMdGQuIChTYW5kYm94KSIsImNsaWVudElkIjpudWxsLCJwcml2YWN5VXJsIjoiaHR0cDovL2V4YW1wbGUuY29tL3BwIiwidXNlckFncmVlbWVudFVybCI6Imh0dHA6Ly9leGFtcGxlLmNvbS90b3MiLCJiYXNlVXJsIjoiaHR0cHM6Ly9hc3NldHMuYnJhaW50cmVlZ2F0ZXdheS5jb20iLCJhc3NldHNVcmwiOiJodHRwczovL2NoZWNrb3V0LnBheXBhbC5jb20iLCJkaXJlY3RCYXNlVXJsIjpudWxsLCJhbGxvd0h0dHAiOnRydWUsImVudmlyb25tZW50Tm9OZXR3b3JrIjp0cnVlLCJlbnZpcm9ubWVudCI6Im9mZmxpbmUiLCJ1bnZldHRlZE1lcmNoYW50IjpmYWxzZSwiYnJhaW50cmVlQ2xpZW50SWQiOiJtYXN0ZXJjbGllbnQiLCJtZXJjaGFudEFjY291bnRJZCI6InN0Y2gybmZkZndzenl0dzUiLCJjdXJyZW5jeUlzb0NvZGUiOiJVU0QifSwiY29pbmJhc2VFbmFibGVkIjp0cnVlLCJjb2luYmFzZSI6eyJjbGllbnRJZCI6IjExZDI3MjI5YmE1OGI1NmQ3ZTNjMDFhMDUyN2Y0ZDViNDQ2ZDRmNjg0ODE3Y2I2MjNkMjU1YjU3M2FkZGM1OWIiLCJtZXJjaGFudEFjY291bnQiOiJjb2luYmFzZS1kZXZlbG9wbWVudC1tZXJjaGFudEBnZXRicmFpbnRyZWUuY29tIiwic2NvcGVzIjoiYXV0aG9yaXphdGlvbnM6YnJhaW50cmVlIHVzZXIiLCJyZWRpcmVjdFVybCI6Imh0dHBzOi8vYXNzZXRzLmJyYWludHJlZWdhdGV3YXkuY29tL2NvaW5iYXNlL29hdXRoL3JlZGlyZWN0LWxhbmRpbmcuaHRtbCJ9LCJtZXJjaGFudElkIjoiZGNwc3B5MmJyd2RqcjNxbiIsInZlbm1vIjoib2ZmbGluZSIsImFwcGxlUGF5Ijp7InN0YXR1cyI6Im1vY2siLCJjb3VudHJ5Q29kZSI6IlVTIiwiY3VycmVuY3lDb2RlIjoiVVNEIiwibWVyY2hhbnRJZGVudGlmaWVyIjoibWVyY2hhbnQuY29tLmJyYWludHJlZXBheW1lbnRzLmRldi1kY29wZWxhbmQiLCJzdXBwb3J0ZWROZXR3b3JrcyI6WyJ2aXNhIiwibWFzdGVyY2FyZCIsImFtZXgiXX19",
  'dropin', {
    container: 'dropin'
  });
  </script>-->

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
    </script>
  </body>
</html>