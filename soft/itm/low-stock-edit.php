
<?php require_once 'header.php'; ?>

<?php 
$sql = $con->query("select * from stock_low where user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$LowQty =$row['low_qty'];   
$User =$row['user_id'];   
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$Name = $_POST['Name']; 
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE stock_low 
									     SET  low_qty=:Name  
										      
								       WHERE  user_id =:uid ');
			
			$stmt->bindParam(':Name',$Name);  
			$stmt->bindParam(':uid',$User);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Successful...');
				window.location.href='low-stock-product';
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

</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active">Low Stock  Edit </li></ol></h4></center>

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
    	<td><label class="control-label">Product  Quantity </label></td>
		<td><input class="form-control" type="text" name="Name" value="<?php echo $LowQty; ?>"></td>
    </tr>

	   
     <tr><td></td><td></td></tr>
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="low-stock-product"> <span class="glyphicon glyphicon-backward"></span> Back </a>
        
        </td>
    </tr>
    
</form> 

</div>
</div>


<?php include('../includes/footer.php');?>