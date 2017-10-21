<?php

$name = "";
$email = "";
$password = "";
$password2 = "";
$date = "";
$errors = [];

$errorUsernameTaken = "Someone already has this username, try another one<br>";
$errorInvalidEmail = "Invalid email format<br>";
$errorEmailTaken = "Email already in use<br>";
$errorNameLength = "Name must be between 2 and 50 characters<br>";
$errorPwMismatch = "Passwords don't match<br>";
$errorPwReqs = "Password must contain at least, 8 characters with 1 capital letter, 1 lowercase letter, 1 number, 1 special character<br>";
$success = "<span style='color:green;'>Success! Go ahead and log in.</span><br>";

if(isset($_POST['reg_button'])){
    $name = strip_tags($_POST['reg_name']);
    $name = trim($_POST['reg_name']);  
    $_SESSION['reg_name'] = $name;    

    $email = strip_tags($_POST['reg_email']);
    $email = str_replace(' ', '', $email);
    $_SESSION['reg_email'] = $email;

    $password = ($_POST['reg_password']);
    $_SESSION['reg_password'] = $password;

    $password2 = ($_POST['reg_password2']);
    $_SESSION['reg_password2'] = $password2;

    $timestamp = date("Y-m-d H:i:s");

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_check = mysqli_query($conn, "SELECT email from users WHERE email = '$email'");       
        if(mysqli_num_rows($email_check) > 0)
        {
            array_push($errors, $errorEmailTaken);
        }

        }else{
            array_push($errors, $errorInvalidEmail);
        }

        if(strlen($name) > 50 || strlen($name) < 2)
        {
            array_push($errors, $errorNameLength);
        }

        if($password != $password2)
        {
            array_push($errors, $errorPwMismatch);
        }
        else if(strlen($password) < 8 || strlen($password) > 50 || !preg_match("#[0-9]+#", $password) || !preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $password))
        {            
            array_push($errors, $errorPwReqs);
        }

        if(empty($errors))
        {
            $password = md5($password);

            $query = mysqli_query($conn, "INSERT INTO users 
            (id, name, email, password, user_role, created_at, updated_at, status) 
            VALUES('NULL', '$name', '$email', '$password', '', '$timestamp', '$timestamp', '')");

            array_push($errors, $success);

            $_SESSION['reg_name'] = "";
            $_SESSION['reg_email'] = "";

            header("Location: login.php");
            exit();
        }

}

 ?>
