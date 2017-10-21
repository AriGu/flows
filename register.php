<?php
 require 'config/config.php';
 require 'includes/form_handlers/register_handler.php';
?>
 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Praxis Training Portal</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/register_styles.css">
  </head>
  <body>
      <div class="container">
          <div class="reg_box">
   <div class="page-header text-center">
  <span><img src="assets/img/Logo_Praxis_The_Template-Free_EMR_Big.png" class="reg_logo"></span>
</div>  

    <form action="register.php" method="POST">
        <input type="text" name="reg_name" placeholder="Full Name" class="form-control" value="<?php 
        if(isset($_SESSION['reg_name'])){
            echo $_SESSION['reg_name'];
        } ?>">
        <br>
        <?php if(in_array($errorNameLength, $errors)){echo $errorNameLength;} ?>
        

        <input type="email" name="reg_email" placeholder="Email" class="form-control" value="<?php
        if(isset($_SESSION['reg_email'])){
            echo $_SESSION['reg_email'];
        } ?>">
        <br>
        <?php if(in_array($errorInvalidEmail, $errors)){echo $errorInvalidEmail;} 
        else if(in_array($errorEmailTaken, $errors)){echo $errorEmailTaken;} ?>
        

        <input type="password" name="reg_password" placeholder="Password" class="form-control">
        <br>
        <?php if(in_array($errorPwMismatch, $errors)){echo $errorPwMismatch;} 
        else if(in_array($errorPwReqs, $errors)){echo $errorPwReqs;} ?>
        

        <input type="password" name="reg_password2"placeholder="Confirm password" class="form-control">
        <br>
        <input type="submit" name="reg_button" value="Register" class=" btn btn-lg btn-primary">
        <br>
        <?php if(in_array($success, $errors)){echo $success;} ?>

        <a href="login.php" class="already-registered">Already Registered?</a>
        
    </form>



    </div>
    
</div>

  </body>
</html>