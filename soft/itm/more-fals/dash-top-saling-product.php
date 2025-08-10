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
                  <h5 class="card-title">Top Selling Products </h5> 
                  <table class="table table-borderless table-hover">
                    <thead>
                      <tr>
                        <th>SL</th> 						
							<th>Name</th>  					
							<th>Quantity</th>  					
							<th>Sale Price</th>	  
							<th>Buy Price</th>
                      </tr>
                    </thead> 
                    <tbody> 
             <?php    $sl=0;
								$eq=mysqli_query($con,"select product.product_name, sum(order_item.order_quantity) as order_qty , order_item.rate,order_item.buy_rate, brand1.brand_name, categories1.cat_name, categories_sub.sub_cat_name
								from  order_item 
								
								left join orders on orders.order_id = order_item.order_id
								left join product on product.product_id=order_item.product_id
								 Left JOIN brand1 ON brand1.brand_id = product.brand_id 
		                                 Left JOIN categories1 ON categories1.cat_id = product.categories_id
		                                 Left JOIN categories_sub ON categories_sub.sub_cat_id = product.sub_cat
			 
								
								
								WHERE orders.user_id='".$_SESSION['id']."'
								group by order_item.product_id  order by order_qty desc limit 5 
								");
								while($eqrow=mysqli_fetch_array($eq)){
									 
									?>
										<tr>
										   
											
											<td class="fw-bold"><?php echo ++$sl; ?></td>  
											<td class="text-primary fw-bold"><?php echo $eqrow['product_name']; ?> - <?php echo $eqrow['sub_cat_name']; ?> - <?php echo $eqrow['brand_name']; ?></td>
											<td class="fw-bold"><?php echo $eqrow['order_qty']; ?></td>  
											<td class="fw-bold"><?php echo $eqrow['rate']; ?></td>  
											<td class="fw-bold"><?php echo $eqrow['buy_rate']; ?></td>  
				 							
				 
			</tr>
		      <?php  }   ?>
                       </tbody>
                      </table>
                  </div>
        </div>
    </div> 
  