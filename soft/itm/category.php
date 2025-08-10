<?php require_once 'header.php'; ?>
<?php 
	if(isset($_GET['delete_id']))
	{ 
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM categories1 WHERE cat_id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		//header("Location:group.php");
	}

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<link rel="stylesheet" href="css/table_data_center.css"> 
<link rel="stylesheet" href="css/buttons.css"> 
</head>

<body>
 
<center><h4><ol class="breadcrumb"> <li class="active"> Category </li></ol></h4></center>	
 <div class="col-md-2">  
<div class="buttons">  
		<div class="col-md-12">
	   <a class="btn btn-primary btn-w100" href="category-add"> <span class="glyphicon glyphicon-plus"></span> &nbsp;  Add New  </a> 
	   </div>
		 <br><br><br>
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="brand"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Brands  </a> 
	   </div>
	   
	   <div class="col-md-12">
			<a class="btn btn-warning btn-w100" href="category"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Category  </a> 
	   </div>
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="sub-category"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Sub Category  </a> 
	   </div>
	   	  
	   
	   <div class="col-md-12">
			<a class="btn btn-info btn-w100" href="productN"> <span class="glyphicon glyphicon-list"></span> &nbsp;  Products  </a> 
	   </div>
		 
	</div> 
</div>

<div class="col-md-10">
 <div class="form-group input-group">
                 <span style="" class="input-group-addon"><i class="fa fa-search"></i></span>
				 <input id="myInput" type="text"  class="form-control" placeholder="Search......">
   </div>
<table width="100%" class="table table-bordered table-hover" group_id="dataTables-example">
                        <thead>
                        <tr> 
							<th>SL </th>
							<th>Category </th>
							<th>Brand </th>
							<th>Edit</th>
							<th>Delete</th>
                        </tr>
                        </thead>
						
                        <tbody id="tbody">
							<?php
							$sl=0;
								$eq=mysqli_query($con,"select * from categories1 
                                Left join brand1 on  brand1.brand_id = categories1.brand_id
								WHERE categories1.user_id ='".$_SESSION['id']."'
								ORDER BY categories1.cat_id DESC ");
								while($eqrow=mysqli_fetch_array($eq)){
									
									?>
										<tr> 
										  <td><?php echo ++$sl; ?></td>
											<td><?php echo $eqrow['cat_name']; ?></td>
											<td><?php echo $eqrow['brand_name']; ?></td>
											
											
				<td><a  class="btn btn-info" href="category-edit?edit_id=<?php echo $eqrow['cat_id']; ?>" title="click for edit" 
                 onclick="return confirm('Do You Want To Edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>
				
				<td><a class="btn btn-danger" href="?delete_id=<?php echo $eqrow['cat_id']; ?>" title="click for delete" onclick="return confirm('Do You Want To Delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete </a> </td>
			
				
			</tr>
		<?php
		}  
		?>

</tbody>
</table>
 

<?php include('../includes/footer.php');?>


