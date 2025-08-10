<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Learning & Earning LTD</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <?php include('link.php'); ?>
 
</head>

<body>

  <!-- ======= Header ======= -->
<?php include('header.php'); ?>
  
  <!-- End Header -->

  <main id="main">
  <?php include('breadcrumb.php'); ?> 

    <section id="contact" class="contact">
      <div class="container"><br><br><br>
      <center> <h2> Admission Form </h2> </center><hr>
       
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            <form action="#" method="post" role="form" class="php-email-form">
              
			  
			  <div class="form-row">
			  
			    <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Stu_Name" id="Stu_Name" placeholder="Student Name" data-rule="minlen:4" data-msg="Please Enter Your Name" />
                  <div class="validate"></div>
                </div>
			  
			    <div class="col-md-6 form-group">
                  <input type="text"  class="form-control" name="Phone" id="Phone" placeholder="Your Phone Number" data-rule="minlen:4" data-msg="Please Enter Your Phone Number" />
                  <div class="validate"></div>
                </div>
				
				<div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Occup"  id="Occup" placeholder="Occupation" data-rule="minlen:4" data-msg="Please Enter Your Occupation" />
                  <div class="validate"></div>
                </div>
				
				<div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Desig"  id="Desig" placeholder="Designation" data-rule="minlen:4" data-msg="Please Enter Your Designation" />
                  <div class="validate"></div>
                </div>
				
				<div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Office"  id="Office" placeholder=" Name Of Institute/Organization" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
				
				<div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Birth"  id="Birth" placeholder="Date Of Birth" data-rule="minlen:4" data-msg="Please Enter Your Date Of Birth " />
                  <div class="validate"></div>
                </div>
				
				<div class="col-md-6 form-group">
	             <select id="Nation" name="Nation" class="form-control">
                <option value="#">Nationality</option>
                <option value="Bangladeshi">Bangladeshi</option>
                <option value="Other Country">Other Country</option>
                 </select>
                <div class="validate"></div>
                </div>
				
				<div class="col-md-3 form-group">
	             <select id="Nation" name="Nation" class="form-control">
                <option value="#">Blod Group</option>
                <option value="O+">O+</option> <option value="O-">O-</option>
                <option value="A+">A+</option> <option value="A-">A-</option>
                <option value="B+">B+</option> <option value="B-">B-</option>   
				<option value="AB+">AB+</option>  <option value="AB-">AB-</option> 
                 </select>
                <div class="validate"></div>
                </div>
				
				<div class="col-md-3 form-group">
	             <select id="Gender" name="Gender" class="form-control">
                <option value="#">Gender</option>
                <option value="Male">Male</option> <option value="Female">Female</option> 
                 </select>
                <div class="validate"></div>
                </div>
				
				<div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Nid"  id="Nid" placeholder="Nid/Passport No" data-rule="minlen:4" data-msg="Please Enter Your Nid/Passport No" />
                  <div class="validate"></div>
                </div> 
				
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="Email" id="Email" placeholder="Your Email" data-rule="email" data-msg="Please Enter A Valid Email" />
                  <div class="validate"></div>
                </div>
				
                <div class="col-md-4 form-group">
                  <input type="text"  class="form-control" name="Father" id="Father" placeholder="Father's Name" data-rule="minlen:4" data-msg="Please Enter Your Father Name " />
                  <div class="validate"></div>
                </div>
				
				<div class="col-md-4 form-group">
                  <input type="text"  class="form-control" name="Focup" id="Focup" placeholder="Father Occuption" data-rule="minlen:4" data-msg="Please Enter Your Father Occuption " />
                  <div class="validate"></div>
                </div>
				
				<div class="col-md-4 form-group">
                  <input type="text"  class="form-control" name="Faphon" id="Faphon" placeholder="Father Phone No" data-rule="minlen:4" data-msg="Please Enter Your Father Phone No " />
                  <div class="validate"></div>
                </div>
				
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="Mother" id="Mother" placeholder="Mother's Name" data-rule="minlen:4" data-msg="Please Enter Your Mother Name " />
                  <div class="validate"></div>
                </div>
				
				<div class="col-md-6 form-group">
                  <input type="text"  class="form-control" name="Mocup" id="Mocup" placeholder="Mother Occuption" data-rule="minlen:4" data-msg="Please Enter Your Mother Occuption " />
                  <div class="validate"></div>
                </div>
				
              </div>
			  
              <div class="form-group">
                <input type="text" class="form-control" name="Pre_Address" id="Pre_Address" placeholder="Present Address" data-rule="minlen:4" data-msg="Please Enter Your Present Address" />
                <div class="validate"></div>
              </div>
			  
			   <div class="form-group">
                <input type="text" class="form-control" name="Parm_Address" id="Parm_Address" placeholder="Parmanent Address" data-rule="minlen:4" data-msg="Please Enter Your Parmanent Address" />
                <div class="validate"></div>
              </div>
			  
			  <div class="form-group">
                <input type="text" class="form-control" name="Alt_Contact" id="Alt_Contact" placeholder="Alternative Contact Info" data-rule="minlen:4" data-msg="Please Enter Your Parmanent Address" />
                <div class="validate"></div>
              </div>
			  
			  <div class="form-group">
	             <select id="Course" name="Course" class="form-control">
                <option value="#">Select Course</option>
                <option value="Application & Hardware">Application & Hardware</option> 
				<option value="Website Design & Media Animation">Website Design & Media Animation</option> 
				<option value="Server & Network Administration">Server & Network Administration</option> 
				<option value="Database Administration">Database Administration</option> 
				<option value="Cisco Certification">Cisco Certification</option> 
				<option value="Female"> </option> 
                 </select>
                <div class="validate"></div>
                </div>
			    
			  
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
			  
              <div class="text-center"><button type="submit">Submit</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    <?php include('footer.php'); ?>
  <!-- End Footer -->
   
   
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>