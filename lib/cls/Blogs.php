<?php

require_once ('blog.php');
class Blogs {
	public function __construct() {

	}

	public function savePost($post) {
		$hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
    	$myusername = "zneff";   // the username specified when setting-up the database
    	$dbpassword = "Z483026074!";   // the password specified when setting-up the database
    	$database = "beloblog"; 

    	$conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

    	$title = $post->title;
    	$desc = $post->desc;
    	$authid = $post->auth;
    	$cont = $post->cont;
    	$img = $post->img;
    	$date = date("l, d M y");

    	$sql = "INSERT INTO posts (title, description, authid, cont, img, postdate)
    	VALUES ('$title', '$desc', '$authid', '$cont', '$img', '$date');";

    	if (!mysqli_query($conn, $sql)) {
      		return false;
    	}
    	mysqli_close($conn);
        return true;
	}

    public function getPosts() {
        $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
        $myusername = "zneff";   // the username specified when setting-up the database
        $dbpassword = "Z483026074!";   // the password specified when setting-up the database
        $database = "beloblog"; 

        $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

        $sql = "SELECT * FROM posts ORDER BY id DESC";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)) {
            if ($row['authid'] == 1) {
                $auth = "Zack Neff";
            }
            else if ($row['authid'] == 2) {
                $auth = "Josh Gottesman";
            }
            else if ($row['authid'] == 3) {
                $auth = "Max Shek";
            }
            echo '<div class="row title"><img class ="blog img-responsive" src="'.$row['img'].'"/></div><div class="row post"><div class="row title"><a class="h2 blog" href="post/?id='.$row['id'].'" >'.$row['title'].'</a></div><div class="row blogdescription"><h3>'.$row['description'].'</h3></div><div class="row author"><p>Posted by: '.$auth.'</p></div></div>';
        }
    }

    public function getPost($id) {
        $hostname = "mysql.belodoc.com";   // eg. mysql.yourdomain.com (unique)
        $myusername = "zneff";   // the username specified when setting-up the database
        $dbpassword = "Z483026074!";   // the password specified when setting-up the database
        $database = "beloblog"; 

        $conn = mysqli_connect($hostname, $myusername, $dbpassword, $database);

        $sql = "SELECT * FROM posts where id = '$id'";

        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($result);

            if ($row['authid'] == 1) {
                $auth = "Zack Neff";
            }
            else if ($row['authid'] == 2) {
                $auth = "Josh Gottesman";
            }
            else if ($row['authid'] == 3) {
                $auth = "Max Shek";
            }

            echo '<div class="row post"><div class="row title"><img class ="blog" src="'.$row['img'].'"/></div>';
            echo '<div class="row post"><div class="row title"><h2>'.$row['title'].'</h2></div>';
            echo '<div class="row author"><p>Posted by: '.$auth.'</p></div>';
            echo '<div class="row blogcontent"><p>'.$row['cont'].'</p></div></div>';

    }

	
}
?>