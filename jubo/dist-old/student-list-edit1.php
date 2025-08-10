<?php require_once 'header.php'; ?>
<?php


if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
  $student_id = $_GET['edit_id'];
  $stmt_edit = $DB_con->prepare('SELECT * FROM student_list WHERE student_id =:uid');
  $stmt_edit->execute(array(':uid' => $student_id));
  $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
  extract($edit_row);
} else {
  header("Location: index.php");
}



if (isset($_POST['btn_save_updates'])) {
  $StuName = $_POST['StuName'];
  $Group = $_POST['Group'];
  $About = $_POST['About'];
  $Work = $_POST['Work'];
  $Gender = $_POST['Gender'];
  $FatherName = $_POST['FatherName'];
  $MotherName = $_POST['MotherName'];
  $Dob = $_POST['Dob'];
  $Age = $_POST['Age'];

  $Contact = $_POST['Contact'];
  $Email = $_POST['Email'];
  $NidNo = $_POST['NidNo'];

  $BloodGrp = $_POST['BloodGrp'];
  $Computer = $_POST['Computer'];
  $Profession = $_POST['Profession'];

  $Religion = $_POST['Religion'];
  $Disabilities = $_POST['Disabilities'];
  $Address = $_POST['Address'];
  $PermaAddress = $_POST['PermaAddress'];

  $EduQual = $_POST['EduQual'];
  $PassYear = $_POST['PassYear'];

  $Linkedin = $_POST['Linkedin'];
  $Upwork = $_POST['Upwork'];
  $Fiverr = $_POST['Fiverr'];
  $LinkThree = $_POST['LinkThree'];
  $LinkFour = $_POST['LinkFour'];



  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];

  if ($imgFile) {
    $upload_dir = 'user_images/'; // upload directory	
    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    $userpic = rand(1000, 1000000) . "." . $imgExt;
    if (in_array($imgExt, $valid_extensions)) {
      if ($imgSize < 5000000) {
        //	unlink($upload_dir.$edit_row['userPic']);
        move_uploaded_file($tmp_dir, $upload_dir . $userpic);
      } else {
        $errMSG = "Sorry, your file is too large it should be less then 5MB";
      }
    } else {
      $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
  } else {
    // if no image selected the old image remain as it is.
    $userpic = $edit_row['userPic']; // old image from database
  }


  // if no error occured, continue ....
  if (!isset($errMSG)) {
    $stmt = $DB_con->prepare('UPDATE student_list 
									     SET 
										      group_id=:Group,
										      stu_name=:StuName,
										      about=:About,
											  work=:Work, 
											  gender=:Gender, 
											  father_name=:FatherName, 
											  mother_name=:MotherName, 
											  birth_date=:Dob, 
											  age=:Age,
											  
											  contact=:Contact, 
											  email=:Email, 
											  nid_no=:NidNo, 
											  
											  blood_grp=:BloodGrp, 
											  computer=:Computer, 
											  profession=:Profession, 
											  
											  religion=:Religion, 
											  disabilities=:Disabilities, 
											  address=:Address, 
											  perma_address=:PermaAddress,
											  
											  edu_qual=:EduQual,  
											  pass_year=:PassYear,  
											  
											  
											  
										     linked_in=:Linkedin, 
										     upwork=:Upwork, 
										     fiver=:Fiverr, 
										     link_three=:LinkThree, 
										     link_four=:LinkFour,
											 status=2,  											 
											 userPic=:upic
											 
								       WHERE student_id=:uid');

    $stmt->bindParam(':Group', $Group);
    $stmt->bindParam(':StuName', $StuName);
    $stmt->bindParam(':About', $About);
    $stmt->bindParam(':Work', $Work);
    $stmt->bindParam(':Gender', $Gender);
    $stmt->bindParam(':FatherName', $FatherName);
    $stmt->bindParam(':MotherName', $MotherName);
    $stmt->bindParam(':Dob', $Dob);
    $stmt->bindParam(':Age', $Age);

    $stmt->bindParam(':Contact', $Contact);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':NidNo', $NidNo);

    $stmt->bindParam(':BloodGrp', $BloodGrp);
    $stmt->bindParam(':Computer', $Computer);
    $stmt->bindParam(':Profession', $Profession);

    $stmt->bindParam(':Religion', $Religion);
    $stmt->bindParam(':Disabilities', $Disabilities);
    $stmt->bindParam(':Address', $Address);
    $stmt->bindParam(':PermaAddress', $PermaAddress);

    $stmt->bindParam(':EduQual', $EduQual);
    $stmt->bindParam(':PassYear', $PassYear);


    $stmt->bindParam(':Linkedin', $Linkedin);
    $stmt->bindParam(':Upwork', $Upwork);
    $stmt->bindParam(':Fiverr', $Fiverr);
    $stmt->bindParam(':LinkThree', $LinkThree);
    $stmt->bindParam(':LinkFour', $LinkFour);

    $stmt->bindParam(':uid', $student_id);
    $stmt->bindParam(':upic', $userpic);

    if ($stmt->execute()) {
?>
      <script>
        alert('Update Successfully Done...');
        window.location.href = 'student-list1.php';
      </script>
<?php
    } else {
      $errMSG = "Sorry Data Could Not Updated !";
    }
  }
}

