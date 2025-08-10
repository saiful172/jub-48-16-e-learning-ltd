<?php  session_start();
require_once '../includes/conn.php';
require_once '../includes/dbconfig.php';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="php_action/invoice/style.css" media="all" />
		<?php 
$sql = $con->query("select * from color_inv where user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$Whole =$row['whole'];
$table_head =$row['table_head']; 
$table_body =$row['table_body']; 
?> 


<style type="text/css"> 

.btm-border{border-bottom:1px solid #AAAAAA;}
.btm-border-na{border-bottom:1px solid white;}

a {
  color: <?php echo $Whole ; ?>;
}


table thead th { 
  background: <?php echo $table_head ; ?>;
}
 
table th,
table td ,table tr  {
  background: <?php echo $table_body ; ?>;
}

#notices{
  border-left: 6px solid <?php echo $Whole ; ?>;  
}

#client {
  border-left: 6px solid <?php echo $Whole ; ?>;
}

#invoice h1 {
  color: <?php echo $Whole ; ?>;
}

.center{text-align:center;}


</style>

<script>
function printPage() {
    window.print();
}
</script>


  </head>
  <body>
  
<?php 
$sql = $con->query("select * from stuff where userid ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$BizLogo =$row['photo'];
$SignImg =$row['sign_img'];
$BizNam =$row['business_name'];
$BizDetails =$row['business_details'];
$BizPhn =$row['business_phone']; 
$BizEml =$row['business_email'];
$BizWeb =$row['biz_web'];
$BizAdr =$row['business_address'];
?>
            
    <header class="clearfix">
      <div id="logo"> 
	  <img  onclick="printPage()" src="../<?php if($BizLogo==""){echo "../img/user.jpg";}else{echo $BizLogo;} ?>"> 
      </div>
      <div id="company"> 
        <h2 class="name"><b><?php echo $BizNam ; ?></b> <br><?php echo $BizDetails ; ?></h2>
       <div><?php echo $BizAdr ; ?></div>  
      <div>Call : <?php echo $BizPhn ; ?>, Email : <a href="mailto:<?php echo $BizEml ; ?>"><?php echo $BizEml ; ?></a> , Website : <?php echo $BizWeb ; ?></div>
	  </div>
      </div>
    </header>
	
    <main>
	 
				
      <div id="details" class="clearfix">
	  <?php 
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$customer_id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM customer WHERE customer_id =:uid');
		$stmt_edit->execute(array(':uid'=>$customer_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
		  
?>
	  
        <div id="client">
          <h2 class="name"><b>To :</b></h2>
          <h2 class="name"> <?php echo $customer_name ; ?></h2>
          <div class="address">Address : <?php  echo $address ; ?> | Phone : <?php echo $contact_info ; ?></div> 
		</div>
		
	 
		
      </div>

      
	  <table >
       
	   <thead>       
                                <th>  <b>SL </b> </th>
                                <th>  <b>Date </b> </th>							
								 
								<th>  <b>Paid</b> </th>
								<th>  <b>Recent Due</b> </th>
								
								<th>  <b>Type</b> </th>
								
                            </tr>
                        </thead>
      
			
		 <tbody>	
          <?php
		  $sl=0;
	$eq=mysqli_query($con,"select * from orders_details  
	Left JOIN customer ON customer.customer_id = orders_details.customer_id
    Where orders_details.customer_id ='$customer_id' and orders_details.user_id='".$_SESSION['id']."' 	
	ORDER BY orders_details.id DESC ");
	
	 
	while($eqrow=mysqli_fetch_array($eq)){
		
	$Total+=$eqrow['recent_due'];
	?>
			<tr>
			
			<td class="no" ><?php echo ++$sl; ?>  </td>
			
			<td  class="no"  ><?php echo date("M d,Y", strtotime($eqrow['order_date'])); ?></td> 
			 
			<td   class="no" ><?php echo $eqrow['paid']; ?></td>
			<td  class="no" ><?php echo $eqrow['recent_due']; ?>  </td>
			
			<td  class="no" > <b><?php echo $eqrow['paym_type']; ?></b> - <?php echo $eqrow['cuses']; ?>  </td>
	</tr>			
	
<?php
}
?>
		  
		 
		   
        </tbody>
		
	 
      </table>
    
    
	  
    </main>
	

<div style="float:right;text-align:center;">
 
<img src="../<?php if($SignImg==""){echo "../img/user.jpg";}else{echo $SignImg;} ?>" width="150px" height="50px"><br> 
........................................<br>
Company Signature
</div>

	
    <footer>
	
      <?php 	    
				   $pq=mysqli_query($con,"select invoice_welcome from stuff where userid ='".$_SESSION['id']."' ");
				   while($pqrow=mysqli_fetch_array($pq)){
?>
<?php echo $pqrow['invoice_welcome']; ?>
 <?php }?>
  
    </footer>
	
  </body>
</html>