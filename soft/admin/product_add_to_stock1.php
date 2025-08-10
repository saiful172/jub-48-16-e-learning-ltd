<?php require_once 'header.php'; ?> 
<?php  
	if(isset($_POST['btnsave']))
	{
		$AdminId = $_POST['AdminId'];
		$UserId = $_POST['UserId'];
		
		$Product_Id = $_POST['Product_Id'];
		$ProductName = $_POST['ProductName'];
		$BrandId = $_POST['BrandId'];
		$CategoriesId = $_POST['CategoriesId'];
		
		$Quantity = $_POST['Quantity'];
		$AddQuantity = $_POST['AddQuantity'];
		$TotalQtyA = $_POST['TotalQtyA'];
		
		$TotalQtyPrice = $_POST['TotalQtyPrice'];
		
		$SaleRate = $_POST['SaleRate'];
		$Retail = $_POST['Retail'];
		
		$TotalSaleRateA = $_POST['TotalSaleRateA'];
		$BuyRate = $_POST['BuyRate'];
		$TotalBuyRateA = $_POST['TotalBuyRateA'];
		$TotalIncomeA = $_POST['TotalIncomeA'];
		$Date = $_POST['Date'];
				
	  if(empty($AddQuantity)){
			$errMSG = "Please Enter Product Id And Click Ok.";
		}
		else if(empty($ProductName)){
			$errMSG = "Please Enter ProductName.";
		}
		
				
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO product_details (admin_id,user_id,product_id,product_name, brand_id, categories_id,  quantity,  add_qty,    total_qty, total_qty_price, rate, retail_rate,  total_rate,    buy_rate, total_buy_rate, total_income,cuses,entry_date) 
			                                               VALUES(:AdminId,:UserId,:Product_Id,:ProductName, :BrandId, :CategoriesId, :Quantity,:AddQuantity,:TotalQtyA,:TotalQtyPrice, :SaleRate,:Retail, :TotalSaleRateA,:BuyRate, :TotalBuyRateA, :TotalIncomeA,"Next Send",:Date  )');
			
			
			$stmt->bindParam(':AdminId',$AdminId);
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':Product_Id',$Product_Id);
			$stmt->bindParam(':ProductName',$ProductName);
			$stmt->bindParam(':BrandId',$BrandId);
			$stmt->bindParam(':CategoriesId',$CategoriesId);
			
			$stmt->bindParam(':Quantity',$Quantity);
			$stmt->bindParam(':AddQuantity',$AddQuantity);
			$stmt->bindParam(':TotalQtyA',$TotalQtyA);
			
			$stmt->bindParam(':TotalQtyPrice',$TotalQtyPrice);
			
			$stmt->bindParam(':SaleRate',$SaleRate);
			$stmt->bindParam(':Retail',$Retail);
			
			$stmt->bindParam(':TotalSaleRateA',$TotalSaleRateA);
			$stmt->bindParam(':BuyRate',$BuyRate);
			$stmt->bindParam(':TotalBuyRateA',$TotalBuyRateA);
			$stmt->bindParam(':TotalIncomeA',$TotalIncomeA);
			
			$stmt->bindParam(':Date',$Date);
			
			
			
			if($stmt->execute())
			{
				$successMSG = "Product Send To Showroom Stock Successful ...";
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
				
			if($stmt->execute())
			{
				$successMSG = "Product Send To Showroom Stock Successful ...";
				//header("refresh:2;admin/index.php"); // redirects image view page after 5 seconds.
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		}			
	}
?>

