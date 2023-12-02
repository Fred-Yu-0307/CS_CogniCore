<?php
 include ("connection.php" ); 
$subject_code =  $_POST['subject_code' ]; 
$prerequisite =  $_POST['prerequisite' ]; 
$course_name =  $_POST['course_name' ]; 
$year_level_and_semester =  $_POST['year_level_and_semester' ]; 
$subject_description =  $_POST['subject_description' ]; 
$sql=  "INSERT  INTO `courses`(`subject_code` , `prerequisite` , `course_name` , `year_level_and_semester` , `subject_description`)
 VALUE  (' {$subject_code} ' , ' {$prerequisite} ' , ' {$course_name } ' , ' {$year_level_and_semester } ' , ' {$subject_description } ')" ; 

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record created succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record created failed!'
    ];
    print_r(json_encode($response));
} 
?> 