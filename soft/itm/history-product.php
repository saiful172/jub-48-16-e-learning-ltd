<!DOCTYPE html>
<html lang="en">  

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 


<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Product History |  <span> <a href="product-list">   <i class="bi bi-table"></i> </a> </span> </h1>
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
            
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
  
  <?php  require_once 'footer1.php'; ?>