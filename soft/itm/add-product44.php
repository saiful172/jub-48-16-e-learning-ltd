<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?> 
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
 
<?php   require_once 'header1.php'; ?> 

<?php 
	
	if(isset($_POST['btnsave']))
	{
		$UserId = $_POST['UserId'];
		$SubCatName = $_POST['SubCatName'];
		$Category = $_POST['Category'];
		
		if(empty($SubCatName)){
			$errMSG = "Please Enter Sub Category Name.";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO categories_sub (user_id,sub_cat_name,cat_id,status) VALUES(:UserId,:SubCatName,:Category,1)');
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':SubCatName',$SubCatName);
			$stmt->bindParam(':Category',$Category);
			if($stmt->execute())
			{
			?>
              <script>
				alert('Data Successfully Add ...');
				window.location.href='sub-cat-list';
				</script>
          <?php
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Sub Category |  <span> <a href="sub-cat-list">    <i class="bi bi-table"></i> </a> </span> </h1>
	  <hr>
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
<form method="post" enctype="multipart/form-data" class="form-horizontal" >
	    
<table class="table table-hover table-responsive">
	
 <tr>
    	
		<?php
				
				   
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	
	<tr style="display:none;">
    	<td><label class="control-label">Product Code</label> </td>
        <td> 
			<?php 
				   $pq=mysqli_query($con,"select MAX(product_id)+1 as product_id from  `product` where user_id='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			  
		<input  type="text" class="form-control" id="Product_Id11" name="Product_Id11" placeholder="Product Id" value="<?php echo $pqrow['product_id'];?>" disabled="true" >  
		<input  type="hidden" class="form-control" id="Product_Id" name="Product_Id" placeholder="Product Id" value="<?php echo $pqrow['product_id'];?>" >  
		 <?php }?>
		</td>
    </tr>
	
 <tr>
    	<td><label class="control-label">Brand Name</label></td>
        <td>
		<?php 
	$query = $con->query("SELECT * FROM brand1  where user_id='".$_SESSION['id']."' ORDER BY brand_name ASC");
	$rowCount = $query->num_rows;
	?>
	
		<select style="width:100%;" class="form-select" Id="BrandId" name="BrandId" required=""/>
		<option value="#">Select Brand</option>
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
   
   <tr>
    	<td><label class="control-label"> Category </label></td>
        <td>
		<select style="width:100%;" class="form-control" Id="Category" name="Category"  required=""/>
		<option value="">Select Category</option>
				   
		</select>
		</td>
   </tr>
	
   <tr>
    <td><label class="control-label">Sub Category Name</label></td>
	 <td>
	 <select style="width:100%;" class="form-control" Id="SubCatId" name="SubCatId" >
		<option value="">Select Sub Category</option>
				      
		</select>
	</td>
   </tr>
 
  <tr>
     <td><label class="control-label">Product Name  </label></td>
     <td><input class="form-control" type="text" id="ProductName" name="ProductName" placeholder="Product Name"  /></td>
  </tr>
  
    <tr>
    	<td><label class="control-label">Short Details</label></td>
        <td>
       <input class="form-control" type="text" id="Details"  name="Details" placeholder="Short Details"  /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Warranty</label></td>
        <td>
       <input class="form-control" type="text" id="Wrnty"  name="Wrnty" placeholder="Product Warranty"  /></td>
    </tr>
	 
    <tr style="display:none;">
    	<td><label class="control-label"> Quantity </label></td>
        <td><input class="form-control" type="text" id="Quantity" name="Quantity" placeholder="Quantity Number" value="0"   /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Buy Rate</label></td>
        <td>
       <input class="form-control" type="text" id="BuyRate" name="BuyRate" placeholder="Buy Rate" value=""  /></td>
    </tr>
		
	<tr>
    	<td><label class="control-label">Whole Sale Rate</label></td>
        <td>
       <input class="form-control" type="text" id="WholSaleRate"  name="WholSaleRate" placeholder="Whole Sale Rate"  oninput="myFunctionTP()" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Retail Sale Rate</label></td>
        <td> <input class="form-control" type="text" id="ReatilSaleRate"  name="ReatilSaleRate" placeholder="Reatil Sale Rate" value=""  oninput="myFunctionTP()" /></td>
    </tr>
	 

  <tr style="display:none;">
    	<td><label class="control-label">Photo </label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
	<tr style="display:none;">
    	<td><label class="control-label">Date</label></td>
        <td><input class="form-control" type="text" name="Date" placeholder="Date" value="<?php echo date("Y/m/d") ;?>" /></td>
    </tr>
	
    <tr> <td></td>  <td></td></tr>
    
    </table>
	
	 <button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
	
</form>

            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>
	
 
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>