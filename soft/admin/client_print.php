<?php require_once 'session.php'; ?>
<?php 
	require_once '../includes/dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$userid = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM stuff 
		left join `user` on user.userid=stuff.userid 
		left join `password` on password.passwordid=stuff.userid 
		WHERE stuff.userid =:uid');
		$stmt_edit->execute(array(':uid'=>$userid));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Print </title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/form_style.css">
<style>
#box{width:100%;float:left;padding:10px; border-bottom:1px solid gray;} 
#title{width:220px;float:left; font-weight:bold;}  
</style>

</head>
<body>
 
<div class="container" >
 
	<div  style="border-style: dotted; padding:6px;">
	<div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
					<center>
					  <img src="../includes/dims.jpg" width="110px"><br>
					<b>  <span style="font-size:18px;">Digital Invoice Manager<br><span style="font-size:20px;">A Smart Invoice Making / Management Software  </span><b>
					</center>
					</div>
										
				</div>
				</div>
      
	<h4> 
     <div class="form-group input-group">
   <div id="box"><img src="../<?php echo $photo; ?>"  width="100px;" class="thumbnail"> <center><b>Software Buy Information</b></center></div>
   <div id="box"> <div id="title"> Id No  </div>  <div id="detail"> <b>:</b> <?php echo $userid; ?></div>        </div> 
   <div id="box"> <div id="title"> Business Name </div>  <div id="detail"><b>:</b> <?php echo $business_name; ?></div>        </div>
   <div id="box"> <div id="title"> Owner Name</div>  <div id="detail"><b>:</b> <?php echo $stuff_name; ?></div>        </div> 
   <div id="box"> <div id="title"> Phone No </div>  <div id="detail"><b>:</b> <?php echo $contact_info; ?></div>        </div> 
   <div id="box"> <div id="title"> Address </div>  <div id="detail"><b>:</b> <?php echo $business_address; ?></div>        </div> 
   <div id="box"> <div id="title"> Monthly Service Charge</div>  <div id="detail"><b>:</b> <?php echo $service_charge; ?> /-</div>        </div> 
   <div id="box"> <div id="title"> Start Date </div>  <div id="detail"><b>:</b> <?php echo date("d-M-Y", strtotime( $join_date)); ?></div>        </div> 
   <div id="box"> <div id="title"> User / Password : </div>  <div id="detail"><b>:</b> <?php echo $username; ?> / <?php echo $original; ?> </div>        </div> 
	
	</div>
	</h4> 
<br>
<br>
<br>

<center>
<img src="../includes/itm.png" width="95px;"><br><b style="font-size:22px;">www.itmsofts.com </b><br>
Call: 01751-891037 | Email: info@itmsofts.com <br>
#33, 2nd Floor, Jamil Shopping Center, Borogola- Bogura 5800 <br>
This Software Design, Planning, Development And Marketing By <b> ITM-SOFTS </b>
  
<center>
    
	</div>
    
   


</div>

