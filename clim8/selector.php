<?php

    $con = mysqli_connect("localhost:4306", $user, $password, "sip");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
    
   $sql_query = "SELECT id, survey_description FROM survey";
   $idarray = [];
    // we have real data now!
    // only some of the rows will be here
    $result = mysqli_query($con, $sql_query);
    echo "<html>";
    echo "<body>";
    echo "<select name='selector' id='selector'>";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['id'];
		          $idarray = $id;
                  $name = $row['survey_description']; 
                  echo '<option value='.$id.' id="selectid"> '.$id.'   '.$name.'</option>';
		          
                  

		         

}


    echo "</select>";
    echo "</body>";
    echo "</html>";
     echo "<input type='submit' name='but_refresh' id='but_refresh' value='refresh' onclick='refresh()'>";
	 echo' <script>	

</script> ';
echo 
'<script> 
window.refresh = function(){
var xselect = $("#selector").val();
   window.location.href="dashboard.php?sid=" + xselect
}
</script>';

			
		

?> 