

<?php require_once 'header.php'; ?>
 
<link rel="stylesheet" href="css/buttons.css"> 
<link rel="stylesheet" href="css/table_data_center.css">
<center><h4><ol class="breadcrumb"> <li class="active">Product  Sale / Stock History  </li></ol></h4></center>	

<div class="col-md-2">  
<div class="buttons"> 
		<div class="col-md-12">
		<a href="products-add" class="btn btn-primary btn-w100"> <i class="glyphicon glyphicon-plus-sign"></i> Add New  </a>
		</div> 
		
		<div class="col-md-12">
		<a target="_blank" href="php_action/view-product-stock" class="btn btn-success btn-w100 "> <i class="fa fa-file"></i>  Stock Report </a>
		</div>
			 

		<div class="col-md-12">
		<a target="_blank" href="php_action/print-product" class="btn btn-success btn-w100"> <i class="fa fa-file"></i>  Print </a>
		</div>
		
		
		<div class="col-md-12">
		<a href="product-history-report" class="btn btn-success btn-w100"> <i class="fa fa-file"></i>  Report By Date </a>
		</div>
		
		<div class="col-md-12">
			<br>
		</div>
		
	
		
	<div class="col-md-12">
			<a class="btn btn-info btn-w100" href="category"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Category  </a> 
	   </div>
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="sub-category"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Sub Category  </a> 
	   </div>
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="brands"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Brands  </a> 
	   </div>
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="productN"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Products  </a> 
	   </div>
	   
	    <div class="col-md-12">
			<a class="btn btn-warning btn-w100" href="productN"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Product History  </a> 
	   </div>
		 
		
	</div>
	
  
</div>

<div class="col-md-10">	  
 	<div style="width:100%;" class="form-group input-group">
                 <span style="" class="input-group-addon"><i class="fa fa-search"></i></span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search......">
</div>
			  
<table width="100%" class="table table-bordered table-hover" group_id="dataTables-example">
                        <thead>
                       <tr> 
                               <th> SL </th>
                               <th> Inv.No </th>
                               <th> Date </th>
                               <th> Name </th>
                               <th> Brand </th>
                               <th> Category </th>
			<th> Qty </th>
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
	$sl=0;
	$eq=mysqli_query($con,"SELECT Distinct order_item_all.order_id,brand1.brand_name, categories1.cat_name,product.product_name,order_item_all.rate,
	           order_item_all.order_quantity as total_qty,order_item_all.buy_pro,order_item_all.sale_pro,order_item_all.back_qty,order_item_all.ret_sup,order_item_all.dam_pro,order_item_all.rec_stock,
	             order_item_all.total as total_rate ,order_item_all.back_qty,order_item_all.entry_date,order_item_all.user_id,order_item_all.comments
	              FROM `order_item_all`
	
			 Left join product on product.product_id= order_item_all.product_id
			 
			 Left JOIN brand1 ON brand1.brand_id = product.brand_id 
		     Left JOIN categories1 ON categories1.cat_id = product.categories_id  
			 
             where order_item_all.user_id='".$_SESSION['id']."'
             order by order_item_all.order_item_id	desc		 
			");
			
	while($eqrow=mysqli_fetch_array($eq)){
	
	?>
			<tr>
			<td><?php echo ++$sl; ?>  </td>
			<td><?php echo $eqrow['order_id']; ?>  </td>
			<td><?php echo date("d-M-Y", strtotime($eqrow['entry_date'])); ?></td>
			<td><?php echo $eqrow['product_name']; ?>  </td>
			<td><?php echo $eqrow['brand_name']; ?>  </td>
			<td><?php echo $eqrow['cat_name']; ?>  </td>
			<td><?php echo $eqrow['total_qty']; ?>  </td>
			
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
		}  
		?>

</tbody>
</table>
 


<?php include('../includes/footer.php');?>
