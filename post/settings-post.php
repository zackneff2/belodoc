<?php

require '../lib/site.inc.php';

session_start();

$setting = new Setting($_POST);

$settings = new Settings();

$settings->saveSettings($setting);

$user = new Users($_POST);

$user->LogUserIn();

if ($_SESSION["Redirect"] == 1) {
	$_SESSION["Message"] = "Your settings have been updated";
	header("Location: ../members");
}
else {
	$_SESSION["Message"] = "There was an error saving your settings. Please try again";
	header("Location: ../members");
}
?>