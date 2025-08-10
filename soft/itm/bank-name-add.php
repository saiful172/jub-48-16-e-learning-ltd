<?php require_once 'session.php'; ?>
<?php require_once 'header.php'; ?>
<?php
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$Name = $_POST['Name'];
		
		
		if(empty($Name)){
			$errMSG = "Please Enter Expense Name.";
		}
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO bank_name (user_id,name) VALUES(:UserId,:Name)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':Name',$Name);
			if($stmt->execute())
			{
			
			?>
                <script>
				alert('New Bank Add  Succesfully..!');
				window.location.href='bank-name';
				</script>
                <?php
				
				//$successMSG = "New Bank Add  Succesfully ...";
				//header("refresh:2; expense.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
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
<center><h4><ol class="breadcrumb"> <li class="active">Bank Name</li></ol></h4></center>	
<?php require_once 'more-fals/bank-option-link.php'; ?>

    <div class="container">
	<div class="col-md-7">
	
	 

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal" >
	    
	<table class="table table-hover table-responsive">
	
   <tr>
    	
		<?php   
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Bank Name</label></td>
		<td><input class="form-control" type="text" name="Name" placeholder="Bank Name" value="<?php echo $Name; ?>"></td>
    </tr>
	
    
   <tr><td></td><td></td></tr>
    
    </table>
	
	 <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
        </td>
    </tr>
    
</form>


</div>
</div>

<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div>




