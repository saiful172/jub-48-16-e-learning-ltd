
<?php include('header.php'); ?>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/table_data_center.css">
<body>


    <div id="wrapper">
		
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Employee  List
						<span class="pull-right">
							<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addemployee"><i class="fa fa-plus-circle"></i> Employee  Add</button>
							<a  href="view_employee.php" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> Print</a>
						</span>
						</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
                   <table width="100%" class="table table-bordered " id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Employee Name</th>
								<th>Genger</th>
								<th>Position</th>
								<th>From Date</th>
								<th>Salary Type</th>
								<th>Salary</th>
								<th>Photo</th>
								<th>Action</th>
								
								

								
							
							
                               
							
                            </tr>
                        </thead>
                        <tbody>
							<?php
								$eq=mysqli_query($con,"select * from employee where status='1' order by id desc");
								while($eqrow=mysqli_fetch_array($eq)){
									$eid=$eqrow['id'];
									?>
										<tr>
											<td><?php echo $eqrow['id']; ?></td>
											<td><?php echo $eqrow['emp_name']; ?></td>
											<td><?php echo $eqrow['gender']; ?></td>
											<td><?php echo $eqrow['position']; ?></td>
											<td><?php echo $eqrow['hire_date']; ?></td>
											
											<td><?php echo $eqrow['sal_type']; ?></td>
											<td><?php echo $eqrow['salary']; ?></td>
											
											
											<td><img src="../<?php if($eqrow['photo']==""){echo "/img/profile.jpg";}else{echo $eqrow['photo'];} ?>" height="30px;" width="30px;"></td>
											<td><a href="#details_<?php echo $eid; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-user"></i> Details</a>
												<a href="#update<?php echo $eid; ?>" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
												<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delemp_<?php echo $eid; ?>"><i class="fa fa-trash"></i> Delete</button>
												<?php include('emp_button.php'); ?>
											</td>
										</tr>
									<?php
									
								}
							?>
                        </tbody>
                    </table>
					<!-- /.table-responsive -->     
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            <!-- /.container-fluid -->
        </div>
	</div>


	<?php include ('modal.php'); ?>
	<?php include ('admin_modal.php'); ?>
	
	
</body>
</html>