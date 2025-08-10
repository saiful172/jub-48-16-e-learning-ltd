<?php 
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "itm_dim_stock1";

$db = new mysqli($localhost, $username, $password, $dbname);
if ($db->connect_error) {
    die("Connection Failed, No Data Found: " . $db->connect_error);
}
?>