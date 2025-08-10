<?php  session_start();
require_once '../../includes/conn.php';
?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
</head>
<body>
<div class="container-fluid">
 <div><center>
<?php
				  
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			 <span style="font-size:21;font-weight:bold;">
			 <?php echo $pqrow['business_name']; ?>  <br>
			 </span>	
				   <?php }?>
      <span style="font-size:19;"> Bank Transaction History - Single</span>	<br>  

<span style="font-size:18;">	  
				   <?php
				   $BankID = $_POST['BankID'];
				   $pq=mysqli_query($con,"select * from bank_name 
                   
				   WHERE id = '$BankID' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			<b>   Bank Name :  <?php echo $pqrow['name']; ?> </b> 
				  
				   <?php }?>
				   
<br>
Present Date : <?php echo date("M d, Y") ;?> | 
Present Time : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
 </span></center> </div> 
<br>
 
<?php 


if($_POST) {

     $BankID = $_POST['BankID'];

	$sql = "SELECT * FROM bank_money_history 
	Left JOIN bank_name ON bank_name.id = bank_money_history.bank_id
	WHERE bank_money_history.bank_id= '$BankID' AND bank_money_history.user_id='".$_SESSION['id']."' order by  bank_money_history.id desc";
	$query = $con->query($sql);

	$countOrder = $query->num_rows;
	$sl=0;

	$table = '
	<table width="100%" class="table table-bordered">
          
							
                            <tr>
							    <th>SL</th> 
							    <th>Date</th> 
								<th>Previous</th>
								<th>Deposit</th>
								<th>Withdraw</th>
								<th>Present</th>
								<th>Purpose</th>
								<th>Reference</th> 
							</tr>
		<tr>';
		
		//$GrandTotalPaid = "";
		
		while ($result = $query->fetch_assoc()) {
		
         //$GrandTotalPaid = $result['adv_paid']+$result['full_paid'];
		 
			$table .= '<tr>
			    <td><center>'.++$sl.'</center></td> 
			    <td><center>'.date("M d,Y", strtotime($result['entry_date'])).'</center></td> 
				<td><center>'.$result['previous_amt'].'</center></td> 
				<td><center>'.$result['money_in'].'</center></td> 
				<td><center>'.$result['money_out'].'</center></td>
				<td><center>'.$result['recent_amt'].'</center></td> 
				<td><center>'.$result['cuses'].'</center></td> 
				<td><center>'.$result['refer'].'</center></td> 
				
			</tr>';	
		}
		$table .= '
		</tr>

		<tr style="display:none;">
			
			<td colspan="" style="text-align:right; "> Total = </td>
			<td><center>'.$countOrder.'</center></td>
			
			<td colspan="" style="text-align:right; ">  </td>
			<td><center>'.$countOrder.'</center></td>
		
			
		</tr>
		

	</table>
	';	

	echo $table;

}

?>
<!-- Total Product & Price End-->
 
</body>
</html>
