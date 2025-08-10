<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$BrndName = $_POST['BrndName'];
		
		if(empty($BrndName)){
			$errMSG = "Please Enter Brand Name.";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO brand1 (user_id,brand_name,status) VALUES(:UserId,:BrndName,1)');
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':BrndName',$BrndName);
			if($stmt->execute())
			{
			?>
              <script>
				alert('Data Successfully Add ...');
				window.location.href='brand';
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
<!DOCTYPE html PUBLIC >
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
</head>
<body>

<div class="container">
<center><h4><ol class="breadcrumb"> <li class="active">  Brands   </li></ol></h4></center>	
<h1 class="h2"> 
		<a class="btn btn-success" href="category"> <span class="glyphicon glyphicon-eye-open"></span>  View</a>
		</h1>
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
	    
	<table class="table table-responsive">
	
  <tr>
    	
		<?php    
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
  
	<tr>
    	<td><label class="control-label">Brand Name</label></td>
		<td><input class="form-control" type="text" name="BrndName" placeholder="Brand Name" value="<?php echo $BrndName; ?>"></td>
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



