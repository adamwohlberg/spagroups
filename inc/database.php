<?php 

require("config.php");
//this next line should be copied and pasted onto the page (e.g. index .php)
// require(ROOT_PATH . "inc/database.php");

try {
	$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" .  DB_NAME .";port=" . DB_PORT,DB_USER,DB_PASS);
	// var_dump($db);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$db->exec("SET NAMES 'utf8'");
	echo "Locked and loaded bitches!";
}	catch (Exception $e) {
	echo "Could not connect to the database. Shat!";
	exit;
}

try {
  	$results = $db->query("SELECT facebookId, firstName, lastName, email FROM users");
  	// echo "Our query was successful";
  } catch (Exception $e) {
  	echo "Data could not be retrived.";
  	exit;
  }
echo "<pre>";
var_dump($results->fetchAll(PDO::FETCH_ASSOC));
$products = $results->fetchAll(PDO::FETCH_ASSOC);


?>
