<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>

    <div id="wrapper">
		<?php include('navbar.php'); ?>
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Activity Logs
						</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
								$aq=mysqli_query($con,"select * from activitylog left join user_backup on user_backup.userid=activitylog.userid order by activity_date desc");
								while($aqrow=mysqli_fetch_array($aq)){
								?>
								<tr>
									<td class="hidden"></td>
									<td><?php echo date("M d, Y - H:i:s", strtotime($aqrow['activity_date'])); ?></td>
									<td><?php echo $aqrow['username']; ?></td>
									<td>
										<?php 
											if ($aqrow['access_level']==1){
												echo "Admin";
											}
											elseif ($aqrow['access_level']==2){
												echo "Staff";
											}
											elseif ($aqrow['access_level']==3){
												echo "Stock in-charge";
											}
											else{
												echo "Dealer";
											}											
										?>
									</td>
									<td><?php echo $aqrow['action']; ?></td>
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
	
	<?php include('scripts.php'); ?>
	<?php include ('modal.php'); ?>
	<?php include ('act_modal.php'); ?>
	
</body>
</html>