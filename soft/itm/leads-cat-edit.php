
<?php require_once 'header.php'; ?>

<?php
	 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM phnbook_category WHERE pb_cat_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: leads-cat");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$Name = $_POST['Name']; 
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE phnbook_category 
									     SET  pb_cat_name=:Name  
										      
								       WHERE  pb_cat_id = :uid');
			 
			
			$stmt->bindParam(':Name',$Name); 
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Successful...');
				window.location.href='leads-cat';
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
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active">Leads Category Name Edit </li></ol></h4></center>

<div class="col-md-2">	
<div class="buttons">

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="leads-cat-add"> <span class="glyphicon glyphicon-plus"></span> Add New</a> 
</div>	

<div class="col-md-12">	
<a class="btn btn-warning btn-w100" href="leads-cat"> <span class="glyphicon glyphicon-list"></span> Leads Category</a>
</div>

<div class="col-md-12">	
<a class="btn btn-success btn-w100" target="_blank" href="php_action/print-phnbook-cat.php"> <span class="glyphicon glyphicon-file"></span> Print Cat List</a> 
</div>

<div class="col-md-12">	 
<br>
</div>

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="leads"> <span class="glyphicon glyphicon-user"></span> Leads</a>
</div>
  
<div class="col-md-12">	
<a class="btn btn-info btn-w100" href="follow"> <span class="glyphicon glyphicon-user"></span> Follow Up</a>
</div>
       
	</div>
	</div>

	
<div class="col-md-10"> 
<div class="container"> 
<div class="col-md-8">
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
    	<td><label class="control-label">Category Name</label></td>
		<td><input class="form-control" type="text" name="Name" placeholder="Category Name" value="<?php echo $pb_cat_name; ?>"></td>
    </tr>

	   
     <tr><td></td><td></td></tr>
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="leads-cat"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form> 

</div>
</div>

<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>
</div>