<?php  session_start();
require_once '../../includes/conn.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<style type="text/css"> 
hr{border:0.2px solid black; margin:0.5px;} 
.font{font-weight: normal;}
.border{border-top:1px solid gray;}
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

<input type="button" value="Cash Receipt" onclick="printPage()" /> 
<center> <p1 style="font-size:18px;"><?php echo $BizNam ; ?> </p1><br>
<?php echo $BizDetails ; ?>  <br>
Phone : <?php echo $BizPhn ; ?> <br>
<?php echo $BizAdr ; ?><br>
  
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
          <div class="date">Invoice No : <?php echo $InvName ; ?>-<?php echo $CustomInv ; ?></div>
          <div class="date"><?php date_default_timezone_set("Asia/Dhaka"); echo date("d-M-Y h:i:sa", strtotime($InvTime)); ?></div>
 
</center>
	
	</body>
</html>

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
$CuriCharg = $orderData[30];

$DisTaka = $orderData[31];
$DisP = $orderData[32];


$orderD= date("M d, Y", strtotime( $orderDate));
$DeliverD= date("M d, Y", strtotime( $DeliverDate));
$GrandTotalPaid = $paid + $DeliverDatePaid;

$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.order_quantity, order_item.total,
product.product_name,order_item.short_details,order_item.single_dis_taka,order_item.single_dis_prcnt FROM order_item
	left JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $con->query($orderItemSql);

 $table = '
 <table border="0" cellspacing="0" cellpadding="5" width="100%" style="border:1px solid black;border-top-style:1px solid black;border-bottom-style:none; text-align:left;">
	<thead>
		<tr >
			<th colspan="1">
			    <center>   
				Invoice No : '.$orderId.'
				</center> 
				<brr>
					
			</th>
				
		</tr>		
	</thead>
</table>
<table border="0" width="100%;" cellpadding="5" style=" border:1px solid black;border-top:1px solid black;border-bottom:0px solid black;">

	<tbody>
		<tr>
			<th>SL</th>
			<th style="text-align:left;">Product</th>
			<th>Rate</th>
			<th>Qty</th>
			<th></th>
			<th>Total</th>
		</tr>';

		$x = 1;
		while($row = $orderItemResult->fetch_array()) {			
						
			$table .= '<tr>
				<th class="font">'.$x.'</th>
<th class="font" style="text-align:left;">'.$row[4].'</th>
				<th class="font">'.$row[1].'</th>
				<th class="font">'.$row[2].'</th>
				<th class="font"></th>
				<th class="font" >'.$row[3].'</th>
			</tr>
			';
		$x++;
		} // /while

		$table .= '<tr >
		
		<tr>
		
		<td class="border" colspan="6" >
		<center>
		 Sub Amount = '.$subTotal.' <br>
           Discount = '.$discount.' <br>
        Net Payable = '.$GTotal.' <br>
           Paid = '.$paid.' <br> 
		   <div style="border-bottom:1px solid black;"> </div>
		<b> Total Bill ='.$GTotal.'  </b> 
		</center>
		</td>
		
		</tr>

	</tbody>
</table>
 ';

$con->close();

echo $table;

?>

<div style="border:1px solid black;"> 
</div>

<center> 

<div style="border:1px solid black;"> 
In Word :   
<?php 
function convert_number_to_words($number) {
   
    $hyphen      = '-';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'negative ';
    $decimal     = ' Point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break; 
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}

$GT = number_format($GTotal, 2, '.', '');
echo convert_number_to_words($GT). "" ;

?>
</div>
<br>
 
----- Thank You For Purchase -----

</center>
		 
<br>
<br>
