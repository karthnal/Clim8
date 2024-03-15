<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clim8</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<?php
include("auth.php"); 
	if(isset($_SESSION['uname'])){
    header('Location: welcome.php');
}
	

?>

<body>

<?php 
	include("header.php");  
	?>

  <main id="main">

<!-- login  Modal HTML -->	  
	  
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="/examples/images/avatar.png" alt="Avatar">
				</div>				
				<h4 class="modal-title">Member Login</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
						<input type="text" class="form-control" id="txt_uname" name="txt_uname" placeholder="Username"  required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="txt_pwd" placeholder="Password" required="required">	
					</div>        
					<div class="form-group">
						<button type="submit" value="Submit" name="but_login" id="but_login" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                        
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#">Forgot Password?</a>
			</div>
		</div>
	</div>
</div>     
	  
<!-- login  Modal HTML -->

<!-- Register User  Modal HTML -->    

<div id="registerUser" class="modal fade">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      <div class="modal-header">  
        <h4 class="modal-title">Participant Details</h4> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post">

          <div class="form-group">
             <label> First Name: </label>
            <input type="text" class="form-control" id="fname" name="fname"  required="required">    
          </div>
             <div class="form-group">
             <label> Last Name: </label>
            <input type="text" class="form-control" id="lname" name="lname"  required="required">    
          </div>
          <div class="form-group">
            <label> Age: </label>
            <input type="text" class="form-control" id="dob" name="dob"  required="required">  
          </div>  
          <div class="form-group">
            <label> Email: </label>
            <input type="text" class="form-control" id="email" name="email"  required="required"> 	 
          </div>       
          <div class="form-group">
		   <input type="hidden" class="form-control" id="surveyid" name="surveyid"  required="required">
            <button type="submit" value="Submit" name="but_reg" id="but_reg" class="btn btn-primary btn-lg btn-block login-btn">Continue</button> 
			  
          </div>
        </form>
      </div>
    </div>
  </div>
</div> 
    
<!-- login  Modal HTML --> 

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Surveys</h2>
          <p>Contribute your opinion and have your say by participating in any of the following surveys below.</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

        <!--  <div>
            <ul class="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-product">Product</li>
              <li data-filter=".filter-branding">Branding</li>
              <li data-filter=".filter-books">Books</li>
            </ul>  End Portfolio Filters 
          </div> -->
			<div class="row gy-4 portfolio-container">
<?php
			include'populate.php';
			?>
				
				<script>
				function survey_click(surveyId)
					{
						  $("#surveyid").val(surveyId);
					}
					
				</script>
          </div><!-- End Portfolio Container -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    
  </main><!-- End #main -->

 

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

  <script> 
	  if(localStorage.getItem("thankyou") == "thank you")
		  {
			  alert("thank you for submitting");
			  window.localStorage.clear();
		  }
	  
  </script>	
	
</body>


<?php 
include("footer2.php");
	
?>

</html>