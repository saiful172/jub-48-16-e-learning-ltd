<?php
require_once 'include/conn.php';
require_once 'include/dbconfig.php';
 
if (isset($_POST['btnsave'])) {
        $numbers = $_POST['Phone'];
        $message = 'Hello';
		
  $Name = $_POST['Name'];
  $Phone = $_POST['Phone'];
  $Email = $_POST['Email'];
  $District = $_POST['District'];
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
      $upload_dir = 'profile/admin/circular/jubo-student-image/'; // upload directory

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
      $stmt = $DB_con->prepare('INSERT INTO student_reg_jubo (user_id,student_name,phone,email,district,address,education,last_edu,pass_year,age,computer,pc,time,userPic,entry_date) 
															VALUES(131,:Name,:Phone,:Email,:District,:Address,:Edu,:LastEdu,:Year,:Age,:Computer,:PC,:Time,:upic,:Date)');


      $stmt->bindParam(':Name', $Name);
      $stmt->bindParam(':Email', $Email);
      $stmt->bindParam(':Phone', $Phone);
      $stmt->bindParam(':District', $District);
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
	  
	  $successMSG = "Apply Successful...";
?>
        <script>
        //  alert('Apply Successful');
         // window.location.href = 'apply-pdf.php';
        </script>
<?php
      } else {
        $errMSG = "error while inserting....";
      }
    }
  }
  
}

?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numbers = $_POST['Phone'];
        $message = $_POST['Name'];
        $message1 = $message.', https://e-laeltd.com/'.$numbers.' ';
		

        $response = sms_send($numbers, $message1);
/*
        if ($response) {
            echo "<script>alert('SMS Sent Successfully: $response');</script>";
        } else {
            echo "<script>alert('Failed to send SMS. Check API response.');</script>";
        } */
    }

    function sms_send($numbers, $message1)
    {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "39NQ0BvE75s4eb083xPT";
        $senderid = "8809617623518";

        // Remove spaces and split into an array
        $numberArray = array_map('trim', explode(',', $numbers));


        // Convert valid numbers back to a comma-separated string
        $validNumbers = implode(',', $numberArray);

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $validNumbers,
            "message" => $message1
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $response = 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);
        return $response;
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
   

          <?php
          if (isset($errMSG)) {
          ?>
            <div class="alert alert-danger">
              <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
          <?php
          } else if (isset($successMSG)) {
          ?>
            <div class="alert alert-success p-2">
         <strong><span class="bi bi-check2-square"></span> <?php echo $successMSG; ?>
			  <a  target="_blank" class="btn btn-primary" style="float:right;" href="apply-pdf?view=<?php echo $Phone; ?>" title="Click For Print" ><span class="bi bi-printer"></span> Print</a> 
	       <br><span class="bi bi-check2-square"></span> <?php echo $Name; ?>
	</strong>
        </div>
          <?php
          }
          ?>
        </div>

               
      </div>

    </section>




  </main>

  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>
  <!-- End Footer -->