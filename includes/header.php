<?php
    require 'config/config.php';    
    require 'classes/User.php';   


    if(isset($_SESSION['name'])){
        $userLoggedIn = $_SESSION['name'];
    }else{
      header('Location:home.php');
    }
    
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Praxis Training Portal</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato|Poppins" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	  <script src="assets/js/bootstrap.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/header_styles.css">
    <link rel="stylesheet" href="assets/css/index_styles.css">
    <link rel="stylesheet" href="assets/css/session_styles.css">
    <link rel="stylesheet" href="assets/css/onsite_styles.css">
    <script></script>
  </head>
  <body>
      
        <nav class="navbar navbar-inverse navbar-fixed-top">
        
            
          <ul class="nav navbar-nav">
             <li><a href="index.php">Home</a></li>
             <li class="dropdown" id="dropdown1">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports</a>
                <ul class="dropdown-menu">
                  <li><a href="my_clinics.php">My Clinics</a></li>
                  <li><a href="my_onsites.php">My Onsites</a></li>     
                  <li><a href="my_sessions.php">Past Sessions</a></li>  
                  <li><a href="sessions_by_clinic.php">Sessions by Clinic</a></li>                       
                </ul>
              </li>
              <li class="dropdown" id="dropdown2">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Onsite</a>
                <ul class="dropdown-menu">
                  <li><a href="onsite.php">Schedule an Onsite</a></li>                  
                </ul>
              </li>
              <li class="dropdown" id="dropdown3">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Session</a>
                <ul class="dropdown-menu">
                  <li><a href="session_clinic.php">Submit Training Session</a></li>                  
                </ul>
              </li>            
            
          </ul>       
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $userLoggedIn; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="includes/handlers/logout.php">Account Settings</a></li>
                  <li><a href="includes/handlers/logout.php">Logout</a></li>
                  
                </ul>
              </li>  
              </ul> 
        </nav>
        <div class="clear"></div>
        