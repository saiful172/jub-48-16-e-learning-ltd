
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_data_center.css">
</head>
<body>
 <div class="container-fluid">
 
<br>
 <center><h4> <?php include('../name.php'); ?><br> তারিখ অনুযায়ী- সাপ্লাইয়ারের বাকী  রিপোর্ট  ( বিস্তারিত ) <br>


		<?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			      ইউজার :  <?php echo $pqrow['username']; ?>
				  
				   <?php }?>
           <br>
<?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  তারিখ হতে  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  তারিখ পর্যন্ত :  ' ; echo date("M d, Y", strtotime( $endDate));
?> <br>
বর্তমান তারিখ : <?php echo date("M d, Y") ;?> | 
বর্তমান সময়   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</h4> <br>
		 </center>   
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
	$sql = "SELECT * FROM product_buy_details WHERE last_update >= '$start_date' AND last_update <= '$end_date' order by id desc ";
	$query = $connect->query($sql);

	$countOrder = $query->num_rows;

	$table = '
	<table width="100%" class="table table-bordered" style="font-size:14px;">
	    <tr>
                                
                                <th colspan="2"> তারিখ </th>
                                <th colspan="1"> ইনভয়েস </th>
                                <th colspan="4"> সাপ্লাইয়ার ইফরমেশন </th>
                                <th colspan="5"> টাকার  পরিমান </th>
                               
								
                            </tr>
							
						  <tr>
                                
                                <th>ইনভয়েস </th>
                                <th>সর্বশেষ আপডেট</th>
								
                                <th> নং</th>
                                <th>আইডি</th>
                                <th>নাম</th>
								<th>মোবাইল</th>
								
								<th>পূর্বের বাকী</th> 
								<th>আজকের বাকী</th>
								<th>সর্বমোট</th>
								<th>পরিশোধ</th>
								<th>বর্তমান  বাকী</th>
								
								
                            </tr>
		<tr>';
		
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    
				<td><center>'.$result['invoice_date'].'</center></td>
				<td><center>'.$result['last_update'].'</center></td>
				<td><center>'.$result['invoice_no'].'</center></td>
				<td><center>'.$result['supplier_id'].'</center></td>
				<td><center>'.$result['supplier_name'].'</center></td>
				<td><center>'.$result['phone'].'</center></td>
				<td><center>'.$result['pre_due'].'</center></td>
				<td><center>'.$result['today_total'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['recent_due'].'</center></td>
			</tr>';	
			
			
			
			
			
			
		
			
		}
		$table .= '
		</tr>

		
		

	</table>
	';	

	echo $table;

}

?>




</div>
</body>
</html>
