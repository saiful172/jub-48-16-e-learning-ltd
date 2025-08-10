<?php
session_start();
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
  header('location:../index.php');
  exit();
}
include('../includes/conn.php');

$sq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "'");
$srow = mysqli_fetch_array($sq);

$userId = $srow['userid'];
$user = $srow['username'];
$FulName = $srow['stuff_name'];
$BizName = $srow['business_name'];
$SignPhoto = $srow['sign_img'];


$ImageNameWithSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $FulName)));

// function createSlug($string)
// {
//   // Convert the string to lowercase
//   $slug = strtolower($string);

//   // Remove any characters that are not alphanumeric or spaces
//   $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);

//   // Replace spaces with hyphens
//   $slug = str_replace(' ', '-', $slug);

//   // Remove multiple consecutive hyphens
//   $slug = preg_replace('/-+/', '-', $slug);

//   // Trim leading and trailing hyphens
//   $slug = trim($slug, '-');

//   return $slug;
// }

// $ImageNameWithSlug = $srow['stuff_name'];
// $slug = createSlug($ImageNameWithSlug);
