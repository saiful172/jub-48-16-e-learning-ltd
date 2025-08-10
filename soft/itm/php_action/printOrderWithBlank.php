<?php  session_start();
require_once '../../includes/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="php_action/invoice/style.css" media="all" />
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
            
    <header class="clearfix">
      <div id="logo">
	  <img src="../<?php if($BizLogo==""){echo "../img/user.jpg";}else{echo $BizLogo;} ?>"> 
      </div>
      <div id="company"> 
        <h2 class="name"><b><?php echo $BizNam ; ?></b></h2>
        <div><?php echo $BizAdr ; ?></div>
        <div><?php echo $BizPhn ; ?></div>
        <div><a href="mailto:<?php echo $BizEml ; ?>"><?php echo $BizEml ; ?></a></div>
      </div>
      </div>
    </header>
	
    <main>
	 
				
      <div id="details" class="clearfix">
	  <?php 
	  $orderId = $_POST['orderId'];
$sql = $con->query("select distinct * from orders where order_id='$orderId' ");
$row = $sql->fetch_assoc();
$CustName =$row['client_name']; 
$CustPhn =$row['client_contact']; 
$CustAdrs =$row['address']; 
$CustEml =$row['order_email']; 
?>
        <div id="client">
          <h2 class="name"><b>To :</b></h2>
          <h2 class="name">Name : <?php echo $CustName ; ?></h2>
          <div class="address">Phone : <?php echo $CustPhn ; ?></div>
          <div class="email">Email :<a href="mailto:<?php echo $CustEml ; ?>"><?php echo $CustEml ; ?></a></div>
          <div class="address">Address : <?php echo $CustAdrs ; ?></div>
		</div>
		
	<?php 
	  $orderId = $_POST['orderId'];
$sql = $con->query("select * from orders
                   left join  stuff on stuff.userid=orders.user_id
				   where order_id = $orderId  ");
$row = $sql->fetch_assoc();
$InvName =$row['inv_name'];
$CustomInv =$row['custom_invoice_no'];
$InvTime =$row['invoice_time'];  
?>	
		
        <div id="invoice">
          <h1>Invoice</h1>
          <div class="date">Invoice No : <?php echo $InvName ; ?>-<?php echo $CustomInv ; ?></div>
          <div class="date"><?php date_default_timezone_set("Asia/Dhaka"); echo date("d-M-Y h:i:sa", strtotime($InvTime)); ?></div>
        </div>
      </div>
	  
	  <?php 	 
$orderId = $_POST['orderId'];

$sql = "SELECT * FROM orders  WHERE order_id = $orderId";

$orderResult = $con->query($sql);
$orderData = $orderResult->fetch_array();


$OrderId = $orderData[1];
$EmpId = $orderData[2];
$CustId = $orderData[3];
$orderDate = $orderData[4];
$DeliverDate = $orderData[5];
$clientName = $orderData[6];
$clientContact = $orderData[7]; 
$clientAddress = $orderData[8]; 

$subTotal = $orderData[10];
$vat = $orderData[11];
$totalAmount = $orderData[12]; 
$discount = $orderData[13];
$PreDue = $orderData[14];
$TodayTotal = $orderData[15];
$GTotal = $orderData[16];

$paid = $orderData[17];
$DeliverDatePaid = $orderData[18];
$RecDue = $orderData[19];
$Due_or_paid = $orderData[20];
$CustomInvoice = $orderData[25];
$InvCom = $orderData[28];


$orderD= date("M d, Y", strtotime( $orderDate));
$DeliverD= date("M d, Y", strtotime( $DeliverDate));
$GrandTotalPaid = $paid + $DeliverDatePaid;

$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.order_quantity, order_item.total,
product.product_name,order_item.short_details,order_item.single_discount FROM order_item
	left JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $con->query($orderItemSql);

 $table = '
      
	  <table border="0" cellspacing="0" cellpadding="0">
       
	   <thead>
          <tr>
            <th class="no"><b>#</b></th>
            <th class="desc"><b>Product</b></th>
            <th class="unit"><b>Qty</b></th>
            <th class="qty"><b>Price</b></th>
            <th class="qty"><b>Discount</b></th>
            <th class="total"><b>Total</b></th>
          </tr>
        </thead>
      ';
	  
	 
	  $x = 1;
		while($row = $orderItemResult->fetch_array()) {			
						
			$table .= '
			
		 <tbody>	
          <tr>
            <td class="no">'.$x.'</td>
             <td class="desc"><h3>'.$row[4].'</h3> <span style="font-size:14px;">'.$row[5].'</span></td>
            <td class="unit">'.$row[2].'</td>
            <td class="qty">'.$row[1].'</td>
            <td class="qty">'.$row[6].'</td>
            <td class="total">'.$row[3].'</td>
          </tr>
		  
		  ';
		$x++;
		} // /while
      
       $table .= '      
		   
        </tbody>
		
		
        <tfoot>
          <tr>
            <td colspan="3"></td>
            <td colspan="2">Subtotal =</td>
            <td>'.$subTotal.'</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2">Discount =</td>
            <td>'.$discount.'</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2">Total = </td>
            <td>'.$TodayTotal.'</td>
          </tr>
        </tfoot>
		
      </table>
 '; 
//$con->close(); 
echo $table;

?>	   
      
      <div id="notices">
	    <?php 
$sql = $con->query(" SELECT * FROM orders
  left join `payment_status` on payment_status.ps_id=orders.payment_status
  left join `payment_type` on payment_type.pt_id=orders.payment_type
  WHERE orders.order_id = $orderId ");
$row = $sql->fetch_assoc();
$PmntType =$row['pt_name']; 
$PmntStatus =$row['ps_name']; 
?>  
        <div> <?php echo $InvCom; ?> </div><hr>
        <div class="notice">Payment : <?php echo $PmntType; ?> || <?php echo $PmntStatus; ?></div>
      </div>
	  
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