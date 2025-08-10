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
		$CustId = $_POST['CustId'];
		$Comments = $_POST['Comments'];
		$FolCat = $_POST['FolCat'];
		$Date = $_POST['Date'];
		 
		if(empty($CustId)){
			$errMSG = "Please Enter Client Name.";
		}
		else if(empty($FolCat)){
			$errMSG = "Please Enter Follow Up Category.";
		}
		 
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO follow_up (user_id,cust_id,fol_comments,fol_cat,status,follow_date) VALUES(:UserId,:CustId,:Comments,:FolCat,1,:Date)');
			
			
			$stmt->bindParam(':UserId',$UserId);
			$stmt->bindParam(':CustId',$CustId);
			$stmt->bindParam(':Comments',$Comments);
			$stmt->bindParam(':FolCat',$FolCat);
			$stmt->bindParam(':Date',$Date);
			 
			if($stmt->execute())
			{
				?>
              <script>
				alert('Expense Data Successfully Add ...');
				window.location.href='followup';
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
      <h1> Follow Up </h1> <hr>
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
    	
		<?php   
				   $pq=mysqli_query($con,"select * from user where userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        
        <input class="form-control" type="hidden" name="UserId"  value="<?php echo $pqrow['userid']; ?>" />
		<?php }?>
    </tr>
	
	
	
	<tr>
    	<td><label class="control-label">Name </label>  </td>
        <td> 
		<select style="width:100%;" class="form-control chosen-select" Id="CustId" name="CustId" required="" >
		<option value="#">Select Client</option>
		
				      	<?php 
				      	$sql = "SELECT lead_id,lead_name FROM phone_book where  user_id='".$_SESSION['id']."' ";
								$result = $con->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} 
				      	?>
	   </select> 
     </tr>
	
	
	<tr>
    	<td><label class="control-label"> Name </label></td>
		<td><input class="form-control" type="text" id="CustName" disabled="true"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Business / Org </label></td>
		<td><input class="form-control" type="text" id="Org" disabled="true"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Address  </label></td>
		<td><input class="form-control" type="text"  id="Address" disabled="true"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Phone  </label></td>
		<td><input class="form-control" type="text"  id="CustPhone" disabled="true"></td>
    </tr>
	
	
	<tr>
    	<td><label class="control-label"> Comments</label></td>
		<td><textarea class="form-control" name="Comments" >Comments Here </textarea> </td>
    </tr>
	
	<tr style="display:none;">
    	<td><label class="control-label"> Category</label></td>
		<td><input class="form-control" type="text" name="FolCat" id="FolCat" placeholder="Follow By Category"></td>
    </tr>
	
	<tr>
    	<td><label class="control-label"> Date </label></td>
		<td> <input class="form-control" type="date" name="Date" placeholder="" value="<?php echo date('Y-m-d'); ?>" /></td>
    </tr>

	
    </table>
	
	<tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-danger" href="exp-name-list"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        
        </td>
    </tr>
    
</form> 
			  
			  
            </div>
          </div>

          
        </div>

       
    </section>

  </main> 

    <?php  require_once 'footer1.php'; ?>
	
	
<script>
	$("#CustId").on("change", function(){
		
		var customerID = $("#CustId").val();
		if(customerID == "")
		{
			alert("Please enter a valid customer ID!");
		}
		else{
			$.ajax({url: "ajax_c_load_follow.php?c=" + customerID, success: function(result){
				var customer = JSON.parse(result); 
				$("#CustName").val(customer.CName);
				$("#CustPhone").val(customer.CPhone);
				$("#FolCat").val(customer.Cat);
				$("#Address").val(customer.Addrs);
				$("#Org").val(customer.BizInfo);
				  
			}});
		}
	});
</script>

<script src = "js/chosen.js"></script>
<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
</script>
