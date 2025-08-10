
<?php require_once 'header.php'; ?>

<?php 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM expense_other WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: expense_other.php");
	}
	 
	if(isset($_POST['btn_save_updates']))
	{
		
		$ExpName = $_POST['ExpName'];
		$ExpCost = $_POST['ExpCost'];
		$Refer = $_POST['Refer'];
		$Date = $_POST['Date'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE expense_other 
									     SET expense_name=:ExpName, 
										     expense_cost=:ExpCost, 
										     reference=:Refer,
										     entry_date=:Date 
											 
								       WHERE  id = :uid');
						
			$stmt->bindParam(':ExpName',$ExpName);
			$stmt->bindParam(':ExpCost',$ExpCost);
			$stmt->bindParam(':Refer',$Refer);
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Successfull... ');
				window.location.href='Other-Expense';
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
<link rel="stylesheet" href="css/buttons.css">

</head>
<body> 
<center><h4><ol class="breadcrumb"> <li class="active">Expense Edit </li></ol></h4></center>
<div class="col-md-2">  
<div class="buttons"> 

		<div class="col-md-12">
		<a class="btn btn-primary btn-w100" href="Other-Expense"  > <span class="glyphicon glyphicon-list"></span> Other Expense List </a> 
		</div>
		 
		 
		<div class="col-md-12">
		<a class="btn btn-success  btn-w100" href="other-exp-report-by-date"  > <span class="glyphicon glyphicon-print"></span> Date Wise Report </a>
	   </div>
		 
		
	</div>
	
	 
</div>

<div class="col-md-10"> 
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
    	<td><label class="control-label">Expense Name</label></td>
		<td><input class="form-control" type="text" name="ExpName" placeholder="Expense Name" value="<?php echo $expense_name; ?>"></td>
    </tr>
	
		
	<tr>
    	<td><label class="control-label">Expense Cost</label></td>
        <td><input class="form-control" type="text" name="ExpCost" placeholder="Expense Cost " value="<?php echo $expense_cost; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Reference </label></td>
		<td><input class="form-control" type="text" name="Refer" placeholder="Reference" value="<?php echo $reference; ?>" ></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Date </label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo $entry_date ;?>" ></td>
    </tr>
	 
	 <tr> <td></td>  <td></td></tr>
	 
    </table>
	<button type="submit" name="btn_save_updates" class="btn btn-primary"> <span class="glyphicon glyphicon-save"></span> Update  </button> 
        <a class="btn btn-danger" href="Other-Expense"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
     
</form> 
</div>
<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div>