
<?php require_once 'header.php'; ?>

<?php
	error_reporting( ~E_NOTICE ); 
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM title_name WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: title_name.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$Location = $_POST['Location'];
		$Name = $_POST['Name'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE title_name 
									     SET location=:Location, 
											 name=:Name
										     
								       WHERE  id = :uid');
			
		
			
			
			$stmt->bindParam(':Location',$Location);
			$stmt->bindParam(':Name',$Name);
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update completed... ... ');
				window.location.href='title_name.php';
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
 
<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">
<center><h4><ol class="breadcrumb"> <li class="active">Title Name Edit </li></ol></h4></center>
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
    	<td><label class="control-label"> Location/Place</label></td>
		<td><input class="form-control" type="text" name="Location" placeholder="Location/Place" value="<?php echo $location; ?>"></td>
    </tr>
	<tr>
    	<td><label class="control-label"> Name</label></td>
		<td><input class="form-control" type="text" name="Name" placeholder=" Name" value="<?php echo $name; ?>"></td>
    </tr>
		
	   
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="title_name.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>

</div>

<?php require_once '../includes/footer.php'; ?>
