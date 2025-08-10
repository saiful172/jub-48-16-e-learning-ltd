
<?php require_once 'header.php'; ?>

<?php 
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM product 		
		Left JOIN brand1 ON brand1.brand_id = product.brand_id 
		Left JOIN categories1 ON categories1.cat_id = product.categories_id 
		Left JOIN categories_sub ON categories_sub.sub_cat_id = product.sub_cat 
		WHERE product.product_id=:uid');
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
		$BrandId = $_POST['BrandId'];
		$Category = $_POST['Category'];
		$SubCatId = $_POST['SubCatId']; 
		$Product_Name = $_POST['Product_Name'];
		$Details = $_POST['Details'];  
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE product 
									   SET   product_name=:Product_Name,
										     brand_id=:BrandId, 
										     categories_id=:Category, 
										     sub_cat=:SubCatId,
										     product_details=:Details 
											 
								       WHERE  product_id = :uid');
			
			$stmt->bindParam(':BrandId',$BrandId);
			$stmt->bindParam(':Category',$Category);
			$stmt->bindParam(':SubCatId',$SubCatId); 
			$stmt->bindParam(':Product_Name',$Product_Name); 
			$stmt->bindParam(':Details',$Details);   
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert('Data Successfully Add ...');
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
<link rel="stylesheet" href="css/buttons.css">
<script type="text/javascript">
$(document).ready(function(){
    $('#BrandId').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'brand_id='+countryID,
                success:function(html){
                    $('#Category').html(html);
                    $('#SubCatId').html('<option value="">Select Category First</option>'); 
                }
            }); 
        }else{
            $('#Category').html('<option value="">Select Brand First</option>');
            $('#SubCatId').html('<option value="">Select Category First</option>'); 
        }
    });
    $('#Category').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'cat_id='+stateID,
                success:function(html){
                    $('#SubCatId').html(html);
                }
            }); 
        }else{
            $('#SubCatId').html('<option value="">Select Category First</option>'); 
        }
    });
});
</script>

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
			<a class="btn btn-info btn-w100" href="brand"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Brands  </a> 
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
   
    
	<table class="table table-hover table-responsive">
	  
	
	<tr >
    	<td><label class="control-label">Brand Name</label></td>
        <td>
		<?php 
	$query = $con->query("SELECT * FROM brand1 where user_id='".$_SESSION['id']."'  ORDER BY brand_name ASC");
	$rowCount = $query->num_rows;
	?>
	
		<select style="width:100%;" class="form-control chosen-select" Id="BrandId" name="BrandId" required=""/>
		<option value="<?php echo $brand_id; ?>"><?php echo $brand_name; ?></option>
				      	<?php
			if($rowCount > 0){
				while($row = $query->fetch_assoc()){ 
					echo '<option value="'.$row['brand_id'].'">'.$row['brand_name'].'</option>';
				}
			}else{
				echo '<option value="">Brand Not Available</option>';
			}
			?>
		</select>
		</td>
   </tr>
   
   <tr >
    	<td><label class="control-label"> Category </label></td>
        <td>
		<select style="width:100%;" class="form-control" Id="Category" name="Category"  required=""/>
		<option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
				   
		</select>
		</td>
   </tr>
	
   <tr >
    <td><label class="control-label">Sub Category</label></td>
	 <td>
	 <select style="width:100%;" class="form-control" Id="SubCatId" name="SubCatId" >
		<option value="<?php echo $sub_cat_id; ?>"><?php echo $sub_cat_name; ?></option>
				      
		</select>
	</td>
   </tr>
 
  <tr>
    	<td><label class="control-label">Name  </label></td>
        <td><input class="form-control" type="text" name="Product_Name"  value="<?php echo $product_name; ?>" ></td>
    </tr>
  	
	<tr>
    	<td><label class="control-label">Details  </label></td>
        <td><input class="form-control" type="text" name="Details"  value="<?php echo $product_details; ?>" ></td>
    </tr>
	 
		
	 
	
	 <tr> <td></td>  <td></td></tr>
	 
    </table>
	<button type="submit" name="btn_save_updates" class="btn btn-primary"> <span class="glyphicon glyphicon-save"></span> Update </button> 
    <a class="btn btn-danger" href="productN"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
    
</form>

</div>
<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>
</div>

<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>

