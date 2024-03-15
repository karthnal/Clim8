<?php

$con = mysqli_connect("localhost:4306", $user, $password, "sip");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
    
   $sql_query = "SELECT id, survey_description FROM survey";
   $result = mysqli_query($con, $sql_query);
    while ($row = mysqli_fetch_array($result))
{
		$surid = $row["id"];
		$survdesc = $row["survey_description"];
		
	echo '

            <div class="col-xl-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <a href="assets/img/portfolio/app-1.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/portfolio/app-1.jpg" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <a href="#registerUser" title="More Details" class="trigger-btn" data-toggle="modal" id='.$surid.' onclick="survey_click('.$surid.')">'.$survdesc.'</a>
                  <p>Survey on Climate change</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

        
          ';
}
	

?>