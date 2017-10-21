<?php

class User{
    private $user;
    private $conn;

    public function __construct($conn, $email){
        $this->conn = $conn;
        $user_details_query = mysqli_query($conn, "SELECT * FROM WHERE email = '$email'");
        $this->user = mysqli_fetch_array($user_details_query);
    }

    public function getName(){
        $name = $this->user['name'];
        $query = mysqli_query($this->conn, "SELECT name FROM users WHERE email = '$email'");
        $row = mysqli_fetch_array($query);
        return $row['name'];
    }
}








?>