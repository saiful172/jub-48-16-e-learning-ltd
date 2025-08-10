<?php 
session_start();
require_once '../../includes/conn.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
</head>
<body>

<div class="container" style="width:100%;">
 <br>
 <center>
<?php
				   $pq=mysqli_query($con,"select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='".$_SESSION['id']."'");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			    <span style="font-size:21;font-weight:bold;">
			  <?php echo $pqrow['business_name']; ?><br>
				 </span> 
				   <?php }?>
  <span style="font-size:20;">        
Category Wise Lead Report <br>
</span> 
<span style="font-size:19;"> 
			
			<?php
				   $CatId = $_POST['CatId'];
				   $pq=mysqli_query($con,"select distinct pb_cat_name from phnbook_category
				   WHERE pb_cat_id = '$CatId' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
				 
			      Category Name :  <?php echo $pqrow['pb_cat_name']; ?> 
				  
				   <?php }?>
				   
	
<br>
Date : <?php echo date("M d, Y") ;?> | 
Time   : <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>  
		  </span> </center>  
<br>

<?php  
if($_POST) {
    
	$CatId = $_POST['CatId'];
	
	$sql = "SELECT * FROM follow_up 
	left join phone_book on phone_book.lead_id=follow_up.cust_id
	left join phnbook_category on phnbook_category.pb_cat_id=follow_up.fol_cat
	WHERE follow_up.fol_cat= '$CatId' 
	order by follow_up.fol_up_id desc";
	$query = $con->query($sql);
	$countOrder = $query->num_rows;
	

	$table = '
	<table border="1" class="table table-bordered" style="width:100%;">
      
	  <tr>
		 <th> SL  </th>
		 <th> Date  </th>
		 <th> Name  </th>
		 <th> Company/Org  </th>
		 <th> Phone  </th>
		 <th> Email  </th>
		 <th> Website  </th>
		 <th> Comments </th> 
		 <th>--------------</th> 
	   </tr>
		  
		<tr>';
		
		$sl=0;
		 
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
			    <td><center>'.++$sl.'</center></td>
				<td><center>'.date("M d,Y", strtotime($result['follow_date'])).'</center></td>
				<td><center>'.$result['lead_name'].'</center></td>
				<td><center>'.$result['org_name'].'</center></td>
				<td><center>'.$result['contact_info'].'</center></td>
				<td><center>'.$result['email_num'].'</center></td>
				<td><center>'.$result['web_site'].'</center></td>
				<td><center>'.$result['fol_comments'].'</center></td> 
				<td></td>
			</tr>';	
			 
			
		}
		$table .= '
		</tr>
         
		
	</table>
	';	

	echo $table;

}

?>
 
</body>
</html>
