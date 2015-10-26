<?php
/**
 * Created by Zack Neff
 * User: Zack Neff
 * Date: 9/24/15
 * Time: 3:30pm
 */

/** Survey class for determining questions to ask user
 * User selects condition on signup/index.php, based on response (stored as $_SESSION["Condition"])
 * pull up questions relevant to the patient.
 */ 

class Survey {

	// Pass in selected condition and store as class variable.
	function __construct($primary) {
		$this->condition = $primary;
	}

	public function GetCondition() {
		return $this->condition;
	}

	public function printSurvey() {
		$condition = $this->condition;

		if($condition == "acne") {
			$this->printQuestions($this->acneSurvey);
		}
		else if($condition == "aging") {
			$this->printQuestions($this->agingSurvey);
		}
		else if($condition == "tone") {
			$this->printQuestions($this->toneSurvey);
		}
		else if($condition == "dry") {
			$this->printQuestions($this->drySurvey);
		}
		else if($condition == "irr") {
			$this->printQuestions($this->irrSurvey);
		}
		else {
			return false;
		}
	}

	public function printQuestions($survey) {
		for ($j = 0; $j < sizeof($survey); $j++) {
				echo '<div role="tabpanel" class="tab-pane" id="'.$survey[$j][0].'">';
				$questionNum = $j + 1;
				$surveySize = sizeof($survey);
				if ($survey[$j][0] == "nextStep") {
					echo '<h1>'.$survey[$j][1].'</h1>';
				}
				else {
					echo '<h3>Question '.$questionNum.' of '.$surveySize.'</h3>';
					echo '<span class="errorWarning" id="error'.$survey[$j][0].'"></span>';
					echo '<label for="'.$survey[$j][0].'" class="survey">'.$survey[$j][1].'</label>';
					
					if($survey[$j][0] == "location" || $survey[$j][0] == "generalCon" || $survey[$j][0] ==  "habits" || $survey[$j][0] == "symptoms") {
							for ($i = 2; $i < sizeof($survey[$j]); $i++) {
								echo ' 	<div class="row checkbox '.$survey[$j][0].'">';
								echo '		<input type="checkbox" class="form-control" name="'.$survey[$j][0].'[]" id="'.$survey[$j][$i].'" value="'.$survey[$j][$i].'">';
								echo ' 		<label for="'.$survey[$j][$i].'">'.$survey[$j][$i].'</label>';
								echo ' 	</div>';
							}		
					}
					else if($survey[$j][0] == "medications" || $survey[$j][0] == "notes") {
						echo '	<textarea class="form-control" name="'.$survey[$j][0].'" id="'.$survey[$j][0].'" cols="10" rows="5"></textarea>';
					}
					else {
						echo '	<select class="form-control" id="'.$survey[$j][0].'" name="'.$survey[$j][0].'">'; 
							echo '<option value="" selected disabled>Please select an option...</option>';
							for ($i = 2; $i < sizeof($survey[$j]); $i++) {
			                    echo '<option value="'.$survey[$j][$i].'">'.$survey[$j][$i].'</option>';
		            		}
		            	echo '	</select>';	 
		            }
		        }

	            # If it's the last question, don't print the normal Next button, print the Upload Photo Next button. Previous button goes to either of last two depending on answer.
	            if($j + 1 == sizeof($survey)) {
	            	echo '<a id="'.$survey[$j][0].'Last" class="btn belo-btn-inverse">Previous</a>';
	            	echo '</div>';
	            	echo '<input type="submit" id="submitConditions" class="btn belo-btn-inverse" value="Skip" />';
	            	echo '<a class="btn belo-btn" id="btnNextTwo">Continue to Photo Upload</a>';
	            	echo "<script>$('#".$survey[$j][0]."Last').click(function(){ $('.survey-tabs > .active').prev('li').find('a').trigger('click');document.getElementById(\"btnNextTwo\").style.display = \"none\";document.getElementById(\"submitConditions\").style.display = \"none\" });</script>";
	            	echo '</div>';
	            }
	            else if($j + 2 == sizeof($survey)) {	            
	            	echo '<a id="'.$survey[$j][0].'Last" class="btn belo-btn-inverse">Previous</a>'; 
	            	echo '<a id="'.$survey[$j][0].'Next" class="btn belo-btn">Next Step</a>'; 
	            	echo "<script>$('#".$survey[$j][0]."Last').click(function(){ if(document.forms[\"form\"][\"".$survey[$j - 2][0]."\"].value == \"Yes\"){ $('.survey-tabs > .active').prev('li').find('a').trigger('click');}else{ $('#surveyTabs a[href=\"#history\"]').tab('show');}});</script>";
	            	echo "<script>$('#".$survey[$j][0]."Next').click(function(){ $('.survey-tabs > .active').next('li').find('a').trigger('click');document.getElementById(\"btnNextTwo\").style.display = \"inline-block\";document.getElementById(\"submitConditions\").style.display = \"inline-block\";});</script>";
	            	echo '</div>';
	            }
	            else if($j + 3 == sizeof($survey)) {
					echo '<a id="'.$survey[$j][0].'Last" class="btn belo-btn-inverse">Previous</a>';
					echo '<a id="'.$survey[$j][0].'Next" class="btn belo-btn">Next Question</a>';           
	            	echo "<script>$('#".$survey[$j][0]."Next').click(function(){ var x = document.forms[\"form\"][\"".$survey[$j][0]."\"].value;if(x == ''){ $('#error".$survey[$j][0]."').text('Please select an answer');return false; }else{ $('.survey-tabs > .active').next('li').find('a').trigger('click');}});$('#".$survey[$j][0]."Last').click(function(){ $('.survey-tabs > .active').prev('li').find('a').trigger('click'); });</script>";
	            	echo '</div>';
	            }
	            else if($j + 4 == sizeof($survey)) {
					echo '<a id="'.$survey[$j][0].'Last" class="btn belo-btn-inverse">Previous</a>';    
					echo '<a id="'.$survey[$j][0].'Next" class="btn belo-btn">Next Question</a>';       
	            	echo "<script>$('#".$survey[$j][0]."Next').click(function(){ if(document.forms[\"form\"][\"".$survey[$j][0]."\"].value == \"Yes\"){ $('.survey-tabs > .active').next('li').find('a').trigger('click'); }else if(document.forms[\"form\"][\"".$survey[$j][0]."\"].value == \"No\"){ $('#surveyTabs a[href=\"#notes\"]').tab('show');}else{ $('#error".$survey[$j][0]."').text('Please select an answer');return false; }});$('#".$survey[$j][0]."Last').click(function(){ $('.survey-tabs > .active').prev('li').find('a').trigger('click'); });</script>";
	            	echo '</div>';
	            }
	            else if($j == 0) {
	            	echo '<a id="'.$survey[$j][0].'Next" class="btn belo-btn">Next Question</a>';
	            	if($survey[$j][0] == "location" || $survey[$j][0] == "generalCon" || $survey[$j][0] ==  "habits" || $survey[$j][0] == "symptoms") {
	            		echo "<script>$('#".$survey[$j][0]."Next').click(function(){ if(";
						for ($i = 2; $i < sizeof($survey[$j]); $i++) {
							if ($i + 1 == sizeof($survey[$j])) {
								echo "document.getElementById(\"".$survey[$j][$i]."\").checked)";
							}
							else {
								echo "document.getElementById(\"".$survey[$j][$i]."\").checked || ";
							}
						}
						echo '{ $(\'.survey-tabs > .active\').next(\'li\').find(\'a\').trigger(\'click\');$(\'html, body\').animate({ scrollTop: 0 }, \'slow\'); }else{ $(\'#error'.$survey[$j][0].'\').text(\'Please select an answer\');return false;}});</script>';
	            	}
	            	else {
	            		echo '<script>$(\'#'.$survey[$j][0].'Next\').click(function(){ if(document.forms["form"]["'.$survey[$j][0].'"].value == "" || document.forms["form"]["'.$survey[$j][0].'"].value == null) {$(\'#error'.$survey[$j][0].'\').text(\'Please select an answer\');return false;}else{ $(\'.survey-tabs > .active\').next(\'li\').find(\'a\').trigger(\'click\'); }});</script>';
	            	}
	            	echo '</div>';
	            }
	            else {
					echo '<a id="'.$survey[$j][0].'Last" class="btn belo-btn-inverse">Previous</a>';
					echo '<a id="'.$survey[$j][0].'Next" class="btn belo-btn">Next Question</a>';
					if($survey[$j][0] == "location" || $survey[$j][0] == "generalCon" || $survey[$j][0] ==  "habits" || $survey[$j][0] == "symptoms") {
						echo "<script>$('#".$survey[$j][0]."Next').click(function(){ if(";
						for ($i = 2; $i < sizeof($survey[$j]); $i++) {
							if ($i + 1 == sizeof($survey[$j])) {
								echo "document.getElementById(\"".$survey[$j][$i]."\").checked)";
							}
							else {
								echo "document.getElementById(\"".$survey[$j][$i]."\").checked || ";
							}
						}
						echo '{ $(\'.survey-tabs > .active\').next(\'li\').find(\'a\').trigger(\'click\');$(\'html, body\').animate({ scrollTop: 0 }, \'slow\'); }else{ $(\'#error'.$survey[$j][0].'\').text(\'Please select an answer\');return false;}});$(\'#'.$survey[$j][0].'Last\').click(function(){ $(\'.survey-tabs > .active\').prev(\'li\').find(\'a\').trigger(\'click\');$(\'html, body\').animate({ scrollTop: 0 }, \'slow\'); });</script>';
					}
					else {            
	            		echo '<script>$(\'#'.$survey[$j][0].'Next\').click(function(){ if(document.forms["form"]["'.$survey[$j][0].'"].value == "" || document.forms["form"]["'.$survey[$j][0].'"].value == null) {$(\'#error'.$survey[$j][0].'\').text(\'Please select an answer\');return false;}else{ $(\'.survey-tabs > .active\').next(\'li\').find(\'a\').trigger(\'click\'); }});$(\'#'.$survey[$j][0].'Last\').click(function(){ $(\'.survey-tabs > .active\').prev(\'li\').find(\'a\').trigger(\'click\'); });</script>';
	            	}
	            	echo '</div>';
	            }
			}
	}


