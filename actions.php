<?php ob_start(); ?>
<?php 
include('inc/header.php');
require_once("inc/functions.php"); 
?>

<!-- /*
CREATE TABLE `fblogin` (
`id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`fb_id` INT( 20 ) NOT NULL ,
`firstname` VARCHAR( 300 ) NOT NULL ,
`lastname` VARCHAR( 300 ) NOT NULL ,
`email` VARCHAR( 300 ) NOT NULL ,
`image` VARCHAR( 600 ) NOT NULL,
`postdate` DATETIME NOT NULL
) ENGINE = InnoDB;
*/ -->

<?php 
  require_once('facebook.php'); 
  $facebook = new Facebook(array(
    'appId' => '200759190112200',
    'secret' => '4e10e594cc42a88384aaf3da55489e12',
    'cookie' => TRUE,
  ));
?>

<?php
	$fbuser = $facebook->getUser();
	if ($fbuser) {
		try {
			echo "we have a user ".'<br/>';
		    $user_profile = $facebook->api('/me');
		}
		catch (Exception $e) {
						echo "we don't have a user ".'<br/>'; 
			echo $e->getMessage();
			exit();
		}
  $user_fbid  = $fbuser;
  $user_email = $user_profile["email"];
  $user_fname = $user_profile["first_name"];
  $user_lname = $user_profile["last_name"];
  $user_gender = $user_profile["gender"];
  $user_image = "https://graph.facebook.com/".$user_fbid."/picture?type=large";
  $now = date('Y-m-d H:i:s');

// check if the user is already listed in the database
  $query_check_db = "SELECT * FROM fblogin WHERE fb_id = '$user_fbid'";
  $result_check_db = mysqli_query($connection, $query_check_db);
  $count_check_db = mysqli_num_rows($result_check_db);
  // finally the count of rows is here
  echo $count_check_db;
  if (!$result_check_db) {
    die("database query check failed");
  }
// if the user is already listed in the database, just log them in without re-adding a duplicate to the db
if($count_check_db > 0){
    // Attempt Login
    // $_SESSION["message"] = "New user created successfully - Welcome to SpaGroups!";
    // // this should be = user id but not sure if it is set prior to posting to db
      $_SESSION["user_id"] =  $user_fname;
      $_SESSION["username"] =   $user_fname;
    //added by Adam on 02.07.14 test adding image
      $_SESSION["image"] =   $user_image;
      redirect_to($_GET['redirect_page']);
      echo "There was at least one row with this fb user id in the table already";
  
  } else {

// if the user is NOT already list in the database add them

    $query  = "INSERT INTO fblogin (";
    $query .= " fb_id, firstname, lastname, email, image, gender, postdate";
    $query .= ") VALUES (";
    $query .= "  '{$user_fbid}', '$user_fname', '$user_lname', '$user_email', '$user_image', '$user_gender', '$now'";   
    $query .= ")";
    $result = mysqli_query($connection, $query);
    }
}

    if ($result) {
    // Attempt Login
    // $_SESSION["message"] = "New user created successfully - Welcome to SpaGroups!";
    // // this should be = user id but not sure if it is set prior to posting to db
      $_SESSION["user_id"] =  $user_fname;
      $_SESSION["username"] =   $user_fname; 
      $_SESSION["redirect_page"] = $_GET['redirect_page'];
      // added by Adam on 020714
      $_SESSION["image"] =   $user_image;
    // Need to set so Google Analytics can still record as conversion
      redirect_to('login-thankyou.php');
    } else  {
      // Failure
      $_SESSION["message"] = "User creation failed.";
      redirect_to("index.php");
  }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>facebook login</title>

<style>
body{
	font-family:Arial;
	color:#333;
	font-size:14px;
}
.mytable{
	margin:0 auto;
	width:600px;
	border:2px dashed #17A3F7;
}
a{
	color:#0C92BE;
	cursor:pointer;
}
</style>
</head>

<body>
<h1>Welcome to SpaGroups 2014!</h1>
<?php
// $row = mysqli_fetch_row($result_check_db);
// echo $row['count'];
?>
<?php 
// 3. from lynda...use the returned data from the check db for user already in db
while($row = mysqli_fetch_assoc($result_check_db)) {
  //output data from each row
  // var_dump($row);
  echo $row["id"] . "<br />";
  echo $row["fb_id"] . "<br />";
  echo $row["firstname"] . "<br />";
  echo $row["lastname"] . "<br />";
  echo $row["email"] . "<br />";
  echo "<hr />";
  }
?>
<?php 
//4. release returned data
mysqli_free_result($result_check_db);
?>
<table class="mytable">
<tr>
	<td colspan="2" align="left"><h2>Hi <?php echo $user_fname; ?>,</h2><a onClick="FBLogout();">Logout</a></td>

</tr>
<tr>
	<td><b>Fb id:<?php echo $user_fbid; ?></b></td><br>
    <td valign="top" rowspan="2"><img src="<?php echo $user_image; ?>" height="100"/></td>
</tr>
<tr>
	<td><b>Email:<?php echo $user_email; ?></b></td><br>
</tr>
<tr>
	<td><b>First Name:<?php echo $user_fname; ?></b></td><br>
</tr>
<tr>
	<td><b>Last Name:<?php echo $user_lname; ?></b></td><br>
</tr>
</table>
<?php 
//5. close db connection
mysqli_close($conection);
?>
<?php include('inc/footer.php'); ?>


