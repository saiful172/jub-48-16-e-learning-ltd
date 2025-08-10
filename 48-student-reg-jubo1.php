<?php
require_once 'include/conn48.php';
require_once 'include/dbconfig48.php';

if (isset($_POST['btnsave'])) {
  $Name = $_POST['Name'];
  $Phone = $_POST['Phone'];
  $Email = $_POST['Email'];
  $DivId = $_POST['DivId'];
  $DistId = $_POST['DistId'];
  $Address = $_POST['Address'];
  $Edu = $_POST['Edu'];
  $LastEdu = $_POST['LastEdu'];
  $Year = $_POST['Year'];
  $Age = $_POST['Age'];
  $Computer = $_POST['Computer'];
  $PC = $_POST['PC'];
  $Time = $_POST['Time'];

  $Date = $_POST['Date'];

  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];


  if (empty($Name)) {
    $errMSG = "Please Enter Your Name.";
  } else if (empty($Phone)) {
    $errMSG = "Please Enter Phone Number.";
  }

  if (isset($_POST['Phone']) && $_POST['Email'] != '') {
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $checkQuery = mysqli_query($con, "SELECT * FROM `student_reg_jubo` WHERE `phone`='$Phone' and `email`='$Email' ");
    if (mysqli_num_rows($checkQuery) > 0) {
      $errMSG = "You Already Registered ! Don't Try Again";
    } else {
      $upload_dir = '48-jubo-student/'; // upload directory

      $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'docx', 'pdf'); // valid extensions

      // rename uploading image
      //$userpic = rand(1000,1000000).".".$imgExt;
      $userpic = "jubo-" . $imgFile;

      // allow valid image file formats
      if (in_array($imgExt, $valid_extensions)) {
        // Check file size '5MB'
        if ($imgSize < 5000000) {
          move_uploaded_file($tmp_dir, $upload_dir . $userpic);
        } else {
          $errMSG = "Sorry, your file is too large.";
        }
      }
    }

    if (!isset($errMSG)) {
      $stmt = $DB_con->prepare('INSERT INTO student_reg_jubo (user_id,student_name,phone,email,div_id,district,address,education,last_edu,pass_year,age,computer,pc,time,userPic,entry_date) 
															VALUES(131,:Name,:Phone,:Email,:DivId,:DistId,:Address,:Edu,:LastEdu,:Year,:Age,:Computer,:PC,:Time,:upic,:Date)');


      $stmt->bindParam(':Name', $Name);
      $stmt->bindParam(':Email', $Email);
      $stmt->bindParam(':Phone', $Phone);
      $stmt->bindParam(':DivId', $DivId);
      $stmt->bindParam(':DistId', $DistId);
      $stmt->bindParam(':Address', $Address);
      $stmt->bindParam(':Edu', $Edu);
      $stmt->bindParam(':LastEdu', $LastEdu);
      $stmt->bindParam(':Year', $Year);
      $stmt->bindParam(':Age', $Age);
      $stmt->bindParam(':Computer', $Computer);
      $stmt->bindParam(':PC', $PC);
      $stmt->bindParam(':Time', $Time);

      $stmt->bindParam(':Date', $Date);

      $stmt->bindParam(':upic', $userpic);

      if ($stmt->execute()) {
?>
        <script>
          alert('Apply Successful');
          window.location.href = '48-student-reg-jubo';
        </script>
<?php
      } else {
        $errMSG = "error while inserting....";
      }
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Learning & Earning LTD</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <?php include('link.php'); ?>

  <style type="text/css">
    .off_on {
      display: none;
    }
  </style>

</head>

<body>

  <?php include('header-apply.php'); ?>

  <main id="main">

    <?php include('breadcrumb.php'); ?>



    <section id="contact" class="contact mt-5 ">
      <div class="container">
        <div class="col-lg-12 mt-5" data-aos="fade-left">
          <div class="shadow p-3 rounded">
            <br>




            <p class="text-center">
              <img src="assets/img/jubo-logo-n.png" width="60px" class="rounded"> <br>
              যুব ও ক্রীড়া মন্ত্রণালয়াধীন যুব উন্নয়ন অধিদপ্তর কর্তৃক বাস্তবায়নাধীন <br>
              “দেশের ৪৮ জেলায় শিক্ষিত কর্মপ্রত্যাশী যুবদের ফ্রিল্যান্সিং প্রশিক্ষণের মাধ্যমে কর্মসংস্থান সৃষ্টি” শীর্ষক প্রকল্পের আওতায় ফ্রিল্যান্সিং-এর মাধ্যমে দক্ষ জনশক্তি তৈরি করে আত্মকর্মসংস্থানের মাধ্যমে বেকারত্ব দূরীকরণ ও উদ্যোক্তা তৈরীর লক্ষ্যে দেশের ৮টি বিভাগের ৪৮ টি জেলায় যুব ও যুব মহিলাদের ফ্রিল্যান্সিং প্রশিক্ষণ কার্যক্রম পরিচালিত হচ্ছে।
            </p>
            <p>
              <br><br>
              <b> যোগ্যতাঃ </b><br>
              কমপক্ষে এইচএসসি বা সমমান পাশ এবং প্রশিক্ষণার্থীদের বয়স ১৮ থেকে ৩৫ বছর।<br><br>

              <b>প্রশিক্ষণ ভাতাঃ</b><br>
              প্রশিক্ষণ শেষে প্রশিক্ষণার্থীদের দৈনিক ২০০.০০ টাকা হারে ভাতা প্রদান করা হবে। <br><br>

              <b>ক্লাসের সময়কালঃ</b>
              ৩ মাস মেয়াদি সপ্তাহে ৬ দিনেই প্রতিদিন ৮ ঘন্টা করে ক্লাস করতে হবে। মোটঃ ৭৫ টি ক্লাসে ৬০০ ঘন্টা<br>
              কোর্সটি সম্পূর্ণ অফলাইন বা ফিজিক্যাল ক্লাসের মাধ্যমে সম্পন্ন হবে।<br><br>

              <b>এই প্রকল্পটি পরিচালনা করছে দেশের স্বনামধন্য আইটি প্রতিষ্ঠান ‘ই-লার্নিং অ্যান্ড আর্নিং লিমিটেড’। </b>
            </p>
            <br>

            <hr>


            <center>
              <h5> শুধুমাত্র উল্লেখিত এই ৪৮-টি জেলার আবেদন গ্রহন করা হবে </h5>
            </center>
            <hr>
            <h6 class="card-title " style="line-height:1.7">
              <b> ঢাকা বিভাগঃ </b> নারায়ণগঞ্জ, মানিকগঞ্জ, নরসিংদী, মুন্সিগঞ্জ, কিশোরগঞ্জ, টাঙ্গাইল, ফরিদপুর <br>
              <b> ময়মনসিংহ বিভাগঃ </b> ময়মনসিংহ, জামালপুর, নেত্রকোনা <br>
              <b> চট্টগ্রাম বিভাগঃ </b> চট্টগ্রাম, কক্সবাজার, বান্দরবান, খাগড়াছড়ি, রাঙ্গামাটি, নোয়াখালী, ফেনী, ব্রাহ্মণবাড়ীয়া <br>
              <b> রাজশাহী বিভাগঃ </b> চাঁপাইনবাবগঞ্জ, নওগাঁ, নাটোর, বগুড়া, জয়পুরহাট, পাবনা, সিরাজগঞ্জ <br>
              <b> খুলনা বিভাগঃ </b> খুলনা, সাতক্ষীরা, বাগেরহাট, যশোর, ঝিনাইদহ, মাগুরা, চুয়াডাঙ্গা, মেহেরপুর, কুষ্টিয়া <br>
              <b> রংপুর বিভাগঃ </b> রংপুর, কুড়িগ্রাম, লালমনিরহাট, গাইবান্ধা, নীলফামারী, দিনাজপুর, পঞ্চগড় <br>
              <b> বরিশাল বিভাগঃ </b> বরিশাল, ঝালকাঠি, পিরোজপুর, পটুয়াখালী, বরগুনা <br>
              <b> সিলেট বিভাগঃ </b> হবিগঞ্জ ও মৌলভীবাজার <br>
            </h6>





          </div>


          <?php
          if (isset($errMSG)) {
          ?>
            <div class="alert alert-danger">
              <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
          <?php
          } else if (isset($successMSG)) {
          ?>
            <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
            </div>
          <?php
          }
          ?>
        </div>

        <!-- 		  
<div class="col-lg-12 mt-2" data-aos="fade-left">	
 
		<div class="shadow p-3 rounded"> 
		<p class="mb-2 text-danger text-center">		
		<strong>
		৪র্থ ব্যাচের ভর্তি চলছে... <br>
		শিক্ষাগত যোগ্যতা সর্বোনিম্ন  HSC পাস হতে হবে  এবং  বয়সসীমা সর্বোচ্চ   ৩৫ বছর   <br>
		৪র্থ ব্যাচের আবেদনের সময়সীমা  ১৪-ডিসেম্বর ২০২৩ পর্যন্ত || ক্লাস শুরু ০১-জানুয়ারি-২০২৪ থেকে
		</strong>  
		
		</p>
		
		<h5><marquee><strong><br> লিখিত ও মৌখিক / ভাইভা পরিক্ষার তারিখ : ১৯-ডিসেম্বর ২০২৩, সময় ও স্থান, মেসেজের মাধ্যমে জানানো হবে। </strong></marquee> </h5>
		<h5><marquee><strong><br> লিখিত ও মৌখিক / ভাইভা পরিক্ষার তারিখ, সময় ও স্থান, মেসেজের মাধ্যমে জানানো হবে। </strong></marquee> </h5>
		   </div> 
		 

</div>
  -->



        <div class="col-lg-12 mt-3">
          <div class="shadow p-3 rounded">
            <center>
              <h5 class=""><strong><br>

                  <img src="assets/img/laptop-apply.png" width="100px"> <br>

                  <?php
                  date_default_timezone_set("Asia/Dhaka");
                  $date_start = "2025-04-03";
                  $date_end = "2025-03-20";
                  $date = date("Y-m-d");
                  //$date = "2024-12-25"; 
                  if ($date_end < $date) $off = "d-none";
                  if ($date_end >= $date) $on = "d-none";
                  else  $on = "d-none1";
                  ?>


                  <span class="text-danger <?php echo $on;  ?>" style="line-height: 32px;">

                    <span style="font-size: 17px;">
                      ২য় ব্যাচে ভর্তির সময়সীমা শেষ !!
                      <hr>
                      পরবর্তী ব্যাচে ভর্তি বিজ্ঞপ্তি শীঘ্রই প্রকাশ করা হবে । সাথেই থাকুন, ধন্যবাদ। <br>

                      <!--		লিখিত  পরিক্ষার তারিখ : ২৮-ডিসেম্বর ২০২৪, সময় ও স্থান, মেসেজের মাধ্যমে জানানো হ বে। --->
                    </span>

                  </span>


                  <span class="text-danger <?php echo $off;  ?>" style="line-height: 32px;">
                    <span style="font-size: 17px;">
                      ২য় ব্যাচে ভর্তির জন্য রেজিষ্ট্রেশন চলছে, রেজিষ্ট্রেশন চলবে আগামী ২০ - মার্চ - ২০২৫ পর্যন্ত ।
                      <br>
                      শিক্ষাগত যোগ্যতা সর্বোনিম্ন HSC পাস হতে হবে এবং বয়সসীমা সর্বোচ্চ ৩৫ বছর
                      <br>
                      লিখিত পরিক্ষার তারিখ : ২৩ - মার্চ - ২০২৫, সময় ও স্থান, মেসেজের মাধ্যমে জানানো হবে।
                    </span>

                  </span>

                </strong>
            </center>
            </h5>
            <br>


            <center class="<?php echo $off;  ?>">
              <h3> আবেদন ফর্ম </h3>
            </center>
            <hr>



            <form class="<?php echo $off;  ?>" method="post" enctype="multipart/form-data">

              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Name" id="Name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="Email" id="Email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required />
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Phone" id="Phone" placeholder="Your Phone Number" required />
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Address" id="Address" placeholder="Your Full Address As Per Nid Card" required />
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group">
                  <?php
                  $query = $con->query("SELECT * FROM division  ORDER BY div_id ASC");
                  $rowCount = $query->num_rows;
                  ?>
                  <select id="DivId" name="DivId" class="form-control" required>
                    <option value="">Select Division</option>
                    <?php
                    if ($rowCount > 0) {
                      while ($row = $query->fetch_assoc()) {
                        echo '<option value="' . $row['div_id'] . '">' . $row['div_name'] . '</option>';
                      }
                    } else {
                      echo '<option value="">Division Not Available</option>';
                    }
                    ?>
                  </select>
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group">

                  <select style="width:100%;" class="form-control" Id="DistId" name="DistId" required>
                    <option value="">District</option>

                  </select>
                  <div class="validate"></div>
                </div>



                <div class="col-md-6 form-group">
                  <select id="Edu" name="Edu" class="form-control" required>
                    <option value="" required>Select Education Qualification</option>
                    <option value="HSC">HSC or Equivalent</option>
                    <option value="Diploma">Diploma </option>
                    <option value="Degree">Degree Pass</option>
                    <option value="Degree">Honours</option>
                    <option value="Other">Other</option>
                  </select>
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="LastEdu" id="LastEdu" placeholder="Last Education Qualification And GPA" required>
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="Year" id="Year" placeholder="Passing Year" required>
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group">
                  <input type="number" class="form-control" name="Age" id="Age" placeholder="Your Age" required>
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group">
                  <select id="Computer" name="Computer" class="form-control" required>
                    <option value="" required>Computer Literacy</option>
                    <option value="Basic">Basic</option>
                    <option value="Medium">Medium </option>
                    <option value="Expert">Expert</option>
                  </select>
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group">
                  <select id="PC" name="PC" class="form-control" required>
                    <option value="" required> আপনার কি পার্সোনাল কম্পিউটার / ল্যাপটপ আছে ..?</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No </option>
                  </select>
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group">
                  <select id="Time" name="Time" class="form-control" required>
                    <option value="" required> ৩ মাসব্যাপি সপ্তাহে ৬ দিনেই প্রতিদিন ৮ ঘন্টা করে ক্লাস করতে পারবেন..?</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No </option>
                  </select>
                  <div class="validate"></div>
                </div>


              </div>


              <div class="form-group" style="display:none;">
                <input type="text" name="Date" class="form-control" value="<?php date_default_timezone_set("Asia/Dhaka");
                                                                            echo date("Y/m/d"); ?>" />
              </div>

              <div class="form-group">
                <label for="">Please Upload Your Passport Size(300px X 320px) Image Here : </label>
                <input type="file" name="user_image">
                <div class="validate"></div>
              </div>



              <div class="text-center"><button class="btn-get-started" name="btnsave" type="submit">Apply</button></div>

            </form>
          </div>
        </div>


        <div class="row mt-5 justify-content-center" data-aos="fade-up">



        </div>
        <hr>

        <div class="apply-social d-none">
          <center>
            <a target="_blank" href="https://www.facebook.com/elaeltd.dhaka/" class="facebook"><i class="bx bxl-facebook"></i>Dhaka</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Bhola/" class="facebook"><i class="bx bxl-facebook"></i>Bhola</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Narail/" class="facebook"><i class="bx bxl-facebook"></i>Norail</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Sherpur/" class="facebook"><i class="bx bxl-facebook"></i>Sherpur</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Rajshahi/" class="facebook"><i class="bx bxl-facebook"></i>Rajshahi</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Sylhet1/" class="facebook"><i class="bx bxl-facebook"></i>Sylhet</a>
            <br>
            <a target="_blank" href="https://www.facebook.com/elaeltd.Thakurgaon/" class="facebook"><i class="bx bxl-facebook"></i>Thakurgaon</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Madaripur/" class="facebook"><i class="bx bxl-facebook"></i>Madaripur</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Sunamganj/" class="facebook"><i class="bx bxl-facebook"></i>Sunamgonj</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Comilla/" class="facebook"><i class="bx bxl-facebook"></i>Comilla</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Gopalganj/" class="facebook"><i class="bx bxl-facebook"></i>Gopalgonj</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Shariatpur/" class="facebook"><i class="bx bxl-facebook"></i>Shariatpur</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Rajbari/" class="facebook"><i class="bx bxl-facebook"></i>Rajbari</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Lakshmipur/" class="facebook"><i class="bx bxl-facebook"></i>Lakshmipur</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Gazipur/" class="facebook"><i class="bx bxl-facebook"></i>Gazipur</a>

            <a target="_blank" href="https://www.facebook.com/elaeltd.Chandpur/" class="facebook"><i class="bx bxl-facebook"></i>Chadpur</a>
          </center>
        </div>

      </div>

    </section>




  </main>


  <?php include('footer.php'); ?>



  <script type="text/javascript">
    $(document).ready(function() {
      $('#DivId').on('change', function() {
        var countryID = $(this).val();
        if (countryID) {
          $.ajax({
            type: 'POST',
            url: 'ajaxDataDist.php',
            data: 'DivId=' + countryID,
            success: function(html) {
              $('#DistId').html(html);
            }
          });
        } else {
          $('#DistId').html('<option value="">Select Division First</option>');
        }
      });


    });
  </script>