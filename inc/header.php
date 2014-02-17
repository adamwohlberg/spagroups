<?php 
// session_start(); 
?>
<!DOCTYPE html>
<?php ob_start(); ?>
<?php include("inc/db_connection.php"); ?>
<?php require_once("inc/session.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/validation_functions.php"); ?>


<!-- you can only have one html tag open -->
<!-- attempt to add facebook og  -->
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://opengraphprotocol.org/schema/"
      xmlns:fb="http://www.facebook.com/2008/fbml"> 
<!-- attempt to add facebook og  -->

<head>
<title> SpaGroups | <?php echo $pageTitle ?> </title>
<!-- this is for iphone -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--only work on group.php -->
<?php 
// if(basename(__file__)==="group.php" || basename(__file__)==="find.php"){ 
?>
<!-- facebook og sharing -->
<meta property="fb:app_id" content="200759190112200" />
<!-- i want to add explicitly share so it goes in the news feed how? -->
<!-- "fb:explicitly_shared=true" -->
<meta property="og:site_name" content="SpaGroups" />
<meta property="og:image" content="https://spagroups.com/<?php
if (isset($product["fbimage"])) {
  echo $product["fbimage"]; 
} else {
  echo 'images/spagroupslogo.jpg';
}

?>"/>
<meta property="og:type" content="website" />
<meta property="og:title" content="Going to the spa (want to join me?)"/>
<meta property="og:url" content="https://www.spagroups.com/<?php 
if (!isset($product["fbimage"])) { 
  echo 'find.php';
} else {
  echo 'group.php?id='.$_GET['id'];
}
 ;?>">
<meta property="og:description" content="SpaGroups connects you with other spa-goers for group discounts at the world's best all-inclusive spas and resorts ." />
<!-- facebook og sharing -->
<?php 
// } 
?> 

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="All Inclusive Spa Resort Discounts, Miraval Discounts, Rancho La Puerta Discounts, Miraval Spa Discounts, Spa Connection, Oaks at Oaks, Destination Spa Groups " />

<!-- two newer versions of jquery....choose only one of the three, ie one of new or the old -->
<!-- <script type="text/javascript" src="js/jquery-2.1.0.js"></script> -->
<script type="text/javascript" src="js/jquery-1.11.0.js"></script>

<!-- this is the old jquery file. if quicksand works with the new file then delete this -->
<!-- <script type="text/javascript" src="js/jquery-1.4.1-and-plugins.min.js"></script> -->

<!-- other jquery related files. careful there are two quicksand files with similar names jquery.quicksand and quicksand -->
<script type="text/javascript" src="js/jquery.quicksand.js"></script>
<script type="text/javascript" src="js/quicksand.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery-animate-css-rotate-scale.js"></script>
<script type="text/javascript" src="js/jquery-css-transform.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.js"></script>

<script type="text/javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/dataTableOptions.js"></script>
<script type="text/javascript" src="js/changeRowColor.js"></script>

<!--favicon refresh -->
<link rel="shortcut icon" href="https://www.spagroups.com/favicon.ico?v=2" />

<script type="text/javascript" src="js/nivoslider.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<!-- this seems ok -->
<link rel="stylesheet" href="css/custom-nivo-slider.css" type="text/css" media="screen" />

<!-- moore jquery -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<!-- -->

<!-- style sheets -->
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="media/css/searchtable.css" />

<!-- testing code -->
<script type="text/javascript">
// $("document").ready( function () {
//   alert("the page just loaded!");
// });
</script>

<!-- allows facebook sharing, facepile, and like via a button on the group.php detail page-->
<div id="fb-root"></div>
<script>
  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=200759190112200";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
  </script>
<!-- allows facebook sharing, facepile, and like via a button on the group.php detail page-->

</head>
<body>

<!-- Google Analytics Tracking Code in the body -->
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
<!-- Google Analytics Tracking Code in the body -->

<div id="container">
  <div id="mainContent">
    <div id="header">
      <div style="float:left; position:relative; padding:10px 0 0 15px; font-style:oblique; font-family:Georgia, 'Times New Roman', Times, serif; color:#999; font-size:14px; font-weight:lighter">
