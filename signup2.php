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

<style>
  #form span.valid {
    background-color :#c0ce51;
    color: #faf3bc;
  }
  #form span.error {
    background-color:#b0240f;
    color: #faf3bc;
  }


</style>
<!-- div for sign jquery modal dialog omg -->
<div id="dialog-modal2" title="Sign Up">
        <div class="form" class="submit">
<!--             <div id="dialogBoxSignup"> -->
              <img id="signupFacebook" src="images/signup_facebook.png" alt="Signup with Facebook" title="Signup with facebook" onclick="FBLogin();" />
              <h3 style="horizontal-align:center;color:grey;">OR</h3>
              <h3 style="color:grey; font-size:.8em;">Sign up with Email:<h3>
                  <form action="" method="post">
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
<!--                  <p class="email"> Email address: 
                    <input type="text" id="email" name="email" value="Email address"
                      onblur="if (this.value == '') {this.value = 'Email address';}"
                  onfocus="if (this.value == 'Email address') {this.value = '';}"/>
                  <span>Please enter a valid email address</span>
                  </p> -->

<!--         testing code -->
        <p>
          <label for="email">Email:</label>
          <input name="email" id="email" type="text" class="required"> 
          <span>Please enter a valid email address</span>
        </p>
<!--         testing code -->

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
                  <p class="submitbutton">
                    <input type="submit" name="submit" value="Sign up"/>
                  </p>
<!--                   <input type="hidden" name="redirect" value="login-thankyou.php"> -->
                    <p style="text-align:center;">Already a member? <a id="loginlink">Log In</a></p>
                </form>
<!--             </div>  -->
        </div> 
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
    //keep dialog box open rather than redirect so as to view errors
    ?>
    <script>
    $(document).ready(function() {
    $('#dialog-modal2').dialog('open');
    });
    </script>
    <?php  
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
    <div style="color:red; font-size: 1em; "><?php echo message(); ?></div>
    <br/>
    <div style="color:red; font-size:.8em; float:left;"><?php echo form_errors($errors); ?></div>
    <?php 
    }
  }
    ?>

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

      function requiredFilledIn(){
        if(containsBlanks() || !isValidEmail($("#email").val())) 
          $submit.attr("disabled","disabled");
        else 
          $submit.removeAttr("disabled");
      }

      $("#form span").hide();
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
<!-- treehouse email validation SIGNUP-->
</div>

<?php include('inc/footer.php'); ?>