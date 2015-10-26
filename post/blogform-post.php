<?php

require_once('../lib/cls/blog.php');
require_once('../lib/cls/blogs.php');

session_start();

$blog = new Blog($_POST);

$save = new Blogs();

$blog->getAuthor();

$blog->uploadPhoto($_POST);

$saved = $save->savePost($blog);

$upload = $_SESSION["upload"];

if($saved && $upload) {
	$_SESSION["Message"] = "Your blog post has been submitted. Thank you.";
}
else if ($saved) {
	$_SESSION["Message"] = "Your blog post has been submitted, but there was an error uploading the image file. Please email it to zack@zackneff.com.";
}
else {
	$_SESSION["Message"] = "There was an error uploading your blog post. Please contact the administrator then try again.";
}

header("Location: ../thanks.php");



?>