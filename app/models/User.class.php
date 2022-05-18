<?php

class User{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // check username is exists
    public function getUserByName($name){
        $this->db->query("SELECT * FROM users WHERE userName = :name");
        $this->db->bind(':name' , $name);
        $this->db->execute();
        if($this->db->rowCount()) return true;
        else return false;
    }

    // register new user
    public function register($name , $email , $password){
        $this->db->query("INSERT INTO users(userName , userEmail , userPassword)VALUES(:name , :email , :password)");
        $this->db->bind(':name' , $name);
        $this->db->bind(':email' , $email);
        $this->db->bind(':password' , $password);

        if($this->db->execute()) return true;
        else return false;
    }

    //login user
    public function login($username , $password){
        $this->db->query("SELECT * FROM users WHERE userName = :uname");
        $this->db->bind(":uname" , $username);
        $row = $this->db->fetch();
        $hashed_password = $row->userPassword;
        if(password_verify($password , $hashed_password)){
            return $row;
        }else{
            return false;
        }

    }
    
    //  get info about current user 
    public function get_user_info($username){
        $this->db->query("SELECT * FROM users WHERE userName = :uname");
        $this->db->bind(':uname' , $username);
        $row = $this->db->fetch();
        if($this->db->rowCount()) return $row;
        else return false;

    }

    // Update name and email
    public function update_name($username , $email , $user_id)
    {
      $this->db->query("UPDATE `users` SET `userName`= :uname ,`userEmail`= :uemail  WHERE `id` = :uid");
      $this->db->bind(':uname' , $username);
      $this->db->bind(':uemail' , $email);
      $this->db->bind(':uid' , $user_id);

      if ($this->db->execute()) {
        return true;
      }else{
        return false;
      }
    }


   //Check current password 
   public function check_password($username , $password){
    $this->db->query("SELECT * FROM users WHERE userName = :uname");
    $this->db->bind(":uname" , $username);
    $row = $this->db->fetch();
    $hashed_password = $row->userPassword;
    if(password_verify($password , $hashed_password)){
        return $row;
    }else{
        return false;
    }

   }

   //change the password 
   public function change_password($password , $userID){
       $this->db->query("UPDATE `users` SET `userPassword`= :upass WHERE `id` = :userid");
       $this->db->bind(':upass' , $password);
       $this->db->bind(':userid' , $userID);
       if($this->db->execute()) return true;
       else false ;
   }

}
