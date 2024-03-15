<?php
if(isset($_POST['but_reg'])){

$firstname = mysqli_real_escape_string($con,$_POST['fname']);
$lastname = mysqli_real_escape_string($con,$_POST['lname']);
$age = mysqli_real_escape_string($con,$_POST['dob']);
$email= mysqli_real_escape_string($con,$_POST['email']);
$survid = ($_POST['surveyid']);
		

          
     $insert_query = "INSERT INTO participant (firstname, lastname, age, email) VALUES ('".$firstname."', '".$lastname."', '".$age."', '".$email."')";
    $result = mysqli_query($con,$insert_query);
    echo "<p>result is $result</p>";

	$last_id = mysqli_insert_id($con);
	$newid = $last_id;
	header("Location: questionnaire.php?pid=$newid&sid=$survid"); 
	//var_dump($_POST);
	
}
 