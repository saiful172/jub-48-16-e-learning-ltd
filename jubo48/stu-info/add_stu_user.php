<?php
include('session.php');

$DistrictId = $_POST['DistrictId'];
$BatchId    = $_POST['BatchId'];
$GroupId    = $_POST['GroupId'];
$StuName    = $_POST['StuName'];
$Email      = $_POST['Email'];
$Contact    = $_POST['Contact'];
$UserName   = $_POST['UserName'];
$original   = $_POST['Password'];
$Password   = md5($_POST['Password']);

// Check if email already exists
$check = mysqli_query($con, "SELECT * FROM student_user WHERE email = '$Email'");
if (mysqli_num_rows($check) > 0) {
    $_SESSION['add_error'] = "This email is already registered!";
    $_SESSION['old_input'] = $_POST;
    header("Location: student-user.php"); 
    exit();
}

// Insert into tables
mysqli_query($con,"INSERT INTO student_user (district_id, batch_id, group_id, email, username, password, access_level, status) 
  VALUES ('$DistrictId', '$BatchId', '$GroupId', '$Email', '$UserName', '$Password', '10', '1')");
$uid = mysqli_insert_id($con);

mysqli_query($con,"INSERT INTO student_password (original, mdfive) VALUES ('$original', '$Password')");

mysqli_query($con,"INSERT INTO student_stuff (userid, district_id, batch_id, group_id, stu_name, email, contact, status) 
  VALUES ('$uid', '$DistrictId', '$BatchId', '$GroupId', '$StuName', '$Email', '$Contact', '1')");

mysqli_query($con,"INSERT INTO student_list (user_id, stu_user_id, district, batch_id, group_id, stu_name, email, contact) 
  VALUES ('$DistrictId', '$uid', '$DistrictId', '$BatchId', '$GroupId', '$StuName', '$Email', '$Contact')");

$_SESSION['add_success'] = "Student User added successfully!";
header("Location: student-user.php");
exit();
?>
