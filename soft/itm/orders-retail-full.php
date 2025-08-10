

<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>
<style type="text/css"> 	
	input[type=text].center {text-align:center;}
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th 
  {
  padding: 6px;
  vertical-align:top;
  font-size:16px; 
  line-height: 1.42857143;
  }
   
  .table .btn {padding:5px 10px;font-size:15px;}
  .div-hide {}
	</style>
</head>

<body>
 
<?php   require_once 'header1.php'; ?> 
<?php  // require_once 'sidebar.php'; ?> 

<div   class="container-fluid mt-5 pt-5">

<div class="pagetitle">
      <h1>	  
		<?php if($_GET['o'] == 'add') { ?>
       <i class="glyphicon glyphicon-plus-sign"></i>  New Invoice | <span> <a href="orders-retail?o=manord">   <i class="bi bi-table"></i> </a> </span>  
		<?php } else if($_GET['o'] == 'manord') { ?>
			<i class="glyphicon glyphicon-edit"></i>  Manage Invoice  | <span> <a href="orders-retail?o=add">   <i class="bi bi-plus-square-fill"></i>  </a> 
		<?php } else if($_GET['o'] == 'editOrd') { ?>
			<i class="glyphicon glyphicon-edit"></i>  Edit Invoice  | <span> <a href="orders-retail?o=manord">   <i class="bi bi-table"></i> </a> </span>  
		<?php } ?>
	
	  </h1> 
	   <hr>
    </div> 

	
	<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body mt-3">

<?php   
if($_GET['o'] == 'add') { 
// add order
	echo "<div class='div-request d-none'>add</div>";
} else if($_GET['o'] == 'manord') { 
	echo "<div class='div-request d-none'>manord</div>";
} else if($_GET['o'] == 'editOrd') { 
	echo "<div class='div-request d-none'>editOrd</div>";
} // /else manage order
?>

<?php 
$sql = $con->query("select * from option_status where user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$Curier =$row['courier_service']; 
?>
 
 
<!--
<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>Invoice</li>
  <li class="active">
  	<?php if($_GET['o'] == 'add') { ?>
  		New Invoice - Whole Sale
		<?php } else if($_GET['o'] == 'manord') { ?>
			Manage Invoice
		<?php } // /else manage order ?>
  </li>
</ol>


<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php if($_GET['o'] == 'add') {
		echo "Add Order";
	} else if($_GET['o'] == 'manord') { 
		echo "Manage Order";
	} else if($_GET['o'] == 'editOrd') { 
		echo "Edit Order";
	}
	?>	
</h4>
-->

   
		
 <?php 
$sql = $con->query("select MAX(custom_invoice_no)+1 as max_id,user_id from orders where user_id='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$CustomInv=$row['max_id'];
?>		

<div class="">
	
	<div class="">
	
	 
			
		<?php if($_GET['o'] == 'add') { 
			// add order
			?>			

		<div class="success-messages"></div> <!--/success-messages-->


  		<form class="form-horizontal" method="POST" action="php_action/createOrderRetail.php" id="createOrderForm">

			  
			  <div class="form-group">
			 <!--   <label for="UserId" class="col-sm-2 control-label">স্টাফ আইডি</label>-->
			    <div class="col-sm-12">
				<?php 
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			     
			      <input type="hidden" class="form-control" id="UserId" name="UserId" value="<?php echo $pqrow['userid']; ?>" autocomplete="off"  />
				  
				   <?php }?>
			    </div>
			  </div> 
			
<div class="row">			  
<div class="col-lg-4">	
		
			  	<div class="form-group" style="display:none;">
			    <label for="UserId" class="col-sm-4 control-label">Invoice No</label>
			    <div class="col-sm-8">
				<?php
				 $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."' ");
				 while($pqrow=mysqli_fetch_array($pq)){
				 $User_ID= $pqrow['userid'];	
			}?> 
			
				<?php 
				   $pq=mysqli_query($con,"select MAX(id)+1 as max_id,user_id from orders where user_id='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <td>
		<input class="form-control" type="text" name="OrderId1"  value="<?php echo $pqrow['max_id']; ?>" disabled="true" />
        <input class="form-control" type="hidden" name="OrderId"    value="<?php echo $pqrow['user_id']; ?><?php echo $pqrow['max_id']; ?>"  />
        </td>
		<?php }?>
		
			    </div>
			  </div> 
			  
			  <div class="row mb-3">
			   <label for="CustomInv" class="col-sm-4 col-form-label">Order | Delivery</label> 
			    <div class="col-sm-8">
				<?php
				 $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."' ");
				 while($pqrow=mysqli_fetch_array($pq)){
				 $User_ID= $pqrow['userid'];	
			}?> 
			
				<?php 
				   $pq=mysqli_query($con,"select MAX(custom_invoice_no)+1 as max_custom_id,user_id from orders where user_id='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <td>
		<input style="width:49%;" class="form-control" type="hidden" name="CustomInv1"  value="<?php echo $pqrow['max_custom_id']; ?>" disabled="true" />
        <input class="form-control" type="hidden" name="CustomInv"   value="<?php echo $pqrow['max_custom_id']; ?>"  />

        <input style="width:49%;float:left;" type="text" class="form-control" id="orderDate" name="orderDate" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("m/d/Y"); ?>" autocomplete="off" />
		<input style="width:49%;float:left;margin-left:5px;" type="text" class="form-control" id="DeliveryDate" name="DeliveryDate" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("m/d/Y"); ?>" autocomplete="off"  />
		 		
	   </td>
		<?php }?>
		
			    </div>
			  </div> 
			  
			  
			  <div class="row mb-3">
                  <label for="CustIdName" class="col-sm-4 col-form-label">Name</label>  
			    <div class="col-sm-8">
				
				<select style="width:100%;" class="form-select chosen-select" Id="CustIdName" name="CustIdName" required="" >
		<option value="#">Select Customer Name</option>
		
				      	<?php 
				      	$sql = "SELECT  customer_id,customer_name, address, contact_info FROM customer WHERE member_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]." - ".$row[2]." - ".$row[3]."</option>";
								} 
				      	?>
						
		</select> 
				 
			    </div>
			  </div>
			  
			  <div class="row mb-3">
                  <label for="CustIdPhn" class="col-sm-4 col-form-label">Phone</label> 
			    <div class="col-sm-8">
				
				<select style="width:100%;" class="form-select chosen-select" Id="CustIdPhn" name="CustIdPhn" required="" >
		<option value="#">Select Customer Phone </option>
		
				      	<?php 
				      	$sql = "SELECT  customer_id,contact_info FROM customer WHERE member_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
		</select> 
				 
			    </div>
			  </div>
			
			  
			  
