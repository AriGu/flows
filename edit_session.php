<?php 
include 'includes/header.php';
require 'includes/form_handlers/session_handler.php';





?>


       
        <div class="form-wrapper">
          <div class="header"><span><img src="assets/img/Logo_Praxis_The_Template-Free_EMR_Big.png" class="session-logo"></span>
          </div>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">            
              
                    <div class="form-group">
                          <label for="selected_clinic" class="clinic_label">
                            <?php echo $clinic; ?> (Available: <?php echo $clinic_hours; ?> hours)
                          </label>
                          <br> 
                          <input type="text" id="selected_clinic" class="form-control" name="selected_clinic" value="<?php echo $clinic; ?>">
                    </div>
                    
                    <div class="form-group">
                          <label for="session_date" class="session-label">Date:</label> 
                          <br>   
                          <?php if(in_array($noDate, $errors)) echo '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a>'.$noDate.'</div>';?> 
                          <input type="date" name="session_date" class="form-control">
                          <br>
                    </div>
                    
                    <div class="form-group">
                          <label for="session_duration" class="session-label">Duration (hours):</label>                  
                          <br>
                          <?php if(in_array($noDuration, $errors)) echo '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a>'.$noDuration.'</div>';?>
                           
                          <input type="text" id="session_duration" class="form-control" name="session_duration">
                          <?php if(in_array($notEnoughHours, $errors)) echo '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a>'.$notEnoughHours.'</div>';?>
                          <br>    
                     </div>
                    
                    <div class="form-group">
                          <label for="session_note" class="session-label">Session Notes:</label>
                          <br> 
                          <?php if(in_array($noNote, $errors)) echo '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a>'.$noNote.'</div>';?>
                          <textarea name="session_note" id="session_note" cols="56" rows="7" class="form-control"></textarea>
                    </div>
     

                        <input type="radio" name="status" value="Billable"> Billable<br>
                          <input type="radio" name="status" value="Not Billable"> Not Billable<br>
                          <div class="lower">
                          <input type="submit" name="session_submit" value="Submit">
                          </div>
            </form>
            
            </div>
           
              
        </body>
</html>