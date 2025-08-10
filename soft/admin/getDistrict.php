<?php
require_once '../includes/conn.php';

$DivId = $_POST['depart'];   // department id

$sql = "SELECT dist_id,div_id,dist_name FROM district WHERE div_id=".$DivId;

$result = mysqli_query($con,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $DistId = $row['dist_id'];
    $name = $row['dist_name'];

    $users_arr[] = array("dist_id" => $DistId, "dist_name" => $name);
}

// encoding array to json format
echo json_encode($users_arr);