<?php 
	if(isset($_POST['btnsave']))
	{
		//$User_Id = $_POST['User_Id'];
		//$AdminId = $_POST['AdminId'];
		$Product_Id = $_POST['Product_Id'];
		$TotalQtyA = $_POST['TotalQtyA'];
		$Date = $_POST['Date'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE product 
									     SET quantity=:TotalQtyA,
										     entry_date=:Date
											 
								        WHERE product_id=:Product_Id ');
								        // WHERE user_id=:AdminId and admin_id=:AdminId  and product_id=:Product_Id ');
			
			//$stmt->bindParam(':User_Id',$User_Id);
			//$stmt->bindParam(':AdminId',$AdminId);
			$stmt->bindParam(':Product_Id',$Product_Id);
			$stmt->bindParam(':TotalQtyA',$TotalQtyA);
			$stmt->bindParam(':Date',$Date);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Data Successfully Add ...');
				window.location.href='product_add_to_stock1.php';
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
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel = "stylesheet" type = "text/css" href = "css/chosen.css" />
</head>
<body>

<div class="container">

<center><h4><ol class="breadcrumb"> <li class="active">Product Distribute To Showroom ( Next ) </li></ol></h4></center>
<h1 class="h2">
<a class="btn btn-default" href="product_add_to_stock1.php"> <span class="glyphicon glyphicon-plus"></span> Add New </a>
<a target="_blank" class="btn btn-default" href="php_action/view_product_details.php"> <span class="glyphicon glyphicon-eye-open"></span> View History </a> 
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
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
     
        <input class="form-control" type="hidden" name="AdminId" id="AdminId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>

	<tr>
    	<td><label class="control-label">Select Showroom</label></td>
       	<td><select style="width:100%;" class="form-control" name="UserId" id="UserId" required=""/>
		<option value="#">Select Showroom</option>
				      		<?php 
				      	$sql = "SELECT distinct userid,stuff_name  FROM stuff where status=1 ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
		</select> </td>       
	</tr>

	
	<tr>
    	<td><label class="control-label">Select Product</label>  <button style="float:right;" type="button" class="btn btn-primary" id="loadproduct" > <i class="glyphicon glyphicon-ok-sign"></i> Ok</button> </td>
        <td>
				<select style="width:100%;" class="form-control chosen-select" Id="Product_Id" name="Product_Id" required="" >
		<option value="#">Select Product</option>
		
				      	<?php 
				      	$sql = "SELECT  product_id,product_name FROM product  ";
								$result = $con->query($sql);

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
    	<td><label class="control-label">Product Stock ( Main ) </label> <button style="float:right;" type="button" class="btn btn-primary" id="loadproduct_main" > <i class="glyphicon glyphicon-ok-sign"></i> Ok</button></td>
        <td> <input style="width:100%;" type="text" class="form-control" id="Product_Id_Main" name="Product_Id_Main" placeholder="Please Enter Product Code And Click Ok Button " autocomplete="off" oninput="myFunctionTP()" disabled="true" />  
		</td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Quantity In Stock ( Main ) </label></td>
        <td><input class="form-control" type="text" id="Quantitym1" name="Quantitym1" placeholder="Quantity Number" value="<?php echo $Quantitym1; ?>" disabled="true" /> 
        <input class="form-control" type="hidden" id="Quantitym" name="Quantitym" placeholder="Quantity Number" value="<?php echo $Quantitym; ?>" oninput="myFunctionTP()" /> </td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Add Quantity</label></td>
        <td><input class="form-control" type="text" id="AddQuantity" name="AddQuantity" placeholder="Add  Quantity" value="<?php echo $AddQuantity; ?>" oninput="myFunctionTP()"/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Recent Stock ( Main ) </label></td>
        <td><input class="form-control" type="text" id="TotalQuantityA" name="TotalQuantityA" placeholder=" Total Quantity" value="<?php echo $TotalQtyA; ?>" disabled="true" oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalQtyA" name="TotalQtyA" placeholder=" Total Quantity" value="<?php echo $TotalQtyA; ?>" oninput="myFunctionTP()"  /></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label"> Recent Stock </label></td>
        <td><input class="form-control" type="text" id="TotalQuantity1" name="TotalQuantity1" placeholder=" Total Quantity" value="<?php echo $TotalQty; ?>" disabled="true" oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalQty" name="TotalQty" placeholder=" Total Quantity" value="<?php echo $TotalQty; ?>" oninput="myFunctionTP()"  /></td>
    </tr>
	
	
	
	<tr style="display:none;">
    	<td><label class="control-label"> Total Qty Price(A)  </label></td>
        <td><input class="form-control" type="text" id="TotalQtyPriceA1" name="TotalQtyPriceA1" placeholder=" Total Qty Price" value="<?php echo $TotalQtyPriceA; ?>" disabled="true"oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalQtyPriceA" name="TotalQtyPriceA" placeholder=" Total Qty Price" value="<?php echo $TotalQtyPriceA; ?>" oninput="myFunctionTP()"  /></td>
    </tr>
	
	 <tr style="display:none;">
    	<td><label class="control-label"> Total Qty Price </label></td>
        <td><input class="form-control" type="text" id="TotalQtyPrice1" name="TotalQtyPrice1" placeholder=" Total Qty Price" value="<?php echo $TotalQtyPrice; ?>" disabled="true"oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalQtyPrice" name="TotalQtyPrice" placeholder=" Total Qty Price" value="<?php echo $TotalQtyPrice; ?>" oninput="myFunctionTP()"  /></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Product Price</label></td>
        <td><input class="form-control" type="text" id="SaleRate1"  name="SaleRate1" placeholder="Sale Rate" value="<?php echo $SaleRate; ?>" disabled="true" oninput="myFunctionTP()" />
       <input class="form-control" type="hidden" id="SaleRate"  name="SaleRate" placeholder="Sale Rate" value="<?php echo $SaleRate; ?>"  oninput="myFunctionTP()" oninput="myFunctionTP()" /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Retail  Price</label></td>
        <td> <input class="form-control" type="text" id="Retail"  name="Retail" placeholder="Retail" value="<?php echo $Retail; ?>"  /></td>
    </tr>
	
<!-- Total  user -->		
 <script>
  function myFunctionTP() {
	  
    var a = Number (document.getElementById("Product_Id").value);
	
    var x = Number (document.getElementById("AddQuantity").value);
    var y = Number (document.getElementById("Quantity").value);
    var y2 = Number (document.getElementById("Quantitym").value);
    var y1 = Number (document.getElementById("SaleRate").value);
    var x1 = Number (document.getElementById("BuyRate").value);
	
    var z = Number (x + y); //TotalQtyAdd
    var tqdepo = Number (y + x); //TotalQty(Depo)
	
    var tql = Number (y2 - x); //TotalQty(Main)
    var z1 = Number (x * y1); //TotalQtyPrice
    var tqpl = Number (x * y1); //TotalQtyPrice(Admin)
    var z2= Number (y1 *z);//TotalSaleRate
	
    var tsr= Number (y1 * tql);//TotalSaleRate(Admin)
    var z3= Number (x1 *z);//TotalBuyRate
    var tbr= Number (x1 *tql);//TotalBuyRate (Admin)
    var z4= Number (z2-z3);//Total Income
    var tia= Number (tsr-tbr);//Total Income(Admin)
    
    //Depo Product Id = Product_Id_Main
	document.getElementById("Product_Id_Main").value = a;
	
	//TotalQtyAdd
	document.getElementById("TotalQuantity1").value = tqdepo;
    document.getElementById("TotalQty").value = tqdepo;
	//TotalQty(Admin)
    document.getElementById("TotalQuantityA").value = tql;
    document.getElementById("TotalQtyA").value = tql;
	//TotalQtyPrice
    document.getElementById("TotalQtyPrice1").value = z1;
    document.getElementById("TotalQtyPrice").value = z1;
	//TotalQtyPrice(Admin)
	document.getElementById("TotalQtyPriceA1").value = tqpl;
    document.getElementById("TotalQtyPriceA").value = tqpl;
	//TotalSaleRate
    document.getElementById("TotalSaleRate1").value = z2;
    document.getElementById("TotalSaleRate").value = z2;
	//TotalQtyPrice(Admin)
	document.getElementById("TotalSaleRateA1").value = tsr;
    document.getElementById("TotalSaleRateA").value = tsr;
	//TotalBuyRate
    document.getElementById("TotalBuyRate1").value = z3;
    document.getElementById("TotalBuyRate").value = z3;
	//TotalBuyRate (Admin)
	document.getElementById("TotalBuyRateA1").value = tbr;
    document.getElementById("TotalBuyRateA").value = tbr;
	//Total Income
    document.getElementById("TotalIncome1").value = z4;
    document.getElementById("TotalIncome").value = z4;
	//Total Income(Admin)
	document.getElementById("TotalIncomeA1").value = tia;
    document.getElementById("TotalIncomeA").value = tia;
	
	                  }
  </script>
  
  <tr style="display:none;">
    	<td><label class="control-label">Total Sales Rate (A)</label></td>
        <td><input class="form-control" type="text" id="TotalSaleRateA1" name="TotalSaleRateA1" placeholder="Total Sale Rate" value="<?php echo $TotalSaleRateA; ?>" disabled="true" oninput="myFunctionTP()" />
        <input class="form-control" type="hidden" id="TotalSaleRateA" name="TotalSaleRateA" placeholder="Total Sale Rate" value="<?php echo $TotalSaleRateA; ?>"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Total Product Price  </label></td>
        <td><input class="form-control" type="text" id="TotalSaleRate1" name="TotalSaleRate1" placeholder="Total Sale Rate" value="<?php echo $TotalSaleRate; ?>" disabled="true" oninput="myFunctionTP()" />
        <input class="form-control" type="hidden" id="TotalSaleRate" name="TotalSaleRate" placeholder="Total Sale Rate" value="<?php echo $TotalSaleRate; ?>"  /></td>
    </tr>
	
	 <tr style="display:none;">
    	<td><label class="control-label">Buy Rate</label></td>
        <td><input class="form-control" type="text" id="BuyRate1" name="BuyRate1" placeholder="Buy Rate" value="<?php echo $BuyRate; ?>" disabled="true" oninput="myFunctionTP()" />
       <input class="form-control" type="hidden" id="BuyRate" name="BuyRate" placeholder="Buy Rate" value="<?php echo $BuyRate; ?>" oninput="myFunctionTP()" /></td>
    </tr>
	
     <tr style="display:none;">
    	<td><label class="control-label">Total Buy Rate(A)</label></td>
        <td><input class="form-control" type="text" id="TotalBuyRateA1" name="TotalBuyRateA1" placeholder="TotalBuyRate Money" value="<?php echo $TotalBuyRateA; ?>" disabled="true"  oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalBuyRateA" name="TotalBuyRateA" placeholder="TotalBuyRate Money" value="<?php echo $TotalBuyRateA; ?>"  oninput="myFunctionTP()"  /></td>
    </tr>
   
    <tr style="display:none;">
    	<td><label class="control-label">Total Buy Rate</label></td>
        <td><input class="form-control" type="text" id="TotalBuyRate1" name="TotalBuyRate1" placeholder="TotalBuyRate Money" value="<?php echo $TotalBuyRate; ?>" disabled="true"  oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalBuyRate" name="TotalBuyRate" placeholder="TotalBuyRate Money" value="<?php echo $TotalBuyRate; ?>"  oninput="myFunctionTP()"  /></td>
    </tr>
	
	 <tr style="display:none;">
    	<td><label class="control-label">Total Income (A)</label></td>
        <td><input class="form-control" type="text" id="TotalIncomeA1" name="TotalIncomeA1" placeholder="Total Income" value="<?php echo $TotalIncomeA; ?>" disabled="true"  oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalIncomeA" name="TotalIncomeA" placeholder="Total Income" value="<?php echo $TotalIncomeA; ?>"  oninput="myFunctionTP()"  /></td>
    </tr>
	
	 <tr style="display:none;">
    	<td><label class="control-label">Total Income</label></td>
        <td><input class="form-control" type="text" id="TotalIncome1" name="TotalIncome1" placeholder="Total Income" value="<?php echo $TotalIncome; ?>" disabled="true"  oninput="myFunctionTP()"  />
        <input class="form-control" type="hidden" id="TotalIncome" name="TotalIncome" placeholder="Total Income" value="<?php echo $TotalIncome; ?>"  oninput="myFunctionTP()"  /></td>
    </tr>
	
    <tr>
    <td> <input class="form-control" type="hidden" id="status" name="status" placeholder="Total Income" value="Product-Distribute"   /></td>
    </tr>

	<tr>
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php echo date("Y/m/d") ;?>" /></td>
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

<?php require_once '../includes/footer.php'; ?>

</body>
</html>

<script>
	$("#loaduser").on("click", function(){
		
		var User_Id = $("#User_Id").val();
		if(User_Id == "")
		{
			alert("Please enter a valid user ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_user.php?c=" + User_Id, success: function(result){
				var user = JSON.parse(result);
				$("#UserName").val(user.userName);
				$("#UserName1").val(user.userName);
				
				
			}});
		}
	});
</script>

<script>
	$("#loadproduct").on("click", function(){
		
		
		var productID = $("#Product_Id").val();
		if(productID == "")
		{
			alert("Please enter a valid product ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_stock2.php?u=" + $("#UserId").val() + " & c=" + productID, success: function(result){
				var product = JSON.parse(result);
				$("#ProductName1").val(product.productName); 
				$("#ProductName").val(product.productName);
				$("#BrandName1").val(product.brandId1);
				$("#BrandId").val(product.brandId);
				$("#CategoriesName1").val(product.categoriesId1);
				$("#CategoriesId").val(product.categoriesId);
				
				$("#Quantity1").val(product.productQty);
				$("#Quantity").val(product.productQty);
				$("#Product_Id_Main").val(product.ProdId);
								
				$("#SaleRate1").val(product.saleRate);
				$("#SaleRate").val(product.saleRate);
				$("#Retail").val(product.RetailRate);
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


<script>
	$("#loadproduct_main").on("click", function(){
		
		
		var productID = $("#Product_Id_Main").val();
		
		if(productID == "")
		{
			alert("Please enter a valid product ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_stock3.php?c=" + productID, success: function(result){
				var product = JSON.parse(result);
				$("#ProductName1").val(product.productName);
				$("#ProductName").val(product.productName);
				$("#BrandId").val(product.brandId);
				$("#CategoriesId").val(product.categoriesId);
				
				$("#Quantitym1").val(product.productQtym);
				$("#Quantitym").val(product.productQtym);
								
				$("#SaleRate1").val(product.saleRate);
				$("#SaleRate").val(product.saleRate);
				
				$("#Retail").val(product.RetailRate);
				
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