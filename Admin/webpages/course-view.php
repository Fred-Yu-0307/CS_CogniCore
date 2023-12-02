<?php
include ("connection.php"); 
$course_id= $_GET['course_id'];
$sql= "SELECT * FROM `courses` WHERE `course_id` = $course_id";
$result= mysqli_query($conn ,  $sql);
$fetch= mysqli_fetch_assoc($result) ;
print_r(json_encode($fetch));
?>
