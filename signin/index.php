<?php
session_start();

if(isset($_SESSION["login-error"])) {
  $login_error = true;
  unset($_SESSION["login-error"]);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BeloDoc</title>

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
  </head>
  <body id="signin">


  <div class="container">
    <div class="row signin">
      <img class="logosignin" src="../images/logo1.png" />
      <?php if(isset($login_error)){ echo '<span class="errorWarnings">Sorry, the information you entered does not match our records</span>';}?>
      <form role="signin" id="signin" method="post" action="../post/signin-post.php">
        <input type="text" id="username" name="username" placeholder="Email"/>
        <input type="password" id="password" placeholder="Password" name="password" />
        <input type="submit" class="signin" value="Sign In" />
      </form>
        <span class="forgot-password">
          <a href="/forgot.php"><p>Forgot Password?</p></a>
        </span>
        <span class="return-home">
          <a href="/"><p>Return Home</p></a>
        </span>
    </div>
  </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>