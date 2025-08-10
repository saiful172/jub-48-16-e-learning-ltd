<!DOCTYPE html>
<html lang="en"> 

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php 
$sql = $con->query("select * from stock_low where user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$LowQty =$row['low_qty']; 
 
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
     <h1>Low Stock Product |  <span> <a href="edit-low-stock">   <i class="bi bi-gear-fill"></i> Setting - <?php  echo  $LowQty; ?> </a> </span> </h1>
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
							<th>Details</th>
							<th>W.S.Price</th>							
							<th>Retail Price</th>							
							<th>Buy Price</th>							
							<th style="color:red;">Quantity</th> 
							<!--<th>Edit</th>-->
                        </tr>
                        </thead>
           <tbody id="tbody">
							<?php
								$eq=mysqli_query($con,"select * from product
								WHERE  quantity < $LowQty and  user_id='".$_SESSION['id']."' ORDER BY product_id desc ");
								while($eqrow=mysqli_fetch_array($eq)){
									$eidm=$eqrow['id'];
									?>
										<tr>	 
											<td><?php echo ++$sl; ?></td>
											<td><?php echo $eqrow['product_id']; ?></td>
											<td><?php echo $eqrow['product_name']; ?></td>
											<td><?php echo $eqrow['product_details']; ?></td>
											<td><?php echo $eqrow['rate']; ?></td>
											<td><?php echo $eqrow['retail_rate']; ?></td>
											<td><?php echo $eqrow['buy_rate']; ?></td>
											<td style="color:red;" ><?php echo $eqrow['quantity']; ?></td>
											
											
				<!--<td><a  class="btn btn-info" href="productN-Edit?edit_id=<?php echo $eqrow['product_id']; ?>" title="click for edit" 
                 onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Name</a>  
				
				 <a  class="btn btn-danger" href="productN-Price-Edit?edit_id=<?php echo $eqrow['product_id']; ?>" title="click for edit" 
                 onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Price</a>
				</td>-->
				
				
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