	public function printSurveyUL() {
		$condition = $this->condition;

		if($condition == "acne") {
			$this->printUL($this->acneSurvey);
		}
		else if($condition == "aging") {
			$this->printUL($this->agingSurvey);
		}
		else if($condition == "tone") {
			$this->printUL($this->toneSurvey);
		}
		else if($condition == "dry") {
			$this->printUL($this->drySurvey);
		}
		else if($condition == "irr") {
			$this->printUL($this->irrSurvey);
		}
		else {
			return false;
		}
	}

	public function printUL($survey) {
		echo '<div class="skin-survey">';
		echo '<ul role="tablist" class="survey-tabs" id="surveyTabs">';
		for ($i = 0; $i < sizeof($survey); $i++) {
			echo '<li role="presentation"><a href="#'.$survey[$i][0].'" role="tab" data-toggle="tab"></a></li>';
		}
		echo '</ul>';
	}

	public function getQuestions() {
		$condition = $this->condition;

		if($condition == "acne") {
			$this->saveQuestionNames($this->acneSurvey);
		}
		else if($condition == "aging") {
			$this->saveQuestionNames($this->agingSurvey);
		}
		else if($condition == "tone") {
			$this->saveQuestionNames($this->toneSurvey);
		}
		else if($condition == "dry") {
			$this->saveQuestionNames($this->drySurvey);
		}
		else if($condition == "irr") {
			$this->saveQuestionNames($this->irrSurvey);
		}
		else {
			return false;
		}
	}

