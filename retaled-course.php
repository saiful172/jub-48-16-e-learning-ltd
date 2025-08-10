<div class="card instructor-sec">
	<div class="card-body">
		<div class="latest-head">
			<h4 class="card-title">Latest Courses</h4>
		</div>
		<ul class="latest-posts">
			<?php
			$sql = mysqli_query($con, "SELECT * FROM course   WHERE Type = 'featured' order by id desc ");
			while ($row = mysqli_fetch_assoc($sql)) {
			?>

				<li>
					<div class="post-thumb">
						<a href="course-details.php?course_id=<?= $row['id'] ?>">
							<img class="img-fluid" src="ela-admin/user/user_images/<?= $row['userPic'] ?>" alt="Img">
						</a>
					</div>
					<div class="post-info free-color">
						<h4>
							<a href="course-details.php?course_id=<?= $row['id'] ?>"><?php echo $row['name']; ?></a>
						</h4>
						<!-- <p>FREE</p> -->
					</div>
				</li>

			<?php } ?>
		</ul>

		
	</div>

</div>


<?php //include('paid-course-apply.php'); 
?>