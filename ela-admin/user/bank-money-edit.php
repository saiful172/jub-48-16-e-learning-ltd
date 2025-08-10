<?php require_once 'header.php'; ?>

<?php
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM bank_money 
		Left JOIN bank_name ON bank_name.id = bank_money.bank_id
		WHERE bank_money.bank_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: bank-money");
	}
	
	if(isset($_POST['btn_save_updates']))
	{
		
		//$BName = $_POST['BName'];
		$Prev = $_POST['Prev'];
		$Today = $_POST['Today'];
		$RecAmt = $_POST['RecAmt'];
		$Reff = $_POST['Reff'];
		$Purpose = $_POST['Purpose'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE bank_money 
									     SET  previous_amt=:Prev,
										      today_amt=:Today,
											  recent_amt=:RecAmt, 
										      refer=:Reff, 
										      cuses=:Purpose 
										     
											 
								       WHERE  bank_id = :uid');
			
		
			
			
			$stmt->bindParam(':Prev',$Prev);
			$stmt->bindParam(':Today',$Today);
			$stmt->bindParam(':RecAmt',$RecAmt);
			$stmt->bindParam(':Reff',$Reff);
			$stmt->bindParam(':Purpose',$Purpose);
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert('Update Sucessfull ');
				window.location.href='bank-money';
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
<center><h4><ol class="breadcrumb"> <li class="active"> Bank Money Edit</li></ol></h4></center>

<?php require_once 'more-fals/bank-option-link.php'; ?>  

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
		<td><input class="form-control" type="text" name="BName" placeholder="Bank Name" value="<?php echo $name; ?>" readonly></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Previous</label></td>
		<td><input class="form-control" type="text" name="Prev" placeholder="Bank Name" value="<?php echo $previous_amt; ?>"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Today</label></td>
		<td><input class="form-control" type="text" name="Today" placeholder="Bank Name" value="<?php echo $today_amt; ?>"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Current Deposit</label></td>
        <td> <input class="form-control" type="text" id="RecAmt" name="RecAmt" placeholder="Current Deposit" value="<?php echo $recent_amt; ?>"  ></td>
    </tr>
	 
	 
	 <tr>
    	<td><label class="control-label">Reference</label></td>
		<td><input class="form-control" type="text" name="Reff" placeholder="Bank Name" value="<?php echo $refer; ?>"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Purpose</label></td>
		<td><input class="form-control" type="text" name="Purpose" placeholder="Bank Name" value="<?php echo $cuses; ?>"></td>
    </tr>
    
    
    </table>
	
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="bank-money"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
	
	
    
</form>

</div>

<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div>
