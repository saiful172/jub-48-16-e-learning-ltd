<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>

    <div id="wrapper">
		<?php include('navbar.php'); ?>
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User Logs
						</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
                    
					<table width="100%" class="table table-striped table-bordered table-hover" id="UserlogTable">
                        <thead>
                            <tr>
								<th class="hidden"></th>
								<th>Login</th>
								<th>Username</th>
								<th>Access Level</th>
								<th>Logout</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
								$l=mysqli_query($con,"select * from userlog left join user_backup on user_backup.userid=userlog.userid order by login desc");
								while($lrow=mysqli_fetch_array($l)){
								?>
								<tr>
									<td class="hidden"></td>
									<td><?php echo date("M d, Y - h:i A", strtotime($lrow['login'])); ?></td>
									<td><?php echo $lrow['username']; ?></td>
									<td>
										<?php 
											if ($lrow['access_level']==1){
												echo "Admin";
											}
											elseif ($lrow['access_level']==2){
												echo "Staff";
											}
											elseif ($lrow['access_level']==3){
												echo "Stock in-charge";
											}
											else{
												echo "Dealer";
											}
										?>
									</td>
									<td>
										<?php 
											$expire=date('Y-m-d H:i:s', strtotime($lrow['login']. ' + 1 days'));
											date_default_timezone_set("ASIA/SINGAPORE");
											$now=date('Y-m-d H:i:s' );
											if ($lrow['logout']=="0000-00-00 00:00:00"){
												if ($expire<=$now){
												echo "No Logout Time";
												}
												else{
												echo "In session...";
												}
											}
											else{
												echo date("M d, Y - h:i A", strtotime($lrow['logout']));
											}
						
										?>
									</td>
								</tr>
								<?php
								}
							?>
                        </tbody>
                    </table>
                          
				</div>
            </div>
            <!-- /.container-fluid -->
        </div>
	</div>
	
	<?php include('scripts.php'); ?>
	<?php include ('modal.php'); ?>
	
	<script>
		$(document).ready(function() {
		$('#UserlogTable').dataTable( {
			"bLengthChange":true,
			"bInfo":true,
			"bSort":true,
			"bFilter":true
		} );
		} );
	</script>
	<?php include ('user_modal.php'); ?>
	
</body>
</html>