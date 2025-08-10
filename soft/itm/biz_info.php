<div class="card"> 
		  <div class="cardHeader">
		    <h3><b>
			<?php 
$sql = $con->query("SELECT distinct business_name,business_address FROM `stuff` WHERE userid='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
echo $row['business_name'];
?>
			</b></h3>
		  </div>

		  <div class="cardContainer">
		    <p><h4><?php 
echo $row['business_address'];
?></h4></p>
		    
		  </div>
		</div> 