<?php
require_once '../includes/conn.php';

$DistName = $_POST['depart1'];   // department id

$sql = "SELECT id,dist_id,thana_name FROM thana WHERE dist_id=".$DistName;

$result = mysqli_query($con,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $UpaId = $row['id'];
    $name = $row['thana_name'];

    $users_arr[] = array("id" => $UpaId, "thana_name" => $name);
}

// encoding array to json format
echo json_encode($users_arr);