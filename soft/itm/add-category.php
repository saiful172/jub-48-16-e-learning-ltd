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
		$CatName = $_POST['CatName'];
		$BrandId = $_POST['BrandId'];
		
		if(empty($CatName)){
			$errMSG = "Please Enter Category Name.";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO categories1 (user_id,cat_name,brand_id,status) VALUES(:UserId,:CatName,:BrandId,1)');
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':CatName',$CatName);
			$stmt->bindParam(':BrandId',$BrandId);
			if($stmt->execute())
			{
			?>
              <script>
				alert('Data Successfully Add ...');
				window.location.href='add-category';
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
      <h1>Add New Category |  <span> <a href="category-list">    <i class="bi bi-table"></i> </a> </span> </h1>
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
    	<td><label class="control-label"> Brand </label></td>
        <td>
		<select style="width:100%;" class="form-control chosen-select" Id="BrandId" name="BrandId" value="<?php echo $BrandId; ?>" required=""/>
		<option value="#">Select Brand</option>
				      	<?php 
				      	$sql = "SELECT  brand_id,brand_name FROM brand1 WHERE user_id ='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
		</select>
		</td>
   </tr>
   
   
	<tr>
    	<td><label class="control-label"> Category </label></td>
		<td><input class="form-control" type="text" name="CatName" placeholder="Category Name" value="<?php echo $CatName; ?>"></td>
    </tr>
	
	
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

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>
	
	
<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>