<?php ob_start(); ?>
<?php include('inc/header.php'); ?>


<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("firstname", "lastname", "email", "username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

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
      redirect_to("login-thankyou.php");

    } else  {
      // Failure
      $_SESSION["message"] = "User creation failed.";
  }
  }
}

?>

<div class="formPage">
    <div id="dialogBoxSignup">
        <?php echo message(); ?>
        <?php echo form_errors($errors); ?>
      <img id="signupFacebook" src="images/signup_facebook.png" alt="Signup with Facebook" title="Signup with facebook" onclick="FBLogin();" />
      <h3 style="horizontal-align:center">OR</h3>
      <h3 style="color:grey;">Sign up with Email:<h3>
        <form action="signup.php" method="post">
          <p>First name:
            <input type="text" name="firstname" value="First name" 
          onblur="if (this.value == '') {this.value = 'First name';}"
           onfocus="if (this.value == 'First name') {this.value = '';}"/>
           <span>Please enter your first name</span>
         </p>
          <p>Last name:
            <input type="text" name="lastname" value="Last name" 
           onblur="if (this.value == '') {this.value = 'Last name';}"
           onfocus="if (this.value == 'Last name') {this.value = '';}"/>
           <span>Please enter your last name</span>
         </p>
         <p> Email address: 
            <input type="text" id="email" name="email" value="Email address"
              onblur="if (this.value == '') {this.value = 'Email address';}"
          onfocus="if (this.value == 'Email address') {this.value = '';}"/>
          <span>Please enter a valid email address</span>
          </p>
          <p>Username:
            <input type="text" name="username" value="Username" 
              onblur="if (this.value == '') {this.value = 'Username';}"
          onfocus="if (this.value == 'Username') {this.value = '';}"/>
          <span>Please create a username</span>
          </p>
          <p>Password:
            <input type="password" name="password" value="Password" 
              onblur="if (this.value == '') {this.value = 'Password';}"
          onfocus="if (this.value == 'Password') {this.value = '';}"/>
          <span>Please create a password</span>
          </p>
          <p class="submit">
            <input type="submit" name="submit" value="Sign up"/>
          </p>
          <input type="hidden" name="redirect" value="login-thankyou.php">
        </form>
    </div> 
</div>

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
      window.location.href = "actions.php";
      // window.location.href = "actions.php?action=fblogin";
    }
  }, {scope: 'email'});
}

</script>

<!-- treehouse email validation -->

    <script type="text/javascript" src="js/jquery-1.4.1-and-plugins.min.js"></script>
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

      function requiredFilledIn(){
        if(containsBlanks() || !isValidEmail($("#email").val())) 
          $submit.attr("disabled","disabled");
        else 
          $submit.removeAttr("disabled");
      }

      $("#dialogBoxSignup span").hide();
      $("input,textarea").focus(function(){
        $(this).next().fadeIn("slow");
      }).blur(function(){
        $(this).next().fadeOut("slow");
      }).keyup(function(){
        //Check all required fields.
        requiredFilledIn();
      });

      $("#email").keyup(function(){
        //Check for a valid email.
        if(isValidEmail($(this).val()))
         $(this).next().removeClass("error").addClass("valid");
        else 
         $(this).next().removeClass("valid").addClass("error");
      });

      requiredFilledIn();
    </script>

<!-- treehouse email validation -->

<?php include('inc/footer.php'); ?>