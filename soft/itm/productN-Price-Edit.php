
<?php require_once 'header.php'; ?>

<?php 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM product
        Left JOIN brand1 ON brand1.brand_id = product.brand_id 
		Left JOIN categories1 ON categories1.cat_id = product.categories_id 
		Left JOIN categories_sub ON categories_sub.sub_cat_id = product.sub_cat
		WHERE product.product_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: productN");
	}

	if(isset($_POST['btn_save_updates']))
	{
		 
		$SaleRate = $_POST['SaleRate'];
		$ReatilSaleRate = $_POST['ReatilSaleRate']; 
		$BuyRate = $_POST['BuyRate']; 
		$Date = $_POST['Date'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE product set   
										     rate=:SaleRate,
										     retail_rate=:ReatilSaleRate, 
										     buy_rate=:BuyRate,  
										     last_update=:Date 
											 
								       WHERE  product_id = :uid');
			 
			$stmt->bindParam(':SaleRate',$SaleRate);
			$stmt->bindParam(':ReatilSaleRate',$ReatilSaleRate); 
			$stmt->bindParam(':BuyRate',$BuyRate);  
			$stmt->bindParam(':Date',$Date); 
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='productN';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		}			
	}
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>
 
<center><h4><ol class="breadcrumb"> <li class="active">  Product Edit / Update </li></ol></h4></center>
<div class="col-md-2">  
<div class="buttons"> 
	  
	  <div class="col-md-12">
			<a class="btn btn-primary btn-w100" href="productN"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Product List  </a> 
	   </div>
		
		<div class="col-md-12">
		<a target="_blank" href="php_action/view-product-stock" class="btn btn-success btn-w100 "> <i class="fa fa-file"></i>  Stock Report </a>
		</div>
			

		<div class="col-md-12">
		<a target="_blank" href="php_action/print-product" class="btn btn-success btn-w100"> <i class="fa fa-file"></i>  Print </a>
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
			<a class="btn btn-info btn-w100" href="productN-history"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Product History  </a> 
	   </div>
		 
		
	</div>
	
  
</div>

<div class="col-md-10">	 
<div class="col-md-7">

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-hover">
	
    <tr>
    	<td><label class="control-label">Product Code</label></td>
		<td>
		<input class="form-control" type="text" name="Product_Code1"   value="<?php echo $product_id; ?>" disabled="true">
		<input class="form-control" type="hidden" name="Product_Code"   value="<?php echo $product_id; ?>" >
		</td>
    </tr>
	 
	 <tr>
    	<td><label class="control-label">Brand Name  </label></td>
        <td><input class="form-control" type="text" name="Brand"  value="<?php echo $brand_name; ?>" ></td>
    </tr>
		
	<tr>
    	<td><label class="control-label">Product Name  </label></td>
        <td><input class="form-control" type="text" name="Product_Name"  value="<?php echo $product_name; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Details  </label></td>
        <td><input class="form-control" type="text" name="Details"  value="<?php echo $product_details; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Quantity </label></td>
        <td><input class="form-control" type="text" id="Quantity" name="Quantity" placeholder="Quantity Number" value="<?php echo $quantity; ?>" oninput="myFunctionTP()" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Buy Rate</label></td>
        <td>
       <input class="form-control" type="text" id="BuyRate" name="BuyRate" placeholder="Buy Rate" value="<?php echo $buy_rate; ?>" oninput="myFunctionTP()" /></td>
    </tr>
		
	<tr>
    	<td><label class="control-label">Whole Sales Rate</label></td>
        <td>
       <input class="form-control" type="text" id="SaleRate"  name="SaleRate" placeholder="Sale Rate" value="<?php echo $rate; ?>"  oninput="myFunctionTP()" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Retail Sale Rate</label></td>
        <td> <input class="form-control" type="text" id="ReatilSaleRate"  name="ReatilSaleRate" placeholder="Reatil Sale Rate" value="<?php echo $retail_rate; ?>"  oninput="myFunctionTP()" /></td>
    </tr>
<!-- Total  Product -->		
 
<script>
  function myFunctionTP() {
    var x = Number (document.getElementById("Quantity").value);
    var y = Number (document.getElementById("SaleRate").value);
    var x1 = Number (document.getElementById("BuyRate").value);
	
    var z = Number (y * x); //total Sale rate
    var z1 = Number (x * x1); //totalbuyrate
    var z2 = Number (z - z1); //totalincome
    
    document.getElementById("TotalSaleRate").value = z;
    document.getElementById("TotalBuyRate").value = z1;
    document.getElementById("TotalIncome").value = z2;
	
	                  }
  </script>
  
	<tr style="display:none;">
    	<td><label class="control-label">Total Sales Rate</label></td>
        <td>
        <input class="form-control" type="text" id="TotalSaleRate" name="TotalSaleRate" placeholder="Total Sale Rate" value="<?php echo $total_rate; ?>" /></td>
    </tr> 
	
   <tr style="display:none;">
    	<td><label class="control-label">Total Buy Rate</label></td>
        <td>
        <input class="form-control" type="text" id="TotalBuyRate" name="TotalBuyRate" placeholder="TotalBuyRate Money"  oninput="myFunctionTP()"  /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Total Income</label></td>
        <td>
        <input class="form-control" type="text" id="TotalIncome" name="TotalIncome" placeholder="Total Income"   oninput="myFunctionTP()"  /></td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y/m/d") ;?>" /></td>
    </tr>
	
	 <tr> <td></td> <td></td> </tr>
	  
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="productN"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form>

</div>
<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>
</div>
 

