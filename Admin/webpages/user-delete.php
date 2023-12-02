<?php
include ("connection.php" ); 
$user_id =$_GET['user_id' ];  
$sql= "DELETE FROM  `users` WHERE `user_id`  =  $user_id " ; 

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