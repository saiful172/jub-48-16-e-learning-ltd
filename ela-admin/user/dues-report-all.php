<?php include('session.php'); ?>
<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
<br>
<center>
	<h4> <?php include('name.php'); ?> <br>All Dues Report<br>


		<?php
		$pq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "'");
		while ($pqrow = mysqli_fetch_array($pq)) {
		?>
			User / Stuff : <?php echo $pqrow['stuff_name']; ?>

		<?php } ?>
	</h4>
	<b>Present Date :</b> <?php echo date("M d,Y"); ?>.................................
	<b> Present Time : </b> <?php date_default_timezone_set("Asia/Dhaka");
													echo  date("h:i:sa"); ?>
</center>

<body>
	<div class="container-fluid">
		<br>
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12">
					<table width="100%" class="table table-bordered" style="font-size:13px;">
						<thead>
							<tr>

								<th colspan="1"> Invoice </th>
								<th colspan="3"> Customer </th>
								<th colspan="3">Ammount </th>
								<th colspan="2"> Date </th>

							</tr>
							<tr>
								<th>No</th>
								<th>Code/Id</th>
								<th>Name</th>
								<th>Phone</th>

								<th>Previous Dues</th>
								<th>Paid</th>
								<th>Present Dues</th>
								<th>Invoice</th>
								<th>Last Paid</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$eq = mysqli_query($con, "select * from orders_dues where user_id='" . $_SESSION['id'] . "' ");
							while ($eqrow = mysqli_fetch_array($eq)) {
							?>
								<tr>
									<td><?php echo $eqrow['order_id']; ?></td>
									<td><?php echo ucwords($eqrow['customer_id']); ?></td>
									<td><?php echo $eqrow['client_name']; ?></td>

									<td><?php echo ucwords($eqrow['client_contact']); ?></td>
									<td><?php echo $eqrow['grand_total']; ?></td>
									<td><?php echo $eqrow['paid']; ?></td>
									<td><?php echo $eqrow['recent_due']; ?></td>

									<td><?php echo date("m-d-Y", strtotime($eqrow['order_date'])); ?></td>
									<td><?php echo date("m-d-Y", strtotime($eqrow['last_update'])); ?></td>
								</tr>

							<?php
							}
							?>
						</tbody>

						<tr>
							<td colspan="9">
								<?php

								$pq = mysqli_query($con, "select count(customer_id) as total from  `orders_dues`   where user_id='" . $_SESSION['id'] . "' ");
								while ($pqrow = mysqli_fetch_array($pq)) {
								?>
									<center><b> Total Customer : <?php echo $pqrow['total']; ?> </b>

									<?php } ?>
									<br>
									<?php
									$pq = mysqli_query($con, "select sum(recent_due) as total from  `orders_dues`   where user_id='" . $_SESSION['id'] . "' ");
									while ($pqrow = mysqli_fetch_array($pq)) {
									?>
										<b> Total Present Dues : <?php echo $pqrow['total']; ?> </b>
									</center>

								<?php } ?>

							</td>

						</tr>
					</table>
				</div>
			</div>

		</div>
	</div>