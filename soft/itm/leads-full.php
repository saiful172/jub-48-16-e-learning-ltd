<?php require_once 'header.php'; ?>
<?php
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM phone_book WHERE lead_id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM phone_book WHERE lead_id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:client_phone.php");
	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/table_data_center.css">
<style type="text/css"> .social .fa {font-size:17px;}</style>
<script>
function myFunctionPrint() {
	window.open("client_phone_print.php");
	}
	
	function myFunctionPrint2() {
	window.open("client_phone_print_pic.php");
	}
</script>
</head>

<body> 

<center><h4><ol class="breadcrumb"> <li class="active">Leads List</li></ol></h4></center>
  
<div class="col-md-12">	
<div class="buttons">

<div class="col-md-3">	
<a class="btn btn-primary" href="leads-add"> <span class="glyphicon glyphicon-plus"></span> Add New</a> 
<a class="btn btn-danger" href="leads"> <span class="glyphicon glyphicon-backward"></span> Back</a> 
</div>	
      
	</div>
	</div>

	
<div class="col-md-12">
<div style="width:100%;" class="form-group input-group">
                 <span style="" class="input-group-addon"><i class="fa fa-search"></i></span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search......">
</div>
			  
			  
<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr> 
								<th>SL</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Business / Org</th>
                                <th>Position</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Website</th>
								
								<th>Social Media</th>
								
								<th>Address</th>
								
                                <th>Photo</th>
								
								<th>Action</th>
								
                            </tr>
                        </thead>
                        <tbody id="tbody">
							<?php
								$sl=0;
								$eq=mysqli_query($con,"select * from phone_book 
								left join phnbook_category on phnbook_category.pb_cat_id=phone_book.category
								where  phone_book.user_id='".$_SESSION['id']."' ORDER BY phone_book.lead_id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){ 
									?>
										<tr>
										    
											<td><?php echo ++$sl; ?></td>
											<td><?php echo date("d M Y", strtotime($eqrow['join_date'])); ?></td>
											<td><?php echo $eqrow['pb_cat_name']; ?></td>
											<td><?php echo $eqrow['lead_name']; ?></td>
											<td><?php echo $eqrow['org_name']; ?></td>
											<td><?php echo $eqrow['position']; ?></td>
											<td><?php echo $eqrow['contact_info']; ?></td>
											<td><?php echo $eqrow['email_num']; ?></td>
											<td><?php echo $eqrow['web_site']; ?></td>
											
											<td class="social"> 
											<a style="display:<?php echo $eqrow['whatsapp']; ?>;" target="_blank" href="<?php echo $eqrow['whatsapp']; ?>"><i class="fa fa-whatsapp btn-sm"></i></a>
											<a style="display:<?php echo $eqrow['skype']; ?>;" target="_blank" href="<?php echo $eqrow['skype']; ?>"><i class="fa fa-skype btn-sm"></i></a>
											<a style="display:<?php echo $eqrow['facebook']; ?>;" target="_blank" href="<?php echo $eqrow['facebook']; ?>"><i class="fa fa-facebook btn-sm"></i></a>
											<a style="display:<?php echo $eqrow['twitter']; ?>;" target="_blank" href="<?php echo $eqrow['twitter']; ?>"><i class="fa fa-twitter btn-sm"></i></a>
											<a style="display:<?php echo $eqrow['linkedin']; ?>;" target="_blank" href="<?php echo $eqrow['linkedin']; ?>"><i class="fa fa-linkedin btn-sm"></i></a>
											<a style="display:<?php echo $eqrow['youtube']; ?>;" target="_blank" href="<?php echo $eqrow['youtube']; ?>"><i class="fa fa-youtube btn-sm"></i></a>
											<a style="display:<?php echo $eqrow['instagram']; ?>;" target="_blank" href="<?php echo $eqrow['instagram']; ?>"><i class="fa fa-instagram btn-sm"></i></a>
											<a style="display:<?php echo $eqrow['pinterest']; ?>;" target="_blank" href="<?php echo $eqrow['pinterest']; ?>"><i class="fa fa-pinterest btn-sm"></i></a>
                                           </td>
											
											
											<td> <?php echo $eqrow['address']; ?> </td>
											
										 <td> <img src="user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" height="30px;" width="30px;" /></td>
			
				<td>
				<a  class="btn btn-primary" href="leads-details?view=<?php echo $eqrow['lead_id']; ?>" title="click for view" ><span class="glyphicon glyphicon-eye-open"></span> View</a> 
				<a  class="btn btn-info" href="leads-edit?edit_id=<?php echo $eqrow['lead_id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
				<a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['lead_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>




<?php require_once '../includes/footer.php'; ?>
<!-- Latest compiled and minified JavaScript -->

</div>

</body>
</html>