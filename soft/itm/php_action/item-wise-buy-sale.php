<?php  session_start();
require_once '../../includes/conn.php'; 
?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
</head> 

<body>


<div class="container" style="width:100%;">
<center>
                <?php
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
				
			    <span style="font-size:21;font-weight:bold;">
			    <?php echo $pqrow['business_name']; ?><br>
				 </span> 
				<?php }?>
				
				
  <span style="font-size:20;">        
Product History Report - ( Buy-Sale-Return-etc ) <br>
</span> 		
<span style="font-size:19;">
				   
			   		 <?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  Date To :  ' ; echo date("M d, Y", strtotime( $endDate));
?>  <br>
   Date :<?php echo date("M d,Y") ;?> |
   Time :<?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
</span>  </center> <br>

<table border="1" class="table table-bordered" style="width:100%;">
                        <thead>
                        
                        <tr>
						<th> SL </th>
                               <th> Inv.No </th>
                               <th> Date </th>
                               <th> Product </th>	 
              
			<th> Buy </th>
			<th> Sale </th>
			<th> Ret.Sale </th>
			<th> Ret.Sup </th>
			<th> Dam.Qty </th>
			<th> Rec.Stock </th>
			<th> Price </th>
			<th> Total </th>
			<th> Type </th>
			
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
							
					if($_POST) {		
							$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
	
 
$eq=mysqli_query($con,"SELECT Distinct order_item_all.order_id,brand1.brand_name, categories1.cat_name,product.product_name,
	           order_item_all.order_quantity as total_qty,
			   sum( order_item_all.buy_pro) as buy_pro, sum(order_item_all.sale_pro) as sale_pro, sum(order_item_all.back_qty)as back_qty, sum(order_item_all.ret_sup) as ret_sup, sum(order_item_all.dam_pro) as dam_pro,order_item_all.rec_stock,
	           order_item_all.rate, sum( order_item_all.total) as total_rate ,
			order_item_all.entry_date,order_item_all.user_id,order_item_all.comments
	              FROM `order_item_all`
	
			 Left join product on product.product_id= order_item_all.product_id
			 
			 Left JOIN brand1 ON brand1.brand_id = product.brand_id 
		     Left JOIN categories1 ON categories1.cat_id = product.categories_id  
			 
             where order_item_all.entry_date >= '$start_date' AND order_item_all.entry_date <= '$end_date' and order_item_all.user_id='".$_SESSION['id']."'
             group by order_item_all.product_id	desc		 
			
			");
							
							$TotalBuy= "";	
							$TotalSale= "";	
							
								while($eqrow=mysqli_fetch_array($eq)){
								
                             $TotalBuy +=$eqrow['buy_pro'];								
                             $TotalSale +=$eqrow['sale_pro'];								
                             $TotalBack +=$eqrow['back_qty'];								
                             $TotalRetSup +=$eqrow['ret_sup'];								
                             $TotalDamg +=$eqrow['dam_pro'];								
                             $RecStock +=$eqrow['rec_stock'];								
									
									?>
			<tr>
			
			<td><?php echo ++$sl; ?>  </td>
			<td><?php echo $eqrow['order_id']; ?>  </td>
			<td><?php echo date("d-M-Y", strtotime($eqrow['entry_date'])); ?></td>
			<td><?php echo $eqrow['product_name']; ?>  - <?php echo $eqrow['cat_name']; ?> - <?php echo $eqrow['brand_name']; ?> </td>	 
			
			<td><?php echo $eqrow['buy_pro']; ?>  </td>
			<td><?php echo $eqrow['sale_pro']; ?>  </td>
			<td><?php echo $eqrow['back_qty']; ?>  </td> 
			<td><?php echo $eqrow['ret_sup']; ?>  </td> 
			<td><?php echo $eqrow['dam_pro']; ?>  </td> 
			<td><?php echo $eqrow['rec_stock']; ?>  </td> 
			
			<td><?php echo $eqrow['rate']; ?>  </td>
			<td><?php echo $eqrow['total_rate']; ?>  </td>
			<td><?php echo $eqrow['comments']; ?>  </td>
											
		</tr>
						
		<?php
					}  }
		?>
		
		
		  <tr>  
		    <td colspan="4"><b>Total</b></td>
			<td><b><?php echo  $TotalBuy ; ?> </b> </td>
			<td><b><?php echo  $TotalSale ; ?> </b> </td>
			<td><b><?php echo  $TotalBack ; ?> </b> </td>
			<td><b><?php echo  $TotalRetSup ; ?> </b> </td>
			<td><b><?php echo  $TotalDamg ; ?> </b> </td>
			<td><b><?php echo  $RecStock ; ?> </b> </td>
		  </tr>
		
	
</tbody>
</table>

</body>