</div>
	
<div class="col-lg-4">	

			  <div class="form-group" style="display:none;" >
			    <label for="CustId" class="col-sm-4 control-label">Client Id </label>
			    <div class="col-sm-8">
			     <input type="text" class="form-control" id="CustId" name="CustId" placeholder="Client Id" value="00" autocomplete="off" />
			    </div>
			  </div>
			  
			  
			 

				<div class="row mb-3">
			    <label for="clientName" class="col-sm-4 control-label">Client Name </label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="clientName" name="clientName" placeholder="Client Name" value="Na" autocomplete="off" />
			    </div>
			  </div>  
			  
			  <div class="row mb-3">
			    <label for="clientContact" class="col-sm-4 control-label">Phone No </label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="clientContact" name="clientContact" placeholder="Contact Number" value="Na" autocomplete="off" />
			    </div>
			  </div>

				 <div class="row mb-3">
			    <label for="clientContact" class="col-sm-4 control-label">Email </label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" value="Na" autocomplete="off" />
			    </div>
			  </div> 	
		 		  
</div>	

<div class="col-lg-4">	 

			 
			  
			  <div class="row mb-3">
			    <label for="clientContact" class="col-sm-4 control-label">Address </label>
			    <div class="col-sm-8">
				   <textarea id="Address" name="Address" class="form-control">Na</textarea>
			     </div>
			  </div>
			  
			    <div class="row mb-3">
			    <label for="PreDue" class="col-sm-4 control-label"> Previous  Dues</label>
			    <div class="col-sm-8">
			    <input type="text" class="form-control" id="PreDue" name="PreDue" placeholder="Previous Due" value="0" autocomplete="off" onkeyup="myFunction()" />
			    </div>
			  </div>
			  
			 	  		
</div>
 		  		
</div> 		  		
 	
            		  

			 
			  <table class="table mt-2" id="productTable" > 
			  	<thead>
				<th colspan="10"> </th>	
			  		<tr> 	
                        <th style="width:4%;"> SL </th> 	  			
			  			<th style="width:18%;">Product  Name </th> 
		<!--  	                <th style="width:16%;display:<?php echo $InvDetail; ?>;"><center> Short Details  </center></th>    --> 
		        		<th style="width:8%;"><center> QR Code  </center></th>   
			  			<th style="width:7%;"><center> Price </center></th>		
		<!--  			<th style="width:6%;"><center> Stock.Qty  </center></th> --> 
			  			<th style="width:5%;"><center> Quantity  </center></th> 
		<!--  			<th style="width:6%;"><center> Ord.Qty  </center></th>   -->
			  			<th style="width:5%;"><center> Add.Qty  </center></th> 
			  			<th style="width:5%;"><center> Back.Qty  </center></th> 
			  			<th style="width:5%;"><center> Stock  </center></th>	  			
		<!--  			<th style="width:6%;"><center> S.Total  </center></th>	-->  			
			  			<th style="width:10%;"><center> Dis Tk  -||- Dis % </center></th>			  			
			  			<th style="width:7%;"><center> Total </center></th>			  			
			  			<th style="width:1%;"><center>Remove</center></th>
			  		</tr>
			  	</thead>
			  	<tbody>
				 
				 <?php
			  		$arrayNumber = 0; // Add Row Option 
			  		for($x = 1; $x < 2; $x++) { ?> <!-- productTable Row View Amount 1 < 2 = 1 -->
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  			
						
						   <td style="padding-left:0px;">	
			  					<div class="form-group">
								<input type="text" value="<?php echo ++$sl; ?>" class="form-control center" readonly>
			  				    </div>
			  				</td>
							
                           <td style="padding-left:0px;">					
			  					<div class="form-group">
			  					<select class="form-select chosen-select" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
			  						<option value=""> Select Product Name </option>
			  						<?php
			  							//$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity != 0"; dont show product when qty=0
										$productSql = "SELECT * FROM product 
			
			                             Left JOIN brand1 ON brand1.brand_id = product.brand_id 
		                                 Left JOIN categories1 ON categories1.cat_id = product.categories_id
		                                 Left JOIN categories_sub ON categories_sub.sub_cat_id = product.sub_cat
			 
										WHERE product.user_id='".$_SESSION['id']."' order by product.product_id asc";
			  							$productData = $con->query($productSql);

			  							while($row = $productData->fetch_array()) {									 		
			  								echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."'> ".$row['product_name']." - ".$row['sub_cat_name']." - ".$row['brand_name']."   </option>";
										 	} // /while 
			  			?>
						
						</select>
			  					</div>
			  			 </td>
						 
						 
							 
						   <td style="padding-left:0px;display:none;">
			  					<div class="form-group">
			  				<input type="text" name="ShortDetails[]" id="ShortDetails<?php echo $x; ?>" value="Na" class="form-control center">
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;"> 
			  				<div class="form-group"> <!--onfocus="this.value=''" -->
			  				<input type="text" name="QrCode[]"  id="QrCode<?php echo $x; ?>" value="0" class="form-control center">
			  					</div>
			  				</td>
                            
							<td style="padding-left:0px;">			  					
			  					<input type="text" name="rate[]" id="rate<?php echo $x; ?>" class="form-control center" onkeyup="getTotal(<?php echo $x ?>)" >			  					
			  					<input type="hidden" name="BuyRate[]" id="BuyRate<?php echo $x; ?>" class="form-control center"  onkeyup="getTotal(<?php echo $x ?>)" >			  					
			  					<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>"  class="form-control" />
                             </td>
							
							<td style="padding-left:0px;display:none;">
			  					<div class="form-group">
			  					<input type="text" name="StockQty[]" id="StockQty<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control" />
								</div>
			  				</td>
							
							<td style="padding-left:;">
			  					<div class="form-group">
			  					<input type="text" name="quantity1[]" id="quantity1<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center" min="1" value="0" disabled="true"/>
			  					<input type="hidden" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center" min="1" value="0" />
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;display:none;">
			  					<div class="form-group">
			  					<input type="text" name="OrdQty[]" id="OrdQty<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center" />
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;">
			  					<div class="form-group">
			  					<input type="text" name="AddQty[]" id="AddQty<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center" value="0" />
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;">
			  					<div class="form-group">
			  					<input type="text" name="BackQty1[]" id="BackQty1<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center"  disabled="true"/>
			  					<input type="hidden" name="BackQty[]" id="BackQty<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center" />
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;">
			  					<div class="form-group">
			  					<input type="text" name="RecQty1[]" id="RecQty1<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center" disabled="true"/>
			  					<input type="hidden" name="RecQty[]" id="RecQty<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center" />
			  					</div>
			  				</td>
			  				  
							 
							<td style="padding-left:0px;display:none;">
			  					<div class="form-group">
			  					<input type="text" name="SingTotal[]" id="SingTotal<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center" />
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;">
			  					<div class="form-group">
			  					<input type="text" style="width:49%;float:left;" name="Discount[]" id="Discount<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center"  />
			  					<input type="text" style="width:49%;float:left;margin-left:2px;" name="DisPrsnt[]" id="DisPrsnt<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center"  />
			  					<input type="hidden" name="DisTaka[]" id="DisTaka<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center"  />
			  					</div>
			  				</td>
							
			  				<td style="padding-left:0px;">			  					
			  					<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control center " disabled="true" />			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />
                            </td>
							
			  				<td>
                          <center> <button class="btn btn-danger removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="bi bi-trash"></i></button> </center>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
			  		} // /for
			  		?>
			  	</tbody>
			  	
			  </table>
			
			  <div>
			  <button type="button" class="btn-sm btn-primary" onclick="addRow()" id="addRowBtn" data-loading-text="Loading...">  <i class="bi bi-plus-circle"></i>  Add New</button>
			  </div><hr> 

