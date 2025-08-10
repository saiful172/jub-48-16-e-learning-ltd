<?php include('session.php'); ?>
<?php include('header_link.php'); ?>
<br>&nbsp; &nbsp; &nbsp;<button  onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Print</button>
<center><h4> Remex Laboratories <br>product Costing report<br>


		<?php
				require_once 'php_action/db_connect.php';
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     User Id :  <?php echo $pqrow['userid']; ?> | User Name:  <?php echo $pqrow['stuff_name']; ?>
				  
				   <?php }?>
           </h4>
		   <b>Present Date :</b> <?php echo date("M d,Y") ;?>.................................
<b> Present Time: </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
		   </center> 
<body>
    <div class="container-fluid">
		<br>
            <div class="container-fluid">
			
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
								<th>Product Name</th>
                                <th>Model/Size</th>
								<th>Item</th>
								<th>Kg/ML/Pc's</th>
								<th>Price</th>
                                <th>Entry Date</th>
						</thead>
						<tbody>
							<?php
								$eq=mysqli_query($con,"select * from product_cost  ORDER BY id DESC");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
									<td><?php echo $eqrow['product_name']; ?></td>
									<td><?php echo $eqrow['model_or_size']; ?></td>
									<td><?php echo ucwords($eqrow['item']); ?></td>
									<td><?php echo $eqrow['kg_ml_pcs']; ?></td>
								
									<td><?php echo ucwords($eqrow['price']); ?></td>
									<td><?php echo $eqrow['entry_date']; ?></td>
									
									
								</tr>
								<?php
								}
							?>
						</tbody>
					</table>					
				</div>
				</div>
           
			</div>
	</div>
	<br>
	
	<?php include('scripts.php'); ?>
	<?php include ('modal.php'); ?>
	
</body>
</html>