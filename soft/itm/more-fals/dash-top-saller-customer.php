   <div class="col-12">
        <div class="card top-selling overflow-auto">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start"> <h6>Filter</h6> </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Seller  Customer </h5> 
                  <table class="table table-borderless table-hover ">
                    <thead>
 
							
							<tr> 
                                <th>SL  </th>   
                                <th>Customer  </th>   
								 
								<th>Total</th>
								<th>Paid</th> 
								
                            </tr>
                        </thead>						
						
                         <tbody id="tbody"> 
	<?php 
	$sl=0;
	$eq=mysqli_query($con,"select distinct sum(orders_details.grand_total)as Gtotal, sum(orders_details.paid)as Paid,customer.customer_name
	from orders_details 
    Left JOIN customer ON customer.customer_id = orders_details.customer_id
	where orders_details.user_id='".$_SESSION['id']."'  
    group by orders_details.customer_id  order by Gtotal desc  limit 5 
	");
	while($eqrow=mysqli_fetch_array($eq)){ 
	?>
			<tr>
			 <td class="fw-bold"><?php echo ++$sl; ?></td>  
			<td><?php echo $eqrow['customer_name']; ?>  </td> 
			 
			<td><?php echo $eqrow['Gtotal']; ?></td>
			<td><?php echo $eqrow['Paid']; ?></td> 
		 	
          </tr>				
			
			
			
		      <?php  }   ?>
                       </tbody>
                      </table>
                  </div>
        </div>
    </div> 
  