<!--         <a href="index.php" ><image id="favicon" src="images/favicon.jpg"></a> -->
        <div class="spagroupsLogo"><a href="index.php" style="height:100%; width:100%; display:block"></a></div>
        <span id="tagline" style="margin:0 0 0 5px">Join a Group and Save Up to 50%</span> </div>
      <div style="float:left; position:relative; padding:15px 0 0 40px">
        <div class="btnStart"><a href="start.php" style="height:100%; width:100%; display:block"></a></div>
        <div class="btnFind"><a href="find.php" style="height:100%; width:100%; display:block"></a></div>

          <?php if(!isset($_SESSION["user_id"])) { ?><a id="signup">SIGN UP</a><?php }?>
          <?php if(!isset($_SESSION["user_id"])) { ?><a id="login">LOG IN</a><?php }?>
          <?php if(isset($_SESSION["user_id"])) { ?><a href="logout.php" id="logout" onClick="FBLogout();">LOG OUT</a>
          <span style="color:white">
          <img id="userImage" src="<?php echo $_SESSION["image"]; ?>" />
          <div id="welcomeUsername" ><?php echo "Welcome " . htmlentities($_SESSION["username"]) . "!"; ?></div>

          </span>
          <?php }?>
      </div>
    </div>


<!-- open and close dialogs -->
<script>
$(document).ready(function() {  
$('#login').click(function(){ $('#dialog-modal').dialog('open'); });
$('#login').click(function(){ $('#dialog-modal2').dialog('close'); });
$('#signup').click(function(){ $('#dialog-modal').dialog('close'); });
$('#signup').click(function(){ $('#dialog-modal2').dialog('open'); });
$('#signuplink').click(function(){ $('#dialog-modal2').dialog('open'); });
$('#signuplink').click(function(){ $('#dialog-modal').dialog('close'); });
$('#loginlink').click(function(){ $('#dialog-modal').dialog('open'); });
$('#loginlink').click(function(){ $('#dialog-modal2').dialog('close'); });
// testing code
// $('.email span').addClass("error");
// $('#dialog-modal2 span').addClass("valid");
});
</script>
<!---jquery modal dialog for login and login and signup popup onclick-->
<script>
  $(function() {
    $( "#dialog-modal" ).dialog({
      height: 'auto',
      width: 440,
      autoOpen: false,
      resizable: false,
      modal: true
    });
  });
</script>
<script>
  $(function() {
    $( "#dialog-modal2" ).dialog({
      height: 'auto',
      width: 490,
      autoOpen: false,
      resizable: false,
      modal: true
    });
  });
</script>
<!---jquery modal dialog for login and signup popup onclick-->


<script type="text/javascript">
window.fbAsyncInit = function() {
  FB.init({
  appId      : '200759190112200', 
  channelUrl : '//WWW.SPAGROUPS.COM/channel.html', 
  status     : true, 
  cookie     : true, 
  xfbml      : true  
  });
};
(function(d){
  var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement('script'); js.id = id; js.async = true;
  js.src = "//connect.facebook.net/en_US/all.js";
  ref.parentNode.insertBefore(js, ref);
}(document));

function FBLogout(){
  FB.logout(function(response) {
    window.location.href = "index.php";
  });
}

function FBLogin(){
  FB.login(function(response){
    if(response.authResponse){
      window.location.href = "actions.php?redirect_page=<?php echo urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>";
    }
  }, {scope: 'email'});
}
</script>

