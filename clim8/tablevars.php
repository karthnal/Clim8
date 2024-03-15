<?php

$user = "root";
$password = "";


$host = "localhost"; /* Host name /$user = "root"; / User /$password = ""; / Password /$dbname = "sip"; / Database name */
$con = mysqli_connect("localhost:4306", $user, $password, "sip");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

//echo "connected<br>\n";




function getQuestionCounts($con, $surveryId, $optionId)
{
    // make an array for this option (eg agree)
    // each item is a question [q1 count, q2 count, q3 count]
    //$questionCounts = [];
      $questionCounts = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

    // default to zero because some rows will be missing from SQL query
   // for($qId = 1; $qId <= 20; $qId++)
   // {
        // q1 is arrayIndex 0
 //       $arrayIndex = $qId - 1;
 //       $questionCounts[$arrayIndex] = 0;
  //  }

    // query
    $sql_query = "SELECT question_id, Count(*) as count FROM responses WHERE survey_id = $surveryId AND option_id = $optionId GROUP BY question_id";

    // we have real data now!
    // only some of the rows will be here
    $result = mysqli_query($con, $sql_query);
    while($row = mysqli_fetch_array($result))
    {
        $qId = $row["question_id"];
        $count = intval($row["count"]); // convert from string to int (wtf sql? why give me a string)

        //echo "qId: $qId count: $count <br>\n";

        // override the default count value (0)
        $arrayIndex = $qId - 1;
        $questionCounts[$arrayIndex] = $count;
    }

    return $questionCounts;
}

$agreeDataSet = getQuestionCounts($con, $surveyId, 1);
$disagreeDataSet = getQuestionCounts($con, $surveyId, 2);
$stronglyAgreeDataSet = getQuestionCounts($con, $surveyId, 3);
$stronglyDisagreeDataSet = getQuestionCounts($con, $surveyId, 4);
$dontKnowDataSet = getQuestionCounts($con, $surveyId, 5);

$totalagree = 0;
$totalany = 0;
/*for($i=0; $i<count($agreeDataSet); $i++ )
{
	$totalagree += $agreeDataSet[$i];
	$totalany += $agreeDataSet[$i];
}*/
?>


 <!-- bar CHART -->
 <body>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'></script>	
	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>	
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>	
 <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row">
         <!--   <div class="container-fluid d-flex justify-content-center">
                <div class="col-sm-8 col-md-6">
                    <div class="card"> -->
                        <div class="card-header">Response chart</div>
                        <div class="card-body" style="height: 420px"> 
                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
								
                            </div> <canvas id="chart-line" width="299" height="140" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
							<script>
							    $(document).ready(function() {

                                var aggreeDataset = JSON.parse('<?= json_encode($agreeDataSet) ?>');
                                var disagreeDataSet = JSON.parse('<?= json_encode($disagreeDataSet) ?>');
                                var stronglyAgreeDataSet = JSON.parse('<?= json_encode($stronglyAgreeDataSet) ?>');
                                var stronglyDisagreeDataSet = JSON.parse('<?= json_encode($stronglyDisagreeDataSet) ?>');
                                var dontKnowDataSet = JSON.parse('<?= json_encode($dontKnowDataSet) ?>');

							     var ctx = $("#chart-line");
       							 var myLineChart = new Chart(ctx, {
         						type: 'bar',
         						 data: {
         						labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7', 'Q8', 'Q9', 'Q10', 'Q11', 'Q12', 'Q13', 'Q14', 'Q15', 'Q16', 'Q17', 'Q18', 'Q19', 'Q20'],
         						datasets: [{
         						data: aggreeDataset,
         						 label: "agree",
         						 borderColor: "#458af7",
         						 backgroundColor:'#458af7',
         						fill: false
         						}, {
         						 data: disagreeDataSet,
         						label: "disagree",
         						 borderColor: "#8e5ea2",
         						fill: true,
          						 backgroundColor:'#32a852'
                    
           						}, {
         						 data: stronglyAgreeDataSet,
         						label: "Strongly Agree",
         						 borderColor: "#8e5ea2",
         						fill: true,
          						 backgroundColor:'#222cb3'
                    
           						}, {
         						 data: stronglyDisagreeDataSet,
         						label: "Strongly disagree",
         						 borderColor: "#8e5ea2",
         						fill: true,
          						 backgroundColor:'#b3226d'
                    
           						}, {
           						 data: dontKnowDataSet,
           						 label: "i dont know",
           						borderColor: "#3cba9f",
               					fill: false,
              					 backgroundColor:'#3cba9f'
                    
            					}]
          						},
          						 options: {
         						title: {
         						 display: true,
        						 text: 'Resonses to survey'
       							 }
      							 }
   							  	});
  							  });
                         </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- bar CHART -->



