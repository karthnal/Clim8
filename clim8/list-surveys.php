<?php
include("header4.php");
?>

<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
    <body>
    

   </body>
   </html>
<?php

 $host = "localhost"; /* Host name */$user = "root"; /* User */$password = ""; /* Password */$dbname = "sip"; /* Database name */
$con = mysqli_connect("localhost:4306", $user, $password, "sip");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
     
        
     
        $select_query = "SELECT * FROM  survey";
        $result = mysqli_query($con,$select_query);
        $row = mysqli_fetch_array($result);
        $numResults = $result->num_rows;
        ?>

        <div class=" container-md mt-5">
    
                                   <table class="table align-middle mb-0 bg-white">
                                    <thead class="bg-light">
                                                <tr>
                                                    <th>Survey Id</th>
                                                    <th>Created By</th>
                                                    <th>Created Date</th>
                                                    <th>Survey Description</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            
                        <?php
                         //for ($i = 0; $i < $numResults; $i++) {
                         if ($result = $con->query($select_query)) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $created_by = $row['created_by'];
                                    $created_date = $row['created_date'];
                                    $survey_description = $row['survey_description'];
                
                        
                            echo "<tr>";
                            echo "<td valign=\"top\">$id</td>";
                            echo "<td valign=\"top\">$created_by</td>";
                            echo "<td valign=\"top\">$created_date</td>";
                            echo "<td valign=\"top\">$survey_description</td>";
                           
                            //echo "<p>created by: $created_by</p>";
                           // echo "<p>survey_description: $survey_description</p>";
                            createButtonColumn("id", $id,"created_by",str_replace(' ','_',$created_by), "created_date",$created_date,"survey_description",str_replace(' ','_',$survey_description), "Edit", "edit-survey.php");
                            createButtonColumn("id", $id,"created_by",$created_by, "created_date",$created_date,                "survey_description",$survey_description,"Delete", "delete-survey.php");
                            
                            echo "</tr>";                   
                        }
                    }

                        $result->free();
                        $con->close();

                        echo "</table>";
            
                        function createButtonColumn($hiddenid1, $hiddenValue1, $hiddenid2, $hiddenValue2, $hiddenid3, $hiddenValue3, $hiddenid4, $hiddenValue4, $buttonText, $actionPage) {
                            echo "<td>";
                            echo "<form action=$actionPage method=\"GET\">";
                            echo "<input type=\"hidden\" name=$hiddenid1 value=$hiddenValue1>"; 
                            echo "<input type=\"hidden\" name=$hiddenid2 value=$hiddenValue2>";   
                            echo "<input type=\"hidden\" name=$hiddenid3 value=$hiddenValue3>";
                            echo "<input type=\"hidden\" name=$hiddenid4 value=$hiddenValue4>";            
                            echo "<button type=\"submit\">$buttonText</button>";
                            echo "</form>";         
                            echo "</td>";
                            //echo "<p>hiddenValue2: $hiddenValue2</p>";
                        }

                         echo "<a href=\"index.php\">Back to Home Page |   </a>";
                         echo "<a href=add-new-survey.php>Add New Survey</a>"; 
                         echo "<br><hr>";                       
                    
                     ?>
                 </table>
             </div>
                
                        