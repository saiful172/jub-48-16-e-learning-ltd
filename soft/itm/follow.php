<?php require_once 'header.php'; ?>

<?php
	
	if(isset($_GET['delete_id']))
	{ 
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM follow_up WHERE fol_up_id =:uid');
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
</head>

<body> 

<center><h4><ol class="breadcrumb"> <li class="active">Follow Up List</li></ol></h4></center>
 
		
<div class="col-md-2">	
<div class="buttons">

<div class="col-md-12">	
<a class="btn btn-primary btn-w100" href="follow-up"> <span class="glyphicon glyphicon-plus"></span> New Follow Up</a> 
</div>

<div class="col-md-12">	
<a class="btn btn-success btn-w100" href="follow-up-report-by-date"> <span class="glyphicon glyphicon-file"></span> Report By Date</a> 
</div>	

<div class="col-md-12">	
<a class="btn btn-success btn-w100" href="follow-up-report"> <span class="glyphicon glyphicon-file"></span> More Type Report </a> 
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
<div style="width:100%;" class="form-group input-group">
                 <span style="" class="input-group-addon"><i class="fa fa-search"></i></span>
				 <input id="myInput" style="width:100%;" type="text"  class="form-control" placeholder="Search......">
</div>
<table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                
								
                                <th>SL</th>
                                <th>Date</th>
                                <th>Name</th>
								<th>Comments</th>
								<th>Category</th>
								
                                
								
								<th>Action</th>
								
                            </tr>
                        </thead>
                        <tbody id="tbody">
							<?php
								$sl=0;
								$eq=mysqli_query($con,"select follow_up.fol_up_id, phone_book.lead_name,follow_up.fol_comments,follow_up.follow_date,follow_up.fol_cat,phnbook_category.pb_cat_name  from follow_up 
								left join phnbook_category on phnbook_category.pb_cat_id=follow_up.fol_cat
								left join phone_book on phone_book.lead_id=follow_up.cust_id
								where follow_up.user_id='".$_SESSION['id']."'
								ORDER BY follow_up.fol_up_id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){
									
									?>
										<tr> 
											<td><?php echo ++$sl; ?></td>
											<td><?php echo date("d M Y", strtotime($eqrow['follow_date'])); ?></td> 
											<td><?php echo $eqrow['lead_name']; ?></td>
											<td><?php echo $eqrow['fol_comments']; ?></td>
											<td> <?php echo $eqrow['pb_cat_name']; ?> </td>
											 
				<td><a  class="btn btn-info" href="follow-up-edit?edit_id=<?php echo $eqrow['fol_up_id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
				<a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['fol_up_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>




<?php require_once '../includes/footer.php'; ?>


</body>
</html>