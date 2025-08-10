  <div class="panel panel-danger" style="padding:0px;">
			
		  <div class="cardHeader" style="background-color:white;color:black;font-size:18px;padding:0px;text-align:center;">
		  <p><a href="company-msg">Notice / Message</a>  </p>  
		  </div>

		  <div class="cardContainer">
		     <p style="color:red; font-size:18px;padding:4px;">  
  <?php 	
				 $pq=mysqli_query($con,"select * from customer_msg  where  msg_status=1 and status=1 and user_id='".$_SESSION['id']."' order by id desc limit 0, 2 ");
				 while($pqrow=mysqli_fetch_array($pq)){
				?>
			    <?php echo $pqrow['msg_name']; ?>
			    <?php }?>  
  </p>
		  </div>
		</div> 