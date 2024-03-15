<html>
    <head>
        <title>Edit Survey</title>
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

if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "Error: survey id  not supplied.<br>";
        echo '<a href="index.php">Go Back</a> ';
        $con->close();
        exit;
      }

      $survey_id = $_GET['id']; 
      $created_by = str_replace('_',' ',$_GET['created_by']);
      $created_date = $_GET['created_date'];
      $survey_description = str_replace('_',' ',$_GET['survey_description']);
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
       //echo "<p>post_survey_description is: $post_survey_description</p>";


        $query = "UPDATE survey 
              SET survey_description = '".$post_survey_description."', 
                   created_by = '".$post_created_by."',
                   created_date = '".$post_created_date."'
              WHERE id = '".$survey_id."'";


              $result = mysqli_query($con,$query);
         //echo "<p>result is $result</p>";
                
         if ($result == 1) {
          echo "<div class=\" container-md mt-5\">";
         echo "Successfully updated survey record!!!<br>";
          echo "<a href=\"index.php\">Back to Home Page</a>";
          echo "<br><hr>";
          exit;   
        }
         
   }
      echo <<<END
       <div class=" container-md mt-5">
        Editing survey with ID: <strong>$survey_id</strong><br><br>
        <form action="" method="POST">
          <table>
            <tr>
              <td>Survey Id:</td>
              <td><input type="text" name="id" readonly="readonly" value="$survey_id"></td>
            </tr>
            <tr>
              <td>Created By:</td>
              <td><input type="text" name="created_by" readonly="readonly" value="$created_by"></td>
            </tr>
            <tr>
              <td>created  Date:</td>
              <td><input type="text" name="created_date" readonly="readonly" value="$created_date"></td>
            </tr>
            <tr>
              <td>Survey Description:</td>
             <td><input type="text" name="survey_description" value="$survey_description"></td>
            </tr>
          </table>
          <br>
          <input type="submit" name="submit" value="Update">
          <input type="submit" name="submit" value="Cancel"> 
        </form>
        </div>

END;
      echo "<div class=\" container-md mt-5\">";
      echo "<a href=\"index.php\">Back to Home Page</a>";
      echo "<br><hr>";  

 // $result->free();
      
        $con->close();