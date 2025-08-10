<!DOCTYPE html>
<html lang="en"> 

<head>
<?php   require_once 'head_link.php'; ?>

</head>

<body>
 
<?php   require_once 'header1.php'; ?> 

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

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Follow Up List |  <span> <a href="followup-add">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
       <hr>
    </div> 

    <section class="section">
      <div class="row">
	  
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              <table class="table table-hover datatable">
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
											 
				<td><a  class="btn btn-info" href="followup-edit?edit_id=<?php echo $eqrow['fol_up_id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
				<a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['fol_up_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
              </table>
            
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
  
  <?php  require_once 'footer1.php'; ?>