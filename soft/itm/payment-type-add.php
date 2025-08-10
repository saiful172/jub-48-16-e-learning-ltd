<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$Name = $_POST['Name'];
		
		
		
		if(empty($Name)){
			$errMSG = "Please Enter Comments Name.";
		}
		 
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO payment_type (user_id,pt_name,status) VALUES(:UserId,:Name,1)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':Name',$Name);
			
			
			if($stmt->execute())
			{
				?>
              <script>
				alert('Data Successfully Add ...');
				window.location.href='payment-type';
				</script>
          <?php	
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active">  Payment Type Add  </li></ol></h4></center>	

<div class="container">
    	<h1 class="h2"> 
		<a class="btn btn-success" href="payment-type"> <span class="glyphicon glyphicon-eye-open"></span>  View</a></h1>
  
    

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
    	<td><label class="control-label">Type Name</label></td>
		<td><input class="form-control" type="text" name="Name" placeholder="Type Name"></td>
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


<?php include('../includes/footer.php');?>