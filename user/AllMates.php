<?php session_start(); 
if(!isset($_SESSION['user_id'])) 
{
  session_destroy();
  header("location:../Logout.php");    
}?>
<!DOCTYPE html>
<html>
<head>
 <title> All Mates User</title>
 <style>
 body {
  background-image: url('../images/flies.jpg');
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
}

td {
  text-align: left;
  padding: 8px;
  background-color: #d6cece;
}

table tr:nth-child(even) {s
  background-color: red;
}
table tr td:first-child{ border-top-left-radius: 25px;
  border-bottom-left-radius: 5px;}
  table tr td:last-child{ border-top-right-radius: 5px;
    border-bottom-right-radius: 25px;}

    .button {
      border-radius: 8px;
      border: bold 17px Arial;
      text-decoration: none;
      background-color: #EEEEEE;
      color: #333333;
      padding: 2px 6px 2px 6px;
      border-top: 1px solid #CCCCCC;
      border-right: 2px solid #333333;
      border-bottom: 2px solid #333333;
      border-left: 1px solid #CCCCCC;
    }
    .button1 {
      border-radius: 8px;
      border: bold 17px Arial;
      text-decoration: none;
      background-color:#aae87c;
      color: #333333;
      padding: 2px 6px 2px 6px;
      border-top: 1px solid #CCCCCC;
      border-right: 2px solid #333333;
      border-bottom: 2px solid #333333;
      border-left: 1px solid #CCCCCC;
    }
    .button2 {
      border-radius: 8px;
      border: bold 17px Arial;
      text-decoration: none;
      background-color:#da6856;
      color: #333333;
      padding: 2px 6px 2px 6px;
      border-top: 1px solid #CCCCCC;
      border-right: 2px solid #333333;
      border-bottom: 2px solid #333333;
      border-left: 1px solid #CCCCCC;
    }
    .body
    {
      background-color: #9ccef8;
    }
    div.field {
      width: 540px;
      height: 318px;
      overflow: auto;
    }

  </style>
</head>
<body bgcolor="#9ccef8">
 <?php
include("html/Header.php");  
include("html/UserSidebar.html"); 
$myId=$_SESSION['user_id'];  


$result = $func->select_with_condition(array('*'),'user',"user_id != '".$myId."'"); 
?> <br><br>

<center><div class="field"> 
  <h2 style="color: white;">All Mates</h2>
  <?php
  if ($result->num_rows > 0) 
   {
    while($row = $result->fetch_assoc()) {   
      ?>
      <table>
        <col width="60">
        <col width="150">
        <col width="150">
        <tr>
          
         <td align="center"><?php echo $row["user_fname"]." ".$row["user_lname"]; ?></td>
         <td><a href="UserTaskAssign.php?user_id=<?php echo $row["user_id"]; ?>" class="button">ASSIGN TASK</a></td><br>
       </tr>    
       <?php  
     } 
   }
   else 
   {
    echo "<h2>No Registered User</h2>";
   }
  ?>
</table>
</div></center>

</body>
</html>