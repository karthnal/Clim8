<html>
    <head>
        <?php 
include("header4.php");
        ?>
        <title>Delete Question</title>
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

if (!isset($_GET['question_id']) || empty($_GET['question_id'])) {
        echo "Error: question id  not supplied.<br>";
        echo '<a href="index.php">Go Back</a> ';
        $con->close();
        exit;
      }

if (!isset($_GET['survey_id']) || empty($_GET['survey_id'])) {
        echo "Error: survey id  not supplied.<br>";
        echo '<a href="index.php">Go Back</a> ';
        $con->close();
        exit;
      }

      $question_id = $_GET['question_id']; 
      $survey_id = trim($_GET['survey_id']);
      
      //** to check if we are correct key is fetched for edit   
      // echo "<p>surveyid is $survey_id</p>";  

      //echo "<p>created by: $created_by</p>";
      //echo "<p>survey_description by: $survey_description</p>";

        $query = "DELETE FROM questions 
              WHERE question_id = '".$question_id."' AND survey_id = '".$survey_id."'";


              $result = mysqli_query($con,$query);
         echo "<p>result is $result</p>";

         if ($result == 1) {
          echo "<a href=\"delete.php\"></a>";
          echo "Successfully deleted a question!!!<br>";
          echo "<a href=\"index.php\">Back to Home Page</a>";
          echo "<br><hr>";
          exit;   
        $con->close();
      }