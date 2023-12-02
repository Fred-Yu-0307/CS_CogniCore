<?php

require_once 'database.php';

Class Tutor{
    //attributes

    public $tutor_id;
    public $user_id;
    public $course_id;
    public $description;
    public $contact_detail;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO course_tutor (tutor_id, user_id, course_id, contact_detail) VALUES 
        (:tutor_id, :user_id, :course_id, :contact_detail);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':tutor_id', $this->tutor_id);
        $query->bindParam(':user_id', $this->user_id);
        $query->bindParam(':course_id', $this->course_id);
        $query->bindParam(':contact_detail', $this->contact_detail);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    /*

    function fetch3($record_id){
        $sql = "SELECT * FROM course_tutor WHERE course_id = :course_id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':course_id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    } */


    /*
    function show2($course_id){
        $sql = "SELECT * FROM course_tutor WHERE course_id = :course_id ORDER BY tutor_id ASC;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':course_id', $course_id, PDO::PARAM_INT); // Assuming course_id is an integer
        $data = null;
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    } */

    function show3($course_id){
        $sql = "SELECT course_tutor.*, CONCAT(users.first_name, ' ', users.last_name) AS tutor_name, users.profile_pic
                FROM course_tutor
                INNER JOIN users ON course_tutor.user_id = users.user_id
                WHERE course_tutor.course_id = :course_id
                ORDER BY course_tutor.tutor_id ASC;";
        
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':course_id', $course_id, PDO::PARAM_INT);
    
        $data = null;
        
        // Use fetchAll(PDO::FETCH_ASSOC) to return data as associative arrays
        if ($query->execute()) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Handle query failure (e.g., log the error, throw an exception, etc.)
            // For simplicity, return an empty array in case of failure
            return array();
        }
    
        return $data;
    }
    


}

?>