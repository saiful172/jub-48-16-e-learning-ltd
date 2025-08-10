<?php require_once 'header.php'; ?>
<?php require_once 'includes/db_connect.php' ?>
<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$InvoiceNo = $_POST['InvoiceNo'];
		$Product_Id = $_POST['Product_Id'];
		$ProductName = $_POST['ProductName'];
		$BrandId = $_POST['BrandId'];
		$CategoriesId = $_POST['CategoriesId'];
		
		$Quantity = $_POST['Quantity'];
		$AddQuantity = $_POST['AddQuantity'];
		$TotalQty = $_POST['TotalQty'];
		$TotalQtyPrice = $_POST['TotalQtyPrice'];
		$SaleRate = $_POST['SaleRate'];
		$TotalSaleRate = $_POST['TotalSaleRate'];
		$BuyRate = $_POST['BuyRate'];
		$TotalBuyRate = $_POST['TotalBuyRate'];
		$TotalIncome = $_POST['TotalIncome'];
		$Date = $_POST['Date'];
		
				
		if(empty($InvoiceNo)){
			$errMSG = "Please Enter InvoiceNo .";
		}
		
		else if(empty($ProductName)){
			$errMSG = "Please Select Product And Click Ok.";
		}
		
		else if(empty($AddQuantity)){
			$errMSG = "Please Enter AddQuantity.";
		}
		
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO sales_return (admin_id,user_id,chalan_no,product_id,product_name, brand_id, categories_id, quantity,  add_qty,    total_qty,     total_qty_price, rate,      total_rate,    buy_rate, total_buy_rate, total_income,entry_date) 
			                                               VALUES(:UserId,:UserId,:InvoiceNo,:Product_Id,:ProductName, :BrandId, :CategoriesId, :Quantity, :AddQuantity,:TotalQty, :TotalQtyPrice, :SaleRate, :TotalSaleRate,:BuyRate, :TotalBuyRate, :TotalIncome, :Date  )');
			
		
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':InvoiceNo',$InvoiceNo);
			$stmt->bindParam(':Product_Id',$Product_Id);
			$stmt->bindParam(':ProductName',$ProductName);
			$stmt->bindParam(':BrandId',$BrandId);
			$stmt->bindParam(':CategoriesId',$CategoriesId);
			
			$stmt->bindParam(':Quantity',$Quantity);
			$stmt->bindParam(':AddQuantity',$AddQuantity);
			$stmt->bindParam(':TotalQty',$TotalQty);
			$stmt->bindParam(':TotalQtyPrice',$TotalQtyPrice);
			$stmt->bindParam(':SaleRate',$SaleRate);
			$stmt->bindParam(':TotalSaleRate',$TotalSaleRate);
			$stmt->bindParam(':BuyRate',$BuyRate);
			$stmt->bindParam(':TotalBuyRate',$TotalBuyRate);
			$stmt->bindParam(':TotalIncome',$TotalIncome);
			$stmt->bindParam(':Date',$Date);
			
			
			
			if($stmt->execute())
			{
				$successMSG = "Product Stock Add Successfully...";
				//header("refresh:2;admin/index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>

<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$Product_Id = $_POST['Product_Id'];
		$ProductName = $_POST['ProductName'];
		$BrandId = $_POST['BrandId'];
		$CategoriesId = $_POST['CategoriesId'];
		
		$Quantity = $_POST['Quantity'];
		$AddQuantity = $_POST['AddQuantity'];
		$TotalQty = $_POST['TotalQty'];
		$TotalQtyPrice = $_POST['TotalQtyPrice'];
		$SaleRate = $_POST['SaleRate'];
		$TotalSaleRate = $_POST['TotalSaleRate'];
		$BuyRate = $_POST['BuyRate'];
		$TotalBuyRate = $_POST['TotalBuyRate'];
		$TotalIncome = $_POST['TotalIncome'];
		$Date = $_POST['Date'];
		
				
		if(empty($ProductName)){
			$errMSG = "Please Enter Product Id And Click Ok.";
		}
		
		else if(empty($AddQuantity)){
			$errMSG = "Please Enter AddQuantity.";
		}
		
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO product_details (admin_id,user_id,product_id,product_name, brand_id, categories_id, quantity,  add_qty,    total_qty,     total_qty_price, rate,      total_rate,    buy_rate, total_buy_rate, total_income,cuses,entry_date) 
			                                               VALUES(:UserId,:UserId,:Product_Id,:ProductName, :BrandId, :CategoriesId, :Quantity, :AddQuantity,:TotalQty, :TotalQtyPrice, :SaleRate, :TotalSaleRate,:BuyRate, :TotalBuyRate, :TotalIncome, "Sales Return", :Date  )');
			
		
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':Product_Id',$Product_Id);
			$stmt->bindParam(':ProductName',$ProductName);
			$stmt->bindParam(':BrandId',$BrandId);
			$stmt->bindParam(':CategoriesId',$CategoriesId);
			
			$stmt->bindParam(':Quantity',$Quantity);
			$stmt->bindParam(':AddQuantity',$AddQuantity);
			$stmt->bindParam(':TotalQty',$TotalQty);
			$stmt->bindParam(':TotalQtyPrice',$TotalQtyPrice);
			$stmt->bindParam(':SaleRate',$SaleRate);
			$stmt->bindParam(':TotalSaleRate',$TotalSaleRate);
			$stmt->bindParam(':BuyRate',$BuyRate);
			$stmt->bindParam(':TotalBuyRate',$TotalBuyRate);
			$stmt->bindParam(':TotalIncome',$TotalIncome);
			$stmt->bindParam(':Date',$Date);
			
			
			
			if($stmt->execute())
			{
				$successMSG = "Product Return Successfully...";
				//header("refresh:2;admin/index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>

<?php
	error_reporting( ~E_NOTICE );
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId'];
		$Product_Id = $_POST['Product_Id'];
		$TotalQty = $_POST['TotalQty'];
		$Date = $_POST['Date'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE product_depo 
									     SET quantity=:TotalQty,
										     entry_date=:Date
											 
								        WHERE user_id=:UserId and product_id=:Product_Id ');
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':Product_Id',$Product_Id);
			$stmt->bindParam(':TotalQty',$TotalQty);
			$stmt->bindParam(':Date',$Date);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Data Successfully Add ...');
				
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		}			
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Product </title>
<link rel = "stylesheet" type = "text/css" href = "css/chosen.css" />
</head>
<body>
<div class="container">
<center>  <h4><ol class="breadcrumb"> <li class="active"> Sales Product Return </li></ol></h4> </center> 


 <h1 class="h2">
 <a class="btn btn-default" href="sales_return_add.php"> <span class="glyphicon glyphicon-plus"></span> New Return </a> 
 <a class="btn btn-default" href="sales_return.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View </a>
 </h1>    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal" >
	    
	<table class="table table-bordered table-responsive">
	
    <tr>
		<?php
				
				   include('conn.php');
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
     
        <input class="form-control" type="hidden" name="UserId" id="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	<tr>
    	<td><label class="control-label">Invoice No</label></td>
        <td><input class="form-control" type="text" name="InvoiceNo" id="InvoiceNo" placeholder="Invoice No" value="<?php echo $InvoiceNo; ?>" /></td>
    </tr>
	
		<tr>
    	<td><label class="control-label">Select Product</label> <button style="float:right;" type="button" class="btn btn-primary" id="loadproduct" > <i class="glyphicon glyphicon-ok-sign"></i> Ok</button> </td>
        <td> 
		<select style="width:100%;" class="form-control chosen-select" Id="Product_Id" name="Product_Id" required="" >
		<option value="#">Select Product</option>
		
				      	<?php 
				      	$sql = "SELECT  product_id,product_name FROM product_depo where user_id='".$_SESSION['id']."'  ";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
						
		</select> 
		</tr>
		
	<tr>
    	<td><label class="control-label">Product Name</label></td>
        <td><input class="form-control" type="text" id="ProductName1" name="ProductName1" placeholder="product Name" value="<?php echo $ProductName;  ?>" disabled="true" />
       <input class="form-control" type="hidden" id="ProductName" name="ProductName" placeholder="product Name" value="<?php echo $ProductName; ?>" /></td>
		
    </tr>
	
	
	<tr style="display:none;">
    	<td><label class="control-label">Brand Name</label></td>
        <td><input class="form-control" type="text" id="BrandName1" name="BrandName1" placeholder="Brand Name" value="<?php echo $BrandName;  ?>" disabled="true" />
       <input class="form-control" type="hidden" id="BrandId" name="BrandId" placeholder="Brand Id" value="<?php echo $BrandId; ?>" /></td>
   </tr>
   
   <tr style="display:none;">
    	<td><label class="control-label">Category Name</label></td>
        <td><input class="form-control" type="text" id="CategoriesName1" name="CategoriesName1" placeholder="Categories Name" value="<?php echo $CategoriesName;  ?>" disabled="true" />
       <input class="form-control" type="hidden" id="CategoriesId" name="CategoriesId" placeholder="Categories Id " value="<?php echo $CategoriesId; ?>" /></td>
		
    </tr>
    
    <tr>
    	<td><label class="control-label">Quantity In Stock </label></td>
        <td><input class="form-control" type="text" id="Quantity1" name="Quantity1" placeholder="Quantity Number" value="<?php echo $Quantity; ?>" disabled="true" /> 
        <input class="form-control" type="hidden" id="Quantity" name="Quantity" placeholder="Quantity Number" value="<?php echo $Quantity; ?>" oninput="myFunctionTP()" /> </td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Return Quantity</label></td>
        <td><input class="form-control" type="text" id="AddQuantity" name="AddQuantity" placeholder="Add  Quantity"  oninput="myFunctionTP()"/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Total Stock </label></td>
        <td><input class="form-control" type="text" id="TotalQuantity1" name="TotalQuantity1" placeholder=" Total Quantity" value="<?php echo $TotalQty; ?>" disabled="true" oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalQty" name="TotalQty" placeholder=" Total Quantity" value="<?php echo $TotalQty; ?>" oninput="myFunctionTP()"  /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label"> Total Qty Price </label></td>
        <td><input class="form-control" type="text" id="TotalQtyPrice1" name="TotalQtyPrice1" placeholder=" Total Qty Price" value="<?php echo $TotalQtyPrice; ?>" disabled="true"oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalQtyPrice" name="TotalQtyPrice" placeholder=" Total Qty Price" value="<?php echo $TotalQtyPrice; ?>" oninput="myFunctionTP()"  /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Sales Rate</label></td>
        <td><input class="form-control" type="text" id="SaleRate1"  name="SaleRate1" placeholder="Sale Rate" value="<?php echo $SaleRate; ?>" disabled="true" oninput="myFunctionTP()" />
       <input class="form-control" type="hidden" id="SaleRate"  name="SaleRate" placeholder="Sale Rate" value="<?php echo $SaleRate; ?>"  oninput="myFunctionTP()" oninput="myFunctionTP()" /></td>
    </tr>
