<?php


$sql ="SELECT question_id, COUNT(*) AS resp FROM `responses` WHERE question_id = 1 AND survey_id = ".$surveyId.";";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$responses = $row['resp']; 




//$sql = "SELECT 100*( SELECT COUNT(*) AS resp FROM `responses` WHERE question_id = 1 AND survey_id = ".$surveyId." ) / ( SELECT COUNT(*)AS resp FROM `responses` WHERE option_id = 1 OR option_id = 3 AND survey_id =".$surveyId." ) AS percent;";
$sql ="SELECT option_id, COUNT(*) AS resp FROM `responses` WHERE (option_id = 1 OR option_id = 3)  AND survey_id = ".$surveyId.";";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$agree = $row['resp'];
 
$sql ="SELECT option_id, COUNT(*) AS resp FROM `responses` WHERE (option_id = 2 OR option_id = 4)  AND survey_id = ".$surveyId.";";
//$sql = "SELECT 100*( SELECT COUNT(*) AS resp FROM `responses` WHERE question_id = 1 AND survey_id = ".$surveyId." ) / ( SELECT COUNT(*)AS resp FROM `responses` WHERE option_id = 2 OR option_id = 4 AND survey_id =".$surveyId." ) AS percent;";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$disagree = $row['resp'];
 

$sql ="SELECT option_id, COUNT(*) AS resp FROM `responses` WHERE option_id = 5  AND survey_id = ".$surveyId.";";
//$sql = "SELECT 100*( SELECT COUNT(*) AS resp FROM `responses` WHERE question_id = 1 AND survey_id = ".$surveyId." ) / ( SELECT COUNT(*)AS resp FROM `responses` WHERE option_id = 5 AND survey_id =".$surveyId." ) AS percent;";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$idk = $row['resp'];
 

try{
	$sql ="SELECT COUNT(*) AS resp FROM `responses` where survey_id = ".$surveyId.";";
	
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$responses1 = $row['resp']; 
	if ($responses1 > 0){
		$PAGREE = ($agree /$responses1) * 100;
		$PDISAGREE = ($disagree / $responses1) * 100;
		$PIDK = ($idk / $responses1) * 100 ;
	}
	else
	{
		$PAGREE = 0;
		$PDISAGREE = 0;
		$PIDK = 0 ;

	}
	}

catch(DivisionByZeroError $e){
	echo" error: $e";
}

	
?>