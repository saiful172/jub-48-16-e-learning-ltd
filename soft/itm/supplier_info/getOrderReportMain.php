
<!DOCTYPE html>
<html>
<head>
<script>
function printPage() {
    window.print();
}
</script>
</head>
<body>

<input style="font-size:20;" type="button" value="Print" onclick="printPage()"  />

<?php 
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

echo ' <b> Date Form : </b> ' ;
echo $startDate;
echo ' <b> Date To : </b> ' ;
echo $endDate;

?>

 <b>Current Date :</b> <?php echo date("M d,Y") ;?>
<b> Current Time : </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
<hr>
 <center><h3> এস. টি. এস.  (  জামিল শপিং সেন্টার  ) <br> সেলস্ রিপোর্ট <br>


		<?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     কর্মীর আইডি নং : <?php echo $pqrow['userid']; ?> | কর্মীর নাম :  <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
           </h3></center>   
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	//$sql = "select COUNT(customer_id) as TotalCust,join_date from customer left join `user` on user.userid=customer.member_id where join_date >= '$start_date' AND join_date <= '$end_date' AND member_id='".$_SESSION['id']."' group by  join_date ";
	$sql = "SELECT * FROM KistiDetails WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' AND emp_id='".$_SESSION['id']."' ";
	$query = $connect->query($sql);

	

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
	    <tr>
			<th colspan="1" > তারিখ </th>
			<th colspan="2" > গ্রাহক </th>
			<th colspan="3" > কিস্তি </th>
			<th colspan="3" > টাকা  </th>
		</tr>
		
		<tr><td>
			<th> আইডি </th>
			<th>  নাম </th>
			
			<th> পুর্বের  </th>
			<th> পরিশোধ</th>
			<th> বর্তমান </th>
			
			<th> পুর্বের  </th>
			<th> পরিশোধ</th>
			<th> বর্তমান </th>
		</td></tr>

		<tr>';
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				<td><center>'.$result['entry_date'].'</center></td>
				
				<td><center>'.$result['customer_id'].'</center></td>
				<td><center>'.$result['member_name'].'</center></td>
				
				<td><center>'.$result['previous_kisti'].'</center></td>
				<td><center>'.$result['kisti_paid'].'</center></td>
				<td><center>'.$result['recent_kisti'].'</center></td>
				
				<td><center>'.$result['previous_dues'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['recent_dues'].'</center></td>
			</tr>';	
			
		}
		$table .= '
		</tr>

		<tr>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>

<br><br><br>

<div id='box1' style=" margin-left:20px; width:350px; float:left; " >
<center><h3> >> এ সপ্তাহে ভর্তি সংখ্যা<< </h3></center>
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
    //$sql = "SELECT * FROM KistiDetails WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' AND emp_id='".$_SESSION['id']."' ";
	
	$sql = "select COUNT(customer_id) as TotalCust,member_id,join_date,status from customer   where join_date >= '$start_date' AND join_date <= '$end_date' AND status ='1' AND member_id='".$_SESSION['id']."' group by join_date ";
	
	//$sql = "select COUNT(customer.customer_id) as TotalCust,member_id,join_date from customer left  join `KistiDetails` on KistiDetails.emp_id=customer.member_id where customer.join_date >= '$start_date' AND customer.join_date <= '$end_date' AND member_id='".$_SESSION['id']."' group by  customer.join_date ";
	//$sql = "select COUNT(customer_id) as TotalCust,join_date from customer left join `user` on user.userid=customer.member_id where join_date >= '$start_date' AND join_date <= '$end_date' AND member_id='".$_SESSION['id']."' group by  join_date ";
	$query = $connect->query($sql);
	

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>তারিখ</th>
			<th>মোট গ্রাহক</th>
		</tr>

		<tr>';
		
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
				<td><center>'.$result['join_date'].'</center></td>
				<td><center>'.$result['TotalCust'].'</center></td>
				
			</tr>';	
			
		}
		$table .= '
		</tr>

		<tr>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>
</div>


