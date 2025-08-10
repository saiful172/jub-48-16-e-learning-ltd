
<?php require_once 'header.php'; ?>

<?php 
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM prjct_name WHERE pj_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: project-name");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$PjName = $_POST['PjName'];
		$PjDetail = $_POST['PjDetail'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE prjct_name 
									     SET pj_name=:PjName, 
										     pj_detail=:PjDetail
											 
								       WHERE  pj_id = :uid');
			
		
			
			
			$stmt->bindParam(':PjName',$PjName);
			$stmt->bindParam(':PjDetail',$PjDetail);
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert('Update Successful...');
				window.location.href='project-name';
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

<center><h4><ol class="breadcrumb"> <li class="active">Project Name Edit </li></ol></h4></center>
<?php require_once 'more-fals/project-link-btn.php'; ?> 
 
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
    	
    	<td><label class="control-label">Project Name</label></td>
		<td><input class="form-control" type="text" name="PjName"  value="<?php echo $pj_name; ?>"></td>
    
     </tr>
	
	 
	
	
	
	<tr>
    	<td><label class="control-label">Project Details</label></td>
		<td><input class="form-control" type="text" name="PjDetail" value="<?php echo $pj_detail; ?>"></td>
    </tr>
	
	

    
	 <tr><td></td><td></td></tr>
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="project-name"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
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