<?php 
session_start();
require_once '../includes/conn.php'; 
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
			 Customer List  
            </span>			 
			 </div>	   
<span style="font-size:18;">				   
Present Date  :</b> <?php echo date("M d,Y") ;?> |
Present Time: </b> <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
<span style="font-size:18;">
</center> 
  
		<br>
            <div class="container-fluid">
			
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered center">
						<thead>
                            
                            <tr>
								 
                                <th>SL</th> 
                                <th>Name</th>
								<th>Address</th>
								<th>Phone</th> 
								<th>Website</th> 
                                <th>Join Date</th>
                                <th>Comments</th>
								
								                            </tr>
                        </thead>
                       <tbody id="tbody">
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select * from customer  where member_id='".$_SESSION['id']."' and  status=1 ORDER BY customer_id asc  ");
								while($eqrow=mysqli_fetch_array($eq)){
									?>
										<tr>
											 
											<td><?php echo ++$sl; ?></td> 
											<td><?php echo $eqrow['customer_name']; ?></td>
											
											<td> <?php echo $eqrow['address']; ?> </td>
											<td><?php echo $eqrow['contact_info']; ?></td>
											<td><?php echo $eqrow['website']; ?></td>
									        <td><?php echo date("M d, Y", strtotime($eqrow['join_date'])); ?></td>
								          <td></td>
								</tr>
								<?php
								}
							?>
						</tbody>
					</table>					
				</div>
				</div>
           
			</div>
	 
	 
 