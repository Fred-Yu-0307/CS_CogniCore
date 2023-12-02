<?php
include ("connection.php" ); 
$course_id =$_GET['course_id' ];  
$sql= "DELETE FROM  `courses` WHERE `course_id`  =  $course_id " ; 

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record deleted succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record deleted failed!'
    ];
    print_r(json_encode($response));
} 
?> 