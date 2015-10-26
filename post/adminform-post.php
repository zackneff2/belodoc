<?php

require '../lib/site.inc.php';

session_start();

$profile = new Profile($_POST);

$save = new Profiles();

$products = new Products();

$products->getID($_POST);

$save->saveProfile($profile);

$profile->sendResponse();

$_SESSION["Message"] = "Thanks, your response has been sent to the patient.";

if ($_SESSION["redirect"] == 1) {
	header("Location: ../thanks.php");
}


?>