<!--jquery modal dialog SIGNUP FORM -->
<div id="dialog-modal2" title="Sign Up">
        <div id="form-signup">

    <?php
    if (isset($_POST['submit'])) {
    // Process the form

    // validations
    $required_fields = array("firstname", "lastname", "email", "username", "password");
    validate_presences_signup($required_fields);

    $fields_with_max_lengths = array("username" => 30);
    validate_max_lengths_signup($fields_with_max_lengths);

    if (empty($errors_signup)) {

    // TESTING
    //check to see if user already exists and use is in signup form by mistake
        $username = $_POST["username"];
        $password = $_POST["password"];
        $found_user = attempt_login($username, $password);

        if ($found_user) {
          // Success
          // Mark user as logged in 
          // Make sure logged in to access members only pages
          //if user exists just log in and redirect or send message already a user
          $_SESSION["user_id"] = $found_user["id"];
          // this is to echo username in header
          $_SESSION["username"] = $found_user["username"];
          //direct them to the page they came from.... 
          redirect_to($_POST['redirect_page']);  
          // redirect_to("index.php");
          } else {
          // TESTING

    // If user does not exist, Perform Create
    $firstname = mysql_prep($_POST["firstname"]);
    $lastname = mysql_prep($_POST["lastname"]);
    $email = mysql_prep($_POST["email"]);
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);

    $query  = "INSERT INTO users (";
    $query .= " firstname, lastname, email, username, hashed_password, postdate";
    $query .= ") VALUES (";
    $query .= "  '{$firstname}', '{$lastname}', '{$email}', '{$username}', '{$hashed_password}', NOW()";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
    // Attempt Login
    $_SESSION["message"] = "New user created successfully - Welcome to SpaGroups!";
    // this should be = user id but not sure if it is set prior to posting to db
    $_SESSION["user_id"] = $username;
    $_SESSION["username"] = $username;
    $_SESSION["redirect_page"] = $_POST['redirect_page'];      
    redirect_to("login-thankyou.php");

    } else  {
    // Failure
    $_SESSION["message"] = "User creation failed.";
    //keep dialog box open rather than redirect so as to view errors
    ?>
    <script>
    $(document).ready(function() {
    $('#dialog-modal2').dialog('open');
    });
    </script>
    <?php  
    } 

}
    } else {
    // Errors exists ie it is not empty of errors
    $_SESSION["message"] = "User creation failed.";
    //keep dialog box open rather than redirect so as to view errors
    ?>
    <script>
      $(document).ready(function() {
      $('#dialog-modal2').dialog('open');
      });
    </script>
    <div style="color:red; font-size: 1em; margin: 10px 0px 0px 0px; "><?php echo message(); ?></div>

    <?php 
    }
  }
    ?>


              <img id="signupFacebook" src="images/signup_facebook.png" alt="Signup with Facebook" title="Signup with facebook" onclick="FBLogin();" />
              <h3 style="horizontal-align:center;color:grey;">OR</h3>
              <h3 style="color:grey; font-size:1em;">Sign up with Email:<h3>
                  
                  <form action="" method="post">
                  <p>First name:
                    <input type="text" name="firstname" class="required" value="First name" 
                  onblur="if (this.value == '') {this.value = 'First name';}"
                   onfocus="if (this.value == 'First name') {this.value = '';}"/>
                   <span>Please enter your first name</span>
                 </p>
                  <p>Last name:
                    <input type="text" name="lastname" class="required" value="Last name" 
                   onblur="if (this.value == '') {this.value = 'Last name';}"
                   onfocus="if (this.value == 'Last name') {this.value = '';}"/>
                   <span>Please enter your last name</span>
                 </p>
                 <p> Email address: 
                    <input type="text" id="email" name="email" class="required" value="Email address"
                      onblur="if (this.value == '') {this.value = 'Email address';}"
                  onfocus="if (this.value == 'Email address') {this.value = '';}"/>
                  <span>Please enter a valid email address</span>
                  </p>
                  <p>Username:
                    <input type="text" name="username" class="required" value="Username" 
                      onblur="if (this.value == '') {this.value = 'Username';}"
                  onfocus="if (this.value == 'Username') {this.value = '';}"/>
                  <span>Please create a username</span>
                  </p>
                  <p>Password:
                    <input type="password" name="password" class="required" value="Password" 
                      onblur="if (this.value == '') {this.value = 'Password';}"
                  onfocus="if (this.value == 'Password') {this.value = '';}"/>
                  <span>Please create a password</span>
                  </p>
                  <p class="submit" style="margin: 20px 0px 20px 0px;">
                    <input type="submit" name="submit" value="Sign up"/>
                  </p>
<!--                   redirect to the correct page -->
                  <input type="hidden" name="redirect_page" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
<!--                   redirect to the correct page -->
                    <p style="text-align:center;">Already a member? <a id="loginlink">Log In</a></p>
                </form>
        </div> 

<!-- treehouse email validation SIGNUP-->
              
<script type="text/javascript">
      var $submit = $(".submit input");
      var $required = $(".required");
      function containsBlanks(){
        var blanks = $required.map(function(){ return $(this).val() == "";});
        return $.inArray(true, blanks) != -1;
      }

      function isValidEmail(email){
        return email.indexOf("@") != -1;
      }

      function requiredCompleted(){
        if(!isValidEmail($("#email").val())) 
          $submit.attr("disabled","disabled");
        else 
          $submit.removeAttr("disabled");
      }      

      // function requiredCompleted(){
        // note this code is working but prevents submit so also prevents error reporting so we turned off 
        // if(containsBlanks() || !isValidEmail($("#email").val())) 
        //   $submit.attr("disabled","disabled");
        // else 
        //   $submit.removeAttr("disabled");
      // }

      $("#form-signup span").hide();
      $("input,textarea").focus(function(){
        $(this).next().fadeIn("slow");
      }).blur(function(){
        $(this).next().fadeOut("slow");
      }).keyup(function(){
        //Check all required fields.
        //Changed formula name
        requiredCompleted();
      });

      $("#email").keyup(function(){
        //Check for a valid email.
        if(isValidEmail($(this).val()))
         $(this).next().removeClass("error").addClass("valid");
        else 
         $(this).next().removeClass("valid").addClass("error");
      });

        requiredCompleted();
    </script>

    <div style="color:red; font-size:1em; margin: 10px 0px 0px 0px;"><?php echo form_errors_signup($errors_signup); ?></div>
