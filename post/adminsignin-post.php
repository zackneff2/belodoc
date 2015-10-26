<?php

require '../lib/site.inc.php';

session_start();

$user = new Users($_POST);

$user->AdminLogin();

if ($_SESSION["loggedIn"] == 1) {
    if ($_SESSION["admin"] == true) {
        header("Location: ../admin");
    }
    else {
        header("Location: ../members");
    }
}

/*
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

if (isset($_POST['password'])) {
    if (sha1($_POST['password']) == $password && $username == "zack@zackneff.com") {
        $_SESSION['loggedIn'] = true;
        $_SESSION['auth'] = 1;
        $_SESSION['email'] = "zack@zackneff.com";
    } 
    else if (sha1($_POST['password']) == $password1 && $username == "joshgott@umich.edu") {
        $_SESSION['loggedIn'] = true;
        $_SESSION['auth'] = 1;
    }
    else if (sha1($_POST['password']) == $password2 && $username == "admin@belodoc.com") {
        $_SESSION['loggedIn'] = true;
        $_SESSION['auth'] = 1;
    }
    else {
        die ('Incorrect password');
    }
}

*/
?>