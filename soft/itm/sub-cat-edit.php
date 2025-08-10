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
		$stmt_edit = $DB_con->prepare('SELECT * FROM categories_sub  
		Left join categories1 on  categories1.cat_id=categories_sub.cat_id
        Left join brand1 on  brand1.brand_id=categories1.brand_id
		WHERE sub_cat_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: sub-cat-list");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$SubCatName = $_POST['SubCatName'];
		$Category = $_POST['Category'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE categories_sub 
									     SET sub_cat_name=:SubCatName,
										 cat_id=:Category
										 
								       WHERE  sub_cat_id = :uid'); 
			
			 
			$stmt->bindParam(':SubCatName',$SubCatName); 
			$stmt->bindParam(':Category',$Category);
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Succesfull ... ');
				window.location.href='sub-cat-list';
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
      <h1>Sub Category Edit</h1> <hr>
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
   
    
	<table class="table  table-responsive">
	
<tr >
    	<td><label class="control-label"> Brand </label></td>
        <td>
		<select style="width:100%;" class="form-control chosen-select" Id="BrandId" name="BrandId"  >
		<option value="<?php echo $brand_id; ?>"> <?php echo $brand_name; ?> </option>
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
   
   <tr >
    	<td><label class="control-label">Category </label></td>
        <td>
		<select style="width:100%;" class="form-select" Id="Category" name="Category"  >
		<option value="<?php echo $cat_id; ?>"> <?php echo $cat_name; ?> </option>
				      	 
		</select>
		</td>
	
   </tr>
   
   
   <tr>
    	<td><label class="control-label">Sub Category </label></td>
		<td><input class="form-control" type="text" name="SubCatName" id="SubCatName"  value="<?php echo $sub_cat_name; ?>"></td>
    </tr>
	
	
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="sub-cat-list"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form>
			  
			  
            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>
	
	
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



	<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>