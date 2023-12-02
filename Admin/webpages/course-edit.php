<?php
include ("connection.php" );
$subject_code= $_POST['subject_code' ];
$prerequisite= $_POST['prerequisite' ];
$course_name= $_POST['course_name' ];
$year_level_and_semester= $_POST['year_level_and_semester' ];
$subject_description= $_POST['subject_description' ];
$course_id= $_POST['id' ];
$sql= "UPDATE `courses`  SET  `subject_code` = '". $subject_code."'  , `prerequisite` =  '". $prerequisite."' ,   , `course_name` =  '". $course_name."' ,   , `year_level_and_semester` =  '". $year_level_and_semester."' , 
`subject_description`  =  '".$subject_description ."' WHERE `course_id` = $course_id " ;

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record updated succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record updated failed!'
    ];
    print_r(json_encode($response));
} 
?>