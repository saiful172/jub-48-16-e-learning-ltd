<?php require_once 'header.php'; ?>  
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
				window.location.href='sub-category-add';
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
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
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

<div class="container">
<center><h4><ol class="breadcrumb"> <li class="active"> Sub Category   </li></ol></h4></center>	


    	<h1 class="h2">
		<a class="btn btn-success" href="sub-category"> <span class="glyphicon glyphicon-eye-open"></span> View</a>
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
	    
	<table class="table table-responsive">
	
	<tr>
    	
		<?php    
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
  <tr>
    	<td><label class="control-label"> Brand </label></td>
        <td>
		<select style="width:100%;" class="form-control chosen-select" Id="BrandId" name="BrandId" value="<?php echo $BrandId; ?>" required=""/>
		<option value="#">Select Brand</option>
				      	<?php 
				      	$sql = "SELECT  brand_id,brand_name FROM brand1 where user_id='".$_SESSION['id']."'";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
		</select>
		</td>
   </tr>
   
   
   <tr>
    	<td><label class="control-label"> Category </label></td>
        <td>
		<select style="width:100%;" class="form-control" Id="Category" name="Category" value="<?php echo $Category; ?>" required=""/>
		<option value="#">Select  Category</option>
				      	<?php 
				      	$sql = "SELECT  cat_id,cat_name FROM categories1";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
		</select>
		</td>
   </tr>
   
	<tr>
    	<td><label class="control-label">Sub Category Name </label></td>
		<td><input class="form-control" type="text" name="SubCatName" placeholder="Sub Category Name" value="<?php echo $SubCatName; ?>"></td>
    </tr>
	
	
	 <tr><td></td><td></td></tr>
    
    </table>
	
	
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
        </td>
    </tr>
    
</form>

</div>

<?php include('../includes/footer.php');?>


<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>
