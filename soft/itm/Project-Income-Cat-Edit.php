
<?php require_once 'header.php'; ?>

<?php
	 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM project_incom_cat WHERE of_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: exp-name-office");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$Name = $_POST['Name']; 
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE project_incom_cat 
									     SET  name=:Name  
										      
								       WHERE  of_id = :uid');
			
		
			
			
			$stmt->bindParam(':Name',$Name); 
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Successful...');
				window.location.href='Project-Income-Cat';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/buttons.css">

</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active">Project Income Category Edit </li></ol></h4></center>
<?php require_once 'more-fals/project-link-btn.php'; ?> 
<div class="container"> 
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
	

	
	<tr>
    	<td><label class="control-label">Project Income Name</label></td>
		<td><input class="form-control" type="text" name="Name" placeholder="Project Income Name" value="<?php echo $name; ?>"></td>
    </tr>

	   
     <tr><td></td><td></td></tr>
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="Project-Income-Cat"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form> 

</div>
</div>


<?php include('../includes/footer.php');?>