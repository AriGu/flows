<?php 
include 'includes/header.php';
require 'includes/form_handlers/session_handler.php';






?>

        <div class="wrapper">
          <div class="header"><span><img src="assets/img/Logo_Praxis_The_Template-Free_EMR_Big.png" class="session-logo"></span>
          </div>
            <form action="session.php" method="POST">
              <div class="select-div"> 
                  <label for="clinic" class="label-one">Select Clinic:</label>
                          <br>
                    <select id="clinic" name="session_clinic">      

                          <?php              
                          while ( $row = mysqli_fetch_assoc($get_org_query) )                           
                            {                      
                               echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';                                
                            }                                                 
                          ?> 
                    </select>
                    </div>
                          <div class="lower">
                          <input type="submit" id="clinic_submit" name="clinic_submit" value="Next">
                          </div>
            </form>           

          </div>  
        </body>
</html>