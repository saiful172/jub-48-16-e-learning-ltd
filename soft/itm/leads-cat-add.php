<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$Name = $_POST['Name'];
		
		
		
		if(empty($Name)){
			$errMSG = "Please Phone Book Category Name.";
		}
		  
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO phnbook_category (user_id,pb_cat_name) VALUES(:UserId,:Name)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':Name',$Name);
			
			
			if($stmt->execute())
			{
				?>
              <script>
				alert('Data Successfully Add ...');
				window.location.href='leads-cat';
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
<link rel="stylesheet" href="css/buttons.css"> 
</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active"> Leads Category Name   </li></ol></h4></center>	
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
    	<td><label class="control-label">Category Name</label></td>
		<td><input class="form-control" type="text" name="Name" placeholder="Phone Book Category Name" ></td>
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
 