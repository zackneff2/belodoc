<?php 

require '../lib/site.inc.php';

session_start();

$user = new Users($_POST);

$user->LogUserIn();

$consultations = new Consultations();

$consultations->SetSession();

$profile = new Profiles();

$profile->getProfile();

if ($_SESSION["redirect"] == 1) {
	header('Location: ../members');
	exit;
}
else if ($_SESSION["Password-errors"] != "" or $_SESSION["Username-errors"] != "") {
	$_SESSION["login-error"] = 1;
	header('Location:../signin');
	exit;
}
header('Location:../signin');
?>
