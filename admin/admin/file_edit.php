<?php require_once 'header.php'; ?> 
<?php
	error_reporting( ~E_NOTICE ); 
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM gallery WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$ProCode = $_POST['ProCode'];
		$ProType = $_POST['ProType']; 
		$Batch = $_POST['Batch'];
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					//unlink($upload_dir.$edit_row['userPic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['userPic']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE gallery 
									     SET pro_code =:ProCode,
									         batch_no =:Batch, 
									         type =:ProType, 
										     userPic=:upic 
								       WHERE id=:uid');

			
			$stmt->bindParam(':ProCode',$ProCode);
			$stmt->bindParam(':Batch',$Batch);
			$stmt->bindParam(':ProType',$ProType);
			
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='file.php';
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container"> 
<center><h3><ol class="breadcrumb"> <li class="active">File Update</li></ol></h3></center>


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
	
    <tr>
    	<td><label class="control-label">  Product Code </label></td>
        <td><input class="form-control" type="text" name="ProCode" placeholder="Product Code" value="<?php echo $pro_code; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">  Batch No </label></td>
        <td><input class="form-control" type="text" name="Batch" placeholder="Batch No" value="<?php echo $batch_no; ?>" /></td>
    </tr>
	 
	<tr>
    	<td><label class="control-label"> Select Type </label></td>
        <td>
		<select class="form-control"  name="ProType">
		<option value="<?php echo $type; ?>"><?php echo $type; ?></option>
				      	<?php 
				      	$sql = "SELECT  type FROM gallery  ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[0]."</option>";
								} 
				      	?>
				       
		</select> 
		</td>
    </tr>
	
	
    <tr>
    	<td><label class="control-label"> Select File </label></td>
        <td>
        	<p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image"  />
        </td>
    </tr>
	 
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="file.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>
<?php include('includes/footer.php'); ?>
</div>



