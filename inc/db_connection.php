<?php
  // define("DB_SERVER", "localhost");
  // define("DB_USER", "bcfe0905177bc7");
  // define("DB_PASS", "d4101cabd05fa72");
  // define("DB_NAME", "heroku_91162cf5ac94102");

// for the live version to spa db
  // define("DB_SERVER","localhost");
  // define("DB_USER","spagrou1_spagrou");
  // define("DB_PASS","P@55w0rd!");
  // define("DB_NAME","spagrou1_spagroups");
  // define("DB_PORT","3306"); // default: 3306, Randy uses 8889

  // 1. Create a database connection
  // $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // // Test if connection succeeded
  // if(mysqli_connect_errno()) {
  //   echo "all good";
  //   die(" Database connection failed: " . 
  //        mysqli_connect_error() . 
  //        " (" . mysqli_connect_errno() . ")"
  //   );
  // }

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$connection = mysqli_connect($server, $username, $password, $db);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    echo "all good";
    die(" Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }

?>
