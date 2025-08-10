<?php require_once 'header.php'; ?>
<?php 
	if(isset($_POST['btnsave']))
	{
		$Location = $_POST['Location'];
		$Name = $_POST['Name'];
		
		
		
		if(empty($Name)){
			$errMSG = "Please Enter Expense Name.";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO title_name (location,name) VALUES(:Location,:Name)');
			
			
			
			$stmt->bindParam(':Location',$Location);
			$stmt->bindParam(':Name',$Name);
			
			if($stmt->execute())
			{
				$successMSG = "New title name ad completed...";
				//header("refresh:2; expense.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body>

<div class="container">
<center><h4><ol class="breadcrumb"> <li class="active">  Title Name  </li></ol></h4></center>	


    	<h1 class="h2">&nbsp;<a class="btn btn-default" href="title_name_add.php"> <span class="glyphicon glyphicon-plus"></span>Add New </a> <a class="btn btn-default" href="title_name.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View</a></h1>
  
    

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
	    
	<table class="table table-bordered table-responsive">
	
	
	<tr>
    	<td><label class="control-label">Location/Place</label></td>
		<td><input class="form-control" type="text" name="Location" placeholder="Location/Place" value="<?php echo $Location; ?>"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Title Name</label></td>
		<td><input class="form-control" type="text" name="Name" placeholder="Title Name" value="<?php echo $Name; ?>"></td>
    </tr>
	
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>



</div>

<?php require_once '../includes/footer.php'; ?>




