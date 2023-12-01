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

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO users (last_name, first_name, email, year_level, section, password) VALUES 
        (:last_name, :first_name, :email, :year_level, :section, :password);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':last_name', $this->last_name);
        $query->bindParam(':first_name', $this->first_name);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':year_level', $this->year_level);
        $query->bindParam(':section', $this->section);
        // Hash the password securely using password_hash
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $query->bindParam(':password', $hashedPassword);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
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