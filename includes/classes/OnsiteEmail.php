<?php

    


class OnsiteEmail{
    


    public function __construct($clinic, $trainer, $startDate, $endDate, $onsiteDays, $trainerNote){
        
        echo 
        "NEW ONSITE SCHEDULED!! <br><br>
        Trainer: ".$trainer. "<br><br>
        Clinic: " .$clinic."<br><br>
        Start Date: " .$startDate."<br><br>
        End Date: " .$endDate. "<br><br>
        Days Spent: " .$onsiteDays."<br><br>
        Note from Trainer:<br><br>" .$trainerNote;


    }


}



?>

