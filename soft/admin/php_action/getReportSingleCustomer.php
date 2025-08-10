<!DOCTYPE html>
<html>
<head>
<script>
function printPage() {
    window.print();
}
</script>

<style type="text/css">th{border-bottom:1px solid white;}</style>
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

<b> Date :</b> <?php echo date("M d,Y") ;?>
<b>  Time : </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
<hr>
 <center><h3>  এস. টি. এস.  (  জামিল শপিং সেন্টার  ) <br> কিস্তি Report <br>


		<?php
				require_once 'core.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     কর্মীর Id No : <?php echo $pqrow['userid']; ?> | কর্মীর Name :  <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
           </h3></center>   


 <h4> 

		<?php
				require_once 'core.php';
				   include('conn.php');
				   
	           $CustId = $_POST['CustId'];
				   
				   $pq=mysqli_query($con,"select * from kistidetails left join `customer_user` on customer_user.userid=kistidetails.customer_id where kistidetails.customer_id = '$CustId' and emp_id='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)) {
				
				//Customer Id: echo $pqrow['customer_id'];
				?>
			       
				  
				   <?php }?>  
           </h4>     
<?php 

require_once 'core.php';

if($_POST) {

	$CustId = $_POST['CustId'];
	
	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	//$sql = "select COUNT(customer_id) as TotalCust,join_date from customer left join `user` on user.userid=customer.member_id where join_date >= '$start_date' AND join_date <= '$end_date' AND member_id='".$_SESSION['id']."' group by  join_date ";
	$sql = "SELECT * FROM kistidetails WHERE customer_id = '$CustId' and entry_date >= '$start_date' AND entry_date <= '$end_date' AND emp_id='".$_SESSION['id']."' order by entry_date ";
	$query = $connect->query($sql);

	

	$table = '
	<table border="2" cellspacing="0" cellpadding="0" style="width:100%;">
		
			
			
			<tr>
			<th> Id </th>
			
			<th> Date </th>
			
			<th> Previous কিস্তি</th>
			<th> Paid কিস্তি  </th>
			<th> Recent কিস্তি </th>
			
			<th> Previous টাকা </th>
			<th> Paid টাকা </th>
			<th> মোট Paid  </th>
			<th> Recent টাকা </th>
			
			</tr>
		
		<tr>';
		
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
				
				<td><center>'.$result['customer_id'].'</center></td>
				<td><center>'.$result['entry_date'].'</center></td>
				
				<td><center>'.$result['previous_kisti'].'</center></td>
				<td><center>'.$result['kisti_paid'].'</center></td>
				<td><center>'.$result['recent_kisti'].'</center></td>
				
				<td><center>'.$result['previous_dues'].'</center></td>
				<td><center>'.$result['paid'].'</center></td>
				<td><center>'.$result['total_paid'].'</center></td>
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

</body>
</html>


	