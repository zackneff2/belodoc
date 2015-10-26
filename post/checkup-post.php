<?php
require_once('../lib/cls/consultation.php');
require_once('../lib/cls/consultations.php');

session_start();

$consultation = new Consultation($_POST);

$consultation->SetBinaryData($_POST);

$consultation ->SendConsultation();

$consultation->UploadPhotoToServer();

$consultations = new Consultations();

$consultations->SaveCheckup($consultation);

$consultation->SetSession();

if ($_SESSION["redirect"] == 1) {
  $_SESSION["Message"] = "Your checkup information has been sent to your dermatologist. You will hear back within two business days.";
  header("Location: ../signup/thanks.php");
}