<div id='box1' style="margin-left:20px; width:350px; float:left; " >
<center><h3>এ সপ্তাহে বাতিল সংখ্যা<< </h3></center>
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
    //$sql = "SELECT * FROM KistiDetails WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' AND emp_id='".$_SESSION['id']."' ";
	
	$sql = "select COUNT(customer_id) as TotalCust,member_id,join_date,status from customer   where join_date >= '$start_date' AND join_date <= '$end_date' AND status ='0' AND member_id='".$_SESSION['id']."' group by join_date ";
	
	//$sql = "select COUNT(customer.customer_id) as TotalCust,member_id,join_date from customer left  join `KistiDetails` on KistiDetails.emp_id=customer.member_id where customer.join_date >= '$start_date' AND customer.join_date <= '$end_date' AND member_id='".$_SESSION['id']."' group by  customer.join_date ";
	//$sql = "select COUNT(customer_id) as TotalCust,join_date from customer left join `user` on user.userid=customer.member_id where join_date >= '$start_date' AND join_date <= '$end_date' AND member_id='".$_SESSION['id']."' group by  join_date ";
	$query = $connect->query($sql);
	

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		
		<tr>	
			<th>তারিখ</th>
			<th>মোট গ্রাহক</th>
		</tr>

		<tr>';
		
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
				
				<td><center>'.$result['join_date'].'</center></td>
				<td><center>'.$result['TotalCust'].'</center></td>
				
			</tr>';	
			
		}
		$table .= '
		</tr>

		<tr>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>
</div>

<div id='box1' style=" margin-left:20px; width:350px; float:left; " >
<center><h3>এ পর্যন্ত  মোট গ্রাহক সংখ্যা<< </h3></center>
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
    //$sql = "SELECT * FROM KistiDetails WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' AND emp_id='".$_SESSION['id']."' ";
	
	$sql = "select COUNT(customer_id) as TotalCust,member_id,join_date,status from customer   where status ='1' AND member_id='".$_SESSION['id']."' ";
	
	//$sql = "select COUNT(customer.customer_id) as TotalCust,member_id,join_date from customer left  join `KistiDetails` on KistiDetails.emp_id=customer.member_id where customer.join_date >= '$start_date' AND customer.join_date <= '$end_date' AND member_id='".$_SESSION['id']."' group by  customer.join_date ";
	//$sql = "select COUNT(customer_id) as TotalCust,join_date from customer left join `user` on user.userid=customer.member_id where join_date >= '$start_date' AND join_date <= '$end_date' AND member_id='".$_SESSION['id']."' group by  join_date ";
	$query = $connect->query($sql);
	

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		
			
		<tr>	
			<th>মোট গ্রাহক</th>
		</tr>

		<tr>';
		
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
				
				
				<td><center>'.$result['TotalCust'].'</center></td>
				
			</tr>';	
			
		}
		$table .= '
		</tr>

		<tr>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>

<!-- Grand TotalCust-->
<div id='box1' style="margin-top:5px;   " >

<td><label class="control-label">Grand Total Customer : </label></td>
		<?php
				
				   include('conn.php');
				   $pq=mysqli_query($con,"select COUNT(customer_id) as TotalCust,join_date from customer left join `user` on user.userid=customer.member_id where customer.member_id='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <td><?php echo $pqrow['TotalCust']; ?></td>
		<?php }?>
    </div>
<!-- Grand TotalCust-->
</div>

<div id='box1' style="margin-left:20px; width:350px; float:left;  " >
<center><h3>এ সপ্তাহে অগ্রিম আদায়<< </h3></center>
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
    //$sql = "SELECT * FROM KistiDetails WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' AND emp_id='".$_SESSION['id']."' ";
	
	$sql = "select * from orders left join `user` on user.userid=orders.user_id where order_date >= '$start_date' AND order_date <= '$end_date' and orders.user_id='".$_SESSION['id']."'  ";
	
	//$sql = "select COUNT(customer.customer_id) as TotalCust,member_id,join_date from customer left  join `KistiDetails` on KistiDetails.emp_id=customer.member_id where customer.join_date >= '$start_date' AND customer.join_date <= '$end_date' AND member_id='".$_SESSION['id']."' group by  customer.join_date ";
	//$sql = "select COUNT(customer_id) as TotalCust,join_date from customer left join `user` on user.userid=customer.member_id where join_date >= '$start_date' AND join_date <= '$end_date' AND member_id='".$_SESSION['id']."' group by  join_date ";
	$query = $connect->query($sql);
	

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		
			
			<th>গ্রাহক আইডি</th>
			<th>নাম</th>
			<th>তারিখ</th>
			<th>অগ্রিম আদায়</th>
		</tr>

		<tr>';
		
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
				
				<td><center>'.$result['customer_id'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				
			</tr>';	
			
		}
		$table .= '
		</tr>

		<tr>
			
		</tr>
	</table>
	';	

	echo $table;

}

?>
</div>


</body>
</html>
