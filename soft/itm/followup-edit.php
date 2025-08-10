<!DOCTYPE html>
<html lang="en">

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 


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
		header("Location: followup");
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
				window.location.href='followup';
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
      <h1> Follow Up Edit </h1> <hr>
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

	
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="followup"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form> 
			  
			  
            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>