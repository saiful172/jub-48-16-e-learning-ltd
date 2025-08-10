
<?php require_once 'header.php'; ?>

<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM product WHERE product_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: productN.php");
	}

	if(isset($_POST['btn_save_updates']))
	{
		
		//$Product_Code = $_POST['Product_Code'];
		$Product_Name = $_POST['Product_Name'];
		
		$Quantity = $_POST['Quantity'];
		$SaleRate = $_POST['SaleRate'];
		$ReatilSaleRate = $_POST['ReatilSaleRate'];
		$TotalSaleRate = $_POST['TotalSaleRate'];
		$BuyRate = $_POST['BuyRate'];
		$TotalBuyRate = $_POST['TotalBuyRate'];
		$TotalIncome = $_POST['TotalIncome'];
		$Date = $_POST['Date'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE product 
									   SET   product_name=:Product_Name,
										     quantity=:Quantity,
										     rate=:SaleRate,
										     retail_rate=:ReatilSaleRate,
										     total_rate=:TotalSaleRate,
										     buy_rate=:BuyRate,
										     total_buy_rate=:TotalBuyRate,
										     total_income=:TotalIncome,
										     last_update=:Date
											 
								       WHERE  id = :uid');
			
			//$stmt->bindParam(':Product_Code',$Product_Code);
			$stmt->bindParam(':Product_Name',$Product_Name);
			
			$stmt->bindParam(':Quantity',$Quantity);
			$stmt->bindParam(':SaleRate',$SaleRate);
			$stmt->bindParam(':ReatilSaleRate',$ReatilSaleRate);
			$stmt->bindParam(':TotalSaleRate',$TotalSaleRate);
			$stmt->bindParam(':BuyRate',$BuyRate);
			$stmt->bindParam(':TotalBuyRate',$TotalBuyRate);
			$stmt->bindParam(':TotalIncome',$TotalIncome);
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<?php
 
	if(isset($_POST['btn_save_updates']))
	{
		
		$Product_Code = $_POST['Product_Code'];
		$Product_Name = $_POST['Product_Name']; 
		$SaleRate = $_POST['SaleRate'];
		$ReatilSaleRate = $_POST['ReatilSaleRate']; 
		$BuyRate = $_POST['BuyRate']; 
		// if no error occured, continue ....
		
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE product_depo 
									   SET   product_name=:Product_Name, 
										     rate=:SaleRate,
										     retail_rate=:ReatilSaleRate, 
										     buy_rate=:BuyRate
											 
								       WHERE  product_id = :Product_Code');
			
		
			
			
			$stmt->bindParam(':Product_Code',$Product_Code);
			$stmt->bindParam(':Product_Name',$Product_Name); 
			$stmt->bindParam(':SaleRate',$SaleRate);
			$stmt->bindParam(':ReatilSaleRate',$ReatilSaleRate); 
			$stmt->bindParam(':BuyRate',$BuyRate);  
			
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='productN.php';
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
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">
<center><h4><ol class="breadcrumb"> <li class="active">  Product Edit / Update </li></ol></h4></center>
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
   
    
	<table class="table table-bordered table-responsive">
	

	
	<tr>
    	<td><label class="control-label">Product Code</label></td>
		<td>
		<input class="form-control" type="text" name="Product_Code1"   value="<?php echo $product_id; ?>" disabled="true">
		<input class="form-control" type="hidden" name="Product_Code"   value="<?php echo $product_id; ?>" >
		</td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Product Name  </label></td>
        <td><input class="form-control" type="text" name="Product_Name"  value="<?php echo $product_name; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Quantity </label></td>
        <td><input class="form-control" type="text" id="Quantity" name="Quantity" placeholder="Quantity Number" value="<?php echo $quantity; ?>" oninput="myFunctionTP()" /></td>
    </tr>
		
	<tr>
    	<td><label class="control-label">Whole Sales Rate</label></td>
        <td>
       <input class="form-control" type="text" id="SaleRate"  name="SaleRate" placeholder="Sale Rate" value="<?php echo $rate; ?>"  oninput="myFunctionTP()" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Reatil Sale Rate</label></td>
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
  
	<tr>
    	<td><label class="control-label">Total Sales Rate</label></td>
        <td>
        <input class="form-control" type="text" id="TotalSaleRate" name="TotalSaleRate" placeholder="Total Sale Rate" value="<?php echo $total_rate; ?>" /></td>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Buy Rate</label></td>
        <td>
       <input class="form-control" type="text" id="BuyRate" name="BuyRate" placeholder="Buy Rate" value="<?php echo $buy_rate; ?>" oninput="myFunctionTP()" /></td>
    </tr>
	
   <tr>
    	<td><label class="control-label">Total Buy Rate</label></td>
        <td>
        <input class="form-control" type="text" id="TotalBuyRate" name="TotalBuyRate" placeholder="TotalBuyRate Money"  value="<?php echo $total_buy_rate; ?>"  oninput="myFunctionTP()"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Total Income</label></td>
        <td>
        <input class="form-control" type="text" id="TotalIncome" name="TotalIncome" placeholder="Total Income" value="<?php echo $total_income; ?>"  oninput="myFunctionTP()"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y/m/d") ;?>" /></td>
    </tr>
	   
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="productN.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>

</div>

<?php include('includes/footer.php');?>

