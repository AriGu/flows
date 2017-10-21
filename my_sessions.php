<?php
include 'includes/header.php';
// include 'includes/footer.php';
include 'includes/form_handlers/session_handler.php';

$get_session_query = mysqli_query($conn, "SELECT * FROM sessions WHERE id > 0 AND trainer = '$userLoggedIn' ORDER BY session_date DESC");

$sessions = mysqli_fetch_all($get_session_query, MYSQLI_ASSOC);

?>

<div class='container'>
        <div class='margin_header'></div>



        <?php
        foreach($sessions as $index)
                {
                    $id = $index['id'];    
                    $clinic = $index['org'];
                    $trainer = $index['trainer'];
                    $date = $index['session_date'];
                    $duration = $index['duration'];
                    $note = $index['session_note']; 
                    $status = $index['status'];                   

                    if($status=='Billable'){
                                $status1 = "checked='checked'";
                                $status2 = "";                               

                             }else{
                                        $status1 = "";
                                        $status2 = "checked='checked'";                                        
                                      }

                echo "<div class='wrap'>
                        <div class='well session'>

                                Clinic: ".$clinic."<br>

                                Trainer: ".$trainer."<br>

                                Date: ".$date."<br>

                                Duration: ".$duration." hours<br>

                                Status: ".$status."<br><br>

                                Session Note:<br>".$note."<br><br>

                                <a class='btn btn-lg btn-default edit' class='edit-button' onclick='openEdit(this)'>Edit</a>
                        </div>

                        <div class='well edit-form'>
                                <form action='".$_SERVER['PHP_SELF']."' method='POST'>
                                        <label for='session_edit_clinic'>Clinic:</label><br>
                                                <input type='text' name='session_edit_clinic' id='session_edit_clinic' value='".$clinic."'><br><br>

                                                                      <label for='session_edit_trainer'>Trainer:</label><br>
                                                <input type='text' name='session_edit_trainer' id='session_edit_trainer' value='".$trainer."'><br><br>

                                        <label for='session_edit_date'>Date:</label><br>
                                                <input type='date' name='session_edit_date' id='session_edit_date' value='".$date."'><br><br>

                                        <label for='session_edit_duration'>Duration:</label><br>
                                                <input type='text' name='session_edit_duration' id='session_edit_duration' value='".$duration."'><br><br>

                                                <input type='hidden' name='session_id' value='".$id."'>

                                        <label for='session_edit_status'>Status:</label><br>
                                        <input type='radio' name='session_edit_status' ".$status1." value='Billable'> Billable<br>
                                                                                    <input type='radio' name='session_edit_status' ".$status2." value='Not Billable'> Not Billable<br><br>

                                        <label for='session_edit_note'>Note:</label><br>
                                                <textarea  name='session_edit_note' id='session_edit_note' cols='56' rows='7'>".$note." </textarea> <br><br>





                                        <div class='lower-div'>
                                                <input type='submit' class='btn btn-lg btn-default edit session_edit_submit' name='session_edit_submit' id='session_edit_submit' value='Save Changes'>
                                                <a class='btn btn-lg btn-primary close-edit' class='close-edit' style='margin-left: 20px;' onclick='closeEdit(this)'>Close</a>
                                        </div>
                                </form>
                        </div>
                        </div> ";


                }

                


?>





        <script>
        function openEdit(element){
                element.parentNode.style.display = 'none';
                element.parentNode.nextElementSibling.style.display = 'block';
        }

        function closeEdit(element){
                element.parentNode.parentNode.parentNode.style.display = 'none';
                element.parentNode.parentNode.parentNode.previousElementSibling.style.display = 'block';
        }

        function showClinic(element){
                var clinic = console.log(element.innerText);
                element.parentNode.style.display = 'none';
                element.parentNode.nextElementSibling.nextElementSibling.style.display = 'block';
        }
     
        </script>