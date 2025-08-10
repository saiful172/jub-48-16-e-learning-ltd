<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">  
<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

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

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Products List |  <span> <a href="product-list-full">   <i class="bi bi-table"></i> </a> </span> | <span> <a href="add-product">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
       <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <table class="table table-hover datatable">
                 <thead>
                        <tr>
                            <th>SL</th>
                            <th>Code</th>
							<th>Name</th>  						
							<th>Sale Rate</th>							
							<th>Buy Rate</th>							
							<th>Quantity</th> 
							<th><center>Edit</center></th>
                        </tr>
                        </thead>
						
						
              <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"select * from product
                                 
								         Left JOIN brand1 ON brand1.brand_id = product.brand_id 
		                                 Left JOIN categories1 ON categories1.cat_id = product.categories_id
		                                 Left JOIN categories_sub ON categories_sub.sub_cat_id = product.sub_cat
			 
			 
								WHERE product.user_id='".$_SESSION['id']."' ORDER BY product.product_id desc ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr> 
											<td><?php echo ++$sl; ?></td>
											<td><?php echo $eqrow['product_id']; ?></td>
											<td><?php echo $eqrow['product_name']; ?> - <?php echo $eqrow['brand_name']; ?> - <?php echo $eqrow['cat_name']; ?></td>
											 <td><?php echo $eqrow['retail_rate']; ?></td>
											<td><?php echo $eqrow['buy_rate']; ?></td>
											<td><?php echo $eqrow['quantity']; ?></td>
											
											
				<td> <center>
				<a  class="btn-sm btn-info" href="product-details-view?edit_id=<?php echo $eqrow['product_id']; ?>" title="click for edit"><span class="glyphicon glyphicon-edit"></span> Details</a>  
				
				 <a  class="btn-sm btn-danger" href="edit-product-price?edit_id=<?php echo $eqrow['product_id']; ?>" title="click for edit"><span class="glyphicon glyphicon-edit"></span> Price</a> 
				 
				  <a  class="btn-sm btn-success" target="_blank" href="edit-product-qty?edit_id=<?php echo $eqrow['product_id']; ?>" title="click for edit" ><span class="glyphicon glyphicon-edit"></span> Qty</a> 
				 
				 </center>
				 </td>
				
				
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
    </section>

  </main>
  
  <?php  require_once 'footer1.php'; ?>