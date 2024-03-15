<html>
    <head>
        <title>Edit Question</title>
        <meta charset="UTF-8"/>
        <?php 
        include("header4.php");

        ?>
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


    $question_text = str_replace('_',' ',$_GET['question_text']);
    //echo "<p>question_text : $question_text</p>";
    $survey_id = $_GET['survey_id'];
    //echo "<p>survey_id : $survey_id</p>";
    $question_id = $_GET['question_id'];
    //echo "<p>question_id : $question_id</p>";


if (isset($_POST['submit'])) {
            $submit = $_POST['submit'];
            if ($submit == "Cancel") {
              $con->close();
              header('location: index.php');
              exit;
            } 

            if (!isset($_POST['survey_id']) || empty($_POST['survey_id'])) {
              echo "survey_id field not supplied.";
              $con->close();
              exit;
            }
            
            if (!isset($_POST['question_text']) || empty($_POST['question_text'])) {
              echo "Question Text field not supplied.";
              $con->close();
              exit;
            }

            if (!isset($_POST['question_id']) || empty($_POST['question_id'])) {
              echo "Question id field not supplied.";
              $con->close();
              exit;
            }
          
          $post_survey_id = $_POST['survey_id'];
          $post_question_text = $_POST['question_text'];
          $post_question_id = $_POST['question_id'];

          $query = "UPDATE questions 
              SET question_text = '".$post_question_text."'
              WHERE survey_id = '".$post_survey_id."' and question_id = '".$post_question_id."'";

              
         $result = mysqli_query($con,$query);
         //echo "<p>result is $result</p>";

          if ($result == 1) {
          echo "<div class=\" container-md mt-5\">";
          echo "Successfully updated question text!!!<br>";
          echo "<a href=\"index.php\">Back to Home Page</a>";
          echo "<br><hr>";
          exit;   
        }

}


          echo <<<END
           <div class=" container-md mt-5">
                    <form action="" method="POST">

                      <label>Survey Id  :</label>
                      <input type="number" name="survey_id" value="$survey_id" required="required" readonly="readonly">
                      <br>
                      <br>
                      <label>Question Id  :</label>
                      <input type="number" name="question_id" value="$question_id" required="required" readonly="readonly">
                      <br>
                      <br>
                      <label>Edit question :</label>
                      <input type="text" name="question_text" value="$question_text" required="required">       
                      <br><hr>
                    <input type="submit" name="submit" value="Update">
                    <input type="submit" name="submit" value="Cancel"> 
                  </form>
            </div
          END;

     
    echo"<div class=\" container-md mt-5\">";
     echo " <a href=index.php>Back to Home Page</a>"; 
     
 
