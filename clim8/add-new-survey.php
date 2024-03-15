<html>
    <head>
        <title>Add Survey</title>
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

if (isset($_POST['submit'])) {
            $submit = $_POST['submit'];
            if ($submit == "Cancel") {
              $con->close();
              header('location: index.php');
              exit;
            } 

            if (!isset($_POST['created_by']) || empty($_POST['created_by'])) {
             echo "<div class=\" container-md mt-5\">";
              echo "created by field not supplied.";
              $con->close();
              exit;
            }
            if (!isset($_POST['created_date']) || empty($_POST['created_date'])) {
              echo"<div class=\" container-md mt-5\">";
              echo "created date field not supplied.";
              $con->close();
              exit;
            }
            if (!isset($_POST['survey_description']) || empty($_POST['survey_description'])) {
              echo"<div class=\" container-md mt-5\">";
              echo "survey_description field not supplied.";
              $con->close();
              exit;
            }
          


          $created_by = mysqli_real_escape_string($con,$_POST['created_by']);
          $created_date = mysqli_real_escape_string($con,$_POST['created_date']);
          $survey_description = mysqli_real_escape_string($con,$_POST['survey_description']);

          
          $insert_query = "INSERT INTO survey (created_by, created_date, survey_description) VALUES ('".$created_by."', '".$created_date."', '".$survey_description."')";
         $result = mysqli_query($con,$insert_query);
         //echo "<p>result is $result</p>";

          if ($result == 1) {
          echo "Successfully added new survey record!!!<br>";
          echo "<a href=\"index.php\">Back to Home Page</a>";
          echo "<br><hr>";
          exit;   
        }

}
else
{

          echo <<<END
                   <div class=" container-md mt-5">

                    <form action="" method="POST">
                    <table>
                      <tr>
                        <td>Created By:</td>
                        <td><input type="text" name="created_by" value=""></td>
                      </tr>
                      <tr>
                        <td>created  Date:</td>
                        <td><input type="text" name="created_date" value=""></td>
                      </tr>
                      <tr>
                        <td>Survey Description:</td>
                       <td><input type="text" name="survey_description" value=""></td>
                      </tr>
                    </table>
                    <br>
                    <input type="submit" name="submit" value="Add">
                    <input type="submit" name="submit" value="Cancel"> 
                  </form>
                  <div class=\" container-md mt-5\">
          END;

     }
     
     echo "<div class=\" container-md mt-5\"><a href=index.php>Back to Home Page</a>"; 
     
 
