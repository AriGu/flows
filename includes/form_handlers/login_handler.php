<?php

$log_errors = [];

$errorWrongEmail = "Email or password was incorrect";

if(isset($_POST['login_button'])){
    
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);

    $_SESSION['log_email'] = $email;

    $password = md5($_POST['log_password']);    


    $check_database_query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    $check_login_query = mysqli_num_rows($check_database_query);

    if($check_login_query == 1){
        $row = mysqli_fetch_array($check_database_query);
        $name = $row['name'];
        $_SESSION['name'] = $name; 
        
        header("Location: index.php");
        exit();
    }
    else{
        array_push($log_errors, $errorWrongEmail);
    }
    
}
?>