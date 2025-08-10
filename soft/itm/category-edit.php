
<?php require_once 'header.php'; ?> 

<?php 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM categories1  
		Left join brand1 on  brand1.brand_id=categories1.brand_id
		WHERE categories1.cat_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: category");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$CatName = $_POST['CatName'];
		$BrandId = $_POST['BrandId'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE categories1 
									     SET cat_name=:CatName,
									     brand_id=:BrandId
										     
								       WHERE  cat_id = :uid');
			
		
			
			
			$stmt->bindParam(':CatName',$CatName);
			$stmt->bindParam(':BrandId',$BrandId);
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Succesfull ... ');
				window.location.href='category';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">
<center><h4><ol class="breadcrumb"> <li class="active"> Category Edit </li></ol></h4></center>

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
   
    
	<table class="table table-responsive">
	
<tr >
    	<td><label class="control-label"> Brand </label></td>
        <td>
		<select style="width:100%;" class="form-control chosen-select" Id="BrandId" name="BrandId"  required=""/>
		<option value="<?php echo $brand_id; ?>"><?php echo $brand_name; ?></option>
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
    	<td><label class="control-label">Category </label></td>
		<td><input class="form-control" type="text" name="CatName" placeholder="Sub Category Name" value="<?php echo $cat_name; ?>"></td>
    </tr>
	
	
	   
    <tr><td></td><td></td></tr>
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="category"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form>



</div>

<?php include('../includes/footer.php');?>

<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>