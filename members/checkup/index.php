<?php
      session_start();
require '../../lib/site.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Acne and Anti-aging treatment. Get a free consultation from a top dermatologist in under 24 hours! Sign up now!">
    <meta name="keywords" content="Dermatologist, Acne treatment, anti-aging treatment, belodoc, Signup,Dermatology,Skincare,Skin,Personalized,Regimen,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <title>BeloDoc - Your Online Dermatologists - Checkup</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="/css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="/js/webcam.js"></script>

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
          <a class="navbar-brand" href="/"><img class="logohome" src="/images/logo1.png" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <li>
              <a href="/members#profile">My Dashboard</a>
            </li>
            <!--<li class="hidden1">
              <a data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }" href="#deals">View our Deals</a>
            </li>-->
            <li>
              <a href="/faq">FAQ</a>
            </li>
            <li role="presentation" class="button dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><button type="button" class="top btn btn-default navbar-btn"><?php echo $_SESSION["Email"] ?> <span class="caret"></span></button></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/pro/logout.php">Logout</a></li>
                <li><a href="#">Settings</a></li>
              </ul>
            </li>   
          </ul>
        </div>
      </div>
    </nav>

    <div id="survey">
      <div class="container">
        <div class="row">
              <ul class="nav nav-justified hidden-xs" id="myTab" role="tablist">
                <li class="active"><a href="#skin" role="tab" data-toggle="tab">Skin Condition</a></li>
                <li><a href="#upload-photo" role="tab" data-toggle="tab">Upload Photo</a></li>
              </ul>
              <form id="checkup-form" name="form" method="post" action="/post/checkup-post.php" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div class="tab-pane" id="skin">
                  <h1>Here is a short series of questions in order to focus our resources in the areas that are most important to you.</h1>
                  <div class="skin-survey">
                    <div class="row" id="primary-concern">
                      <label for="condition" class="primary">What is your primary skin concern?</label>
                      <select class="form-control" id="condition" name="condition" reqired>
                        <option value="" selected disabled>Please select an optio".</option>
                        <option value="wrinkles" <?php if ($_SESSION["Primary"] == "acne") { echo "selected"; }?>>Acne</option>
                        <option value="acne" <?php if ($_SESSION["Primary"] == "aging") { echo "selected"; }?>>Aging and Wrinkles</option>
                        <option value="dry" <?php if ($_SESSION["Primary"] == "dry") { echo "selected"; }?>>Dryness or Irritation</option>
                        <option value="tone" <?php if ($_SESSION["Primary"] == "tone") { echo "selected"; }?>>Uneven Skintone</option>
                      </select>
                    </div>
                    <div class="row" id="secondary-concern">
                      <label for="secondary" class="conditions">What is your secondary skin concern?</label>
                      <select class="form-control" id="secondary" name="secondary" >
                        <option value="" selected disabled>Please select an optio".</option>
                        <option value="wrinkles">Wrinkles and Aging</option>
                        <option value="acne">Acne</option>
                        <option value="tone">Uneven pigmentation</option>
                        <option value="none">No secondary concern</option>
                      </select>
                    </div>
                    <div class="row" id="oily">
                      <label for="oil" class="oil">What category best describes your skin?</label>
                      <select class="form-control" id="oil" name="oil" required>
                        <option value="" selected disabled>Please select an optio".</option>
                        <option value="oily">Oily</option>
                        <option value="dry">Dry</option>
                        <option value="combination">Combination</option>
                      </select>
                    </div>
                    <div class="row" id="sensitivity">
                      <label for="sensitivity" class="sensitivity">Rate your skin sensitivity out of five</label>
                      <select class="form-control" id="sensitivity" name="sensitivity" required>
                        <option value="" selected disabled>Please select an optio".</option>
                        <option value="1">1 - not at all</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5 - very sensitive</option>
                      </select>
                    </div>
                    <div class="row" id="sun">
                      <label for="sun" class="sun">How does your skin react in the sun?</label>
                      <select class="form-control" id="sun" name="sun" >
                        <option value="" selected disabled>Please select an optio".</option>
                        <option value="Frequently sunburn">Frequently sunburn, never tan</option>
                        <option value="Some burn, some tan">Ocassional sunburn, sometimes tan</option>
                        <option value="never sunburn">Never sunburn, always tan</option>
                      </select>
                    </div>
                    <div class="row" id="eyes">
                      <label for="eyes" class="eyes">Please describe your eyes</label>
                      <select class="form-control" id="eyes" name="eyes" >
                        <option value="" selected disabled>Please select an optio".</option>
                        <option value="dark-circles">I have dark circles under them</option>
                        <option value="droopy">They are droopy</option>
                        <option value="wrinkled">They are wrinkled</option>
                        <option value="happy">I'm happy with my eyes</option>
                      </select>
                    </div>
                    <div class="row" id="neck">
                      <label for="neck" class="neck">Please describe your neck</label>
                      <select class="form-control" id="neck" name="neck" >
                        <option value="" selected disabled>Please select an optio".</option>
                        <option value="Uneven">Uneven pigmentation</option>
                        <option value="Wrinkled">Wrinkled with loose skin</option>
                        <option value="Both">Both</option>
                        <option value="happy">I'm happy with my neck</option>
                      </select>
                    </div>
                    <div class="row" id="derm">
                      <label for="derm" class="derm">Do you currently see a dermatologist?</label>
                      <select class="form-control" id="derm" name="derm" required>
                        <option value="" selected disabled>Please select an optio".</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                    </div>
                    <div class="row" id="notes">
                      <label for="notes" class="notes">Additional Notes:</label>
                      <textarea class="form-control" name="notes" id="notes" cols="10" rows="5" placeholder="Please include any additional information you believe we should know"></textarea>
                    </div>
                    <a class="btn belo-btn" id="btnNextTwo">Next</a>
                  </div>
              </div>
              <div class="tab-pane" id="upload-photo">

                  <!--div class="row birthday">
                    <label for="birthday" class="birthday">Birthday</label>
                    <input type="date" name="birthday" id="birthday" required/>
                  </div>
                  <div class="row pers">
                    <div class="col-md-6 gender">
                    <label for="gender" class="gender">Gender</label>
                    <span class="gender">
                      <span class="male">
                    <input type="radio" name="gender" class="gender" id="male" value="male" />
                    <label for="male" class="male">Male</label>
                      </span>
                      <span class="female">
                    <input type="radio" name="gender" class="gender" id="female" value="female" />
                    <label for="female" class="female">Female</label>
                      </span>
                    </span>
                    </div>
                    <div class="col-md-6 ethnicity">
                    <label for="ethnicity" class="ethnicity">Ethnicity</label>
                    <select class="form-control" id="ethnicity" name="ethnicity" required>
                      <option value="american-indian">American Indian</option>
                      <option value="asian">Asian</option>
                      <option value="african-american">African American</option>
                      <option value="caucasian">Caucasian</option>
                      <option value="hispanic">Hispanic</option>
                      <option value="unknown">Unknown</option>
                    </select>
                    </div>
                  </div>
                  <div class="row additional">
                    <label for="additional" class="additional">Additional Information</label>
                    <textarea rows="4" name="additional" id="additional" placeholder="Please enter any additional information you would like your doctor to see"></textarea>
                  </div>
                  <div class="row allergies">
                    <label for="allergies" class="allergies">Allergies</label>
                    <textarea rows="4" name="allergies" id="allergies" placeholder="Please enter any allergies you may have to medications"></textarea>
                  </div>-->
                    <h2>Upload or take your photos below!</h2>
                    <h3>Please take one front and one side facing photo. Make sure there is sufficient lighting, the camera is about one foot from your face, and the condition is visible. The pictures on the screen below are the ones that will be submitted</h3>
                    <div class="upload">
                          <input id="mydata" type="hidden" name="mydata" value="" />
                          <input id="mydatatwo" type="hidden" name="mydatatwo" value="" />
                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                            <div id="my_camera" style="margin: auto;">
                            </div>
                              <a id="full" href="javascript:void(take_snapshot())">Take Snapshot</a>
                            <div id="my_camera_two" style="margin: auto;">
                            </div>
                              <a id="full" href="javascript:void(take_snapshot_two())">Take Snapshot</a>
                          </div>
                          <div class="col-sm-6 col-md-6">
                            <div id="my_result">
                            </div>
                            <div id="my_result_two">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <span id="error"><p id="errors"></p></span>
                          <div class="mobile">
                            <input type="file" style="width: 250px" class="form-control file" name="fileUpload[]" multiple>
                          </div>
                        </div>
                    </div>
                      <input type="submit" id="submit" value="Proceed to Payment" />
                  </div>
                </div>
              </form>
        </div>
      </div>
    </div>

