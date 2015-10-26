<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"].'/lib/site.inc.php';
$_SESSION["ActivePage"] = "/signup/index.php";

if(!isset($_SESSION["loggedIn"])) {
  $_SESSION["loggedIn"] = "";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Acne and Anti-aging treatment. Get a free consultation from a top dermatologist in under 24 hours! Sign up now!">
    <meta name="keywords" content="Dermatologist, Acne treatment, anti-aging treatment, belodoc, Signup,Dermatology,Skincare,Skin,Personalized,Regimen,Acne,Aging,Wrinkles,Dry,Irritation,Sensitive,Sun">
    <title>BeloDoc - Your Online Dermatologists - Signup</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="/css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700italic,400,300,600,700' rel='stylesheet' type='text/css'>

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
          <a class="navbar-brand" href="/"><img class="logohome" src="/images/logo1.png" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <li><a href="/">Home</a></li>
            <li><a href="/faq">FAQ</a></li>
            <li class="button"><a href="/signin"><button type="button" class="top btn btn-default navbar-btn">Sign in</button></a></li>
          </ul>
        </div>
      </div>
    </nav>-->

    <div id="survey">
      <div class="container">
        <div class="row">
              <ul class="nav nav-justified hidden-xs" id="myTab" role="tablist">
                <li role="presentation" class="active"><a href="#contact-info" aria-controls="contact-info" role="tab" data-toggle="tab">Contact Info</a></li>
                <li role="presentation"><a href="#skin" aria-controls="skin" id="skin-condition-tab" role="tab" data-toggle="tab">Skin Condition</a></li>
                <li role="presentation"><a href="#upload-photo" aria-controls="upload-photo" id="photo-upload-tab" role="tab" data-toggle="tab">Upload Photo</a></li>
              </ul>
              <form id="signup-form" name="form" method="post" action="/post/signup-post.php" onsubmit="return validateForm()" enctype="multipart/form-data">
              <span id="signup-form-warnings" class="errorWarning"></span>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="contact-info">
                    <div class="row name">
                      <label for="full-name" class="name">Full Name</label>
                      <input class="form-control" type="text" id="full-name" name="full-name" required/>
                    </div>
                    <div class="row email">
                      <label for="email" class="email">Email</label>
                      <input class="form-control" type="email" id="email" name="email" required/>
                    </div>
                    <div class="row password">
                      <label for="password" class="password">Password</label>
                      <input class="form-control" type="password" id="password" name="password" pattern=".{6,}" required/>
                    </div>
                    <div class="row birthday">
                      <label for="birthday" class="birthday">Birthday (mm/dd/yyyy)</label>
                      <input type="date" class="form-control" name="birthday" id="birthday" required/>
                    </div>
                    <div class="row terms">
                      <input type="checkbox" name="terms" id="terms" value="yes" required />
                      <label for="terms" class="terms">I agree to the <a target="_blank" href="/terms/">Terms of Use</a></label>
                    </div>
                    <a class="btn belo-btn" id="btnNext">Next</a>
                </div>
                <div role="tabpanel" class="tab-pane" id="skin">
                    <?php
                      $survey = new Survey($_SESSION["Condition"]);
                      $survey->printSurveyUL();
                      $survey->printSurvey();
                    ?>

                    <script>
                      $('#surveyTabs a:first').tab('show')
                    </script>
                    <!--<div class="row" id="secondary-concern">
                      <label for="secondary" class="conditions">What is your secondary skin concern?</label>
                      <select class="form-control" id="secondary" name="secondary" >
                        <option value="" selected disabled>Please select an option...</option>
                        <option value="wrinkles">Wrinkles and Aging</option>
                        <option value="acne">Acne</option>
                        <option value="tone">Uneven pigmentation</option>
                        <option value="none">No secondary concern</option>
                      </select>
                    </div>
                    <div class="row" id="oily">
                      <label for="oil" class="oil">What category best describes your skin?</label>
                      <select class="form-control" id="oil" name="oil" required>
                        <option value="" selected disabled>Please select an option...</option>
                        <option value="oily">Oily</option>
                        <option value="dry">Dry</option>
                        <option value="combination">Combination</option>
                      </select>
                    </div>
                    <div class="row" id="sensitivity">
                      <label for="sensitivity" class="sensitivity">Rate your skin sensitivity out of five</label>
                      <select class="form-control" id="sensitivity" name="sensitivity" required>
                        <option value="" selected disabled>Please select an option...</option>
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
                        <option value="" selected disabled>Please select an option...</option>
                        <option value="Frequently sunburn">Frequently sunburn, never tan</option>
                        <option value="Some burn, some tan">Ocassional sunburn, sometimes tan</option>
                        <option value="never sunburn">Never sunburn, always tan</option>
                      </select>
                    </div>
                    <div class="row" id="eyes">
                      <label for="eyes" class="eyes">Please describe your eyes</label>
                      <select class="form-control" id="eyes" name="eyes" >
                        <option value="" selected disabled>Please select an option...</option>
                        <option value="dark-circles">I have dark circles under them</option>
                        <option value="droopy">They are droopy</option>
                        <option value="wrinkled">They are wrinkled</option>
                        <option value="happy">I'm happy with my eyes</option>
                      </select>
                    </div>
                    <div class="row" id="neck">
                      <label for="neck" class="neck">Please describe your neck</label>
                      <select class="form-control" id="neck" name="neck" >
                        <option value="" selected disabled>Please select an option...</option>
                        <option value="Uneven">Uneven pigmentation</option>
                        <option value="Wrinkled">Wrinkled with loose skin</option>
                        <option value="Both">Both</option>
                        <option value="happy">I'm happy with my neck</option>
                      </select>
                    </div>
                    <div class="row" id="derm">
                      <label for="derm" class="derm">Do you currently see a dermatologist?</label>
                      <select class="form-control" id="derm" name="derm" required>
                        <option value="" selected disabled>Please select an option...</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                    </div>
                    <div class="row" id="notes">
                      <label for="notes" class="notes">Additional Notes:</label>
                      <textarea class="form-control" name="notes" id="notes" cols="10" rows="5" placeholder="Please include any additional information you believe we should know"></textarea>
                    </div>
                  </div>-->
              </div>
              <div role="tabpanel" class="tab-pane" id="upload-photo">

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
                <h3>Please take one front and one side facing photo. Make sure there is sufficient lighting, the camera is about one foot from your face, and the condition is visible. The pictures on the screen below are the ones that will be submitted.</h3>
                <!-- Large modal -->
              <div class="upload">
                <button type="button" class="btn belo-btn" data-toggle="modal" data-target=".bs-example-modal-lg">Take Photo With Camera</button>
                <button type="button" class="btn belo-btn-inverse" data-toggle="modal" data-target=".file-modal">Upload File</button>
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="Take Photo">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="Take Photo">Please Take 2 Photos</h4>
                      </div>
                      <div class="modal-body">
                        <input id="mydata" type="hidden" name="mydata" value="" />
                        <input id="mydatatwo" type="hidden" name="mydatatwo" value="" />
                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                            <div id="my_camera" style="margin: auto;">
                            </div>
                              <a id="full" class="belo-btn" href="javascript:void(take_snapshot())">Take Photo</a>
                            <div id="my_camera_two" style="margin: auto;">
                            </div>
                              <a id="full" class="belo-btn" href="javascript:void(take_snapshot_two())">Take Photo</a>
                          </div>
                          <div class="col-sm-6 col-md-6">
                            <div id="my_result">
                            </div>
                            <div id="my_result_two">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn belo-btn-inverse" data-dismiss="modal">Next</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade file-modal" tabindex="-1" role="dialog" aria-labelledby="Upload File">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="Upload File">Upload File</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="mobile">
                            <input type="file" style="width: 250px" class="form-control file" name="fileUpload[]" multiple>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn belo-btn-inverse" data-dismiss="modal">Next</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <input type="submit" id="submit" value="Submit Consultation" />
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

                      function validatePageOne () {
                        var email = document.forms["form"]["email"].value;
                        var password = document.forms["form"]["password"].value;
                        var name = document.forms["form"]["full-name"].value;
                        var terms = document.getElementById("terms").checked;
                        var birthday = document.forms["form"]["birthday"].value;

                        if (name == "") {
                          $('#signup-form-warnings').text('Please enter your name')
                          $('html, body').animate({ scrollTop: 0 }, 'slow');
                          return false;
                        }
                        else if (email == "") {
                          $('#signup-form-warnings').text('Please enter your email')
                          $('html, body').animate({ scrollTop: 0 }, 'slow');
                          return false;
                        }
                        else if (password == "" || password.length < 6) {
                          $('#signup-form-warnings').text('Please enter a password that is at least 6 characters')
                          $('html, body').animate({ scrollTop: 0 }, 'slow');
                          return false;
                        }
                        else if (birthday == "") {
                          $('#signup-form-warnings').text('Please enter your birthday')
                          $('html, body').animate({ scrollTop: 0 }, 'slow');
                          return false;
                        }
                        else if (!terms) {
                          $('#signup-form-warnings').text('Please read and agree to the terms of use')
                          $('html, body').animate({ scrollTop: 0 }, 'slow');
                          return false;
                        }
                        else {
                          return true;
                        }
                      }

                      $('#skin-condition-tab').click(function(){
                        test = validatePageOne();
                        if (test) {
                          $('#signup-form-warnings').text('');
                        }
                        else {
                          return false;
                        }
                      });

                      $('#photo-upload-tab').click(function(){
                        $('#signup-form-warnings').text('Please complete the full survey below, then continue to the photo upload.');
                        return false;
                      });

                      $('#btnNext').click(function() {
                        $('.nav-justified > .active').next('li').find('a').trigger('click');
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                      });

                      $('#btnNextTwo').click(function() {
                          $('#myTab a[href="#upload-photo"]').tab('show');
                          $('#signup-form-warnings').text('');
                          $('html, body').animate({ scrollTop: 0 }, 'slow');

                      });

                      function validateForm() {
                        test = validatePageOne();
                        testTwo = validatePageTwo();
                        if (test) {
                          if (testTwo) {
                            return true;
                          }
                          else {
                            $('#signup-form-warnings').text('Please enter your condition information on page two');
                            return false;
                          }
                        } 
                        else {
                          $('#signup-form-warnings').text('Please enter your contact information on page one!');
                          return false;
                        }
                      }

                      $('#submit').click(function(){
                        test = validateForm();
                        if (!test) {
                          return false;
                        }
                      });
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
