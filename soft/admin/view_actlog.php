<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php
	$month=$_POST['month'];
	$year=$_POST['year'];
	
	if ($month=="January"){
		$qm=1;
	}
	else if ($month=="February"){
		$qm=2;
	}
	else if ($month=="March"){
		$qm=3;
	}
	else if ($month=="April"){
		$qm=4;
	}
	else if ($month=="May"){
		$qm=5;
	}
	else if ($month=="June"){
		$qm=6;
	}
	else if ($month=="July"){
		$qm=7;
	}
	else if ($month=="August"){
		$qm=8;
	}
	else if ($month=="September"){
		$qm=9;
	}
	else if ($month=="October"){
		$qm=10;
	}
	else if ($month=="November"){
		$qm=11;
	}
	else{
		$qm=12;
	}
?>

<body>

    <div id="wrapper">
		<?php include('navbar.php'); ?>
		<br><br>
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Monthly Activity Log Report
						<span class="pull-right">
							<button onclick="window.print()" class="btn btn-success btn-sm noprint"><i class="fa fa-print"></i> Print</button> <a href="actlog.php" class="btn btn-primary btn-sm noprint"><i class="fa fa-arrow-left"></i> Back</a>
						</span>
						</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
					<p>For the month of: <strong><?php echo $month; ?>, <?php echo $year; ?></strong></p>
				</div>
				</div>
				<div class="row">
                <div class="col-lg-12">
				<?php
				$sq=mysqli_query($con,"select * from activitylog where month(activity_date)='$qm' and year(activity_date)='$year'");
				$scount=mysqli_num_rows($sq);
				if($scount==0){
					?>
						<br>
						<p><strong>NO DATA FOR SELECTED MONTH AND YEAR</strong></p>
					<?php
					}
				else{
					?>
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
								<th class="hidden"></th>
								<th>Date</th>
                                <th>Username</th>
								<th>Access Level</th>
								<th>Action</th>
                            </tr>
                        </thead>
						<tbody>
							<?php
								$tsales=0;
								$sq=mysqli_query($con,"select * from activitylog left join employee on employee.employeeid=activitylog.employeeid where month(activity_date)='$qm' and year(activity_date)='$year' order by activity_date desc");
								while($sqrow=mysqli_fetch_array($sq)){
								?>
								<tr>
									<td class="hidden"></td>
									<td><?php echo date("M d, Y - H:i:s", strtotime($sqrow['activity_date'])); ?></td>
									<td><?php echo $sqrow['username']; ?></td>
									<td>
										<?php 
											if ($sqrow['access_level']==1){
												echo "Admin";
											}
											elseif ($sqrow['access_level']==2){
												echo "Staff";
											}
											elseif ($sqrow['access_level']==3){
												echo "Stock in-charge";
											}
											else{
												echo "Dealer";
											}											
										?>
									</td>
									<td><?php echo $sqrow['action']; ?></td>
								</tr>
								<?php
								}
								
							?>
                        </tbody>
                    </table>
					<?php
					}
				?>
                    <!-- /.table-responsive -->   
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            <!-- /.container-fluid -->
        </div>
	</div>
	
	<?php include('scripts.php'); ?>
	<?php include ('modal.php'); ?>
	
</body>
</html>