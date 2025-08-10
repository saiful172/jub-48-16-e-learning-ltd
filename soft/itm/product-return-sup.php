
<?php require_once 'header.php'; ?>

<?php

	
	
	if(isset($_GET['delete_id']))
	{ 
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM product_details WHERE id =:uid');
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
<link rel="stylesheet" href="css/table_data_center.css">
</head>

<body>



<center><h4><ol class="breadcrumb"> <li class="active">Product Return - Supplier</li></ol></h4></center>	
	  
		
	
    	<div class="div-action pull pull-left" style="padding-bottom:10px;">
	
			    <a href="product-return-sup-add.php" class="btn btn-primary "> <i class="glyphicon glyphicon-backward"></i> Return </a>

				</div> 
    

          <div style="width:100%" class="form-group input-group">
                 <span style="width:120px;" class="input-group-addon">Search :</span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search Here.....">
			  </div>
			  
<table width="100%" class="table table-bordered" style="font-size:14px;">
						<thead> 
							<th>Date</th>
							<th>Order Id</th> 
							<th>Product Id</th> 
							<th>Name</th> 
							<th>Category </th>
							<th>Pre.Qty</th>
							<th>Return Qty</th>
							<th>Rec.Qty </th> 
							<th>Causes </th> 
						</thead>
						<tbody id="tbody">
							<?php 
						$eq=mysqli_query($con,"SELECT product_details.invoice_no,product_details.product_id,  product.product_name,
 		 product_details.quantity,product_details.add_qty,product_details.rec_qty, product_details.rate,product_details.entry_date, 
 		brands.brand_name, categories.cat_name, product_details.cuses, product_details.type
		
		FROM product_details 
		Left JOIN product ON product.product_id = product_details.product_id 
		Left JOIN brands ON brands.brand_id = product_details.brand_id 
		Left JOIN categories ON categories.cat_id = product_details.categories_id  
		
		where product_details.user_id ='".$_SESSION['id']."' and product_details.type=4
		order by product_details.id desc");
								while($eqrow=mysqli_fetch_array($eq)){
								
								?>
								<tr>
								<td><?php echo date("d-m-Y", strtotime($eqrow['entry_date'])); ?></td>
									<td><?php echo $eqrow['invoice_no']; ?></td>
									<td><?php echo $eqrow['product_id']; ?></td>
									 <td><?php echo $eqrow['product_name']; ?></td> 
									<td><?php echo $eqrow['cat_name']; ?></td>
									<td><?php echo $eqrow['quantity']; ?></td>
									<td><?php echo $eqrow['add_qty']; ?></td>
									<td><?php echo $eqrow['rec_qty']; ?></td> 
									<td><?php echo $eqrow['cuses']; ?></td> 
								</tr>
								<?php
								}
							?>
						</tbody>
					</table>	

<?php include('../includes/footer.php');?>