<div class="row mt-3">
<div class="col-lg-4">
			  
			  	
				  
				  <div class="row mb-3" style="display:none;" >
				    <label for="subTotal" class="col-sm-4 control-label"> Sub Amount</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				  </div>
				  
				  <div class="row mb-3 d-none">
				    <label for="vat" class="col-sm-4 control-label"> Vat %</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="vat" name="vat" disabled="true" />
				      <input type="hidden" class="form-control" id="vatValue" name="vatValue" />
				    </div>
				  </div>
				  
				  
				 <div class="row mb-3">
				    <label for="totalAmount" class="col-sm-4 control-label">Total Amount</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true"/>
				      <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
				    </div>
				  </div> 
				  
				 
				  
				  <div class="row mb-3">
				    <label for="discount" class="col-sm-4 control-label">Discount   Tk || %</label>
				    <div class="col-sm-8">
				      <input style="width:32%;float:left;" type="text" class="form-control text-center" id="discount" name="discount" value="0" onkeyup="discountFunc()"  autocomplete="off" />
				      <input style="width:32%;float:left;margin-left:5px;" type="text" class="form-control text-center" id="TotalDisP" name="TotalDisP" value="0" onkeyup="discountFunc()"   autocomplete="off" />
				      <input  type="hidden" class="form-control text-center" id="DisAmt" name="DisAmt" value="0" onkeyup="discountFunc()"   autocomplete="off" />
					  <input style="width:32%;float:left;margin-left:5px;" type="text" class="form-control text-center" id="grandTotal" name="grandTotal" disabled="true" onkeyup="discountFunc()" />
				      <input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" onkeyup="discountFunc()" />
				    </div>
				  </div>  
				  
				   <div class="row mb-3">
				    <label for="GTotal" class="col-sm-4 control-label">G.Total + Pre.Dues </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control text-center" id="GTotal1" name="GTotal1" autocomplete="off" disabled="true"  />
				      <input type="hidden" class="form-control" id="GTotal" name="GTotal" autocomplete="off"  />
				    </div>
				  </div> 
				  
				  <div class="row mb-3" style="display:<?php echo $Curier; ?>;">
				    <label for="clientContact" class="col-sm-4 control-label"> Courier Service</label>
				    <div class="col-sm-8">
				      <select class="form-select chosen-select" name="InvCourier" id="InvCourier">
				      	 
						<?php 
				      	$sql = "SELECT  id,courier_name FROM courier WHERE user_id=22";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
						<?php 
				      	$sql = "SELECT  id,courier_name FROM courier WHERE user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
				      </select>
				    </div>
			   </div>  
			   
				  
			  </div>  
			  
			  
				

