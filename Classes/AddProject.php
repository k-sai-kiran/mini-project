<?php
session_start(); 
   if(!isset($_SESSION['admin_id']))  
   {
    header("location:../Logout.php");    
}?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Project</title>

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
    
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <style type="text/css">
    .

    #popup {
 width: 350px;
    height: 46px;
    border-radius: 25px;
    background: #ffb;
    padding: 10px;
    border: 2px solid #999;
    position: absolute;
    top: 151px;
    left: 582px;
}
h1{
 text-shadow: 2px 2px#133443;
}

</style>


</head>
<body>
    <?php
    include("html/AdminHeader.php");  
    ?>
    
    <div class="w5layouts-main"> 
        <div class="updateprofile-layer">
            <h1 style="color: white;">Add New Project</h1>
            <div class="header-main1">
               <div class="header-left-bottom">
                      <form  method="POST">
                        <div class="icon1">
                            <span class="fa fa-user"></span>
                            <label for="exampleInputEmail1">Project Name</label>
                            <input type="text"  name="projectname" placeholder="Project Name" required>
                        </div>  

                        <div class="icon1">
                            <span class="fa fa-user"></span>
                            <label for="exampleInputPassword1">Project Description</label>
                            <textarea id="mytextarea" name ="projectdetails" ></textarea>
                        </div>  

                                        
                     
                      <div class="bottom">
                          <input  type="submit" class="btn" name="submit" id="submit" value="ADD PROJECT" />
                        </div>                      

                   </form>   
                       <div class="bottom">
                        <button class="btn" type="button" name="back"><a href="AdminHome.php" style="color: white;">Home</a></button>
                       </div><br>                  
               </div>
           </div>  
       </div>
   </div>  
    
   <?php
if(isset($_POST['submit'])) 
{  
   $function = new Operation();
   $projectName = $_POST['projectname']; 
   $projectDescription = $_POST['projectdetails'];
   $projectStatus = 1;

   echo "$projectName";

    if ($_POST['projectname']==null || $_POST['projectdetails']==null ) 
    {
     echo '<span style="color:red"> First Enter Something<br></span>';
    } 
    
    else
    {
        $result = $func->insert('project',array('project_name','project_description','project_status'),array("'$projectName'","'$projectDescription'","'$projectStatus'"));

        if ($result === TRUE)  
        {
          ?>
                
          <div id="popup">PROJECT SUCCESSFULLY ADDED</div>
          <script>history.pushState({}, "", "")</script>
          <script type="text/javascript">
            $(function() {
             $('#popup').delay(3000).fadeOut();
           });
         </script>
         <?php
       }
       else
       {
         echo "not added";
       }
    }
  
}

?>
</body>
</html>