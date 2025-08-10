     <div class="col-12">
              <div class="card recent-sales overflow-auto"> 

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">			 
                  <h5 class="card-title">  <i class="bi bi-list-check"></i> Recent Sales <span>| Today</span></h5>

                  <table class="table table-hover">
                    <thead>
                          <tr> 
                                <th>Inv.No</th> 
							    <th>Date</th> 
								<th>Name</th>
								<th>Taka</th> 
                                <th>Causes</th>  
							</tr>
                    </thead>
                    <tbody>
					
                     <?php 	
				 $pq=mysqli_query($con,"select * from orders_details  where  user_id='".$_SESSION['id']."' order by id desc limit 10 ");
				 while($pqrow=mysqli_fetch_array($pq)){
				?>
						
						        <tr>     
                             <td><?php echo $pqrow['custom_invoice']; ?> </td> 
																			
      								<td><?php echo date("d-m-y", strtotime($pqrow['order_date'])); ?></td>
										   <td><?php echo $pqrow['client_name']; ?></td>
											<td><?php echo $pqrow['paid']; ?></td>
											<td><?php echo $pqrow['cuses']; ?></td>
									        
								</tr>
							<?php }?> 
					  
                    </tbody>
					
                  </table>

                </div>

              </div>
            </div>
			