?>



<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <!-- custom stylesheet -->
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <div class="container">
    <center>
      <h3>
        <ol class="breadcrumb">
          <li class="active">Student Update</li>
        </ol>
      </h3>
    </center>

    <form method="post" enctype="multipart/form-data" class="form-horizontal">


      <?php
      if (isset($errMSG)) {
      ?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
      <?php
      }
      ?>


      <table class="table table-hover table-responsive">

        <tr>
          <td><label class="control-label">Select Batch </label></td>
          <td>
            <Select class="form-control" type="text" name="Batch" required>
              <?php
              $sql = "SELECT * FROM batch_list WHERE status = 1";
              $result = $con->query($sql);
              while ($row = $result->fetch_array()) { ?>
                <option value="<?= $row['batch_id'] ?>"><?= $row['batch_name'] ?></option>;
              <?php }
              ?>
            </Select>
        </tr>

        <tr>
          <td><label class="control-label">Select Group </label></td>
          <td>
            <Select class="form-control" type="text" name="Group" required>
              <?php
              $sql = "SELECT * FROM group_list";
              $result = $con->query($sql);
              while ($row = $result->fetch_array()) { ?>
                <option value="<?= $row['group_id'] ?>" <?= $group_id == $row['group_id'] ? 'selected' : '' ?>><?= $row['group_name'] ?></option>;
              <?php }
              ?>
            </Select>
          </td>
        </tr>


        <tr>
          <td><label class="control-label">Student Name</label></td>
          <td><input class="form-control" type="text" name="StuName" value="<?php echo $stu_name; ?>" /></td>
        </tr>


        <tr>
          <td><label class="control-label"> About / Objective</label></td>
          <td><textarea style="height:90px; width:100%;" class="form-control" name="About"><?php echo $about; ?></textarea></td>
        </tr>

        <tr>
          <td><label class="control-label"> Work Experience</label></td>
          <td><textarea style="height:90px; width:100%;" class="form-control" name="Work"><?php echo $work; ?></textarea></td>
        </tr>

        <tr>
          <td><label class="control-label">Gender </label></td>
          <td><Select class="form-control" type="text" name="Gender">
              <option><?php echo $gender; ?></option>
              <option>Male</option>
              <option>Female</option>
              <option>Prefer Not To Say</option>
            </Select>
          </td>
        </tr>

        <tr>
          <td><label class="control-label">Father Name</label></td>
          <td><input style="width:100%;" class="form-control" name="FatherName" value="<?php echo $father_name; ?>"> </td>
        </tr>


        <tr>
          <td><label class="control-label">Mother Name</label></td>
          <td><input class="form-control" type="text" name="MotherName" value="<?php echo $mother_name; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Date Of Birth </label></td>
          <td><input class="form-control" type="text" name="Dob" value="<?php echo $birth_date; ?>" />
          </td>
        </tr>

        <tr>
          <td><label class="control-label">Age</label></td>
          <td><input class="form-control" type="text" name="Age" value="<?php echo $age; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Contact</label></td>
          <td><input class="form-control" type="text" name="Contact" value="<?php echo $contact; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">E-mail </label></td>
          <td><input class="form-control" type="text" name="Email" value="<?php echo $email; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">NID/Birth Certificate No</label></td>
          <td><input class="form-control" type="text" name="NidNo" value="<?php echo $nid_no; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Blood Group </label></td>
          <td><input class="form-control" type="text" name="BloodGrp" value="<?php echo $blood_grp; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Have a Computer </label></td>
          <td><Select class="form-control" type="text" name="Computer">
              <option value="<?php echo $computer; ?>"><?php echo $computer; ?></option>
              <option>Yes</option>
              <option>No</option>
            </Select>
          </td>
        </tr>


        <tr>
          <td><label class="control-label">Profession</label></td>
          <td><input class="form-control" type="text" name="Profession" value="<?php echo $profession; ?>" /></td>
        </tr>


        <tr>
          <td><label class="control-label">Religion </label></td>
          <td><Select class="form-control" type="text" name="Religion" required>
              <option value="<?php echo $religion; ?>"><?php echo $religion; ?></option>
              <option>Islam</option>
              <option>Hindu </option>
              <option>Others</option>
              <option>Others</option>
            </Select>
          </td>
        </tr>




        <tr>
          <td><label class="control-label">Disabilities </label></td>
          <td><Select class="form-control" type="text" name="Disabilities">
              <option value="<?php echo $disabilities; ?>"><?php echo $disabilities; ?></option>
              <option>Yes</option>
              <option>No</option>
            </Select>
          </td>
        </tr>


        <tr>
          <td><label class="control-label">Address </label></td>
          <td><input class="form-control" type="text" name="Address" value="<?php echo $address; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Permanent Address </label></td>
          <td><input class="form-control" type="text" name="PermaAddress" value="<?php echo $perma_address; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Last Academic Qualification </label></td>
          <td><input class="form-control" type="text" name="EduQual" value="<?php echo $edu_qual; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Passing Year </label></td>
          <td><input class="form-control" type="text" name="PassYear" value="<?php echo $pass_year; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Linkedin </label></td>
          <td><input class="form-control" type="text" name="Linkedin" value="<?php echo $linked_in; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Upwork </label></td>
          <td><input class="form-control" type="text" name="Upwork" value="<?php echo $upwork; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Fiverr </label></td>
          <td><input class="form-control" type="text" name="Fiverr" value="<?php echo $fiver; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Freelancing Link 3 </label></td>
          <td><input class="form-control" type="text" name="LinkThree" value="<?php echo $link_three; ?>" /></td>
        </tr>

        <tr>
          <td><label class="control-label">Freelancing Link 4 </label></td>
          <td><input class="form-control" type="text" name="LinkFour" value="<?php echo $link_four; ?>" /></td>
        </tr>

        <tr style="display:none;">
          <td><label class="control-label">Active/In-Active</label></td>
          <td><select style="width:100%;" class="form-control" name="status" value="<?php echo $status; ?>" />
            <option value="1">Active</option>
            <option value="0">In-Active</option>
            </select>
          </td>
        </tr>

        <tr>
          <td><label class="control-label">Photo </label></td>
          <td>
            <p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
            <input class="input-group" type="file" name="user_image" accept="image/*" />
          </td>
        </tr>

        <tr>
          <td></td>
          <td></td>
        </tr>

      </table>

      <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
            <span class="glyphicon glyphicon-save"></span> Update
          </button>

          <a class="btn btn-danger" href="student-list1.php"> <span class="glyphicon glyphicon-backward"></span> Cancel</a>

        </td>
      </tr>

    </form>

  </div>
  <?php include('includes/footer.php'); ?>