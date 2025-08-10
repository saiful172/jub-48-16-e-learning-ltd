<div class="panel panel-danger" style="padding:0px;"> 
		  <div class="cardHeader" style="background-color:white;color:black;font-size:20px;padding:3px;text-align:center;">
		   <a href="#">Recent Sales / Payment </a>    
		  </div>

		  <div class="cardContainer">  
		  
				 <table width="100%" class="table table-hover center"> 
						<thead> 
                            <tr>
							    <th>Date</th> 
                               <th>Inv.No</th> 
								<th>Name</th>
								<th>Taka</th> 
                                <th>Cause</th>  
							</tr>
                        </thead> 
				<?php 	
				 $pq=mysqli_query($con,"select * from orders_details  where  user_id='".$_SESSION['id']."' order by id desc limit 5 ");
				 while($pqrow=mysqli_fetch_array($pq)){
				?>
						
						        <tr>        <td><?php echo date("d-m-y", strtotime($pqrow['order_date'])); ?></td>
										    <td><?php echo $pqrow['custom_invoice']; ?> </td> 
											<td><?php echo $pqrow['client_name']; ?></td>
											<td><?php echo $pqrow['paid']; ?></td>
											<td><?php echo $pqrow['cuses']; ?></td>
									        
								</tr>
							<?php }?>   
						 
					</table>	 
		  </div>
		</div> 
	