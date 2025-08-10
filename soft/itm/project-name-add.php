<?php require_once 'header.php'; ?>
<?php
 
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$PjName = $_POST['PjName'];
		$PjDetail = $_POST['PjDetail'];
		
		
		
		if(empty($PjName)){
			$errMSG = "Please Enter Expense Name.";
		}
		else if(empty($PjDetail)){
			$errMSG = "Please Enter Expense Ammount.";
		}
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO prjct_name (user_id,pj_name,pj_detail,status)
												VALUES(:UserId,:PjName,:PjDetail,1)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':PjName',$PjName);
			$stmt->bindParam(':PjDetail',$PjDetail);
			
			if($stmt->execute())
			{
				?>
              <script>
				alert('Expense Data Successfully Add ...');
				window.location.href='project-name';
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
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>

<center><h4><ol class="breadcrumb"> <li class="active">Project Name Add </li></ol></h4></center>	
<?php require_once 'more-fals/project-link-btn.php'; ?> 
 
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
    	<td><label class="control-label"> Project Name </label></td>
		<td><input class="form-control" type="text" name="PjName" placeholder="Project Name" value="<?php echo $PjName; ?>"></td>
    
     </tr>
	
	
	
	<tr>
    	<td><label class="control-label"> Project Details</label></td>
		<td><input class="form-control" type="text" name="PjDetail" placeholder="Project Details" value="<?php echo $PjDetail; ?>"></td>
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
<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>

</div>


<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>



