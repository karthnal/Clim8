<?php
include ("config.php");

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
  header('Location: index.php');
}
?>

<!doctype html>
<head>
 
<link rel="stylesheet" href="assets/css/login modal.css"> 
<link rel="stylesheet" href="assets/css/login.css">
<?php 
include ("header2.php")
?>

</head>


    <body>

         <div class=" container-md mt-5">   
        <div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div type ="button" class="card">
     <img src="survey_management.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5> <a href="list-surveys.php" class="card-title">Survey Management</a></h5>
        <p class="card-text">Manage the list of created surveys with the ability of create, edit and delete operations.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div type ="button" class="card">
     <img src="question.jpg" class="card-img-top" alt="..."> 
      <div class="card-body">
        <h5> <a href="question-management.php" class="card-title">Question Management</a></h5>
        <p class="card-text">Create New questions to listed in surveys or edit previosuly cretaed ones.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div type ="button" class="card">
     <img src="paticipants.jpg" class="card-img-top" alt="..."> 
      <div class="card-body">
        <h5> <a href="list-participants.php" class="card-title">Participant List</a></h5>
        <p class="card-text">View a list of respondants that have previousy participated in some of the current surveys.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div type ="button" class="card">
     <img src="analysis.jpg" class="card-img-top" alt="image"> 
      <div class="card-body">
        <h5> <a href="dashboard.php?sid=1" class="card-title">Dashboard</a></h5>
        <p class="card-text">Create analysis reports and view a summary of comparisons from the participants in different surveys.</p>
      </div>
    </div>
  </div>
  <div>
</div>
</div>
</div>
<?php 
include("footer2.php");
?>
</body>


  <!-- end of cards -->

</html>



