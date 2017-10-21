<?php
include 'includes/header.php';
include 'includes/form_handlers/session_handler.php';




?>

<div class="container" style="width: 40%;">
    <div class="well text-center" style="margin-top: 100px; ">
        <label for="session_clinic" class="session_clinic">Filter by Clinic:</label>
            <form action="<?php $_SERVER['PHP_SELF'] ?> " method="POST">
                <select id="session_clinic" name="session_clinic" style="width: 70%;">
                                    <?php              
                                    while ( $row = mysqli_fetch_assoc($get_org_query) )                           
                                        {                      
                                        echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';   
                                        }                                                 
                                    ?> 
                   
                </select> <br><br>
                 <input type="submit" name="sessions_by_clinic_submit" class="btn btn-lg btn-primary" value="Show Sessions">
            </form> 
        </div>
    </div>
    
</body>

</html>

<?php




?>