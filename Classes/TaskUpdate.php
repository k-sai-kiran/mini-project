<?php session_start(); 
if(!isset($_SESSION['admin_id']))  
{
  session_destroy();
  header("location:../Logout.php");    
}?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Task</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script> 
    
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>
  
  <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
  
  <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
  
</head>
<body>
  <?php 

  include("html/AdminHeader.php"); 

  $myId=$_SESSION['admin_id']; 
  $task_id=$_REQUEST['task_id'];  

  
  $result = $func->select_with_condition(array('*'),'task',"task_id = '".$task_id."'");
  while($row = $result->fetch_assoc())
  {
    $taskName=$row["task_name"]; 
    $taskIssueDate=$row["task_issuedate"];
    $taskDeadLine=$row["dead_line"];
    $taskDetails=$row["task_details"];
    $taskReceiver=$row["task_receiver"];
    
  }
  
  

 ?>       
 

 <div class="w5layouts-main"> 
   <div class="updateprofile-layer">
    <h1>Edit Task</h1>
    <div class="header-main1">
     <div class="main-icon">
      
    </div>
    <div class="header-left-bottom">
      <form action="#" method="post">	
        <div class="icon1">
          <span class="fa fa-tag"></span>Task Tittle : 
          <input type="text"  name="taskName" value="<?php echo $taskName; ?>">
        </div>	

        <?php 
          $date1 = substr_replace($taskIssueDate,'T',11,0); 
          $issueDate = preg_replace('/\s+/', '', $date1);
          $date2 = substr_replace($taskDeadLine,'T',11,0);
          $deadLine = preg_replace('/\s+/', '', $date2);

          ?>

        <div class="icon1">
          <span class="fa fa-calendar"></span>Task Issue Date :
          <input type="datetime-local"  name="taskIssueDate" value="<?php  echo $issueDate; ?>" > 
        </div>	

        <div class="icon1">
          <span class="fa fa-calendar"></span>Task Deadline :
          <input type="datetime-local" name="taskDeadLine" value="<?php echo $deadLine; ?>" >
        </div>

        <div class="icon1">
          
          <span class="fa fa-list"></span>Task Details :
          <textarea id="mytextarea" name ="task_details" ><?php echo $taskDetails; ?></textarea>
          
        </div>  
     
        <div class="bottom">
          <button class="btn" type="submit" name="updateTask" >Update</button>
        </div><br>

      </form>	
      <div class="bottom">
        <button class="btn" type="submit" name="updateTask" ><a href="TaskDetails.php?task_id=<?php echo $task_id; ?>" class="button" style="color: white;">BACK</a></button>
      </div><br>
    </div> 
  </div>			
</div>	
</div>
</div>	

<?php
if(isset($_POST['updateTask']))  
{
  
   
  $result = $func->update('task',array("task_name='" . $_POST['taskName'] . "'", "task_issuedate='" . $_POST['taskIssueDate'] . "'", "dead_line='" . $_POST['taskDeadLine'] . "'", "task_details='".$_POST['task_details']."'"),"task_id ='" . $task_id . "'"); 

  if ($result === TRUE) 
  { 
    ?>

    <form id="myForm" action="TaskDetails.php" method="post">
     <input type="hidden" name="task_id" id="task_id" value="<?php echo $task_id; ?>">
   </form>

   <?php
 }
 else
 {
   echo "Cannot update";
 }

}

if(isset($_POST['back']))
{
 header("location:TaskDetails.php");  
}  

?>
<script type="text/javascript">
  document.getElementById('myForm').submit();
</script>
</body>
</html>