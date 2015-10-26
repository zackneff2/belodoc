<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BeloDoc</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
      <img class="logosignin" src="images/logo1.png" />
        <form id="forgotp" name="forgotp" action="post/resubmit-post.php" method="post">
          <input type="email" id="username" name="username" placeholder="Enter your Username or Email" required />
          <input type="password" id="password" name="password" placeholder="Enter your desired password!" required style="margin-left: 3px;"/>
          <input type="password" id="password" name="confirm-password" placeholder="Please enter your password again" required />
          <input type="submit" class="signin" id="resubmit" value="Submit" />
        </form>
    </div>
  </div>
</body>

<script>
function validatePage() {
  var username = document.forms["forgotp"]["username"].value;
  var password = document.forms["forgotp"]["password"].value;
  var confirmPassword = document.forms["forgotp"]["confirm-password"].value;

   if (email == "") {
    alert("Please enter your email!")
    return false;
  }
  else if (password == "" || password.length < 6) {
    alert("Please enter a password that is at least 6 characters!")
    return false;
  }
  else if (password != confirmPassword) {
    alert("Your passwords do not match!")
    return false;
  }
  else {
    return true;
  }
}

    $("#forgotp").submit(function(){
      var test = validatePage();
    if (test) {
      return true;
    }
    else {
      event.preventDefault();
      return false;
    }
  });
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>