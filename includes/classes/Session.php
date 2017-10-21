<?php

class Session{
    private $session;
    private $conn;

    public function __construct($conn, $clinic){
       $this->conn = $conn;
       $session_details_query = mysqli_query($conn, "SELECT * FROM sessions WHERE org = '$clinic'");
       $this->session = mysqli_fetch_array($session_details_query);
   }

   public function getName(){
      $name = $this->user['name'];
      $query = mysqli_query($this->conn, "SELECT name FROM users WHERE email = '$email'");
       $row = mysqli_fetch_array($query);
       return $row['name'];
   }
}








?>