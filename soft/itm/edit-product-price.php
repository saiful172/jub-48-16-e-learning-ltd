<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 
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
		header("Location: product-list");
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
				window.location.href='product-list';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		}			
	}
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Product Price Edit</h1> <hr>
    </div> 
	
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
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
			  
</h5>
			  
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
        <td><input class="form-control" type="text" name="Brand"  value="<?php echo $brand_name; ?>" readonly></td>
    </tr>
		
	<tr>
    	<td><label class="control-label">Product Name  </label></td>
        <td><input class="form-control" type="text" name="Product_Name"  value="<?php echo $product_name; ?>  -  <?php echo $cat_name; ?> " readonly></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Details  </label></td>
        <td><input class="form-control" type="text" name="Details"  value="<?php echo $product_details; ?>" readonly></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Quantity </label></td>
        <td><input class="form-control" type="text" id="Quantity" name="Quantity" placeholder="Quantity Number" value="<?php echo $quantity; ?>"  readonly></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Sale Rate</label></td>
        <td> <input class="form-control" type="text" id="ReatilSaleRate"  name="ReatilSaleRate" placeholder="Reatil Sale Rate" value="<?php echo $retail_rate; ?>"  oninput="myFunction()"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Discount % </label></td>
        <td><input class="form-control" type="text" id="Discount" name="Discount" placeholder=" Discount % "  oninput="myFunction()"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Buy Rate</label></td>
        <td>
       <input class="form-control" type="text" id="BuyRate" name="BuyRate" placeholder="Buy Rate" value="<?php echo $buy_rate; ?>" oninput="myFunctionTP()" /></td>
    </tr>
		
		
	
<!-- Total  Product -->		
<script>
  function myFunction() {
    var x = Number (document.getElementById("ReatilSaleRate").value);
    var x1 = Number (document.getElementById("ReatilSaleRate").value);
    var y = Number (document.getElementById("Discount").value);
	
	
    var z = Number (x * y / 100);
    var z1 = Number (x1-z);

    document.getElementById("BuyRate").value = z1; 
	                  }
  </script>
  
  <tr style="display:none;">
    	<td><label class="control-label">Whole Sales Rate</label></td>
        <td>
       <input class="form-control" type="text" id="SaleRate"  name="SaleRate" placeholder="Sale Rate" value="<?php echo $rate; ?>"  oninput="myFunctionTP()" /></td>
    </tr>
	 	
	<tr style="display:none;">
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("Y/m/d") ;?>" /></td>
    </tr>
	
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="product-list"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form>
			  
			  
            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>