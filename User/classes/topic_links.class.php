<?php

require_once 'database.php';

Class Link{
    //attributes

    public $topic_id;
    public $course_id;
    public $topic_number;
    public $topic_name;
    public $topic_description;
    public $topic_link;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO course_topics (course_id, topic_number, topic_name, topic_description, topic_link) VALUES 
        (:course_id, :topic_number, :topic_name, :topic_description, :topic_link);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':course_id', $this->course_id);
        $query->bindParam(':topic_number', $this->topic_number);
        $query->bindParam(':topic_name', $this->topic_name);
        $query->bindParam(':topic_description', $this->topic_description);
        $query->bindParam(':topic_link', $this->topic_link);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch2($record_id){
        $sql = "SELECT * FROM course_topics WHERE course_id = :course_id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':course_id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show2($course_id){
        $sql = "SELECT * FROM course_topics WHERE course_id = :course_id ORDER BY topic_number ASC;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':course_id', $course_id, PDO::PARAM_INT); // Assuming course_id is an integer
        $data = null;
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>