<?php
 include ("connection.php" ); 
$last_name =  $_POST['last_name' ]; 
$first_name =  $_POST['first_name' ]; 
$email =  $_POST['email' ]; 
$year_level =  $_POST['year_level' ]; 
$section =  $_POST['section' ]; 
$password =  $_POST['password' ]; 
$sql=  "INSERT  INTO `users`(`last_name` , `first_name` , `email` , `year_level`, `section` , `password`)
 VALUE  (' {$last_name} ' , ' {$first_name } ' , ' {$email } ' , ' {$year_level } ' , ' {$section } ' ,  ' {$password } ')" ; 

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