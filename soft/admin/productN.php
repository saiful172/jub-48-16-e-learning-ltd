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
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Product</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/table_data_center.css">


<!-- Search Script-->
<script src="js/search.js"></script>
<!-- Search Script-->

</head>

<body>



<center><h4><ol class="breadcrumb"> <li class="active">Product </li></ol></h4></center>	
	  
		
	
    	<div class="div-action pull pull-right" style="padding-bottom:20px;">
	<!-- <button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Product </button> -->
			    <a href="product_add.php" class="btn btn-default "> <i class="glyphicon glyphicon-plus-sign"></i> Add New  </a>
			    <a href="product_add_to_stock.php" class="btn btn-success "> <i class="fa fa-file"></i> Add To Stock  </a>
				<a target="_blank" href="php_action/view_product_stock.php" class="btn btn-success "> <i class="fa fa-file"></i>  Stock Report </a>
				<a target="_blank" href="php_action/view_product_details.php" class="btn btn-primary"> <i class="fa fa-file"></i>  Stock Details</a>
				<a target="_blank" href="php_action/print_product.php" class="btn btn-primary"> <i class="fa fa-file"></i>  Print </a>
	<!--		<a  href="product_inactive.php" class="btn btn-danger"><i class="glyphicon glyphicon-ruble"></i>Removable Product</a> -->
				</div> 
    

          <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search :</span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search Here.....">
			  </div>
			  
<table width="100%" class="table table-striped table-bordered table-hover" group_id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Code</th>
							<th>Name</th>
							<th>Sale Price</th>							
				<!--		<th>Retail Price</th>	 -->							
							<th>Buy Price</th>							
							<th>Quantity</th> 
							<th>Edit</th>
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"select * from product  ORDER BY product_id asc ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr>
										   
											
											<td><?php echo $eqrow['product_id']; ?></td>
											<td><?php echo $eqrow['product_name']; ?></td>
											<td><?php echo $eqrow['rate']; ?></td>
						<!--				<td><?php echo $eqrow['retail_rate']; ?></td> -->	
											<td><?php echo $eqrow['buy_rate']; ?></td>
											<td><?php echo $eqrow['quantity']; ?></td>
											
											
				<td><a  class="btn btn-info" href="productN_Edit.php?edit_id=<?php echo $eqrow['product_id']; ?>" title="click for edit" 
                 onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>
<?php include('../includes/footer.php'); ?>