<!-- Total  Product -->		
 <script>
  function myFunctionTP() {
    var x = Number (document.getElementById("AddQuantity").value);
    var y = Number (document.getElementById("Quantity").value);
    var y1 = Number (document.getElementById("SaleRate").value);
    var x1 = Number (document.getElementById("BuyRate").value);
	
    var z = Number (x + y); //TotalQty
    var z1 = Number (x * y1); //TotalQtyPrice
    var z2= Number (y1 *z);//TotalSaleRate
    var z3= Number (x1 *z);//TotalBuyRate
    var z4= Number (z2-z3);//Total Income
    
    document.getElementById("TotalQuantity1").value = z;
    document.getElementById("TotalQty").value = z;
	
    document.getElementById("TotalQtyPrice1").value = z1;
    document.getElementById("TotalQtyPrice").value = z1;
	
    document.getElementById("TotalSaleRate1").value = z2;
    document.getElementById("TotalSaleRate").value = z2;
	
    document.getElementById("TotalBuyRate1").value = z3;
    document.getElementById("TotalBuyRate").value = z3;
	
    document.getElementById("TotalIncome1").value = z4;
    document.getElementById("TotalIncome").value = z4;
	                  }
  </script>
	<tr style="display:none;">
    	<td><label class="control-label">Total Sales Rate</label></td>
        <td><input class="form-control" type="text" id="TotalSaleRate1" name="TotalSaleRate1" placeholder="Total Sale Rate" value="<?php echo $TotalSaleRate; ?>" disabled="true" oninput="myFunctionTP()" />
        <input class="form-control" type="hidden" id="TotalSaleRate" name="TotalSaleRate" placeholder="Total Sale Rate" value="<?php echo $TotalSaleRate; ?>"  /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Buy Rate</label></td>
        <td><input class="form-control" type="text" id="BuyRate1" name="BuyRate1" placeholder="Buy Rate" value="<?php echo $BuyRate; ?>" disabled="true" oninput="myFunctionTP()" />
       <input class="form-control" type="hidden" id="BuyRate" name="BuyRate" placeholder="Buy Rate" value="<?php echo $BuyRate; ?>" oninput="myFunctionTP()" /></td>
    </tr>
	
  <tr style="display:none;">
    	<td><label class="control-label">Total Buy Rate</label></td>
        <td><input class="form-control" type="text" id="TotalBuyRate1" name="TotalBuyRate1" placeholder="TotalBuyRate Money" value="<?php echo $TotalBuyRate; ?>" disabled="true"  oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalBuyRate" name="TotalBuyRate" placeholder="TotalBuyRate Money" value="<?php echo $TotalBuyRate; ?>"  oninput="myFunctionTP()"  /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Total Income</label></td>
        <td><input class="form-control" type="text" id="TotalIncome1" name="TotalIncome1" placeholder="Total Income" value="<?php echo $TotalIncome; ?>" disabled="true"  oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalIncome" name="TotalIncome" placeholder="Total Income" value="<?php echo $TotalIncome; ?>"  oninput="myFunctionTP()"  /></td>
    </tr>
	
    
	<tr>
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Datettt" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y/m/d") ;?>" disabled="true">
         <input class="form-control" type="hidden" name="Date" placeholder="Date" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y/m/d") ;?>" ></td>
    </tr>
	
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>


</div>

<?php require_once 'includes/footer.php'; ?>

<script>
	$("#loadproduct").on("click", function(){
		
		var productID = $("#Product_Id").val();
		if(productID == "")
		{
			alert("Please enter a valid product ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_stock.php?c=" + productID, success: function(result){
				var product = JSON.parse(result);
				$("#ProductName1").val(product.productName);
				$("#ProductName").val(product.productName);
				$("#BrandId").val(product.brandId);
				$("#CategoriesId").val(product.categoriesId);
				$("#Quantity1").val(product.productQty);
				$("#Quantity").val(product.productQty);
				$("#SaleRate1").val(product.saleRate);
				$("#SaleRate").val(product.saleRate);
				$("#TotalSaleRate1").val(product.totalSaleRate);
				$("#TotalSaleRate").val(product.totalSaleRate);
				$("#BuyRate1").val(product.buyRate);
				$("#BuyRate").val(product.buyRate);
				
				$("#TotalBuyRate1").val(product.totalBuyRate);
				$("#TotalBuyRate").val(product.totalBuyRate);
				
				
			}});
		}
	});
</script>

<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>