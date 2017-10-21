<?php
  ob_start();
  session_start();
  $timezone = date_default_timezone_set('America/Los_Angeles');
   $conn = mysqli_connect('localhost', 'root', '', 'prxtrain');
   $get_org_query = mysqli_query($conn, "SELECT id,name FROM orgs WHERE id > 0");

  if(mysqli_connect_errno())
  {
    echo 'Failed to connect: '. mysqli_connect_errno();
  }  

?>
