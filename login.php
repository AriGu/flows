<?php
    require 'config/config.php';
    require 'includes/form_handlers/login_handler.php';
 
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Praxis Training Portal</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/login_styles.css">
  </head>
  <body>
        <div class="login_box">
          <span><img src="assets/img/Logo_Praxis_The_Template-Free_EMR_Big.png" class="log_logo"></span>
          <form action="login.php" method="POST">
            <span class="email-error"><?php  if(in_array($errorWrongEmail, $log_errors)){echo $errorWrongEmail;}?></span>
              <br>   
              <input type="email" name="log_email" placeholder="Email" class="form-control">
              <br>
              <input type="password" name="log_password" placeholder="Password" class="form-control">
              <br>        
              <input type="submit" name="login_button" value="Login" class="btn btn-lg btn-primary" >         
          </form>
        </div>
      </body>
</html>