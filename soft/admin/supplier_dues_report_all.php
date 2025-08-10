<?php include('session.php'); ?>
<?php include('header_link.php'); ?>
<link rel="stylesheet" href="css/table_data_center.css">	

<br>
<center><h4> <?php include('name.php'); ?> <br>Supplier Dues  Report  ( All )<br>

           </h4>
		   <b>Present Date :</b> <?php echo date("M d,Y") ;?>.................................
<b>  Present Time : </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
		   </center> 
   
<body>
    <div class="container-fluid">
		<br>
              <table width="100%" class="table table-bordered " style="font-size:15px;">
						
						<tbody>
	
							
							<?php
	$eq=mysqli_query($con,"select distinct sum(recent_due) as recent_due from product_buy ORDER BY id DESC  ");
	while($eqrow=mysqli_fetch_array($eq)){
	//$eidm=$eqrow['member_id'];
	?>
			<tr>
			
			
			<td><b>Total Present Dues  =  <?php echo $eqrow['recent_due']; ?> /- </b> </td>

			</tr>
							
								<?php
								}
							?>
							
							
						</tbody>
					</table>
					
					
                    <table width="100%" class="table table-bordered table-hover" style="font-size:13px;">
						<thead>
							 <tr>
                                
                                <th colspan="2"> Date </th>
                                <th colspan="1"> Invoice </th>
                                <th colspan="4"> Supplier Information </th>
                                <th colspan="5">Ammount</th>
                               
								
                            </tr>
							
						  <tr>
                                
                                <th>Invoice </th>
                                <th>Last Update</th>
								
                                <th> No</th>
                                <th>Id</th>
                                <th>Name</th>
								<th>Mobile</th>
								
								<th>Previous Dues</th> 
								<th>Today Dues</th>
								<th>Grand Total</th>
								<th>Paid</th>
								<th>Present  Dues</th>
								
								
                            </tr>
						</thead>
						<tbody>
							<?php
	$eq=mysqli_query($con,"select * from product_buy  ORDER BY id DESC  ");
	while($eqrow=mysqli_fetch_array($eq)){
	//$eidm=$eqrow['member_id'];
	?>
			<tr>
			
			<td><?php echo date("d-m-Y", strtotime($eqrow['invoice_date'])); ?></td>
			<td><?php echo date("d-m-Y", strtotime($eqrow['last_update'])); ?></td>
			<td><?php echo $eqrow['invoice_no']; ?>  </td>
			<td><?php echo $eqrow['supplier_id']; ?>  </td>
			<td><?php echo $eqrow['supplier_name']; ?>  </td>
			<td><?php echo $eqrow['phone']; ?>  </td>
			
			
			<td><?php echo $eqrow['pre_due']; ?></td>
			<td><?php echo $eqrow['today_total']; ?></td>
			<td><?php echo $eqrow['grand_total']; ?></td>
			<td><?php echo $eqrow['paid']; ?></td>
			<td><?php echo $eqrow['recent_due']; ?>  </td>

			</tr>
							
								<?php
								}
							?>
							
							
						</tbody>
					</table>	


          <table width="100%" class="table table-bordered " style="font-size:15px;">
						
						<tbody>
	
							
							<?php
	$eq=mysqli_query($con,"select distinct sum(recent_due) as recent_due from product_buy ORDER BY id DESC  ");
	while($eqrow=mysqli_fetch_array($eq)){
	//$eidm=$eqrow['member_id'];
	?>
			<tr>
			
			
			<td><b>  Total Present Dues  = <?php echo $eqrow['recent_due']; ?> /- </b> </td>

			</tr>
							
								<?php
								}
							?>
							
							
						</tbody>
					</table>					
				</div>
				</div>
           
	
	<br>
	
	
	
</body>
</html>