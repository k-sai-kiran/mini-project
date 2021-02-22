<?php session_start(); 
if(!isset($_SESSION['admin_id']))  
{
  session_destroy();
  header("location:../Logout.php");    
}?>
<!DOCTYPE html>
<html>
<head>
	<title> All Users Admin</title>
   <link href="../css/smiletoggle.css" rel="stylesheet" type="text/css" media="all" />
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

         .switch {
       position: relative;
       display: inline-block;
       width: 60px;
       height: 34px;
   }

   .switch input {
       opacity: 0;
       width: 0;
       height: 0;
   }

   
        
      </style>
     

    </head>
    <body bgcolor="#9ccef8">
     <?php 
    include("html/AdminHeader.php"); 
    include("html/Sidebar.html"); 
    $myId=$_SESSION['admin_id']; 
    
    $result = $func->selectAll('user');
    ?>
    <br><br>
    <div id="str"></div>
    
    <center><div id="field" class="field"><br><br> 
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
             <td><a href="AdminUserDetails.php?user_id=<?php echo $row["user_id"]; ?>">
             <td align="center"><?php echo $row["user_fname"]." ".$row["user_lname"]; ?></td>
             <td><a href="TaskAssign.php?user_id=<?php echo $row["user_id"]; ?>" class="button">ASSIGN TASK</a></td>
             <td><button onclick="delete_user(<?php echo $row["user_id"];?>)" class="button" >Delete</button></td>
             
            
            <br>
          </tr><br></table>

          <?php  
        } 

      }
      else 
      {
        echo "<h2>No Registered User</h2>";
      }

      ?>
    
    
  </div></center>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
    
    function activate_deactivate_user(val,user_id){
      $.ajax({
        type:'post',
        url:'ActivateDeactivateUser.php',
        data:{val:val,user_id:user_id},
        success:function(result){
          $("#field").html(result);
      }
    });
    }
    
    function delete_user(user_id) {
    if(confirm('Are you sure to remove this user ?'))
  { 
      $.ajax({
        type:'post',
        url:'userDelete.php',
        data:{user_id:user_id},
        success:function(result){
         $("#allusers").html(result);
       }
     });
  }
  }
  </script>
</body>
</html>

        