<div class="col-lg-4" >  
 

			 <div class="row mb-3" style="display:none;">
				    <label for="grandTotal" class="col-sm-4 control-label">Courier Service</label>
				    <div class="col-sm-8">
				    <textarea id="Courier" name="Courier" class="form-control">...</textarea>
					</div>
				</div>	
				
				

				<div class="row mb-3" style="display:<?php echo $Curier; ?>;">
				    <label for="paid" class="col-sm-4 control-label">Courier Charge</label>
				    <div class="col-sm-8">
				      <input style="width:49%;float:left;" type="text" class="form-control text-center" id="CouCrg" name="CouCrg" autocomplete="off" onkeyup="CourierFunc()" value="0" />
					  <input style="width:49%;float:left;margin-left:5px;" type="text" class="form-control text-center" id="FinalTotal" name="FinalTotal" autocomplete="off" onkeyup="CourierFunc()"  readonly>
					</div>
				  </div> 
		
		      <div class="row mb-3">
				    <label for="paid" class="col-sm-4 control-label">Paid Money / Due</label>
				    <div class="col-sm-8">
				      <input style="width:49%;float:left;" type="text" class="form-control text-center" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()"  />
					   <input type="hidden" class="form-control" id="Paid_dd" name="Paid_dd" autocomplete="off" value="0" onkeyup="paidAmount()"    />
				      
					  <input style="width:49%;float:left;margin-left:5px;" type="text" class="form-control text-center" id="RecDues1" name="RecDues1"  disabled="true"/>
				      <input type="hidden" class="form-control" id="RecDues" name="RecDues" value="0.00">
					</div>
				  </div> 
				  	  
				  <div class="row mb-3">
				    <label for="clientContact" class="col-sm-4 control-label">Payment Type</label>
				    <div class="col-sm-8">
				      <select class="form-select chosen-select" name="paymentType" id="paymentType" >
				      	 <?php 
				      	$sql = "SELECT  pt_id,pt_name FROM payment_type where user_id=22 ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
				      	<?php 
				      	$sql = "SELECT  pt_id,pt_name FROM payment_type where user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
				      </select>
					  
					  <input type="hidden" class="form-control" id="PaymType" name="PaymType" value="Cash">
				    </div>
				  </div>  
				  
				  <div class="row mb-3">
				    <label for="clientContact" class="col-sm-4 control-label">Payment Status</label>
				    <div class="col-sm-8">
				      <select class="form-select chosen-select" name="paymentStatus" id="paymentStatus">
				      	 <?php 
				      	$sql = "SELECT  ps_id,ps_name FROM payment_status where user_id=22";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
						<?php 
				      	$sql = "SELECT  ps_id,ps_name FROM payment_status where user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
				      </select>
				    </div>
				  </div> 
				   
				  
				  
				  			  
	</div> 

<div class="col-lg-4"> 

				<div class="row mb-3" style="display:<?php echo $Curier; ?>;">
				    <label for="DeliStatus" class="col-sm-4 control-label">Delivery Status</label>
				    <div class="col-sm-8">
				      <select class="form-select chosen-select" name="DeliStatus" id="DeliStatus">
				      							
						<?php 
				      	$sql = "SELECT  id,dlvry_name FROM delivery where user_id=22 and status=1";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
						<?php 
				      	$sql = "SELECT  id,dlvry_name FROM delivery where user_id=22 and status=0";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
						<?php 
				      	$sql = "SELECT  id,dlvry_name FROM delivery WHERE user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
				      </select>
				    </div>
				</div>  

			 <div class="row mb-3">
				    <label for="clientContact" class="col-sm-4 control-label">Select Comments</label>
				    <div class="col-sm-8">
				      <select class="form-select chosen-select" name="InvComments" id="InvComments">
				      	<option> Select</option>
						<?php 
				      	$sql = "SELECT  id,comments_name FROM invoice_comments WHERE user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
				      </select>
				    </div>
				</div>  

				<div class="row mb-3">
				    <label for="grandTotal" class="col-sm-4 control-label">Comments</label>
				    <div class="col-sm-8">
				    <textarea id="Comments" name="Comments" class="form-control">...</textarea>
					</div>
				</div>	
