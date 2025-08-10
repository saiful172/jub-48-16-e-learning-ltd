<?php  session_start();
require_once '../../includes/conn.php';
?>
 
<link rel="stylesheet" href="../css/table_data_center_with_border_black.css">

<body>
    <div class="container-fluid">
<br>
						
			 <center>  <?php 
				  				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			<span style="font-size:21;font-weight:bold;">
			 <?php echo $pqrow['business_name']; ?>   
			 </span>	
			<?php }?>
			
			</b>
	<br> <span style="font-size:19;">
	Product Stock Report<br>
	
			 
			 Print Date : <?php echo date("M d, Y") ;?> |  Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</span>

<br>
<br>
								</center>

                   <?php  

	$sql = "SELECT *  FROM product 
		 WHERE product.status = 1 and user_id ='".$_SESSION['id']."'
		 order by product.product_id asc ";
	$query = $con->query($sql);
	$countProduct = $query->num_rows;

	$table = '
	  <table width="100%" class="table table-bordered" >
		
		<tr>
			<th colspan="1" > SL</th>
			<th colspan="1" > Last</th>
			<th colspan="3" > Product</th>
			<th colspan="2" > Price  </th>
			<th colspan="3" > Total Price  </th>
		</tr>
		
		
		<tr>
			              <th> No</th>
			              <th> Update</th>
							 <th>Code</th> 
							<th>Name</th>
							<th>Stock</th>
							
							<th>Sale</th>
							<th>Buy</th>
							
							<th>Sale</th>
							<th>Buy</th>
							
							<th>Profit</th>
							
		</tr>

		<tr>';
		$TotalQty = "";
		$TotalSaleRate = "";
		$TotalBuyRate = "";
		$GrandTotalSaleRate = "";
		$GrandTotalBuyRate = "";
		$GrandTotalProfit = "";
		
		while ($result = $query->fetch_assoc()) {
			
			$x=$result['quantity'];  $y=$result['rate']; $z=$result['buy_rate'];
			$tsr = $x * $y; 
			$tbr = $x * $z; 
			$profit = $tsr - $tbr;
			
			$table .= '<tr>
			    
				<td><center>'.++$sl.'</center></td>
				<td><center>'.$result['last_update'].'</center></td>
		<!--    <td><center><img src="'.$result['product_image'].'" width="50px" alt="" /></center></td> -->
				<td><center>'.$result['product_id'].'</center></td>
				<td><center>'.$result['product_name'].'</center></td>
				
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['rate'].'</center></td>
				<td><center>'.$result['buy_rate'].'</center></td>
				<td><center>'.$tsr.'</center></td>
				<td><center>'.$tbr.'</center></td>
				<td><center>'.$profit.'</center></td>
				
				
			</tr>';	
			$TotalQty += $result['quantity'];
			$TotalSaleRate += $result['rate'];
			$TotalBuyRate += $result['buy_rate'];
			$GrandTotalSaleRate += $tsr ;
			$GrandTotalBuyRate += $tbr ;
			$GrandTotalProfit += $profit ;
		}
		$table .= '
		</tr>
		<tr>
			<td colspan="3" style="text-align:right; "> <b> Grand Total  =  </td>
			<td><center><b>'.$countProduct.'</center></td>
			<td><center><b>'.$TotalQty.'</center></td>
			<td><center><b>'.$TotalSaleRate.'</center></td>
			<td><center><b>'.$TotalBuyRate.'</center></td>
			<td><center><b>'.$GrandTotalSaleRate.'</center></td>
			<td><center><b>'.$GrandTotalBuyRate.'</center></td>
			<td><center><b>'.$GrandTotalProfit.'</center></td>
		</tr>
	</table>
	';	

	echo $table;



?>	
				
	
</body>
</html>