<?php echo Format::footer(); ?>
        

    <script>
                      if ($(window).width() > 960) {
                      Webcam.set({
                        width: 320,
                        height: 240,
                        dest_width: 320,
                        dest_height: 240,
                        image_format: 'jpeg',
                        jpeg_quality: 90,
                        force_flash: false
                      });

                      Webcam.attach( '#my_camera' );
                      function take_snapshot() {
                        Webcam.snap( function(data_uri) {
                          document.getElementById('my_result').innerHTML = '<img id="result" src="'+data_uri+'"/>';
                          var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                          document.getElementById('mydata').value = raw_image_data;
                          });
                        }

                      Webcam.attach( '#my_camera_two' );
                      function take_snapshot_two() {
                        Webcam.snap( function(data_uri) {
                          document.getElementById('my_result_two').innerHTML = '<img id="result" src="'+data_uri+'"/>';
                          var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                          document.getElementById('mydatatwo').value = raw_image_data;
                          });
                        }
                      }
                      function validatePageTwo () {
                        var primary = document.forms["form"]["condition"].value;
                        var oil = document.forms["form"]["oil"].value;
                        var sensitivity = document.forms["form"]["sensitivity"].value;
                        var derm = document.forms["form"]["derm"].value;


                        if (primary == "") {
                          alert("Please fill out your primary condition!")
                          return false;
                        }
                        else if (oil == "") {
                          alert("Please select your skin category as Oily, Dry, or Combination.")
                          return false;
                        }
                        else if (sensitivity == "") {
                          alert("Please rate your skin sensitivity from 1 to 5.")
                          return false;
                        }
                        else if (derm == "") {
                          alert("Do you currently see a dermatologist?")
                          return false;
                        }
                        else {
                          return true;
                        }

                        return false;
                      } 
                      $('#btnNext').click(function() {
                        test = validatePageOne();
                        if (test) {
                          $('.nav-justified > .active').next('li').find('a').trigger('click');
                        }
                        else {
                          return false;
                        }
                      });
                      $('#btnNextTwo').click(function() {
                        test = validatePageTwo();
                        if (test) {
                          $('.nav-justified > .active').next('li').find('a').trigger('click');
                        }
                        else {
                          return false;
                        }
                      });

                      function validateForm() {
                          if (validatePageTwo()) {
                            return true;
                          }
                          else {
                            alert("Please enter your condition information on page two!");
                            return false;
                          }
                      }
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