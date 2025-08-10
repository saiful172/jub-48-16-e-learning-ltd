<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?> 

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php 
$sql = $con->query("select * from color_inv where user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$ColrId =$row['id'];
$Whole =$row['whole'];
$table_head =$row['table_head']; 
$table_body =$row['table_body']; 
?> 

<?php
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$Id = $_POST['Id']; 
		$TblHead = $_POST['TblHead']; 
		$TblBody = $_POST['TblBody']; 
		$Others = $_POST['Others'];  
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE color_inv 
									     SET  table_head=:TblHead,  
									          table_body=:TblBody,  
									          whole=:Others 
										      
								       WHERE  id = :Id');
			
		
			
			
			$stmt->bindParam(':Id',$Id); 
			$stmt->bindParam(':TblHead',$TblHead); 
			$stmt->bindParam(':TblBody',$TblBody); 
			$stmt->bindParam(':Others',$Others); 
			 
			
			if($stmt->execute()){
				?>
                <script>
				alert('Update Successful...');
				window.location.href='invoice-color';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Invoice Color</h1> <hr>
    </div> 
	
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
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
			  
</h5>
			  

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
   
    
	<table class="table table-responsive">
	
   <tr style="display:none;">
    	<td><label class="control-label"> Id </label></td>
        <td><input class="form-control" type="text" name="Id" value="<?php echo $ColrId ; ?>" required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Invoice Head </label></td>
        <td><input class="form-control" type="color" name="TblHead" value="<?php echo $table_head ; ?>" required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Invoice Body </label></td>
        <td><input class="form-control" type="color" name="TblBody" value="<?php echo $table_body ; ?>" required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Others </label></td>
        <td><input class="form-control" type="color" name="Others" value="<?php echo $Whole ; ?>" required></td>
    </tr>
	
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
      
        </td>
    </tr>
    
</form> 
			  
			  
            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>
	
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>