</div>   
</div>   
			  <div class="form-group submitButtonFooter"> 
			    <div class=" col-sm-12 text-center"><hr>
			    <button type="button" class="btn btn-primary" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="bi bi-plus-circle"></i>  Add New </button>
                <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"> <i class="bi bi-check-circle"></i> Save</button>
                <!--<button type="reset" class="btn btn-danger" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>-->
			    </div>
			  </div>
			</form>
		<?php } else if($_GET['o'] == 'manord') { 
			// manage order
			?>

			<div id="success-messages"></div>
			
			<table class="table table-hover" id="manageOrderTable" style="width:100%;">
				<thead>
					<tr>
						<!-- <th>Sl No</th> -->
						<th>Invoice No</th>
				<!-- 	<th>User</th> -->
						<th>Date</th>
						<th>Customer</th>
			<!--		<th>Mobile</th> -->
						<th>Pre.Due</th>
						<th>Item</th>
						<th>Today Total </th>
						<th>GT Price </th>
		               <th>Paym.Type</th>  
		    <!--       <th>Status</th>   -->
						<th>Print ||  Edit</th>
					</tr>
				</thead>
			</table>

		<?php 
		// /else manage order
		} else if($_GET['o'] == 'editOrd') {
			// get order
			?>
			
			<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/editOrder.php" id="editOrderForm">

  			<?php $orderId = $_GET['i'];

  			$sql = "SELECT orders.order_id, orders.order_date, orders.client_name, orders.client_contact, orders.sub_total, orders.vat, orders.total_amount,
			orders.discount,orders.pre_due, orders.today_total, orders.grand_total, orders.paid, orders.deliver_date_paid, orders.due, orders.payment_type, orders.payment_status,orders.customer_id ,orders.user_id,orders.address,orders.order_email,orders.inv_comments ,orders.custom_invoice_no,   
			orders.payment_type,payment_type.pt_name,orders.payment_status,payment_status.ps_name,orders.inv_courier,courier.courier_name,orders.courier_charge,orders.dis_taka,orders.dis_prcnt, orders.delivery_status, delivery.dlvry_name, orders.deliver_date_or_last_update
			FROM orders  
			
			left join `payment_type` on payment_type.pt_id=orders.payment_type
			left join `delivery` on delivery.id=orders.delivery_status
			left join `payment_status` on payment_status.ps_id=orders.payment_status
			left join `courier` on courier.id=orders.inv_courier
			
             WHERE orders.order_id = {$orderId}";

				$result = $con->query($sql);
				$data = $result->fetch_row();				
  			?>

<div class="row">	
<div class="col-lg-6">	

			  <div class="row mb-3"  style="display:none;" >
			    <label for="orderId" class="col-sm-4 control-label">User Id</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="UserId1" name="UserId1" autocomplete="off" value="<?php echo $data[17] ?>" disabled="true" />
			      <input type="hidden" class="form-control" id="UserId" name="UserId" autocomplete="off" value="<?php echo $data[17] ?>"  />
			    </div>
			  </div>
		  
             <div class="row mb-3"  style="display:none;" >
			    <label for="orderId" class="col-sm-4 control-label">Client</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="CustId1" name="CustId1" autocomplete="off" value="<?php echo $data[16] ?>" disabled="true" />
			      <input type="hidden" class="form-control" id="CustId" name="CustId" autocomplete="off" value="<?php echo $data[16] ?>"  />
			    </div>
			  </div>

             <div class="row mb-3">
			    <label for="orderIDa" class="col-sm-4 control-label">Invoice No </label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="orderIDa1" name="orderIDa1" autocomplete="off" value="<?php echo $data[0] ?>" disabled="true" />
			      <input type="hidden" class="form-control" id="orderIDa" name="orderIDa" autocomplete="off" value="<?php echo $data[0] ?>"  />
			    </div>
			  </div>
			  
			  <div class="row mb-3">
			    <label for="orderDate" class="col-sm-4 control-label">Order | Delivery </label>
			    <div class="col-sm-8">
				<input style="width:49%;float:left;" type="text" class="form-control" id="orderDate" name="orderDate" value="<?php echo $data[1] ?>" autocomplete="off" />
		       <input style="width:49%;float:left;margin-left:5px;" type="date" class="form-control" id="DeliveryDate" name="DeliveryDate" value="<?php echo $data[33] ?>" autocomplete="off"  />
			
			  </div>
			  </div> 
			  
			  <div class="row mb-3">
			    <label for="clientName" class="col-sm-4 control-label">Customer</label>
			    <div class="col-sm-8">
			      <input type="hidden" class="form-control" id="clientName1" name="clientName1" placeholder="Client Name" autocomplete="off" value="<?php echo $data[2] ?>" disabled="true" />
			      <input type="text" class="form-control" id="clientName" name="clientName" placeholder="Client Name" autocomplete="off" value="<?php echo $data[2] ?>" />
			    </div>
			  </div>  
</div>   


<div class="col-lg-6">	
 
			  <div class="row mb-3">
			    <label for="clientContact" class="col-sm-4 control-label">Phone No</label>
			    <div class="col-sm-8">
			      <input type="hidden" class="form-control" id="clientContact1" name="clientContact1" placeholder="Contact Number" autocomplete="off" value="<?php echo $data[3] ?>"  disabled="true"/>
			      <input type="text" class="form-control" id="clientContact" name="clientContact" placeholder="Contact Number" autocomplete="off" value="<?php echo $data[3] ?>" />
			    </div>
			  </div> 
			  
			   <div class="row mb-3">
			    <label for="clientContact" class="col-sm-4 control-label">Address </label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="Address" name="Address" placeholder="Address" value="<?php echo $data[18] ?>" autocomplete="off" />
			    </div>
			  </div>

             <div class="row mb-3">
			    <label for="PreDue" class="col-sm-4 control-label"> Previous Due</label>
			    <div class="col-sm-8">
			      <input type="hidden" class="form-control" id="PreDue1" name="PreDue1" placeholder="Previous Due" autocomplete="off" disabled="true" onkeyup="myFunction()" value="<?php echo $data[8] ?>" disabled="true"/>
			      <input type="text" class="form-control" id="PreDue" name="PreDue" placeholder="Previous Due" autocomplete="off" onkeyup="myFunction()" value="<?php echo $data[8] ?>"  />
			    </div>
			  </div>			  
</div>			  
 
<div class="col-lg-12 mt-2">	
			  <table class="table" id="productTable">
			  	<thead>
				       <tr> 	
                        <th style="width:4%;"> SL </th> 	  			
			  			<th style="width:18%;">Product  Name </th> 
		 <!--       <th style="width:16%;display:<?php echo $InvDetail; ?>;"><center> Short Details  </center></th>     --> 
		                <th style="width:8%;"><center> QR Code  </center></th>   
			  			<th style="width:7%;"><center> Price </center></th>		
		<!--  			<th style="width:6%;"><center> Stock.Qty  </center></th> --> 
			  			<th style="width:5%;"><center> Quantity  </center></th> 
		<!--  			<th style="width:6%;"><center> Ord.Qty  </center></th>   -->
			  			<th style="width:5%;"><center> Add.Qty  </center></th> 
			  			<th style="width:5%;"><center> Back.Qty  </center></th> 
			  			<th style="width:5%;"><center> Stock  </center></th>	  			
		<!--  			<th style="width:6%;"><center> S.Total  </center></th>	-->  			
			  			<th style="width:10%;"><center> Dis Tk  -||- Dis % </center></th>			  			
			  			<th style="width:7%;"><center> Total </center></th>			  			
			  			<th style="width:1%;"><center>Remove</center></th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php
                    $orderItemSql = "SELECT order_item.order_item_id, order_item.order_id, order_item.product_id, product.quantity,order_item.order_quantity,
					order_item.rate,order_item.single_sub_total,order_item.buy_rate, order_item.total, order_item.short_details, order_item.pro_qr_code,order_item.single_dis_taka,order_item.single_dis_prcnt,order_item.single_discount,order_item.back_qty
					FROM order_item 
					left join product on product.product_id=order_item.product_id
					WHERE order_item.order_id = {$orderId}";
						$orderItemResult = $con->query($orderItemSql);
						// $orderItemData = $orderItemResult->fetch_all();						
						
						// print_r($orderItemData);
			  		$arrayNumber = 0;
			  		// for($x = 1; $x <= count($orderItemData); $x++) {
			  		$x = 1;
			  		while($orderItemData = $orderItemResult->fetch_array()) { 
			  			// print_r($orderItemData); ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				
							<td style="padding-left:0px;">
			  					<div class="form-group">
								<input type="text" value="<?php echo ++$sl; ?>" class="form-control center" readonly>
			  				    </div>
			  				</td>
							
							<td style="padding-left:0px;">
			  					<div class="form-group">
			  					<select class="form-select chosen-select" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
			  						<option value="">Select Service / Category</option>
			  						<?php
									//$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity != 0"; dont show product when qty=0
			  							$productSql = "SELECT * FROM product WHERE user_id='".$_SESSION['id']."' order by product.product_id asc" ; 
			  							$productData = $con->query($productSql);

			  							while($row = $productData->fetch_array()) {									 		
			  								$selected = "";
			  								if($row['product_id'] == $orderItemData['product_id']) {
			  									$selected = "selected";
			  								} else {
			  									$selected = "";
			  								}

			  								echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."' ".$selected." >".$row['product_name']."</option>";
										 	} // /while 

			  						?>
		  						</select>
			  					</div>
			  				</td>
							
							<td style="padding-left:0px; display:none;">
			  					<div class="form-group">
			  				<input type="text" name="ShortDetails[]" id="ShortDetails<?php echo $x; ?>" value="<?php echo $orderItemData['short_details']; ?>" class="form-control center">
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;">
			  					<div class="form-group">
			  				<input type="text" name="QrCode[]" id="QrCode<?php echo $x; ?>" value="<?php echo $orderItemData['pro_qr_code']; ?>" class="form-control center">
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;">			  					
			  					<input type="text" name="rate[]" id="rate<?php echo $x; ?>" class="form-control center" value="<?php echo $orderItemData['rate']; ?>" onkeyup="getTotal(<?php echo $x ?>)" >			  					
			  					<input type="hidden" name="BuyRate[]" id="BuyRate<?php echo $x; ?>" class="form-control center" value="<?php echo $orderItemData['buy_rate']; ?>" onkeyup="getTotal(<?php echo $x ?>)" >			  					
			  					<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>"  class="form-control" value="<?php echo $orderItemData['rate']; ?>" />
                             </td>
							
							<td style="padding-left:0px;display:none;">
			  					<div class="form-group">
			  					<input type="text" name="StockQty[]" id="StockQty<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control" value="<?php echo $orderItemData['quantity']; ?>" />
								</div>
			  				</td>
							
							<td style="padding-left:0px;">
			  					<div class="form-group">
			  					<input type="hidden" name="quantity1[]" id="quantity1<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center" min="1" value="<?php echo $orderItemData['order_quantity']; ?>" readonly="readonly"/>
			  					<input type="hidden" name="quantity2[]" id="quantity2<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center" min="1" value="<?php echo $orderItemData['order_quantity']; ?>" readonly="readonly"/>
			  					<input type="text" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center" min="1" value="<?php echo $orderItemData['order_quantity']; ?>" readonly="readonly" />
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;display:none;">
			  					<div class="form-group">
			  					<input type="text" name="OrdQty[]" id="OrdQty<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center" value="<?php echo $orderItemData['order_quantity']; ?>" />
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;">
			  					<div class="form-group">
			  					<input type="text" name="AddQty[]" id="AddQty<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center" value="0" />
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;">
			  					<div class="form-group">
			  					<input type="text" name="BackQty[]" id="BackQty<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center"  value="<?php echo $orderItemData['back_qty']; ?>">
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;">
			  					<div class="form-group">
			  					<input type="text" name="RecQty1[]" id="RecQty1<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center"  value="<?php echo $orderItemData['quantity'];?>" disabled="true"/>
			  					<input type="hidden" name="RecQty[]" id="RecQty<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control center"  value="<?php echo $orderItemData['quantity'];?>" />
			  					</div>
			  				</td>
			  				  
							 
							<td style="padding-left:0px;display:none;">
			  					<div class="form-group">
			  					<input type="text" name="SingTotal[]" id="SingTotal<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center" value="<?php echo $orderItemData['single_sub_total']; ?>" />
			  					</div>
			  				</td>
							
							<td style="padding-left:0px;">
			  					<div class="form-group">
			  					<input type="text" style="width:49%;float:left;" name="Discount[]" id="Discount<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center"  value="<?php echo $orderItemData['single_dis_taka']; ?>"/>
			  					<input type="text" style="width:49%;float:left;margin-left:2px;" name="DisPrsnt[]" id="DisPrsnt<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center" value="<?php echo $orderItemData['single_dis_prcnt']; ?>" />
			  					<input type="hidden" name="DisTaka[]" id="DisTaka<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control center" value="<?php echo $orderItemData['single_discount']; ?>" />
			  					</div>
			  				</td>
							
							 							
			  				<td style="padding-left:0px;">			  					
			  					<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control center" disabled="true" value="<?php echo $orderItemData['total']; ?>"/>			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $orderItemData['total']; ?>"/>			  					
							 </td>
			  				<td> 
			  	<center><button class="btn btn-danger removeProductRowBtn center" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="bi bi-trash"></i></button></center>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
		  			$x++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>
</div> 


	<div class="row mt-2">
	 <div class="col-lg-4">
			  
			  	<div class="row mb-3" style="display:none;" >
				    <label for="subTotal" class="col-sm-4 control-label">Sub Amount</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" value="<?php echo $data[4] ?>" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" value="<?php echo $data[4] ?>" />
				    </div>
				  </div> 
				  
				  <div class="row mb-3" style="display:none;" >
				    <label for="vat" class="col-sm-4 control-label">Vat %</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="vat" name="vat" disabled="true" value="<?php echo $data[5] ?>"  />
				      <input type="hidden" class="form-control" id="vatValue" name="vatValue" value="<?php echo $data[5] ?>"  />
				    </div>
				  </div> 
				  
				  <div class="row mb-3" >
				    <label for="totalAmount" class="col-sm-4 control-label">Sub Total Amount </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true" value="<?php echo $data[6] ?>" />
				      <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" value="<?php echo $data[6] ?>"  />
				    </div>
				  </div> 
				  
				  
				  <div class="row mb-3">
				    <label for="discount" class="col-sm-4 control-label">Discount Tk || %</label>
				    <div class="col-sm-8">
				      <input style="width:32%;float:left;" type="text" class="form-control text-center" id="discount" name="discount"   onkeyup="discountFunc()"  autocomplete="off" value="<?php echo $data[29] ?>"/>
				      <input style="width:32%;float:left;margin-left:5px;" type="text" class="form-control text-center" id="TotalDisP" name="TotalDisP"   onkeyup="discountFunc()"   autocomplete="off" value="<?php echo $data[30] ?>"/>
				      <input  type="hidden" class="form-control text-center" id="DisAmt" name="DisAmt"  onkeyup="discountFunc()"   autocomplete="off"  value="<?php echo $data[7] ?>"/>
					  <input style="width:32%;float:left;margin-left:5px;" type="text" class="form-control text-center" id="grandTotal" name="grandTotal" disabled="true" onkeyup="discountFunc()" value="<?php echo $data[9] ?>" />
				      <input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" onkeyup="discountFunc()" value="<?php echo $data[9] ?>"/>
				    </div>
				  </div>  
				  			  	 
				  
				  
				  <div class="row mb-3">
				    <label for="GTotal" class="col-sm-4 control-label">Pre.Due + G.Total </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="GTotal1" name="GTotal1" autocomplete="off" value="<?php echo $data[9] ?>"  disabled="true"  />
				      <input type="hidden" class="form-control" id="GTotal" name="GTotal" autocomplete="off" value="<?php echo $data[9] ?>"  />
				</div>
					
				  </div> 
				  
				  <div class="row mb-3" style="display:<?php echo $Curier; ?>;">
				    <label for="clientContact" class="col-sm-4 control-label"> Courier Service</label>
				    <div class="col-sm-8">
				      <select class="form-select chosen-select" name="InvCourier" id="InvCourier" required>
				      	<option value="<?php echo $data[26] ?>"><?php echo $data[27] ?></option>
						<?php 
				      	$sql = "SELECT  id,courier_name FROM courier WHERE user_id=22";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
						<?php 
				      	$sql = "SELECT  id,courier_name FROM courier WHERE user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
				      </select>
				    </div>
			</div>  

		  		  
</div>   

<div class="col-lg-4">

                <div class="row mb-3" style="display:<?php echo $Curier; ?>;">
				    <label for="paid" class="col-sm-4 control-label">Courier Charge</label>
				    <div class="col-sm-8">
				      <input style="width:49%;float:left;" type="text" class="form-control text-center" id="CouCrg" name="CouCrg" autocomplete="off" onkeyup="CourierFunc()" value="<?php echo $data[28] ?>" />
					  <input style="width:49%;float:left; margin-left:5px;" type="text" class="form-control text-center" id="FinalTotal" name="FinalTotal" autocomplete="off" onkeyup="CourierFunc()"  value="<?php echo $data[10] ?>" readonly>
					</div>
				  </div> 
			   
			  	<div class="row mb-3">
				    <label for="paid" class="col-sm-4 control-label">Paid Amount / Due</label>
				    <div class="col-sm-8">
				      <input type="hidden" class="form-control" id="paid11" name="paid11" autocomplete="off" onkeyup="paidAmount()" value="<?php echo $data[11] ?>" disabled="true"   />
				      <input style="width:49%;float:left;" type="text" class="form-control text-center" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" value="<?php echo $data[11] ?>"   />
				      <input style="width:49%;float:left; margin-left:5px;" type="text" class="form-control text-center" id="RecDues1" name="RecDues1" value="<?php echo $data[13] ?>"  disabled="true"/>
				      <input type="hidden" class="form-control" id="RecDues" name="RecDues" value="<?php echo $data[13] ?>" />
				    
					</div>
				  </div> 
				  
				  <div class="row mb-3" style="display:none;" >
				    <label for="Paid_dd" class="col-sm-4 control-label">Paid ( Delivery Date )</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="Paid_dd" name="Paid_dd" autocomplete="off" onkeyup="paidAmount()" value="<?php echo $data[12] ?>"   />
				    </div>
				  </div> 
				  
		 
				  
		 
				  <div class="row mb-3">
				    <label for="clientContact" class="col-sm-4 control-label">Payment Type</label>
				    <div class="col-sm-8">
				      <select class="form-select chosen-select" name="paymentType" id="paymentType" >
				      	<option value="<?php echo $data[22] ?>"><?php echo $data[23] ?></option>
				      		<?php 
				      	$sql = "SELECT  pt_id,pt_name FROM payment_type where user_id=22 ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
						<?php 
				      	$sql = "SELECT  pt_id,pt_name FROM payment_type where user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?> 

				      </select>
					  
					  <input type="hidden" class="form-control" id="PaymType" name="PaymType" value="<?php echo $data[23] ?>">
					  
				    </div>
				  </div>  
				  
				  <div class="row mb-3">
				    <label for="clientContact" class="col-sm-4 control-label">Payment Status</label>
				    <div class="col-sm-8">
				      <select class="form-select chosen-select" name="paymentStatus" id="paymentStatus">
				      	<option value="<?php echo $data[24] ?>"><?php echo $data[25] ?></option>
				      	<?php 
				      	$sql = "SELECT  ps_id,ps_name FROM payment_status where user_id=22";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
						<?php 
				      	$sql = "SELECT  ps_id,ps_name FROM payment_status where user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
				      </select>
				    </div>
				  </div>  	
	</div>  
	
	
<div class="col-lg-4">

<div class="row mb-3" style="display:<?php echo $Curier; ?>;">
				    <label for="DeliStatus" class="col-sm-4 control-label">Delivery Status</label>
				    <div class="col-sm-8">
				      <select class="form-select chosen-select" name="DeliStatus" id="DeliStatus">
				      	<option value="<?php echo $data[31] ?>"><?php echo $data[32] ?></option>						
						<?php 
				      	$sql = "SELECT  id,dlvry_name FROM delivery where user_id=22 and status=1";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
						<?php 
				      	$sql = "SELECT  id,dlvry_name FROM delivery where user_id=22 and status=0";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
						<?php 
				      	$sql = "SELECT  id,dlvry_name FROM delivery WHERE user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
				      </select>
				    </div>
				</div>  
				

<div class="row mb-3">
				    <label for="clientContact" class="col-sm-4 control-label">Select Comment</label>
				    <div class="col-sm-8">
				      <select class="form-select chosen-select" name="InvComments" id="InvComments">
				      	<option >Select</option>
						<?php 
				      	$sql = "SELECT  id,comments_name FROM invoice_comments WHERE user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
				      </select>
				    </div>
			</div>  

				<div class="row mb-3">
				    <label for="grandTotal" class="col-sm-4 control-label">Comments</label>
				    <div class="col-sm-8">
				    <textarea id="Comments" name="Comments" class="form-control"><?php echo $data[20] ?></textarea>
					</div>
				</div>	
		     
</div> 

               
			  <div class="row mb-3 editButtonFooter"> 
			    <div class="col-sm-12 text-center"><hr>
			    <button type="button" class="btn btn-primary" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="bi bi-plus-circle"></i> Add New </button>

			    <input type="hidden" name="orderId" id="orderId" value="<?php echo $_GET['i']; ?>" />

			    <button type="submit" id="editOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="bi bi-check-circle"></i> Invoice Update </button>
			      
			    </div>
			  </div>
			  
			</form>

			<?php
		} // /get order else  ?>


	</div>  	
</div>  

 
<div class="modal fade" tabindex="-1" role="dialog" id="paymentOrderModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i> Edit Payment</h4>
      </div>      

      <div class="modal-body form-horizontal" style="max-height:500px; overflow:auto;" >

      	<div class="paymentOrderMessages"></div>

      	     				 				 
			  <div class="row mb-3">
			    <label for="due" class="col-sm-3 control-label">Due Amount</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="due" name="due" disabled="true" />					
			    </div>
			  </div>
			  
			  
			  <div class="row mb-3">
			    <label for="payAmount" class="col-sm-3 control-label">Pay Amount</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="payAmount" name="payAmount"/>					      
			    </div>
			  </div>
			  
			  
			  <div class="row mb-3">
			    <label for="clientContact" class="col-sm-3 control-label">Payment Type</label>
			    <div class="col-sm-9">
			      <select class="form-select chosen-select" name="paymentType" id="paymentType" >
			      	<option value="">~~SELECT~~</option>
			      	<option value="1">Cheque</option>
			      	<option value="2">Cash</option>
			      	<option value="3">Credit Card</option>
			      </select>
			    </div>
			  </div>

			  
			  <div class="row mb-3">
			    <label for="clientContact" class="col-sm-3 control-label">Payment Status</label>
			    <div class="col-sm-9">
			      <select class="form-select chosen-select" name="paymentStatus" id="paymentStatus">
			      	<option value="">~~SELECT~~</option>
			      	<option value="1">Full Payment</option>
				      	<option value="2">Advance Payment</option>
				      	<option value="3">Half Payment</option>
				      	<option value="4">Some Payment</option>
				      	<option value="5">No Payment</option>
			      </select>
			    </div>
			  </div> 							  				  
      	        
      </div>


	  
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="updatePaymentOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>	
      </div>           
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /edit order-->

<!-- remove order -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeOrderModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Order</h4>
      </div>
      <div class="modal-body">

      	<div class="removeOrderMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div> 
  </div> 
</div> 
 
</div>
</div>
          </div>
		  
		  
		  <?php require_once '../includes/footer.php'; ?>

        </div> 
    </section> 
	
</div> 

<?php require_once 'footer1.php'; ?>


<script>
	$("#CustIdPhn").on("change", function(){
		var customerID = $("#CustIdPhn").val();
		if(customerID == "")
		{
			alert("Please enter a valid customer ID!");
		}
						
		else{
			$.ajax({url: "ajax_c_load.php?c=" + customerID, success: function(result){
				var customer = JSON.parse(result);
				
				$("#CustId").val(customer.CustomerIdd);
				$("#clientName1").val(customer.customerName);
				$("#clientName").val(customer.customerName);
				$("#clientContact1").val(customer.customerContact);
				$("#clientContact").val(customer.customerContact);
				$("#Address").val(customer.customerAddress);
				
				$("#PreDue1").val(customer.preDues);
				$("#PreDue").val(customer.preDues);
				
			}});
		}
	});
</script>

<script>
	$("#CustIdName").on("change", function(){
		var customerID = $("#CustIdName").val();
		if(customerID == "")
		{
			alert("Please enter a valid customer ID!");
		}
						
		else{
			$.ajax({url: "ajax_c_load_by_phn.php?c=" + customerID, success: function(result){
				var customer = JSON.parse(result);
				
				$("#CustId").val(customer.CustomerIdd);
				$("#clientName1").val(customer.customerName);
				$("#clientName").val(customer.customerName);
				$("#clientContact1").val(customer.customerContact);
				$("#clientContact").val(customer.customerContact);
				$("#Address").val(customer.customerAddress);
				
				$("#PreDue1").val(customer.preDues);
				$("#PreDue").val(customer.preDues);
				
			}});
		}
	});
</script>


<script>
	$("#InvCourier").on("change", function(){
		var InvCourier = $("#InvCourier").val();
		if(InvCourier == "")
		{
			alert("Please enter a valid Courier !");
		}
						
		else{
			$.ajax({url: "ajax_c_load_inv_courier.php?c=" + InvCourier, success: function(result){
				var customer = JSON.parse(result);
				
				$("#Courier").val(customer.CurName); 
				
			}});
		}
	});
</script>


<script>
	$("#paymentType").on("change", function(){
		var InvComment = $("#paymentType").val();
		if(InvComment == "")
		{
			alert("Please enter a valid Comments !");
		}
						
		else{
			$.ajax({url: "ajax_c_load_pmnt.php?c=" + InvComment, success: function(result){
				var customer = JSON.parse(result);
				
				$("#PaymType").val(customer.PmntName); 
				
			}});
		}
	});
</script>


<script>
	$("#InvComments").on("change", function(){
		var InvComment = $("#InvComments").val();
		if(InvComment == "")
		{
			alert("Please enter a valid Comments !");
		}
						
		else{
			$.ajax({url: "ajax_c_load_inv_comments.php?c=" + InvComment, success: function(result){
				var customer = JSON.parse(result);
				
				$("#Comments").val(customer.ComName); 
				
			}});
		}
	});
</script>

<script src="custom/js/order_retail.js"></script>
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>



<!--Add Row Option Line No 158, 159 ->
	