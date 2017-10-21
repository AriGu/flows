<?php


$trainer = "";
$date = "";
$duration = "";
$note = "";
$status = "";
$errors = [];



//ERRORS
$notEnoughHours = "Insufficient available time for this session. Please refer to admin.";
$noDate = "Date is required";
$noDuration = "Duration is required";
$noNote = "Session note is required";

// SELECT CLINIC
if(isset($_POST['clinic_submit'])){     

        $clinic = $_POST['session_clinic'];   
                  
        $_SESSION['session_clinic'] = $clinic;

        $clinic_query = mysqli_query($conn, "SELECT * FROM orgs WHERE name = '$clinic'");  
        $clinic_row = mysqli_fetch_array($clinic_query);
        $clinic_hours = $clinic_row['hours']; 

        $_SESSION['clinic_hours'] = $clinic_hours;       
        
        $clinic = $_SESSION['session_clinic'];

        header('Location:session.php');
      } 
    
// SUBMIT SESSION
if(isset($_POST['session_submit'])){
    
    if(empty($_POST['session_date'])){
        array_push($errors, $noDate);
    }
    if(empty($_POST['session_duration'])){
        array_push($errors, $noDuration);
    }
    if(empty($_POST['session_note'])){
        array_push($errors, $noNote);
    }else
    
    {
        $selectedClinic = $_POST['selected_clinic'];
        $_SESSION['selected_clinic'] = $selectedClinic;

        $trainer = $userLoggedIn;    
        $_SESSION['trainer'] = $trainer;

        $date = $_POST['session_date'];
        $_SESSION['session_date'] = $date;

        $duration = strip_tags($_POST['session_duration']);
        $duration = str_replace(' ', '', $duration);
        $_SESSION['session_duration'] = $duration;      

        $note = strip_tags($_POST['session_note']);
        $_SESSION['session_note'] = $note;

        $status = $_POST['status'];
        $_SESSION['status'] = $status;

    
             if($_SESSION['clinic_hours'] < $duration){
                array_push($errors, $notEnoughHours);
            }
            else if(empty($errors) && $status == "Billable"){
                $newClinicHours = $_SESSION['clinic_hours'] - $duration;
                $updateHoursQuery = mysqli_query($conn, "UPDATE orgs SET hours = '$newClinicHours' WHERE name = '$selectedClinic'");
                $query = mysqli_query($conn, "INSERT INTO sessions 
                (trainer, org, session_date, duration, session_note, status) 
                VALUES('$trainer', '$selectedClinic', '$date', '$duration', '$note', '$status')"); 
                
                header('Location:session_success.php');

                }else{

                $query = mysqli_query($conn, "INSERT INTO sessions 
                (trainer, org, session_date, duration, session_note, status) 
                VALUES('$trainer', '$selectedClinic', '$date', '$duration', '$note', '$status')"); 
                
                header('Location:session_success.php');               
                
     }          
    
}
}

// EDIT SESSION
        if(isset($_POST['session_edit_submit'])){

        $id = $_POST['session_id'];
        $clinic = $_POST['session_edit_clinic'];
        $trainer = $_POST['session_edit_trainer'];
        $date = $_POST['session_edit_date'];
        $duration = $_POST['session_edit_duration'];
        $note = $_POST['session_edit_note'];
        $status = $_POST['session_edit_status'];

        
        

        $updateSessionQuery = mysqli_query($conn, "UPDATE sessions SET trainer='$trainer', org = '$clinic', duration = '$duration', session_note = '$note', session_date = '$date', status = '$status' WHERE id = '$id'");
}

// SHOW SESSIONS BY CLINIC
        if(isset($_POST['sessions_by_clinic_submit'])){
            
            $selected_clinic = $_POST['session_clinic'];
           
        

                $get_session_by_clinic_query = mysqli_query($conn, "SELECT * FROM sessions WHERE trainer = '$userLoggedIn'  AND org = '$selected_clinic' ORDER BY session_date DESC");

                $clinic_sessions = mysqli_fetch_all($get_session_by_clinic_query, MYSQLI_ASSOC);
                 $_SESSION['clinic_sessions'] = $clinic_sessions;
                // var_dump($_POST);
    header('Location:show_sessions_by_clinic.php');
}

?>