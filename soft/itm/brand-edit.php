
<?php require_once 'header.php'; ?>

<?php 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM brand1 WHERE brand_id =:uid');
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
		
		$BrandName = $_POST['BrandName'];
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE brand1 
									     SET brand_name=:BrandName
										     
								       WHERE  brand_id = :uid');
			
		
			
			
			$stmt->bindParam(':BrandName',$BrandName);
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Succesfull ... ');
				window.location.href='brand';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<!DOCTYPE html PUBLIC >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">
<center><h4><ol class="breadcrumb"> <li class="active">Brand Edit </li></ol></h4></center>
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
	

	
	<tr>
    	<td><label class="control-label">Brand Name</label></td>
		<td><input class="form-control" type="text" name="BrandName" placeholder="Brand Name" value="<?php echo $brand_name; ?>"></td>
    </tr>
	
	
	   
    <tr><td></td><td></td></tr>
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="brand"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form>



</div>
<?php include('../includes/footer.php');?>