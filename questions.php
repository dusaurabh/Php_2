<?php require_once('Include/DB.php'); ?>
<?php require_once('Include/Functions.php'); ?>
<?php require_once('Include/Sessions.php'); ?>
<?php Confirm_Login(); ?>
<?php 
 if(isset($_POST["Submit"])){
     $Branch= mysqli_real_escape_string($con,$_POST["Branch"]);
     $Year = mysqli_real_escape_string($con,$_POST["Year"]);
     $Subject = mysqli_real_escape_string($con,$_POST["Subject"]);
     $Sem = mysqli_real_escape_string($con,$_POST["Sem"]);
     $PDF = $_FILES["PDF"]["name"];
     $Target = "Upload/question_paper/".basename($_FILES["PDF"]["name"]);
     if(empty($Branch) || empty($Year) || empty($Subject) || empty($Sem)){
         echo '<script language="javascript">';
echo 'alert("All Fields Must Be Filled")';
echo '</script>';
        
     }else{
         global $con;
         $Query = "INSERT INTO question_panel(branch,year,subject,sem,pdf) VALUES('$Branch','$Year','$Subject','$Sem','$PDF')";
         $Execute = mysqli_query($con,$Query);
         move_uploaded_file($_FILES["PDF"]["tmp_name"],$Target);
         if($Execute){
             echo '<script language="javascript">';
echo 'alert("Question Paper is SuccessFully Added")';
echo '</script>';
             
         }else{
             echo '<script language="javascript">';
echo 'alert("Something Went Wrong,Try Again")';
echo '</script>';
         }
     }
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Study Hacks</title>
  <link rel="stylesheet" href="fonts/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">

    <style>
        .col-sm-2{
    background-color:#FFA07A;
}
        #Side_Menu a{
              color: black;
            background-color: #27AAE1;
            font-weight: bold;
        }
        
        #Side_Menu a:hover{
    color: #ffffff;
    background-color: #1ab394;
    font-weight: bold;
    display: block;
    
}
        
    </style>
    
    
    
</head>
<body>
  
    
     <div style="height:10px; background:#D20A0A;"></div>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark " role="navigation">
  <div class="container">
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
      
    <div class="navbar-header">
                   <a class="navbar-brand " href="#"><h3>Study Hacks</h3></a>
    </div>
     <div class="collapse navbar-collapse" id="navbarCollapse">
     <ul class="navbar-nav">
      <li><a class="nav-link" href="index.php"><i class="fa fa-home "></i> Home </a></li>
      <li><a class="nav-link" href="about.php" >About Us</a></li>
     
      <li><a class="nav-link" href="comments.php" ><i class="fa fa-pencil "></i> Comments</a></li>
      
      
         
      <div class="dropdown" style="margin-right:20px;">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Download Section
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="download_question_papers.php">Download Question Papers</a>
    <a class="dropdown-item" href="download_study_materials.php">Download Study Materials</a>
    <a class="dropdown-item" href="#">Download Time Table</a>
  </div>
</div>
         
     </ul>
      
     
         </div>
      <div class="card">
          <div class="card-body">
            Want to Logout   <i class="fa fa-hand-o-down"> </i>
               
          </div>
          <div class="card-footer">
              <span id="admin"><i class="fa fa-sign-out"></i></span>
          <button class="btn btn-outline-warning"><a href="logout.php"> Click Here </a></button>
          </div>
             
          
      </div>
      
  </div>    
</nav>
<div style="height:10px; background:#D20A0A;"></div>
<span class="text-center">    <?php 
    echo SuccessMessage();
    echo ErrorMessage();
    
    ?>
</span>   

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <ul id="Side_Menu" class="nav nav-tabs nav-stacked ">
<li><a class="nav-link active" href="questions.php"><i class="fa fa-th "></i> &nbsp;Add Question Papers</a><br></li>
<li><a class="nav-link" href="study_materials.php"><i class="fa fa-list-alt"></i> &nbsp;Add Study Resources</a><br></li>
<li><a class="nav-link" href="time_table.php"><i class="fa fa-tags"></i> &nbsp;Add Exam Time Table</a><br> </li>
<li><a class="nav-link" href="commentsection.php"><i class="fa fa-comment"></i> &nbsp;Comments</a></li>
                
            </ul>
        </div>
        
<div class="col-sm-10">
 <h1>Add New Question Paper</h1>
  <div>
    <form action="questions.php" method="post" enctype="multipart/form-data">
      <div class="form-group ">
        <label for="Branch"><span class="FieldInfo">Branch:</span></label>
        <input class="form-control form-control-lg" type="text" name="Branch" id="Branch" placeholder="Branch">
      </div>
        
      <div class="form-group ">
        <label for="Year"><span class="FieldInfo">Year:</span></label>
        <input class="form-control form-control-lg" type="number" name="Year" id="Year" placeholder="Year">
      </div>
        
      <div class="form-group ">
        <label for="Subject"><span class="FieldInfo">Subject:</span></label>
        <input class="form-control form-control-lg" type="text" name="Subject" id="Subject" placeholder="Subject">
      </div>
        
      <div class="form-group ">
        <label for="Sem"><span class="FieldInfo">Sem:</span></label>
        <input class="form-control form-control-lg" type="number" name="Sem" id="Sem" placeholder="Sem">
      </div>
        
      <div class="form-group ">
        <label for="PDFSelect"><span class="FieldInfo">PDF:</span></label>
        <input class="form-control form-control-lg" type="file" name="PDF" id="PDFSelect" placeholder="Upload Question Paper">
      </div>
        <input  class="btn btn-success" type="submit" name="Submit" value="Add New Question Paper">
    </form>
  </div>
</div>
        
    </div>
</div>
    


    
      
        
    
    
    
    
    
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
