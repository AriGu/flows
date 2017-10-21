<?php

$trainer = "";
$clinic = "";
$start_date = "";
$end_date = "";
$note = "";
$errors = [];

$noStartDate = "Start date is required";
$noEndDate = "End date is required";


if(isset($_POST['onsite_submit'])){
    
    if(empty($_POST['onsite_start_date'])){
        array_push($errors, $noStartDate);
    }
      if(empty($_POST['onsite_end_date'])){
        array_push($errors, $noEndDate);
    }else
    
    {

    $trainer = $userLoggedIn;

    $clinic = $_POST['onsite_clinic'];

    $start_date = $_POST['onsite_start_date'];

    $end_date = $_POST['onsite_end_date'];

    $note = strip_tags($_POST['onsite_note']); 

        

        
            $query = mysqli_query($conn, "INSERT INTO onsite 
            (clinic, trainer, start_date, end_date, note) 
            VALUES('$clinic', '$trainer', '$start_date', '$end_date', '$note')");

            

        

    }
}








?>
