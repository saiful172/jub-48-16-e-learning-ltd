<?php require_once 'header.php'; ?>
<?php
 
	if(isset($_GET['delete_id']))
	{ 
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM product WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:group.php");
	}

?>
<link rel="stylesheet" href="css/buttons.css"> 
<link rel="stylesheet" href="css/table_data_center.css">
<center><h4><ol class="breadcrumb"> <li class="active">Product List / Stock  </li></ol></h4></center>	

<div class="col-md-2">  
<div class="buttons"> 
		<div class="col-md-12">
		<a href="products-add" class="btn btn-primary btn-w100"> <i class="glyphicon glyphicon-plus-sign"></i> Add New  </a>
		</div> 
		
		<div class="col-md-12">
		<a target="_blank" href="php_action/view-product-stock" class="btn btn-success btn-w100 "> <i class="fa fa-file"></i>  Stock Report </a>
		</div>
				

		<div class="col-md-12">
		<a target="_blank" href="php_action/print-product" class="btn btn-success btn-w100"> <i class="fa fa-file"></i>  Print Product List </a>
		</div>
		
		<div class="col-md-12">
		<a target="_blank" href="php_action/print-product-low-stock" class="btn btn-success btn-w100"> <i class="fa fa-file"></i>  Print Low StocK </a>
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
	   <a class="btn btn-warning btn-w100" href="productN"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Products  </a> 
	   </div>

       <div class="col-md-12">
	   <a class="btn btn-danger btn-w100" href="low-stock-product"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Low Stock  </a> 
	   </div>	   
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="productN-history"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Product History  </a> 
	   </div>
	   
	  
		 
		
	</div>
	
  
</div>

<div class="col-md-10">	  
 
<div style="width:100%;" class="form-group input-group">
                 <span class="input-group-addon"><i class="fa fa-search"></i></span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search......">
</div>
			  
<table width="100%" class="table table-bordered table-hover" group_id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Code</th>
							<th>Name</th>
							<th>Details</th>
							<th>W.S.Price</th>							
							<th>Retail Price</th>							
							<th>Buy Price</th>							
							<th>Quantity</th> 
							<th>Edit</th>
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"select * from product WHERE user_id='".$_SESSION['id']."' ORDER BY product_id asc ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr> 
											<td><?php echo ++$sl; ?></td>
											<td><?php echo $eqrow['product_id']; ?></td>
											<td><?php echo $eqrow['product_name']; ?></td>
											<td><?php echo $eqrow['product_details']; ?> - <?php echo $eqrow['warranty']; ?> </td>
											<td><?php echo $eqrow['rate']; ?></td>
											<td><?php echo $eqrow['retail_rate']; ?></td>
											<td><?php echo $eqrow['buy_rate']; ?></td>
											<td><?php echo $eqrow['quantity']; ?></td>
											
											
				<td><a  class="btn btn-info" href="productN-Edit?edit_id=<?php echo $eqrow['product_id']; ?>" title="click for edit" 
                 onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Details</a>  
				
				 <a  class="btn btn-danger" href="productN-Price-Edit?edit_id=<?php echo $eqrow['product_id']; ?>" title="click for edit" 
                 onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Price</a> </td>
				
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>
 


<?php include('../includes/footer.php');?>