	public function saveQuestionNames($survey) {
		$questions = array();
		for ($i = 0; $i < sizeof($survey); $i++) {
			array_push($questions, $survey[$i][0]);
		}
		$_SESSION["Questions"] = $questions;
	}


	private $condition = '';
	private $acneSurvey = array(
							array("oil", "What category best describes your skin?", "Oily", "Dry", "Combination", "Unsure"),
							array("sensitivity", "Rate your skin sensitivity out of five", "1 - Not at all", "2", "3", "4", "5 - Most"),
							array("sun", "How does your skin react in the sun?", "Never tan, always sunburn", "Sometimes tan, occasional sunburn", "Always tan, never sunburn"),
							array("location", "Where are your breakouts?", "Face", "Neck", "Chest", "Back"),
							array("generalCon", "Has your acne...", "Created scars", "Caused discoloration", "Been painful", "Been picked or squeezed", "Formed hard lumps", "None"),
							array("history", "Are you currently using any Acne products?", "Yes", "No"),
							array("medications", "Please list any of those medications"),
							array("notes", "Please enter any additional notes you believe we should know"),
							array("nextStep", "Our next step is a photo upload of your condition. If you're uncorfortable submitting a photo, you may skip this step. However, it is recommended for the best treatment that you complete it.")
						  );
	private $agingSurvey = array(
							array("oil", "What category best describes your skin?", "Oily", "Dry", "Combination", "Unsure"),
							array("sensitivity", "Rate your skin sensitivity out of five", "1 - Not at all", "2", "3", "4", "5 - Most"),
							array("sun", "How does your skin react in the sun?", "Never tan, always sunburn", "Sometimes tan, occasional sunburn", "Always tan, never sunburn"),
							array("generalCon", "What are you most concerned about in regards to aging?", "Wrinkles", "Scarring and age spots", "Discoloration", "Thin or fragile skin"),
							array("sunscreen", "How often do you use sunscreen?", "Everyday", "Whenever I'm in the sun", "Ocassionaly when I'm in the sun", "Never"),
							array("habits", "Do you do any of the following regularly?", "Spend a lot of time in the sun", "Use tanning beds", "Spend time in extreme weather conditions", "Commonly exposed to irritants", "None"),
						  	array("history", "Are you currently using any Anti-Aging products?", "Yes", "No"),
							array("medications", "Please list any of those medications"),
							array("notes", "Please enter any additional notes you believe we should know"),
							array("nextStep", "Our next step is a photo upload of your condition. If you're uncorfortable submitting a photo, you may skip this step. However, it is recommended for the best treatment that you complete it.")
						  );
	private $toneSurvey = array(
							array("oil", "What category best describes your skin?", "Oily", "Dry", "Combination", "Unsure"),
							array("sensitivity", "Rate your skin sensitivity out of five", "1 - Not at all", "2", "3", "4", "5 - Most"),
							array("sun", "How does your skin react in the sun?", "Never tan, always sunburn", "Sometimes tan, occasional sunburn", "Always tan, never sunburn"),
							array("location", "What areas of your skin are affected by discoloration?", "Head and Neck", "Torso", "Arms and Hands", "Other"),
							array("generalCon", "Is your discolored skin...", "Darker than normal", "Lighter than normal", "Mix of both"),
							array("history", "Are you currently using any cosmetic products on the affected areas?", "Yes", "No"),
							array("medications", "Please list any of those medications"),
							array("notes", "Please enter any additional notes you believe we should know"),
							array("nextStep", "Our next step is a photo upload of your condition. If you're uncorfortable submitting a photo, you may skip this step. However, it is recommended for the best treatment that you complete it.")
						  );
	private $drySurvey = array(
							array("oil", "What category best describes your skin?", "Oily", "Dry", "Combination", "Unsure"),
							array("sensitivity", "Rate your skin sensitivity out of five", "1 - Not at all", "2", "3", "4", "5 - Most"),
							array("sun", "How does your skin react in the sun?", "Never tan, always sunburn", "Sometimes tan, occasional sunburn", "Always tan, never sunburn"),
							array("location", "What areas of your skin are affected by dryness?", "Head and Neck", "Torso", "Arms and Hands", "Other"),
							array("symptoms", "Is your dry skin any of the following?", "Painful", "Itchy", "Irritated", "None"),
							array("history", "Are you currently using any cosmetic products on the affected areas?", "Yes", "No"),
							array("medications", "Please list any of those medications"),
							array("notes", "Please enter any additional notes you believe we should know"),
							array("nextStep", "Our next step is a photo upload of your condition. If you're uncorfortable submitting a photo, you may skip this step. However, it is recommended for the best treatment that you complete it.")
						  );
	private $irrSurvey = array(
							array("oil", "What category best describes your skin?", "Oily", "Dry", "Combination", "Unsure"),
							array("sensitivity", "Rate your skin sensitivity out of five", "1 - Not at all", "2", "3", "4", "5 - Most"),
							array("sun", "How does your skin react in the sun?", "Never tan, always sunburn", "Sometimes tan, occasional sunburn", "Always tan, never sunburn"),
							array("location", "What areas of your skin are affected by irritation?", "Head and Neck", "Torso", "Arms and Hands", "Other"),
							array("symptoms", "Is your irritated skin any of the following?", "Painful", "Dry", "Itchy", "None"),
							array("history", "Are you currently using any cosmetic products on the affected areas?", "Yes", "No"),
							array("medications", "Please list any of those medications"),
							array("notes", "Please enter any additional notes you believe we should know"),
							array("nextStep", "Our next step is a photo upload of your condition. If you're uncorfortable submitting a photo, you may skip this step. However, it is recommended for the best treatment that you complete it.")
						  );

}