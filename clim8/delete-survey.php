<html>
    <head>
        <title>Delete Survey</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
     <h1 style="background-color:aquamarine;">Clim8<span>.</span></h1>
     <h2 style="background-color:aquamarine;">Delete Survey<span>.</span></h2>
   </body>
   </html>

<?php

 $host = "localhost"; /* Host name */$user = "root"; /* User */$password = ""; /* Password */$dbname = "sip"; /* Database name */
$con = mysqli_connect("localhost:4306", $user, $password, "sip");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "Error: survey id  not supplied.<br>";
        echo '<a href="index.php">Go Back</a> ';
        $con->close();
        exit;
      }

      $survey_id = $_GET['id']; 
      $created_by = trim($_GET['created_by']);
      $created_date = $_GET['created_date'];
      $survey_description = trim($_GET['survey_description']);
      //** to check if we are correct key is fetched for edit   
      // echo "<p>surveyid is $survey_id</p>";  

      //echo "<p>created by: $created_by</p>";
      //echo "<p>survey_description by: $survey_description</p>";
     

      if (isset($_POST['submit'])) {
            $submit = $_POST['submit'];
            if ($submit == "Cancel") {
              $con->close();
              header('location: index.php');
              exit;
            } 

            //check fiels not set or empty
            if (!isset($_POST['created_by']) || empty($_POST['created_by'])) {
              echo "created by field not supplied.";
              $con->close();
              exit;
            }
            if (!isset($_POST['created_date']) || empty($_POST['created_date'])) {
              echo "created date field not supplied.";
              $con->close();
              exit;
            }
            if (!isset($_POST['survey_description']) || empty($_POST['survey_description'])) {
              echo "survey_description field not supplied.";
              $con->close();
              exit;
            }
          

       $post_created_by = $_POST['created_by'];
       $post_created_date = $_POST['created_date'];
       $post_survey_description = $_POST['survey_description'];
       echo "<p>post_survey_description is: $post_survey_description</p>";


        $query = "DELETE FROM survey 
              WHERE id = '".$survey_id."'";


              $result = mysqli_query($con,$query);
         echo "<p>result is $result</p>";

         if ($result == 1) {
          echo "Successfully deleted survey record!!!<br>";
          echo "<a href=\"index.php\">Back to Home Page</a>";
          echo "<br><hr>";
          exit;   
        }
         
   }
      echo <<<END
        Editing survey with ID: <strong>$survey_id</strong><br><br>
        <form action="" method="POST">
          <table>
            <tr>
              <td>Survey Id:</td>
              <td><input type="text" name="id" readonly="readonly" value="$survey_id"></td>
            </tr>
            <tr>
              <td>Created By:</td>
              <td><input type="text" name="created_by" value="$created_by"></td>
            </tr>
            <tr>
              <td>created  Date:</td>
              <td><input type="text" name="created_date" value="$created_date"></td>
            </tr>
            <tr>
              <td>Survey Description:</td>
             <td><input type="text" name="survey_description" value="$survey_description"></td>
            </tr>
          </table>
          <br>
          <input type="submit" name="submit" value="Delete">
          <input type="submit" name="submit" value="Cancel"> 
        </form>

END;

        echo "<a href=\"index.php\">Back to Home Page</a>";
        echo "<br><hr>";   

 // $result->free();
      
        $con->close();