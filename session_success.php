<?php 
include 'includes/header.php';
require 'includes/form_handlers/session_handler.php';


            $selectedClinic = $_SESSION['selected_clinic'];
            $date = $_SESSION['session_date'];
            $duration = $_SESSION['session_duration'];
            $note = $_SESSION['session_note'];
            $status = $_SESSION['status'];
          

            
?>


<div class="container">
            <div class="alert alert-success" style="text-align:center; margin-top:30px;">
           
           <h2>Done!</h2>
           <div class="session_success_box">    
                <p>
                    <h3><?php echo $userLoggedIn;?></h3>

                    <h3><?php echo $selectedClinic;?></h3>
                    
                    <h3><?php echo $date;?></h3>
                    
                    <h3><?php echo $duration;?> Hours</h3>
                    
                    <h3><?php echo $note;?></h3>
                                       
                    <h3 class="bill-status_success"><?php echo $status;?></h3>        
                    
                
                </p>                     
                
           </div>
           <a class="btn btn-success btn-lg" href="index.php" role="button">Close</a> <a class="btn btn-primary btn-lg" href="session_clinic.php" role="button">Start New Session</a>
            </div>
        </div>

    </body>
</html>