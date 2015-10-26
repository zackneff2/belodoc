<?php
      session_start();
      $_SESSION["plan"] = "per";
      $_SESSION["price"] = 25;
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BeloDoc</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/webcam.js"></script>

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
          <a class="navbar-brand" href="index.php"><img class="logohome" src="images/logo1.png" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-pills pull-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#howitworks">How It Works</a></li>
            <li><a href="index.php#contact">Contact</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li class="button"><a href="signin.php"><button type="button" class="top btn btn-default navbar-btn">Sign in</button></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="survey">
      <div class="container">
        <div class="row">
              <ul class="nav nav-justified hidden-xs" id="myTab" role="tablist">
                <li><a href="#skin" role="tab" data-toggle="tab">Skin Condition</a></li>
                <li><a href="#upload-photo" role="tab" data-toggle="tab">Upload Photo</a></li>
              </ul>
              <form id="member-form" name="member-form" method="post" action="post/member-signup-post.php" enctype="multipart/form-data">
              <div class="tab-content">
                <div class="tab-pane" id="skin">
                  <h1 class="questions">Here is a short series of questions in order to focus our resources in the areas that are most prominent to you.</h1>
                  <div class="skin-survey">
                    <div class="row" id="primary-concern">
                      <label for="condition" class="primary">What is your primary skin concern?</label>
                      <select class="form-control" id="condition" name="condition" reqired>
                        <option value="" selected disabled>Please select an option...</option>
                        <option value="wrinkles">Wrinkles and Aging</option>
                        <option value="acne">Acne</option>
                        <option value="tone">Uneven pigmentation</option>
                      </select>
                    </div>
                    <div class="row" id="secondary-concern">
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
                    <a class="btn btn-primary btnNext" id="btnNextTwo">Next</a>
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


                    <ul class="instructions">
                      <li class="instructions">Take one front facing photo</li>
                      <li class="instructions">Take one side angle photo</li>
                      <li class="instructions">Keep camera one foot away from face</li>
                      <li class="instructions">Make sure there is sufficient lighting</li>
                      <li class="instructions">Make sure the condition is clearly visible</li>
                    </ul>
                    <h2 class="instructions">Upload or take your photos below!</h2>
                    <div class="upload">
                      <div id="mobile">
                          <input type="file" class="file" name="fileUpload[]" />
                          <input type="file" class="file" name="fileUpload[]" />
                          <input type="file" class="file" name="fileUpload[]" />
                          <input id="mydata" type="hidden" name="mydata" value="" />
                          <input id="mydatatwo" type="hidden" name="mydatatwo" value="" />
                      </div>
                      <div class="container" id="full">
                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                            <div id="my_camera">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-6">
                            <div id="my_result">
                            </div>
                          </div>
                        </div>
                        <script language="Javascript">
                        </script>
                        <a id="full" href="javascript:void(take_snapshot())">Take Snapshot</a>
                      </div>
                      <div class="container" id="full">
                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                            <div id="my_camera_two">
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-6">
                            <div id="my_result_two">
                            </div>
                          </div>
                        </div>
                        <a id="full" href="javascript:void(take_snapshot_two())">Take Snapshot</a>
                      </div>
                      <span id="error"><p id="errors"></p></span>
                    </div>
                      <a href=""><button id="submit">Proceed to Payment</button></a>
                  </div>
                </div>
              </form>
        </div>
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="footer">BELODOC LLC &copy; 2015</p>
        <ul class="nav nav-pills pull-right scroll-top">
          <li><a href="index.php#about">About</a></li>
          <li><a href="index.php#contact">Contact</a></li>
          <li><a href="signin.php">Sign In</a></li>
        </ul>
      </div>
    </div>

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
    </script>

  </body>
</html>
