<?php
$clinic = "";

if(isset($_POST['clinic_submit'])){
     

        $clinic = $_POST['session_clinic'];   
                  


        $clinic_query = mysqli_query($conn, "SELECT * FROM orgs WHERE name = '$clinic'");  
        $clinic_row = mysqli_fetch_array($clinic_query);
        $clinic_hours = $clinic_row['hours'];       

    
header('Location:session.php');
    
}




?>