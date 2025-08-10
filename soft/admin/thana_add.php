<?php require_once 'header.php'; ?>
<?php 
	
	if(isset($_POST['btnsave']))
	{
		
		$UserId = $_POST['UserId'];
		$DivName = $_POST['DivName'];
		$DistName = $_POST['DistName'];
		$ThanaName = $_POST['ThanaName'];
		
		
		
		if(empty($ThanaName)){
			$errMSG = "Please Enter Upazilla Name.";
		}
		 
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO thana (user_id,thana_name,div_id,dist_id) VALUES(:UserId,:ThanaName,:DivName,:DistName)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':DivName',$DivName);
			$stmt->bindParam(':DistName',$DistName);
			$stmt->bindParam(':ThanaName',$ThanaName);
			
			
			if($stmt->execute())
			{
				$successMSG = "Data Add Successful...";
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



</head>
<body>

<div class="container">

<center><h4><ol class="breadcrumb"> <li class="active">  Upazilla   </li></ol></h4></center>	


    	<h1 class="h2"><a class="btn btn-default" href="thana_add.php"> <span class="glyphicon glyphicon-plus"></span>Add New</a> <a class="btn btn-default" href="thana.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View</a></h1>
  
    

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
    	<td><label class="control-label">Select Division</label> </td>
        <td>
		<select style="width:100%;" class="form-control chosen-select " Id="DivName" name="DivName" >
		<option value="#">Select Name</option>
				      	<?php 
				      	$sql = "SELECT  div_id,div_name FROM division ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
		</select> 
		</td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Select District</label> </td>
        <td>
		<select style="width:100%;" class="form-control chosen-select " Id="DistName" name="DistName" >
		<option value="0">Select Name</option>
				      	 
		</select> 
		</td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Upazilla Name</label></td>
		<td><input class="form-control" type="text" name="ThanaName" placeholder="Upazilla Name" value="<?php echo $ThanaName; ?>"></td>
    </tr>
	
	
	 <tr> <td></td> <td></td> </tr>
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span>Save
        </button>
        </td>
    </tr>
    
</form>



</div>

    <script src="jquery-1.12.0.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $("#DivName").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'getDistrict.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#DistName").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['dist_id'];
                            var name = response[i]['dist_name'];

                            $("#DistName").append("<option value='"+id+"'>"+name+" - "+id+"</option>");

                        }
                    }
                });
            });

        });
    </script>
	
<?php require_once '../includes/footer.php'; ?>
