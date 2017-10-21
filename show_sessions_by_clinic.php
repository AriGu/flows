<?php
include 'includes/header.php';
include 'includes/form_handlers/session_handler.php';
?>

 <div class='container'>
        <div class='margin_header'></div>

<?php


$clinic_sessions = $_SESSION['clinic_sessions'];

        foreach($clinic_sessions as $index)
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

                                Note:<br>".$note."<br><br>

                                <a class='btn btn-lg btn-default edit' class='edit-button' onclick='openEdit(this)'>Edit</a>
                        </div>

                        <div class='well edit-form'>
                                <form action='".$_SERVER['PHP_SELF']."' method='POST'>
                                        <label for='clinic_session_edit_clinic'>Clinic:</label><br>
                                                <input type='text' name='clinic_session_edit_clinic' id='clinic_session_edit_clinic' value='".$clinic."'><br><br>

                                                                      <label for='session_edit_trainer'>Trainer:</label><br>
                                                <input type='text' name='clinic_session_edit_trainer' id='clinic_session_edit_trainer' value='".$trainer."'><br><br>

                                        <label for='clinic_session_edit_date'>Date:</label><br>
                                                <input type='date' name='clinic_session_edit_date' id='clinic_session_edit_date' value='".$date."'><br><br>

                                        <label for='clinic_session_edit_duration'>Duration:</label><br>
                                                <input type='text' name='clinic_session_edit_duration' id='clinic_session_edit_duration' value='".$duration."'><br><br>

                                                <input type='hidden' name='clinic_session_id' value='".$id."'>

                                        <label for='clinic_session_edit_status'>Status:</label><br>
                                        <input type='radio' name='clinic_session_edit_status' ".$status1." value='Billable'> Billable<br>
                                                                                    <input type='radio' name='clinic_session_edit_status' ".$status2." value='Not Billable'> Not Billable<br><br>

                                        <label for='clinic_session_edit_note'>Note:</label><br>
                                                <textarea  name='clinic_session_edit_note' id='clinic_session_edit_note' cols='80' rows='7'>".$note." </textarea> <br><br>





                                        <div class='lower-div'>
                                                <input type='submit' class='btn btn-lg btn-default edit clinic_session_edit_submit' name='clinic_session_edit_submit' id='clinic_session_edit_submit' value='Save Changes'>
                                                <a class='btn btn-lg btn-primary close-edit' class='close-edit' style='margin-left: 20px;' onclick='closeEdit(this)'>Close</a>
                                        </div>
                                </form>
                        </div>
                        </div> ";
                }

                // EDIT SESSION
        if(isset($_POST['clinic_session_edit_submit'])){

            $id = $_POST['clinic_session_id'];
            $clinic = $_POST['clinic_session_edit_clinic'];
            $trainer = $_POST['clinic_session_edit_trainer'];
            $date = $_POST['clinic_session_edit_date'];
            $duration = $_POST['clinic_session_edit_duration'];
            $note = $_POST['clinic_session_edit_note'];
            $status = $_POST['clinic_session_edit_status'];

        
        

        $updateSessionQuery = mysqli_query($conn, "UPDATE sessions SET trainer='$trainer', org = '$clinic', duration = '$duration', session_note = '$note', session_date = '$date', status = '$status' WHERE id = '$id'");


}


?>


    
</body>

</html>

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