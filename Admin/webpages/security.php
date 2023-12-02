<?php
session_start();
include('database.php');
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: database.php");
}

if(!$_SESSION['username'])
{
    header('Location: login.php');
}
?>