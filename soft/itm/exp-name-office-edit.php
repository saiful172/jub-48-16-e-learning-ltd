
<?php require_once 'header.php'; ?>

<?php
	 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM office_exp_name WHERE of_id =:uid');
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
			$stmt = $DB_con->prepare('UPDATE office_exp_name 
									     SET  name=:Name  
										      
								       WHERE  of_id = :uid');
			
		
			
			
			$stmt->bindParam(':Name',$Name); 
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Successful...');
				window.location.href='exp-name-office';
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ব্যয় </title>
<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active">Office Expense Name Edit </li></ol></h4></center>

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
    	<td><label class="control-label">Office Expense Name</label></td>
		<td><input class="form-control" type="text" name="Name" placeholder="Office Expense Name" value="<?php echo $name; ?>"></td>
    </tr>

	   
     <tr><td></td><td></td></tr>
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="exp-name-office"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form> 

</div>
</div>


<?php include('../includes/footer.php');?>