<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 8/24/2015
 * Time: 12:06 AM
 */

class Format
{
    public static function footer()
    {
    return <<<HTML
    <div id="footer">
      <div class="container">
        <div class="row">
        <div class="foot-company">
          <div class="footer-company">
          <h4>Company</h4>
          <ul class="ul-company">
            <li><a href="/mission">Our Mission</a></li>
            <li><a href="/medical">Medical Leadership</a></li>
            <li><a href="/terms">Terms of Use</a></li>
            <li><a href="/terms#privacy">Privacy Policy</a></li>
            <li><a href="/terms/trial.php">Free Trial Terms and Conditions</a></li>
          </ul>
          </div>
        </div>
        <div class="foot-learn">
          <div class="footer-learn">
          <h4>Learn More</h4>
          <ul class="ul-learn">
            <!--<li>Blog</li>-->
            <li><a href="/faq">FAQ</a></li>
            <li><a href="/#contact">Contact Us</a></li>
            <li><a href="/#solution">Our Solution</a></li>
            <!--<li>Press</li>-->
            <li><a href="/press">Media Inquiries</a></li>
          </ul>
          </div>
        </div>
        <div class="foot-providers">
          <div class="footer-providers">
          <h4>Providers</h4>
          <ul class="ul-providers">
            <li><a href="/medical">Our Dermatologists</a></li>
            <!--<li>For our doctors</li>-->
            <!--<li>Learn more</li>-->
          </ul>
          </div>
        </div>
        <div class="foot-mission">
          <div class="footer-mission">
          <h4>Mission Statement</h4>
          <p>Our mission is to provide you the highest quality skin care treatment at your own convenience.</p>
          <p class="footer">BELODOC LLC &copy; 2015</p>
            <ul class="social-footer">
              <li class="footer-twitter"><a href="https://twitter.com/BeloDoc" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li class="footer-facebook"><a href="https://www.facebook.com/belodoc" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li class="footer-yelp"><a href="http://www.yelp.com/biz/belodoc-bloomfield-hills" target="_blank"><i class="fa fa-yelp"></i></a></li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </div>
HTML;
}

public static function navBar($logedIn) {
    echo <<<HTML
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img class="logohome" src="/images/logo1.png" alt="Belodoc logo"/></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav nav-pills pull-right">
HTML;
    if($logedIn) {
      if ($_SESSION["ActivePage"] != "/members/index.php"){ echo '<li><a href="/members">My Dashboard</a></li>'; }
      if ($_SESSION["ActivePage"] != "/index.php"){ echo '<li><a href="/">Home</a></li>'; }
      if ($_SESSION["ActivePage"] != "/faq/index.php"){ echo '<li><a href="/faq">FAQ</a></li>'; }
        echo '<li><a ';
          if ($_SESSION["ActivePage"] == "/index.php") {
            echo 'data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }"';
          }
          echo 'href="/#contact">Contact Us</a></li>';
          echo '<li class="button"><a href="/pro/logout.php"><button type="button" class="top btn btn-default navbar-btn">Sign Out</button></a></li>';
          echo '</ul>';
        echo '</div>';
      echo '</div>';
    echo '</nav>';
    }
    else {
      if ($_SESSION["ActivePage"] != "/index.php"){ echo '<li><a href="/">Home</a></li>'; }
      if ($_SESSION["ActivePage"] != "/faq/index.php"){ echo '<li><a href="/faq">FAQ</a></li>'; }
      echo '<li class="hidden1"><a ';
        if ($_SESSION["ActivePage"] == "/index.php") {
          echo 'data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }"';
        }
        echo 'href="/#treat">What We Treat</a></li>';
        echo '<li><a ';
          if ($_SESSION["ActivePage"] == "/index.php") {
            echo 'data-scroll="" data-options="{ &quot;easing&quot;: &quot;easeOutCubic&quot; }"';
          }
          echo 'href="/#contact">Contact Us</a></li>';
          if ($_SESSION["ActivePage"] != "/signup/index.php") { echo '<li><a href="/get/signup-get.php?plan=per">Sign Up</a></li>'; }
          echo '<li class="button"><a href="/signin"><button type="button" class="top btn btn-default navbar-btn">Sign in</button></a></li>';
          echo '</ul>';
        echo '</div>';
      echo '</div>';
    echo '</nav>';
    }
  }
}
?>