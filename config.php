<?php
  function connect(){
    $dbhost = "localhost";
    $dbuser = "RuntimeTerrors";
    $dbpass = "terroR#321";
    $dbname = "runtimeterrors_golf";

    if ($con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
      return $con;
    }else{
      die("Could not connect to database");
    }

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
  }

?>