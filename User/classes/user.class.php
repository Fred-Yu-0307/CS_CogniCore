<?php

require_once 'database.php';

Class User{
    //attributes

    public $user_id;
    public $last_name;
    public $first_name;
    public $email;
    public $year_level;
    public $section;
    public $password;
    public $profile_pic;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO users (last_name, first_name, email, year_level, section, password, profile_pic) VALUES 
        (:last_name, :first_name, :email, :year_level, :section, :password, :profile_pic);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':last_name', $this->last_name);
        $query->bindParam(':first_name', $this->first_name);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':year_level', $this->year_level);
        $query->bindParam(':section', $this->section);
        // Hash the password securely using password_hash
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $query->bindParam(':password', $hashedPassword);
        $query->bindParam(':profile_pic', $this->profile_pic);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE users SET last_name=:last_name, first_name=:first_name, email=:email, year_level=:year_level, section=:section, profile_pic=:profile_pic  WHERE user_id = :user_id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':last_name', $this->last_name);
        $query->bindParam(':first_name', $this->first_name);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':year_level', $this->year_level);
        $query->bindParam(':section', $this->section);
        $query->bindParam(':profile_pic', $this->profile_pic);
        $query->bindParam(':user_id', $this->user_id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM users WHERE user_id = :user_id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':user_id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function is_email_exist(){
        $sql = "SELECT * FROM users WHERE email = :email;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':email', $this->email);
        if($query->execute()){
            if($query->rowCount()>0){
                return true;
            }
        }
        return false;
    }
}

?>