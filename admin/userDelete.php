<?php
session_start(); 
if(!isset($_SESSION['admin_id'])) 
{
  session_destroy();
  header("location:../Logout.php");    
}
  require '../Classes/init.php';
  $func = new Operation(); 
  $user_id=$_POST['user_id']; 

 
  $result = $func->delete('user',"user_id = '".$user_id."'");
  ?>