<!-- treehouse email validation SIGNUP-->
</div>

<!-- LOGIN FORM -->
<div id="dialog-modal" title="Already a Member?">
  <div id="form-login">

<!-- clear the session message    -->  

    <?php
    // this creates a default value for username to avoid errors when blank
    $username = "username";

    if (isset($_POST['submitlogin'])) {
      // Process the form
      
      // validations
      $required_fields = array("username", "password");
      validate_presences_login($required_fields);
      
      if (empty($errors_login)) {
        // Attempt Login

        $username = $_POST["username"];
        $password = $_POST["password"];
        $found_user = attempt_login($username, $password);

        if ($found_user) {
          // Success
          // Mark user as logged in 
          // Make sure logged in to access members only pages
          $_SESSION["user_id"] = $found_user["id"];
          // this is to echo username in header
          $_SESSION["username"] = $found_user["username"];      
          redirect_to($_POST['redirect_page']);


        } else {
          // Failure
          $_SESSION["message"] = "Username/password not found.";
          // it should keep dialog box form open or reopen
          ?>
          <script>
          $(document).ready(function() {
          $('#dialog-modal').dialog('open');
          });
          </script>
          <?php
        }
      
    } else {
 // Errors exists ie it is not empty of errors
             $_SESSION["message"] = "Username/password not found.";   
    ?>
    <script>
      $(document).ready(function() {
      $('#dialog-modal').dialog('open');
      });
    </script>
    <div style="color:red; font-size: 1em; margin: 10px 0px 0px 0px; "><?php echo message(); ?></div>

    <?php 
    }
  }
    ?>


      <div style="color:red; font-size:.9em; margin: 10px 0px 0px 0px;"><?php echo message(); ?></div>
      <img id="loginFacebook" src="images/facebook-login.png" alt="Login with Facebook" title="Login with facebook" onclick="FBLogin();" />
      <h4 id="or">OR</h4>

      <form action="" method="post">
      <p>Username:
      <input type="text" name="username" class="required" value="<?php echo htmlentities($username); ?>" 
      onblur="if (this.value == '') {this.value = 'username';}"
      onfocus="if (this.value == 'username') {this.value = '';}"/>
<!--       <span>Please enter your username</span> -->
      </p>
      <p>Password:
      <input type="password" name="password" class="required" value="password"
                      onblur="if (this.value == '') {this.value = 'password';}"
                  onfocus="if (this.value == 'password') {this.value = '';}"/>
<!--       <span>Please enter your password</span> -->
      </p>
      <p class="submitlogin">
      <input type="submit" name="submitlogin" value="Submit" />
      </p>
<!--  redirect to the correct page -->
      <input type="hidden" name="redirect_page" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
<!--  redirect to the correct page -->
      <p style="text-align:center;">Don't have an account? <a style="text-decoration:underline;" id="signuplink">Sign Up</a></p>
      </form>

<!--****************** treehouse email validation LOGIN -->
<script type="text/javascript">
var $submitlogin = $(".submitlogin input");
var $requiredlogin = $(".required");
function containsBlanks(){
var blanks = $requiredlogin.map(function(){ return $(this).val() == "";});
return $.inArray(true, blanks) != -1;
}

function requiredFilledIn(){
  if(containsBlanks()) 
    $submitlogin.attr("disabled","disabled");
  else 
    $submitlogin.removeAttr("disabled");
}

$("#dialog-modal span").hide();
$("input,textarea").focus(function(){
$(this).next().fadeIn("slow");
}).blur(function(){
$(this).next().fadeOut("slow");
}).keyup(function(){
//Check all required fields.
requiredFilledIn();
});

requiredFilledIn();
</script>
<!--******************** treehouse email validation LOGIN-->

      <div style="color:red; margin: 20px 0px 0px 0px;"><?php echo form_errors_login($errors_login); ?></div>
  </div>
</div> 



