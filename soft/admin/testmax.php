<div class="form-group">
			    <label for="UserId" class="col-sm-2 control-label">Order Id</label>
			    <div class="col-sm-10">
				<?php
				
				   include('conn.php');
				   $pq=mysqli_query($con,"select MAX(order_id)+1 as max_id from orders ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
        <td><input class="form-control" type="text" name="OrderId1"  value="<?php echo $pqrow['max_id']; ?>" disabled="true" />
        <td><input class="form-control" type="hidden" name="OrderId"  value="<?php echo $pqrow['max_id']; ?>"  />
        </td>
		<?php }?>
			    </div>
			  </div> 