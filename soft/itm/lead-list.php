
<?php ob_start();  session_start();?>

<!DOCTYPE html>
<html lang="en"> 

<head>
<?php   require_once 'head_link.php'; ?>
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
 
<?php   require_once 'header1.php'; ?> 
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

<?php  require_once 'sidebar.php'; ?>


  <main id="main" class="main">

    <div class="pagetitle">
     <h1>Expense Category |  <span> <a href="lead-list-add">   <i class="bi bi-plus-square-fill"></i> </a> </span> </h1>
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
                                <th>Business / Org</th> 
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
											 <td><?php echo $eqrow['lead_name']; ?></td>
											<td><?php echo $eqrow['org_name']; ?></td> 
											<td><?php echo $eqrow['contact_info']; ?></td>
											<td><?php echo $eqrow['email_num']; ?></td>
											<td><?php echo $eqrow['web_site']; ?></td>
											
											<td class="social"> 
											<a style="display:<?php echo $eqrow['whatsapp']; ?>;" target="_blank" href="<?php echo $eqrow['whatsapp']; ?>"><i class="fa fa-whatsapp btn-sm"></i></a>
											<a style="display:<?php echo $eqrow['facebook']; ?>;" target="_blank" href="<?php echo $eqrow['facebook']; ?>"><i class="fa fa-facebook btn-sm"></i></a>
											<a style="display:<?php echo $eqrow['linkedin']; ?>;" target="_blank" href="<?php echo $eqrow['linkedin']; ?>"><i class="fa fa-linkedin btn-sm"></i></a>
											<a style="display:<?php echo $eqrow['youtube']; ?>;" target="_blank" href="<?php echo $eqrow['youtube']; ?>"><i class="fa fa-youtube btn-sm"></i></a>
											  </td>
											
											
											<td> <?php echo $eqrow['address']; ?> </td>
											
				<td> <img src="user_images/<?php echo $eqrow['userPic']; ?>" class="img-rounded" height="30px;" width="30px;" /></td>
			    <td>
				<a  class="btn btn-primary" href="lead-only-view?view=<?php echo $eqrow['lead_id']; ?>" title="click for view" ><span class="glyphicon glyphicon-eye-open"></span> View</a> 
				<a  class="btn btn-info" href="lead-list-edit?edit_id=<?php echo $eqrow['lead_id']; ?>" title="click for edit" onclick="return confirm('Are You Sure To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
				<a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['lead_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> </td>
			
				
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