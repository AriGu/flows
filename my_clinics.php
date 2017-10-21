<?php
include 'includes/header.php';

$getMyClinics_query = mysqli_query($conn, "SELECT * FROM orgs WHERE id > 0 AND trainer = '$userLoggedIn' ORDER BY org ASC");


$clinics = mysqli_fetch_all($getmyclinics_query, MYSQLI_ASSOC);



foreach($clinics as $index)
        {        
                echo  "<div class='container'><div class='well'> 
                Date: ".$index['session_date']."<br>
                Trainer: ".$index['trainer']."<br>
                Clinic: ".$index['org']."<br>
                Duration: ".$index['duration']." hours <br> <br>                                            
                Note: ".$index['session_note']."<br><br>
                <a href='' class='btn btn-lg btn-default'>Edit</a>
                </div></div>";      
        }




?>





        </body>
</html>      