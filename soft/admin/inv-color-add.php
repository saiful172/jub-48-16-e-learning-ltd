<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

<?php 
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$Others = $_POST['Others'];
		$TblHead = $_POST['TblHead']; 
		$TblBody = $_POST['TblBody'];
		
		
		
		if(empty($Others)){
			$errMSG = "Please Enter Others.";
		}
		  
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO color_inv (user_id,whole,table_head,table_body,status)
                                                			VALUES(:UserId,:Others,:TblHead,:TblBody,1)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':Others',$Others);
			$stmt->bindParam(':TblHead',$TblHead); 
			$stmt->bindParam(':TblBody',$TblBody);
			
			
			if($stmt->execute())
			{
				?>
              <script>
				alert('Color Add Successfully Done ! ');
				window.location.href='inv-color';
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

<?php  require_once 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle"> 
	  <h1>Color Add  | <span> <a href="inv-color">   <i class="bi bi-table"></i> </a> </span> </h1>
	  <hr>
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
			  
<form method="post" enctype="multipart/form-data" class="form-horizontal" >
	    
	<table class="table table-hover table-responsive">
	
   <tr>
    	
		<?php    
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId11"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
  <tr>
    	<td><label class="control-label">Select Client</label></td>
       	<td><select style="width:100%;" class="form-control chosen-select" name="UserId" id="UserId"/>
		<option value="#">Select User</option>
				      	<?php 
				      	$sql = "SELECT  userid,business_name FROM stuff where status=1 order by userid desc ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
		</select> </td>       
	</tr>	
	
	<tr>
    	<td><label class="control-label"> Invoice Head </label></td>
        <td><input class="form-control" type="color" name="TblHead"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Invoice Body </label></td>
        <td><input class="form-control" type="color" name="TblBody"  required></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Others </label></td>
        <td><input class="form-control" type="color" name="Others"  required></td>
    </tr>
	
	 	
    
    </table>
	
	<button type="submit" name="btnsave" class="btn btn-primary">  <span class="glyphicon glyphicon-save"></span> &nbsp; Save </button>
    
</form>

            </div>
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