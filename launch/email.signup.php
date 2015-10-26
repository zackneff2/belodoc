<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BeloDoc</title>

    <!-- Bootstrap -->
    <link href="beta/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body class="thanks">



<?php
$visitor_email = $_POST['email'];
$name = $_POST['name'];


$email_from = "info@belodoc.com";//<== update the email address
$email_subject = "New email signup";
$email_body = "Name: $name \n
Email: $visitor_email \n
has signed up through your launch page \n".
    
$to = "info@belodoc.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.

   
?> 
<div class="launch">
	<div class="jumbotron">
      <h1 class="launch">Thanks for signing up!</h1>
      <p class="launch">We will soon be launching on a first come, first serve basis. We'll notify you as soon as it is your turn to use BeloDoc.</p>
      <p class="launch">Until then, keep in touch!</p>
    <ul class="social-icons">
    	<li><a href="https://www.facebook.com/belodoc"><i class="fa fa-facebook-square fa-2x"></i></a></li>
    	<li><a href="https://twitter.com/BeloDoc"><i class="fa fa-twitter-square fa-2x"></i></a></li>
    	<li><a href="mailto:info@belodoc.com"><i class="fa fa-envelope fa-2x"></i></a></li>
    </ul>
    </div>
  </div>

      <div id="footer">
      <div class="container">
        <p class="footer">BeloDoc &copy; 2014</p>
        <ul class="nav nav-pills pull-right scroll-top">
          <li><a href="mailto:info@belodoc.com">Contact</a></li>
        </ul>
      </div>
    </div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60485321-1', 'auto');
  ga('send', 'pageview');

</script>
		

</body>
</html>

</body>