
<?php require_once 'header.php'; ?>

<?php
	 
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT  follow_up.fol_up_id, phone_book.lead_name, phone_book.address,phone_book.org_name,follow_up.fol_comments,follow_up.fol_cat,phnbook_category.pb_cat_name  from follow_up 
								left join phnbook_category on phnbook_category.pb_cat_id=follow_up.fol_cat
								left join phone_book on phone_book.lead_id=follow_up.cust_id
		
		WHERE fol_up_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: follow-up.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		
		$Comments = $_POST['Comments']; 
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE follow_up
									     SET  fol_comments=:Comments   
								       WHERE  fol_up_id = :uid'); 
			
			$stmt->bindParam(':Comments',$Comments); 
			
			$stmt->bindParam(':uid',$id);
			
			if($stmt->execute()){
				?>
                <script>
				alert(' Update Successful...');
				window.location.href='follow';
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
<link rel="stylesheet" href="css/buttons.css">
</head>
<body>


<center><h4><ol class="breadcrumb"> <li class="active">Follow Up Edit </li></ol></h4></center>
<div class="col-md-2">	
<div class="buttons">

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="follow-up"> <span class="glyphicon glyphicon-plus"></span> New Follow Up</a> 
</div>

<div class="col-md-12">	
<a class="btn btn-info btn-w100" href="follow"> <span class="glyphicon glyphicon-user"></span> Follow Up List</a>
</div>

<div class="col-md-12">	
<a class="btn btn-success btn-w100" href="follow-up-report"> <span class="glyphicon glyphicon-file"></span> Report</a> 
</div>	
 
<div class="col-md-12">	 
<br>
</div>
 
<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="leads"> <span class="glyphicon glyphicon-user"></span> Leads</a>
</div>
       
</div>
</div>

	
<div class="col-md-10">
<div class="col-md-8"> 
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
    	<td><label class="control-label">Name</label></td>
		<td><input class="form-control" type="text" name="Name" placeholder="PhoneBook Category Name" value="<?php echo $lead_name; ?>" disabled="true"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Business / Org </label></td>
		<td><input class="form-control" type="text" id="Org" value="<?php echo $org_name; ?>" disabled="true"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Address  </label></td>
		<td><input class="form-control" type="text"  id="Address" value="<?php echo $address; ?>" disabled="true"></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label">Comments</label></td>
		<td>
		<textarea class="form-control" name="Comments" ><?php echo $fol_comments; ?></textarea> 
		</td>
    </tr>

	   
     <tr><td></td><td></td></tr>
    
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="follow"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form> 


</div>
<div class="col-md-12">
<?php require_once '../includes/footer.php'; ?> 
</div>
</div>
 