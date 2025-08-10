<?php include('session.php'); ?>
<body>
    <div class="container-fluid">
		<br>
            <div class="container-fluid">
				<div class="row">
                <div class="col-lg-12">
                    
			<center ><b><?php include('name.php'); ?></b><br><img src="../img/user.jpg" width="50px"><br>
						<span style="font-size:18px;">Stuff List  </span>
							</center>	
									
				</div>
				</div>
				
				<br>
				<div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
						    <th>Stuff Name</th>
							<th>User Name</th>
							<th>Password</th>
							<th>Mobile</th>
							<th>Join Date</th>
						</thead>
						<tbody>
							<?php
								$eq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid order by stuff.userid asc");
								while($eqrow=mysqli_fetch_array($eq)){
								$eid=$eqrow['userid'];
								?>
								<tr>
									<td><?php echo ucwords($eqrow['stuff_name']); ?></td>
									<td><?php echo $eqrow['username']; ?></td>
									<td>
										<?php
											$pass=mysqli_query($con,"select * from `password` where mdfive='".$eqrow['password']."'");
											$passrow=mysqli_fetch_array($pass);
												
											echo $passrow['original'];
										?>
									</td>
									
									<td><?php echo $eqrow['contact_info']; ?></td>
									<td><?php echo date("M d, Y", strtotime($eqrow['join_date'])); ?></td>
									
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
	<br>
	
	<?php include('scripts.php'); ?>
	<?php include ('modal.php'); ?>
	
</body>
</html>