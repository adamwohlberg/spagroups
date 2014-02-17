<?php

try {
	$db = new PDO("mysql:host=localhost;dbname=facebook_test;port=3306","root","root");
	// var_dump($db);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$db->exec("SET NAMES 'utf8'");

}	catch (Exception $e) {
	echo "Awwww Shucks! Could not connect to the database";
	exit;
}
	$facebookId = ????????;
	$firstName = ????????;
	$lastName = ?????????;
	$email = ????????????;
	// echo "Woo-hoo! We're in!";
  try {
  	$results = $db->query("INSERT INTO users (facebookId, firstName, lastName, email) VALUES ($facebookId, $firstName, $lastName, $email)";
  	// echo "Our query was successful";
  } catch (Exception $e) {
  	echo "Data could not be retrieved.";
  	exit;
  }
// echo "<pre>";
// var_dump($results->fetchAll(PDO::FETCH_ASSOC));
$products = $results->fetchAll(PDO::FETCH_ASSOC);

?>
