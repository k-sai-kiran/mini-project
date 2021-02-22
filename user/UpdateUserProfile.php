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
  <title>Update Profile</title>
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

  
  <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
  
  <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
  

</head>
<body>
  <?php 
  
  include("html/Header.php");
  
  $myId=$_SESSION['user_id'];
  $sql = "SELECT * FROM user WHERE user_id = '".$myId."'";
  $result = $func->select_with_condition(array('*'),'user',"user_id = '".$myId."'");
  while($row = $result->fetch_assoc())
  {
    $fname=$row["user_fname"];
    $lname=$row["user_lname"];
    $email=$row["user_email"];
    $password=$row["user_password"];         
    
    
  }

  ?>       
  
  <div class="w5layouts-main">    
   <div class="updateprofile-layer">
    <h1 style="color: white;text-shadow: 1px 1px 8px black;">Update Profile</h1>
    <div class="header-main1">
     
    <div class="header-left-bottom">

      <form action="#" method="post">	

        <div class="icon1">
          <span class="fa fa-id-card-o"></span>
          Email Address :<?php echo $email; ?>                           
        </div>

        <div class="icon1">
          <span class="fa fa-user"></span>
          <input type="text" placeholder="First Name" name="fname" value="<?php echo $fname; ?> "required=""/>
        </div>	

        <div class="icon1">
          <span class="fa fa-user"></span>
          <input type="text" placeholder="Last Name" name="lname" value="<?php echo $lname; ?> "required=""/>
        </div>	
        
        <div class="bottom">
          <button class="btn" type="submit" name="updateName" >Update</button>
        </div><br>
        
      </form>	

      <form action="#" method="post">	

       <div class="icon1">
        <span class="fa fa-lock"></span>
        Current Password : <?php echo $password; ?>                           
      </div>  

      <div class="icon1">
        <span class="fa fa-lock"></span>
        <input type="password" placeholder="Enter New Password" name="password"  required>
      </div>
      
      <div class="bottom">
        <button class="btn" type="submit" name="updatePassword">Update Password</button>
      </div><br>
      
    </form>	

    
  </div>	
</div>
</div>
</div>	

<?php
if(isset($_POST['updateName']))
{



 $result = $func->update('user',array("user_fname='" . $_POST['fname'] . "'", "user_lname='" . $_POST['lname'] . "'"),"user_id='" . $myId . "'"); 
 
 if ($result === TRUE) 
 {
  ?>
  <form id="myForm" action="UpdateUserProfile.php" method="post">
    <input type="hidden" name="myId" id="myId" value="<?php echo $myId; ?>">
  </form>   
  <?php 
}
else
{
 echo "Cannot update";
}

}

if(isset($_POST['updatePassword']))
{
  
  

   $result = $func->update('user',array("user_password ='" . $_POST['password'] . "'"),"user_id ='" . $myId . "'"); 

  if ($result === TRUE) 
  {
    ?>
    <form id="myForm" action="UpdateUserProfile.php" method="post">
      <input type="hidden" name="myId" id="myId" value="<?php echo $myId; ?>">
    </form>   
    <?php        
  }
  else
  {
   echo "Cannot update";
 }      
}


?>
<script type="text/javascript">
  document.getElementById('myForm').submit();
</script>
</body>
</html>