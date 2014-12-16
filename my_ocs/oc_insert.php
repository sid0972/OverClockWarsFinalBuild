<?php
session_start();

require_once('db_fns.php');

function add_superpi($superpi)
{
	$valid_user = $_SESSION['valid_user'];

  $conn = db_connect();
  if ($result && ($result->num_rows>0)) {
    throw new Exception('Score already exists.');
  }
  
   if (!$conn->query("insert into scores (username,superpi) values
     ('".$valid_user."', '".$superpi."')")) {
    throw new Exception('Score could not be inserted.');
  }
	else { echo "successful";}
  return true;
}
