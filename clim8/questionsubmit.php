<?php
include "config.php";

$entityBody = file_get_contents('php://input');
//echo($entityBody);

$myanswers = explode(",",$entityBody);

try{

for ($i=0; $i < count($myanswers); $i++)	
{
	 $participantid = $_GET["pid"];
     $surveyid = $_GET["sid"];
	 $optionid = $myanswers[$i];
		 
	 $insert_query = "INSERT INTO responses (participant_id, survey_id, question_id, option_id) VALUES (".$participantid.", ".$surveyid.", ".($i+1).", ".$optionid.")";
	

	$result = mysqli_query($con,$insert_query);
}
	}
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}


// get each of the answer
// insert string where q1,q2,q3 -20
