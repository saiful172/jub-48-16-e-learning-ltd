
<?php require_once 'header.php'; ?>

<?php
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM bank_name WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: bank-name");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$Name = $_POST['Name'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE bank_name 
									     SET name=:Name 
										     
											 
								       WHERE  id = :uid');
			
		
			
			
			$stmt->bindParam(':Name',$Name);
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Sucessfull... ');
				window.location.href='bank-name';
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
</head>
<body>
 
<center><h4><ol class="breadcrumb"> <li class="active"> Bank Name Edit </li></ol></h4></center>
<?php require_once 'more-fals/bank-option-link.php'; ?>

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
    	<td><label class="control-label">Bank Name</label></td>
		<td><input class="form-control" type="text" name="Name" placeholder="Bank Name" value="<?php echo $name; ?>"></td>
    </tr>
	   
  
   
    
    </table>
	
	  <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button> 
        <a class="btn btn-danger" href="bank-name"> <span class="glyphicon glyphicon-backward"></span>Cancel</a>
        
        </td>
	
     </tr>

	 
	 
</div>
</div>

<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div>
