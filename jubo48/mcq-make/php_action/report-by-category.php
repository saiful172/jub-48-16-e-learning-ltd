<?php 
session_start();
require_once '../includes/conn.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" href="css/table_data_center_with_border_black.css">
<script src="js/excel.js"></script>
</head>
<body> 

 
<div class="container" style="width:100%;">
<br>
 <center> 
   
 <span style="font-size:19;">  
				   <?php 
				   $Question = $_POST['Question'];
				   $pq=mysqli_query($con,"SELECT * FROM question_name  where id = '$Question' ");
				   while($pqrow=mysqli_fetch_array($pq)){
				?>
			  <h2> <b>  <?php echo $pqrow['category']; ?></b> </h2>
				  
				   <?php }?>
	 </span> 			   
				  
	<span style="font-size:18;">			   
	 
Date :<?php echo date("M d,Y") ;?> |
Time :<?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </span> 
 </center> 
<br>  
 
<?php  
if($_POST) {
	
	$Question = $_POST['Question']; 
	$sql = "SELECT *  FROM questions_make_list
    left join question_name ON questions_make_list.category_id = question_name.id 
				
	WHERE  category_id= '$Question'  order by questions_make_list.id asc";
	$query = $con->query($sql);
	$countOrder = $query->num_rows;

	$table = '
	<table  border="1" class="table table-bordered" style="width:100%;">
      <tr> 
		         <th>SL</th>  
                    <th>Question</th>
                    <th>Answer 1</th>
                    <th>Answer 2</th>
                    <th>Answer 3</th>
                    <th>Answer 4</th>
                    <th>Right Answer </th>
	 <tr>
		 

		<tr>'; 
		$sl=0;
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
		      	<td><center>'.++$sl.'</center> </td>  
				<td>'.$result['question'].' </td> 
				
				<td>'.$result['ans1'].' </td> 
				<td>'.$result['ans2'].' </td> 
				<td>'.$result['ans3'].' </td> 
				<td>'.$result['ans4'].' </td>  
				<td style="width:150px;"> </td> 
			     
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

