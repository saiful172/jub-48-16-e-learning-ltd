<?php 	

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "opils";

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>

<?php
$sql = $connect->query("SELECT SUM(`quantity`) as `total` FROM `product` WHERE status='1'");
$row = $sql->fetch_assoc();
echo $row['total'];
?>






