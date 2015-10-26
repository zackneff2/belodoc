<?php
class Consultations {

public function SaveCheckup($consultation) {
    $database = new Databases();

    $primary = $consultation->GetPrimary();
    $imageOne = $consultation->imageOne;
    $imageTwo = $consultation->imageTwo;
    $webcamOne = $consultation->webcamOne;
    $webcamTwo = $consultation->webcamTwo;
    $birthday = $consultation->birthday;
    $orderDate = date("Y-m-d");

    $query = "INSERT INTO survey (`primaryCondition`, `image1`, `image2`, `webcam1`, `webcam2`, `consultDate`, `birthday`) 
    VALUES ('$primary', '$imageOne', '$imageTwo', '$webcamOne', '$webcamTwo', '$orderDate', '$birthday')";

    if (!mysqli_query($database->conn, $query)) {
      echo "Error: " . $sql . "<br>" . mysqli_error($database->conn);
    }
    else {
        $_SESSION["redirect"] = 1;
    }

    $questions = $_SESSION["Questions"]; 
    foreach ($questions as $question) {
      $$question = $consultation->$question;
      $query = "UPDATE consultations SET ".$question."='".$$question."' WHERE email = '".$email."'";
      mysqli_query($database->conn, $query);
    }
    $database->closeConnection();
}

public function SaveConsultation($consultation) {
    $database = new Databases();

  	$name = mysqli_real_escape_string($database->conn, $consultation->GetName());
  	$notes = mysqli_real_escape_string($database->conn, $consultation->GetNotes());
 	$email = mysqli_real_escape_string($database->conn, $consultation->GetEmail());

    $primary = $consultation->GetPrimary();
    $imageOne = $consultation->imageOne;
    $imageTwo = $consultation->imageTwo;
    $webcamOne = $consultation->webcamOne;
    $webcamTwo = $consultation->webcamTwo;
    $birthday = $consultation->birthday;
    $orderDate = date("Y-m-d");
    $plan = $consultation->plan;

    $query = "INSERT INTO survey (email, primaryCondition, image1, image2, webcam1, webcam2, consultDate, birthday, plan)
    VALUES ('$email', '$primary', '$imageOne', '$imageTwo', '$webcamOne', '$webcamTwo', '$orderDate', '$birthday', '$plan')";

    if (!mysqli_query($database->conn, $query)) {
      $_SESSION["redirect"] = 0;
      echo "Error: " . $sql . "<br>" . mysqli_error($database->conn);
    }
    else {
        $_SESSION["redirect"] = 1;
    }

    $questions = $_SESSION["Questions"]; 
    foreach ($questions as $question) {
      $$question = $consultation->$question;
      $query = "UPDATE survey SET ".$question."='".$$question."' WHERE email = '".$email."'";
      mysqli_query($database->conn, $query);
    }

    $database->closeConnection();
} 

public function SetSession() {
    if (isset($_SESSION["username"])) {
        $database = new Databases();

        $username = $_SESSION["username"];

        $query = "SELECT * FROM survey WHERE email = '$username'";

        $result = mysqli_query($database->conn, $query);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $_SESSION["Condition"] = $row["primaryCondition"];
        $_SESSION["OrderDate"] = $row["consultDate"];
        $_SESSION["Plan"] = $row["plan"];

        $database->closeConnection();
    }  
}
}