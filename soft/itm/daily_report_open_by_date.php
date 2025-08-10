<?php  session_start();
require_once '../includes/conn.php';
require_once 'header_link.php'
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="php_action/invoice/style1.css" media="all" />
  </head>
  <body>
  
<?php 
$sql = $con->query("select * from stuff where userid ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$BizLogo =$row['photo'];
$SignImg =$row['sign_img'];
$BizNam =$row['business_name'];
$BizPhn =$row['business_phone']; 
$BizEml =$row['business_email'];
$BizAdr =$row['business_address'];
?>  

   <div class="container">  
   
    <header class="clearfix center">
      <div id="logo"> 
	  <img src="../<?php if($BizLogo==""){echo "../img/user.jpg";}else{echo $BizLogo;} ?>"> 
         <h2 class="name"><b><?php echo $BizNam ; ?></b><br>
		 Daily Report Summary - By Date
		 </h2>
        <div>  
  <span style="font-size:15px;"> 
  
  <?php 
$startDate = $_POST['startDate'];  $endDate = $_POST['endDate'];
echo '  Date From  : ' ; echo date("M d, Y", strtotime( $startDate));
echo ' |  Date To :  ' ; echo date("M d, Y", strtotime( $endDate));
?> 
<br>
 Current Date :
<?php 
 date_default_timezone_set("Asia/Dhaka");
 $date=date("Y/m/d");
echo date("d-m-Y") ;
?>
 |  Current Time :  <?php date_default_timezone_set("Asia/Dhaka"); echo  date("h:i:sa");?>
 </span>
		</div>
       </div> 
    </header>
	
    <main>
	 
 <table border="0" cellspacing="0" cellpadding="0">
       
	   <thead>
          <tr>
		  <th class="no"><b>SL</b> </th> 
		  <th class="desc"><b> Description</b></th> 
		  <th class="desc"><b> Value</b></th> 
          </tr>
        </thead>
        
		 <tbody>	
		 
		 <tr>
            <td class="no">1</td>
            <td class="desc">Total Buy Qty</td>
            <td class="desc">
<?php 
    $startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

$sql = $con->query("SELECT sum(sup_order_item.order_quantity) as total FROM sup_order_item
left join sup_orders on sup_orders.order_id=sup_order_item.order_id 
WHERE sup_order_item.entry_date >= '$start_date' AND sup_order_item.entry_date <= '$end_date' and sup_orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TBQ= $row['total'];
?><?php echo $TBQ ; ?>
			</td> 
          </tr> 
		  
		  <tr>
		  <td class="no">2</td>
		  <td class="desc">Total Buy Price</td>
		  <td class="desc">
		  <?php 
$sql = $con->query("SELECT sum(`today_total`) as `total` FROM `sup_orders`
WHERE sup_orders.order_date >= '$start_date' AND sup_orders.order_date <= '$end_date' and sup_orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TBP= $row['total'];
?><?php echo $TBP ; ?>
		  </td>
		  </tr>
		  
		  <tr>
		  <td class="no">3</td>
		  <td class="desc">Total Paid</td>
		   <td class="desc">
		   <?php 
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `sup_orders`
WHERE sup_orders.order_date >= '$start_date' AND sup_orders.order_date <= '$end_date' and sup_orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TPD= $row['total'];
?><?php echo $TPD ; ?>
		   </td>
		  </tr>
		  
		  <tr>
		  <td class="no">4</td>
		  <td class="desc">Due Paid Without Buy</td>
		   <td class="desc">
		   <?php 
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `sup_orders_dues`
WHERE sup_orders_dues.last_update >= '$start_date' AND sup_orders_dues.last_update <= '$end_date' and dues_or_paid_status=5 and sup_orders_dues.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TDPWB= $row['total'];
?> <?php echo $TDPWB ; ?>
		   </td>
		  </tr>
		  
		  <tr>
		  <td class="no"><b>5</b></td>
		  <td class="desc"><b>Total Buy Cost</b></td>
		   <td class="desc">
		 <b>  <?php
$TBC=$TPD+$TDPWB ;
 echo $TBC ;
 ?></b>
		   </td>
		  </tr>
		  
		  <tr> <td><br></td> <td><br></td> <td><br></td> </tr>
		  
		   <tr>
            <td class="no">6</td>
            <td class="desc">Product Return To Store </td>
            <td class="desc">
			
			<?php  
$sql = $con->query("SELECT sum(back_qty) as total FROM order_item_all 
WHERE entry_date >= '$start_date' and entry_date <= '$end_date' and order_item_status=4 and user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$RTS= $row['total'];
?><?php echo $RTS ; ?>
 
			</td> 
          </tr>
		  
<tr>
            <td class="no">7</td>
            <td class="desc">Product Return To Supplier </td>
            <td class="desc">
			
			<?php  
$sql = $con->query("SELECT sum(back_qty) as total FROM order_item_all 
WHERE entry_date >= '$start_date' and entry_date <= '$end_date' and order_item_status=2 and user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$RTS1= $row['total'];
?><?php echo $RTS1 ; ?>

			</td> 
</tr> 

<tr>
            <td class="no"><b>8</b></td>
            <td class="desc"><b>Recent Product Stock </b></td>
            <td class="desc"><b>
<?php 
  
$sql = $con->query("SELECT sum(quantity) as total FROM product 
WHERE user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$RTS1= $row['total'];
?><?php echo $RTS1 ; ?></b>
			</td> 
</tr>

		  <tr> <td><br></td> <td><br></td> <td><br></td> </tr>
		  
		  
          <tr>
            <td class="no">9</td>
            <td class="desc">Total Sale Qty</td>
            <td class="desc">
<?php  
$sql = $con->query("SELECT sum(order_item.order_quantity) as total FROM order_item
left join orders on orders.order_id=order_item.order_id
WHERE order_item.entry_date >= '$start_date' AND order_item.entry_date <= '$end_date' and orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TSQ= $row['total'];
?><?php echo $TSQ ; ?>
			</td> 
          </tr>
		  
		  <tr>
		  <td class="no">10</td>
		  <td class="desc">Previous Due</td>
		  <td class="desc">
		  <?php 
$sql = $con->query("SELECT sum(`pre_due`) as `total` FROM `orders` 
WHERE   order_date >= '$start_date' AND order_date <= '$end_date' and orders.user_id ='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$TSP1= $row['total'];
?><?php echo $TSP1 ; ?>
		  </td>
		  </tr>
		  
		  <tr>
		  <td class="no"><b>11</b></td>
		  <td class="desc"><b>Today Sale Price</b></td>
		  <td class="desc">
		  <b><?php 
$sql = $con->query("SELECT sum(`today_total`) as `total` FROM `orders` 
WHERE   order_date >= '$start_date' AND order_date <= '$end_date' and orders.user_id ='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$TSP= $row['total'];
?><?php echo $TSP ; ?></b>
		  </td>
		  </tr>
		  
		  <tr>
		  <td class="no">12</td>
		  <td class="desc">Total Sale Price</td>
		  <td class="desc">
		  <?php 
$sql = $con->query("SELECT sum(`grand_total`) as `total` FROM `orders`
WHERE   order_date >= '$start_date' AND order_date <= '$end_date' and orders.user_id ='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$TSP1= $row['total'];
?><?php echo $TSP1 ; ?>
		  </td>
		  </tr>
		  
		  <tr>
            <td class="no">13</td>
            <td class="desc">Total Buy Price</td>
            <td class="desc">
<?php  
$sql = $con->query("SELECT sum(order_item.buy_rate * order_item.order_quantity) as total FROM order_item
left join orders on orders.order_id=order_item.order_id
WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' and orders.user_id ='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$TBPS= $row['total'];
?><?php echo $TBPS ; ?>
			</td> 
          </tr>
		  
		  <tr>
            <td class="no"><b>14</b></td>
            <td class="desc"><b>Today's Profit</b></td>
            <td class="desc">
<b><?php
$TDP=$TSP-$TBPS ;
 echo $TDP ;
 ?></b>
			</td> 
          </tr>
		  
		  <tr>
		  <td class="no">15</td>
		  <td class="desc">Paid By Invoice</td>
		   <td class="desc">
		   <?php 
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `orders`
WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status='1' and orders.user_id ='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$PBI= $row['total'];
?><?php echo $PBI ; ?>
		   </td>
		  </tr>
		  
		   <tr>
		  <td class="no">16</td> 
		   <td class="desc">Total Due Paid Without Sale</td>
		   <td class="desc">
		   <?php 
$sql = $con->query("SELECT sum(`paid`) as `total` FROM `orders_details` 
WHERE  order_date >= '$start_date' AND order_date <= '$end_date' and  
order_type=4 and orders_details.user_id ='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$TDPWS= $row['total'];
?> <?php echo $TDPWS ; ?>
		   </td>
		  </tr>
		  
		   <tr>
		  <td class="no">17</td>
		  <td class="desc">Total Due</td>
		   <td class="desc">
		      <?php 
$sql = $con->query("SELECT sum(`due`) as `total` FROM `orders`
WHERE  order_date >= '$start_date' AND order_date <= '$end_date' and 
order_status='1' and orders.user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$TDue= $row['total'];
?><?php echo $TDue ; ?>
		   </td>
		  </tr>
		  
		  
		  
		   <tr>
		  <td class="no"><b>18</b></td>
		  <td class="desc"><b>Grand Total Collection</b></td>
		   <td class="desc">
		   <b><?php
$GTC=$PBI+$TDPWS ;
 echo $GTC ;
 ?></b>
		   </td>
		  </tr>

 <tr> <td><br></td> <td><br></td> <td><br></td> </tr>
		  
		   <tr>
		  <td class="no">19</td>
		  <td class="desc">Office Expense</td>
		   <td class="desc">
		   <?php
$sql = $con->query("SELECT SUM(`expense_cost`) as `total2` FROM `expense` 
where entry_date >= '$start_date' AND entry_date <= '$end_date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$OfExp=$row['total2'];
?> <?php echo $OfExp; ?>
		   </td>
		  </tr>
		  
		   <tr>
		  <td class="no">20</td>
		  <td class="desc">Other Expense</td>
		   <td class="desc">
		   <?php
$sql = $con->query("SELECT SUM(`expense_cost`) as `total1` FROM `expense_other` 
where entry_date >= '$start_date' AND entry_date <= '$end_date' and user_id='".$_SESSION['id']."'  ");
$row = $sql->fetch_assoc();
$OthExp=$row['total1'];
?> <?php echo $OthExp; ?>
		   </td>
		  </tr>
		  
		  <tr>
		  <td class="no"><b>21</b></td>
		  <td class="desc"><b>Total Expense</b></td>
		   <td class="desc">
		<b>   <?php 
$TotalExp= $OfExp+$OthExp;
echo $TotalExp ;
?></b>
		   </td>
		  </tr> 
	
<tr> <td><br></td> <td><br></td> <td><br></td> </tr>
	
		  <tr>
		  <td class="no"><b>22</b></td>
		  <td class="desc"><b>Grand Total Expense</b></td>
		   <td class="desc">
		<b>   <?php 
$GTExp= $TBC+$OfExp+$OthExp;
echo $GTExp ;
?></b>
		   </td>
		  </tr> 
		  
		   <tr> <td><br></td> <td><br></td> <td><br></td> </tr>
		  
		 <tr>
		  <td class="no"><b>23</b></td>
		  <td class="desc"><b>Total Cash</b></td>
		   <td class="desc"><b>
		   <?php 
$Cash= $GTC-$GTExp;
echo $Cash ;
?></b>
		   </td>
		  </tr>
	
	<!--	  
		  <tr>
		  <td class="no"></td>
		  <td class="no"></td>
		   <td class="desc">
		   
		   </td>
		  </tr>
		   
        </tbody>
		
		
        <tfoot>
          <tr>
            <td colspan="1"></td>
            <td colspan="1">Subtotal =</td>
            <td>'.$subTotal.'</td>
          </tr>
          <tr>
            <td colspan="1"></td>
            <td colspan="1">Discount =</td>
            <td>'.$discount.'</td>
          </tr>
          <tr>
            <td colspan="1"></td>
            <td colspan="1">Total = </td>
            <td>'.$TodayTotal.'</td>
          </tr>
        </tfoot>
		-->
		
      </table>
	  
	  
    </main>
	
<!--	
<div style="float:right;text-align:center;">
 
<img src="../<?php if($SignImg==""){echo "../img/user.jpg";}else{echo $SignImg;} ?>" width="150px" height="50px"><br> 
........................................<br>
Signature
</div>

	--> 
	
  </body>
</html>