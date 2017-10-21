<?php 
include 'includes/header.php';
require 'includes/form_handlers/onsite_handler.php';

$get_org_query = mysqli_query($conn, "SELECT id,name FROM orgs WHERE id > 0");



?>

<div class="onsite_form-wrapper">
          <div class="onsite_header"><span><img src="assets/img/Logo_Praxis_The_Template-Free_EMR_Big.png" class="onsite-logo"></span>
          </div>
            <form action="onsite.php" method="POST">
                  <label for="onsite_clinic">Clinic:</label>
                          <br>
                    <select id="onsite_clinic" name="onsite_clinic">      

                          <?php              
                          while ( $row = mysqli_fetch_assoc($get_org_query) )                           
                            {                      
                               echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';            
                            }                                                 
                          ?> 
                    </select>
                          <br>
                          <label for="onsite_start_date">Onsite Start Date:</label> 
                          <br>  
                          <input type="date" name="onsite_start_date" id="onsite_start_date">
                          
                          <?php if(in_array($noStartDate, $errors)) echo '<div class="onsite_error">'.$noStartDate.'</div>';?>
                          <br>
                          <label for="onsite_end_date">Onsite End Date:</label> 
                          <br>                  
                            
                          <input type="date" name="onsite_end_date" id="onsite_end_date">
                          
                          <?php if(in_array($noEndDate, $errors)) echo '<div class="onsite_error">'.$noEndDate.'</div>';?>
                          <br>
                          
                          <label for="onsite_note">Message:</label>
                          <br> 
                          <textarea name="onsite_note" id="onsite_note" cols="56" rows="7"></textarea>
                          <br>

                        
                          <div class="onsite_lower">
                          <input type="submit" name="onsite_submit" id="onsite_submit" value="Submit">
                          </div>
            </form>
            

          </div>  

        

        </body>
</html>