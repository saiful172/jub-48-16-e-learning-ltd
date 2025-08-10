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
		
		$User_Id = $_POST['User_Id'];
		$Msg_Name = $_POST['Msg_Name'];
		$MsgFrom = $_POST['MsgFrom'];
		$MsgTo = $_POST['MsgTo'];
		$Link = $_POST['Link'];
		$Date = $_POST['Date'];
		
		
		if(empty($Msg_Name)){
			$errMSG = "Please Enter Msg_Name.";
		}
		else if(empty($Link)){
			$errMSG = "Please Enter Link.";
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO customer_msg (admin_id,user_id,msg_name,link,msg_from_to,msg_from,msg_to,msg_status,status,entry_date) 
			                                               VALUES(22,:User_Id,:Msg_Name,:Link,"Company", :MsgFrom,:MsgTo,1,1,:Date)');
			 
			$stmt->bindParam(':User_Id',$User_Id);
			$stmt->bindParam(':Msg_Name',$Msg_Name);
			$stmt->bindParam(':MsgFrom',$MsgFrom);
			$stmt->bindParam(':MsgTo',$MsgTo);
			$stmt->bindParam(':Link',$Link);
			$stmt->bindParam(':Date',$Date);
			
			if($stmt->execute())
			{
				$successMSG = "new record successfully inserted ...";
				//header("refresh:2; customer.php"); // redirects image view page after 5 seconds.
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
	  <h1>Message Add  | <span> <a href="send-message">   <i class="bi bi-table"></i> </a> </span> </h1>
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
	    
<table class="table  table-responsive">
	
    	<tr>
    	<td><label class="control-label">Message To</label></td>
       	<td><select style="width:100%;" class="form-control chosen-select" name="User_Id" id="CustId"/>
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
	
	<tr >
    	<td><label class="control-label">Message From</label></td>
		<?php 
				   $pq=mysqli_query($con,"select * from stuff left join `user` on 
user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
         
			<td><input class="form-control" type="text" name="MsgFrom"  value="<?php echo $pqrow['stuff_name']; ?>" ></td>
		<?php }?> 
    </tr>
		
	<tr>
    	<td><label class="control-label">Message To</label></td>
        <td><input class="form-control" type="text" name="MsgTo" id="MsgTo" required=""/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Message Name:</label></td>
        <td><input class="form-control" type="text" name="Msg_Name" placeholder="Meassage Name" value="<?php echo $Msg_Name; ?>" required=""/></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Link/Other</label></td>
        <td><input class="form-control" type="text" name="Link" placeholder="Link" value="<?php echo $Link; ?>" required=""/></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Date</label></td>
		<td><input class="form-control" type="text" name="Date" placeholder="" value="<?php echo date("Y/m/d") ;?>" required=""/></td>
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