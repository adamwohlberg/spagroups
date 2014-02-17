<?php session_start(); ?>
<?php ob_start(); ?>
<?php 
if (isset($_SESSION['redirect_page'])) {
header( "refresh:5;url=".$_SESSION['redirect_page']); 
} else {
header( "refresh:5;url=index.php"); 
}
?>
<?php include("inc/db_connection.php"); ?>
<?php require_once("inc/session.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/validation_functions.php"); ?>

<html lang="en">
<head>

<!-- Google Analytics Tracking Code -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-47677665-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- Google Analytics Tracking Code -->

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="All Inclusive Spa Resort Discounts, Miraval Discounts, Rancho La Puerta Discounts, Miraval Spa Discounts, Spa Connection, Oaks at Oaks, Destination Spa Groups " />

<script type="text/javascript" src="js/jquery-1.4.1-and-plugins.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

<link rel="stylesheet" type="text/css" href="media/css/searchtable.css" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/custom-nivo-slider.css" type="text/css" media="screen" />

<script type="text/javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/dataTableOptions.js"></script>
<script type="text/javascript" src="js/changeRowColor.js"></script>

<!-- Facebook Conversion Code for FB SpaGroups Optins v1 -->

<script type="text/javascript">

var fb_param = {};

fb_param.pixel_id = '6015283873835';

fb_param.value = '0.01';

fb_param.currency = 'USD';

(function(){

var fpw = document.createElement('script');

fpw.async = true;

fpw.src = '//connect.facebook.net/en_US/fp.js';

var ref = document.getElementsByTagName('script')[0];

ref.parentNode.insertBefore(fpw, ref);

})();

</script>

<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6015283873835&amp;value=0.01&amp;currency=USD" /></noscript>

<!-- Facebook Conversion Code for FB SpaGroups Optins v1 -->

</head>
<body>

<!-- Google Code for SpaGroups 2014 Login Thank You Page Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 992516929;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "3TCaCL-uuwcQwbai2QM";
var google_conversion_value = 0;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/992516929/?value=0&amp;label=3TCaCL-uuwcQwbai2QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- Google Code for SpaGroups 2014 Login Thank You Page Conversion Page -->


<div id="container">
  <div id="mainContent">
    <div id="header">
      <div style="float:left; position:relative; padding:10px 0 0 15px; font-style:oblique; font-family:Georgia, 'Times New Roman', Times, serif; color:#999; font-size:14px; font-weight:lighter">
        <a href="splash.php" ><image id="favicon" src="images/favicon.jpg"></a>
        <div class="spagroupsLogo"><a href="index.php" style="height:100%; width:100%; display:block"></a></div>
        <span id="tagline" style="margin:0 0 0 5px">Join a Group and Save Up to 50%</span> </div>
      <div style="float:left; position:relative; padding:15px 0 0 40px">
        <div class="btnStart"><a href="start.php" style="height:100%; width:100%; display:block"></a></div>
        <div class="btnFind"><a href="find.php" style="height:100%; width:100%; display:block"></a></div>

          <?php if(!isset($_SESSION["user_id"])) { ?><a href="signup.php" id="signup" >SIGN UP</a><?php }?>
          <?php if(!isset($_SESSION["user_id"])) { ?><a href="login.php" id="login" >LOG IN</a><?php }?>
          <?php if(isset($_SESSION["user_id"])) { ?><a href="logout.php" id="logout" onClick="FBLogout();">LOG OUT</a>
          <span style="color:white">
          <?php echo "Welcome " . htmlentities($_SESSION["username"]) . "!"; ?>
          </span>
            <?php }?>
  </div>
</div>
    <div id="body" style="margin:5px 0 0 0">
      <div style="margin:25px 0px 0 40px;" class="filler"></div>
    </div>

<h1 class="welcomeThankYou"> Welcome to SpaGroups! </h1>
<h2 style="text-align: center;"> The best place to obtain group discounts at luxury all-inclusive spas and resorts.</h2>
<h3 style="text-align: center; text-decoration:none;"><a href="index.php">If you are not automatically redirected, please click here to continue to website.</a></h3>




</div>
      </div>


<?php include('inc/footer.php'); ?>
