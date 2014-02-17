<?php

$errors_login = array();
$errors_signup = array();

function fieldname_as_text($fieldname) {
  $fieldname = str_replace("_", " ", $fieldname);
  $fieldname = ucfirst($fieldname);
  return $fieldname;
}

// * presence
// use trim() so empty spaces don't count
// use === to avoid false positives
// empty() would consider "0" to be empty
function has_presence($value) {
	return isset($value) && $value !== "";
}

function validate_presences_login($required_fields) {
  global $errors_login;
  foreach($required_fields as $field) {
    $value = trim($_POST[$field]);
  	if (!has_presence($value)) {
  		$errors_login[$field] = fieldname_as_text($field) . " can't be blank";
  	}
  }
}

function validate_presences_signup($required_fields) {
  global $errors_signup;
  foreach($required_fields as $field) {
    $value = trim($_POST[$field]);
  	if (!has_presence($value)) {
  		$errors_signup[$field] = fieldname_as_text($field) . " can't be blank";
  	}
  }
}
// * string length
// max length
function has_max_length($value, $max) {
	return strlen($value) <= $max;
}

function validate_max_lengths_login($fields_with_max_lengths) {
	global $errors_login;
	// Expects an assoc. array
	foreach($fields_with_max_lengths as $field => $max) {
		$value = trim($_POST[$field]);
	  if (!has_max_length($value, $max)) {
	    $errors_login[$field] = fieldname_as_text($field) . " is too long";
	  }
	}
}

function validate_max_lengths_signup($fields_with_max_lengths) {
	global $errors_signup;
	// Expects an assoc. array
	foreach($fields_with_max_lengths as $field => $max) {
		$value = trim($_POST[$field]);
	  if (!has_max_length($value, $max)) {
	    $errors_signup[$field] = fieldname_as_text($field) . " is too long";
	  }
	}
}

// * inclusion in a set
function has_inclusion_in($value, $set) {
	return in_array($value, $set);
}

?>