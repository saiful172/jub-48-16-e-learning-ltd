<?php require_once 'session.php'; ?>
<?php require_once 'header.php'; ?>
<?php
	error_reporting( ~E_NOTICE );
	
	require_once 'includes/dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM customer_msg left join `customer` on customer.userid=customer_msg.msg_to  WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		
		$Msg_Name = $_POST['Msg_Name'];
		$Link = $_POST['Link'];
		$Status = $_POST['Status'];
		$Date = $_POST['Date'];
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE customer_msg 
									     SET msg_name=:Msg_Name, 
										         link=:Link,
										       status=:Status,
                                           entry_date=:Date 											 
											 
								       WHERE  id = :uid');
			
		
			$stmt->bindParam(':Msg_Name',$Msg_Name);
			$stmt->bindParam(':Link',$Link);
			$stmt->bindParam(':Status',$Status);
			$stmt->bindParam(':Date',$Date);
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='customer_msg.php';
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
<title>Customer Meassage Update</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body>

<h3><ol class="breadcrumb"> <li class="active">Customer Meassage Update</li></ol><h3>

    	<h1 class="h2"><a class="btn btn-default" href="group_add.php"> <span class="glyphicon glyphicon-user"></span>&nbsp; Add New  </a> &nbsp;&nbsp;<a class="btn btn-default" href="group.php"> <span class="glyphicon glyphicon-edit"></span>&nbsp; Go To Group  </a>&nbsp;&nbsp;<a class="btn btn-default" href="index.php">  <span class="glyphicon glyphicon-home"></span>&nbsp; Back To Home  </a></h1>
 


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
    	<td><label class="control-label">Meassage To:</label></td>
        <td><input class="form-control" type="text"value="<?php echo $shop_name; ?>" disabled="true" /></td>
    </tr>
	
    <tr>
    	<td><label class="control-label">Meassage Name:</label></td>
        <td><input class="form-control" type="text" name="Msg_Name" placeholder="Meassage Name" value="<?php echo $msg_name; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Link/Other</label></td>
        <td><input class="form-control" type="text" name="Link" placeholder="Link" value="<?php echo $link; ?>" /></td>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Active/In Active</label></td>
       	<td><select style="width:100%;" class="form-control" name="Status"  value="<?php echo $status; ?>" />
		<option value="1">Active</option> 
		<option value="0">In Active</option>
		</select> </td>       
	</tr>
	
	<tr>
    	<td><label class="control-label">Date</label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo $entry_date ;?>" /></td>
    </tr>
	
		
	   
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="group.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>



<?php require_once 'includes/footer.php'; ?>