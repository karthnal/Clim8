<?php
$host = "localhost"; /* Host name */$user = "root"; /* User */$password = ""; /* Password */$dbname = "sip"; /* Database name */
$con = mysqli_connect("localhost:4306", $user, $password, "sip");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
    
$sql ="SELECT question_id, question_text FROM `questions` WHERE survey_id = ".$surveyid." ORDER BY question_id ASC;";
$result = mysqli_query($con, $sql);
$qid;
$qtxt;

while ($row = $result->fetch_assoc()){
	$qid = $row['question_id']; 
	$qtxt = $row['question_text']; 
	if($qid == 1 )
	{
		echo'<script>
       
            document.getElementById("question1").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
	if($qid == 2)
	{
		echo'<script>
       
            document.getElementById("question2").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
		if($qid == 3 )
	{
		echo'<script>
       
            document.getElementById("question3").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
	if($qid == 4)
	{
		echo'<script>
       
            document.getElementById("question4").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
		if($qid == 5 )
	{
		echo'<script>
       
            document.getElementById("question5").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
	if($qid == 6)
	{
		echo'<script>
       
            document.getElementById("question6").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
		if($qid == 7 )
	{
		echo'<script>
       
            document.getElementById("question7").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
	if($qid == 8)
	{
		echo'<script>
       
            document.getElementById("question8").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
	if($qid == 9 )
	{
		echo'<script>
       
            document.getElementById("question9").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
	if($qid == 10)
	{
		echo'<script>
       
            document.getElementById("question10").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
		if($qid == 11 )
	{
		echo'<script>
       
            document.getElementById("question11").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
	if($qid == 12)
	{
		echo'<script>
       
            document.getElementById("question12").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
		if($qid == 13 )
	{
		echo'<script>
       
            document.getElementById("question13").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
	if($qid == 16)
	{
		echo'<script>
       
            document.getElementById("question16").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
		if($qid == 14 )
	{
		echo'<script>
       
            document.getElementById("question14").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
	if($qid == 15)
	{
		echo'<script>
       
            document.getElementById("question15").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
		if($qid == 17)
	{
		echo'<script>
       
            document.getElementById("question17").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
		if($qid == 18 )
	{
		echo'<script>
       
            document.getElementById("question18").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
	if($qid == 19)
	{
		echo'<script>
       
            document.getElementById("question19").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
		if($qid == 20 )
	{
		echo'<script>
       
            document.getElementById("question20").innerHTML
                = "'.$qtxt.'";
        
        </script>';
	}
	
}
?>