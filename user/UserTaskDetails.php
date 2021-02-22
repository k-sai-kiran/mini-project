<?php
  session_start();
    if(!isset($_SESSION['user_id'])) 
    {
      header("location:../Logout.php");    
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Task Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

 
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

  
  <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
 

  
  <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
  <style type="text/css">  
  </style>
  
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
   
   

</script>
</head>
<body>
  <?php
  
  include("html/Header.php"); 
  include("html/UserSidebar.html");

  $task_id=$_REQUEST['task_id']; 
  $myId=$_SESSION['user_id']; 

  
  $result = $func->select_with_condition(array('*'),'task',"task_id = '".$task_id."'");
  while($row = $result->fetch_assoc())
  {
    $taskName=$row["task_name"];  
    $taskIssueDate=$row["task_issuedate"];
    $taskDeadLine=$row["dead_line"];
    $taskDetails=$row["task_details"];
    $taskReceiver=$row["task_receiver"];
    $taskSender=$row["task_sender_name"];
    $taskProject=$row["task_project"];
    $taskStatus=$row["task_status"];

  }

  
  $result1 = $func->select_with_condition(array('*'),'user',"user_id = '".$myId."'");
  while($row = $result1->fetch_assoc())
  {
    $myName=$row["user_fname"];
    
  }

  
  $result3 = $func->select_with_condition(array('*'),'project',"project_id = '".$taskProject."'");
  while($row = $result3->fetch_assoc())
  {
    
    $projectName=$row["project_name"];
  
  }    

  ?>
  
  <div class="w6layouts-main"> 
    <div class="seeprofile-layer">
      <h1></h1>
      <div class="header-main1">
      
         <div id="msg" name="msg"></div>
        <div id="countdown" style="color: white; float: right;"></div>
        
        <p style="color: white;"><?php echo "Sender Name:"."$taskSender"; ?></p>
        
        <div class="header-left-bottom">     
          <div class="icon1">
            <span class="fa fa-tag"></span>
            Task Tittle :<?php echo $taskName; ?>                           
          </div>  

          <div class="icon1">
            <span class="fa fa-calendar"></span>
            Task Issue Date  :<?php echo $taskIssueDate; ?>
          </div>  

          <div class="icon1">
            <span class="fa fa-calendar"></span>
            Task Dead Line :  <?php echo $taskDeadLine;?>
            <input type="hidden" name="deadline" id="deadline" value="<?php echo $taskDeadLine; ?>">
          </div>  

          <div class="icon1">
            <span class="fa fa-list";></span>
            Task Details :
            <div style=" width: 990px;height: 118px;overflow: auto;">
             <?php echo "$taskDetails"; ?>
           </div>
         </div>

         <div class="icon1">
          <span class="fa fa-pencil";></span>
          Task Project : <?php 
          
            echo $projectName;
          
             ?>    
        </div>

        <div class="icon1">
          <span class="fa fa-hand-rock-o";></span>
          Update Project Status : 
          <select onchange="update_task_status(this.value,<?php echo $task_id;?>)">
            <option value="pending" <?php echo ($taskStatus =='pending'? 'selected':'');?>>Pending</option>
            <option value="working" <?php echo ($taskStatus =='working'? 'selected':'');?>>Working</option>
            <option value="completed" <?php echo ($taskStatus =='completed'? 'selected':'');?>>Completed</option>
          </select>
        </div>
      </div>
      
      
    </div>
    <center><div style="width:1100px;height:300px;">
      <form method="POST" name="f1" id="f1">
        
        <input type="number" name="task_id" id="task_id" value=<?php echo "$task_id";?> hidden> 
        <input type="number" name="mineId" id="mineId" value=<?php echo "$myId";?> hidden>
        <input type="number" name="recId" id="recId" value=<?php echo "$taskReceiver";?> hidden>
        <input type="hidden" name="myName" id="myName" value=<?php echo "$myName";?>>
        
        <input type="button" class="btn" name="submit" id="submit" value="SUBMIT" onclick="subm()">
      </form></div></center>
    </div>  
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script>
  var auto_refresh = setInterval(

    function ()
    {
      $('task_id=<?php echo $task_id; ?>').fadeIn("slow");
  }, 2000);

  function update_task_status(val,task_id) {
    $.ajax({
      type:'post',
      url:'UpdateTaskStatus.php',
      data:{val:val,task_id:task_id},
      success:function(result){
        if(result==1)
        {
         $('#str'+task_id).html('updated');
       }
       else
       {
        $('#str'+task_id).html('dont');
      }
    }
  });
  }



</script>
</body>
</html>