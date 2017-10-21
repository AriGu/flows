<?php 
include 'includes/header.php';
require 'includes/form_handlers/session_handler.php';


$clinic = $_SESSION['session_clinic'];
$clinic_hours = $_SESSION['clinic_hours'];

?>


       
        <div class="well form-wrapper">
          
          <div class="header"><span><img src="assets/img/Logo_Praxis_The_Template-Free_EMR_Big.png" class="session-logo"></span>
          </div>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">            
              
             
                          <label for="selected_clinic" class="clinic_label">
                            <?php echo $clinic; ?> (Available: <?php echo $clinic_hours; ?> hours)
                          </label>
                          <br> 
                          <input type="text" id="selected_clinic" class="selected_clinic" name="selected_clinic" value="<?php echo $clinic; ?>">
                         
              
                          <label for="session_date" class="session-label">Date:</label> 
                          <br>   
                          <?php if(in_array($noDate, $errors)) echo '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a>'.$noDate.'</div>';?> 
                          <input type="date" name="session_date" class="session_date">
                          <br>                            
                          <label for="session_duration" class="session-label">Duration (hours):</label>                  
                          <br>
                          <?php if(in_array($noDuration, $errors)) echo '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a>'.$noDuration.'</div>';?>
                           
                          <input type="text" id="session_duration" class="duration" name="session_duration">
                          <?php if(in_array($notEnoughHours, $errors)) echo '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a>'.$notEnoughHours.'</div>';?>
                          <br>                           
                          <label for="session_note" class="session-label">Session Notes:</label>
                          <br> 
                          <?php if(in_array($noNote, $errors)) echo '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a>'.$noNote.'</div>';?>
                          <textarea name="session_note" id="session_note" cols="56" rows="5"></textarea><br><br>
                          

                        <label for='session_edit_status'>Status:</label><br>
                                        <select name='status'>
                                                <option value='Billable'>Billable</option>
                                                <option value='Not Billable'>Not Billable</option>            
                                        </select>
                          <div class="lower">
                          <input type="submit" name="session_submit" value="Submit" id="session_submit">
                          </div>
            </form>
            
            </div>
           
              
        </body>
</html>