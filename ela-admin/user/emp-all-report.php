<?php 
session_start();
require_once '../includes/conn.php';
error_reporting(0);
?>
<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
		   
		   <center>  <div> 

                  <?php 
				  				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			<span style="font-size:21;font-weight:bold;">
			 <?php echo $pqrow['business_name']; ?>  <br>
			 </span>	
			<?php }?>
			<span style="font-size:19;">
			 Employee List - All 
            </span>			 
			 </div>	   
<span style="font-size:18;">				   
Present Date  :</b> <?php echo date("M d,Y") ;?> |
Present Time: </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
<span style="font-size:18;">
</center>

 <br>  
<body>
    
            <div class="container-fluid">
			
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered center">
						<thead>
                            <th>Sl</th>
                            <th>Emp Id</th>
                                <th>Name</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Nid</th>
								<th> Salary</th>
								<th> Position</th>
								<th>Join Date</th>
							 
                        </thead>
                       <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"select * from employees where user_id='".$_SESSION['id']."' ORDER BY  id DESC  ");
								$sl=0;
								while($eqrow=mysqli_fetch_array($eq)){ 
									?>
										<tr>
											<td><?php echo ++$sl; ?></td>
											<td><?php echo $eqrow['id']; ?></td>
											<td><?php echo $eqrow['emp_name']; ?></td>
											<td> <?php echo $eqrow['address']; ?> </td>
											<td><?php echo $eqrow['phone']; ?></td>
											<td><?php echo $eqrow['email']; ?></td>
											<td><?php echo $eqrow['national_id']; ?></td>
											<td><?php echo $eqrow['salary']; ?></td>
											<td><?php echo $eqrow['position']; ?></td>
									<td><?php echo date("M d, Y", strtotime($eqrow['join_date'])); ?></td>
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

	
</body>
</html>