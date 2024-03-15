<html>
    <head>
        <title>Question Management</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
   </body>
   </html>
<?php

include("header4.php");

 $host = "localhost"; /* Host name */$user = "root"; /* User */$password = ""; /* Password */$dbname = "sip"; /* Database name */
$con = mysqli_connect("localhost:4306", $user, $password, "sip");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
     
        
     
        $select_query = "SELECT * FROM  questions";
        $result = mysqli_query($con,$select_query);
        $row = mysqli_fetch_array($result);
        $numResults = $result->num_rows;
        ?>
            <div class=" container-md mt-5">
    
                                   <table class="table align-middle mb-0 bg-white">
                                    <thead>
                                                <tr>
                                                    <th>Question Id</th>
                                                    <th>Survey Id</th>
                                                    <th>Question Text</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            
                        <?php
                         //for ($i = 0; $i < $numResults; $i++) {
                         if ($result = $con->query($select_query)) {
                                while ($row = $result->fetch_assoc()) {
                                    $question_id = $row['question_id'];
                                    $survey_id = $row['survey_id'];
                                    $question_text = $row['question_text'];
                
                        
                            echo "<tr>";
                            echo "<td valign=\"top\">$question_id</td>";
                            echo "<td valign=\"top\">$survey_id</td>";
                            echo "<td valign=\"top\">$question_text</td>";
                             
                            
                            createButtonColumn("question_id", $question_id,"survey_id",$survey_id, "question_text",$question_text,"Delete", "delete-question.php");
                            createButtonColumn("question_id", $question_id,"survey_id",$survey_id, "question_text",str_replace(' ','_',$question_text),"Edit", "edit-question.php");
                            
                            echo "</tr>";                   
                        }
                    }

                        $result->free();
                        $con->close();

                        echo "</table>";
            
                        function createButtonColumn($hiddenid1, $hiddenValue1, $hiddenid2, $hiddenValue2, $hiddenid3, $hiddenValue3, $buttonText, $actionPage) {
                            echo "<td>";
                            echo "<form action=$actionPage method=\"GET\">";
                            echo "<input type=\"hidden\" name=$hiddenid1 value=$hiddenValue1>"; 
                            echo "<input type=\"hidden\" name=$hiddenid2 value=$hiddenValue2>";   
                            echo "<input type=\"hidden\" name=$hiddenid3 value=$hiddenValue3>";        
                            echo "<button type=\"submit\">$buttonText</button>";
                            echo "</form>";         
                            echo "</td>";
                            //echo "<p>hiddenValue2: $hiddenValue2</p>";
                        }

                         echo "<a href=\"index.php\">Back to Home Page|   </a>";
                         echo "<a href=add-question.php>Add New Question</a>"; 
                         echo "<br><hr>";                       
                    
                     ?>
                 </table>
             </div>
                
                        