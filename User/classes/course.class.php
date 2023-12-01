<?php

require_once 'database.php';

Class Course{
    //attributes

    public $course_id;
    public $subject_code;
    public $prerequisite;
    public $course_name;
    public $subject_description;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO courses (course_id, subject_code, prerequisite, subject_description) VALUES 
        (:course_id, :subject_code, :prerequisite, :subject_description);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':subject_code', $this->subject_code);
        $query->bindParam(':prerequisite', $this->prerequisite);
        $query->bindParam(':course_name', $this->course_name);
        $query->bindParam(':subject_description', $this->subject_description);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE product SET product_name=:product_name, description=:description, category=:category, price=:price, availability=:availability WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':product_name', $this->product_name);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':category', $this->category);
        $query->bindParam(':price', $this->price);
        $query->bindParam(':availability', $this->availability);
        $query->bindParam(':course_id', $this->course_id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM courses WHERE course_id = :course_id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':course_id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT * FROM courses ORDER BY course_name ASC;";
        $query=$this->db->connect()->prepare($sql);
        $data = null;
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function is_course_name_exist(){
        $sql = "SELECT * FROM courses WHERE course_name = :course_name;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':course_name', $this->course_name);
        if($query->execute()){
            if($query->rowCount()>0){
                return true;
            }
        }
        return false;
    }
}

?>