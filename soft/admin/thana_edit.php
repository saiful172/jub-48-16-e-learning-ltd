<?php require_once 'header.php'; ?>

<?php
	 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM thana WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: thana.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$ThanaName = $_POST['ThanaName']; 
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE thana 
									     SET thana_name=:ThanaName  
										      
								       WHERE  id = :uid');
			
		
			
			
			$stmt->bindParam(':ThanaName',$ThanaName); 
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Successful...');
				window.location.href='thana.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ব্যয় </title>
<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active">Upazilla Edit </li></ol></h4></center>
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
   
    
	<table class="table table-bordered table-responsive">
	

	
	<tr>
    	<td><label class="control-label">Upazilla Name</label></td>
		<td><input class="form-control" type="text" name="ThanaName" placeholder="Upazilla Name" value="<?php echo $thana_name; ?>"></td>
    </tr>

	   
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="thana.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>

</div>

</body>
</html>