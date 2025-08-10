<?php
	//Jan
	$jan1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='1' and year(sales_date)='".$year."'");
	$jan2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='1' and year(sales_date)='".$year."'");
	$jan3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='1' and year(sales_date)='".$year."'");
	$jan4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='1' and year(sales_date)='".$year."'");
	$jan5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='1' and year(sales_date)='".$year."'");
	$jan6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='1' and year(sales_date)='".$year."'");
	//Feb
	$feb1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='2' and year(sales_date)='".$year."'");
	$feb2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='2' and year(sales_date)='".$year."'");
	$feb3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='2' and year(sales_date)='".$year."'");
	$feb4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='2' and year(sales_date)='".$year."'");
	$feb5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='2' and year(sales_date)='".$year."'");
	$feb6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='2' and year(sales_date)='".$year."'");
	//Mar
	$mar1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='3' and year(sales_date)='".$year."'");
	$mar2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='3' and year(sales_date)='".$year."'");
	$mar3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='3' and year(sales_date)='".$year."'");
	$mar4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='3' and year(sales_date)='".$year."'");
	$mar5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='3' and year(sales_date)='".$year."'");
	$mar6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='3' and year(sales_date)='".$year."'");
	//Apr
	$apr1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='4' and year(sales_date)='".$year."'");
	$apr2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='4' and year(sales_date)='".$year."'");
	$apr3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='4' and year(sales_date)='".$year."'");
	$apr4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='4' and year(sales_date)='".$year."'");
	$apr5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='4' and year(sales_date)='".$year."'");
	$apr6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='4' and year(sales_date)='".$year."'");
	//May
	$may1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='5' and year(sales_date)='".$year."'");
	$may2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='5' and year(sales_date)='".$year."'");
	$may3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='5' and year(sales_date)='".$year."'");
	$may4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='5' and year(sales_date)='".$year."'");
	$may5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='5' and year(sales_date)='".$year."'");
	$may6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='5' and year(sales_date)='".$year."'");
	//Jun
	$jun1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='6' and year(sales_date)='".$year."'");
	$jun2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='6' and year(sales_date)='".$year."'");
	$jun3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='6' and year(sales_date)='".$year."'");
	$jun4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='6' and year(sales_date)='".$year."'");
	$jun5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='6' and year(sales_date)='".$year."'");
	$jun6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='6' and year(sales_date)='".$year."'");
	//Jul
	$jul1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='7' and year(sales_date)='".$year."'");
	$jul2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='7' and year(sales_date)='".$year."'");
	$jul3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='7' and year(sales_date)='".$year."'");
	$jul4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='7' and year(sales_date)='".$year."'");
	$jul5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='7' and year(sales_date)='".$year."'");
	$jul6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='7' and year(sales_date)='".$year."'");
	//Aug
	$aug1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='8' and year(sales_date)='".$year."'");
	$aug2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='8' and year(sales_date)='".$year."'");
	$aug3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='8' and year(sales_date)='".$year."'");
	$aug4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='8' and year(sales_date)='".$year."'");
	$aug5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='8' and year(sales_date)='".$year."'");
	$aug6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='8' and year(sales_date)='".$year."'");
	//Sep
	$sep1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='9' and year(sales_date)='".$year."'");
	$sep2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='9' and year(sales_date)='".$year."'");
	$sep3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='9' and year(sales_date)='".$year."'");
	$sep4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='9' and year(sales_date)='".$year."'");
	$sep5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='9' and year(sales_date)='".$year."'");
	$sep6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='9' and year(sales_date)='".$year."'");
	//Oct
	$oct1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='10' and year(sales_date)='".$year."'");
	$oct2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='10' and year(sales_date)='".$year."'");
	$oct3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='10' and year(sales_date)='".$year."'");
	$oct4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='10' and year(sales_date)='".$year."'");
	$oct5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='10' and year(sales_date)='".$year."'");
	$oct6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='10' and year(sales_date)='".$year."'");
	//Nov
	$nov1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='11' and year(sales_date)='".$year."'");
	$nov2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='11' and year(sales_date)='".$year."'");
	$nov3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='11' and year(sales_date)='".$year."'");
	$nov4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='11' and year(sales_date)='".$year."'");
	$nov5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='11' and year(sales_date)='".$year."'");
	$nov6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='11' and year(sales_date)='".$year."'");
	//Dec
	$dec1=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='1' and month(sales_date)='12' and year(sales_date)='".$year."'");
	$dec2=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='2' and month(sales_date)='12' and year(sales_date)='".$year."'");
	$dec3=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='3' and month(sales_date)='12' and year(sales_date)='".$year."'");
	$dec4=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='4' and month(sales_date)='12' and year(sales_date)='".$year."'");
	$dec5=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='5' and month(sales_date)='12' and year(sales_date)='".$year."'");
	$dec6=mysqli_query($con,"select * from sales_details left join product on product.productid=sales_details.productid left join sales on sales.salesid=sales_details.salesid where product.categoryid='6' and month(sales_date)='12' and year(sales_date)='".$year."'");
	
	//Jan
	$njan1=mysqli_num_rows($jan1);
	$njan2=mysqli_num_rows($jan2);
	$njan3=mysqli_num_rows($jan3);
	$njan4=mysqli_num_rows($jan4);
	$njan5=mysqli_num_rows($jan5);
	$njan6=mysqli_num_rows($jan6);
	//Feb
	$nfeb1=mysqli_num_rows($feb1);
	$nfeb2=mysqli_num_rows($feb2);
	$nfeb3=mysqli_num_rows($feb3);
	$nfeb4=mysqli_num_rows($feb4);
	$nfeb5=mysqli_num_rows($feb5);
	$nfeb6=mysqli_num_rows($feb6);
	//Mar
	$nmar1=mysqli_num_rows($mar1);
	$nmar2=mysqli_num_rows($mar2);
	$nmar3=mysqli_num_rows($mar3);
	$nmar4=mysqli_num_rows($mar4);
	$nmar5=mysqli_num_rows($mar5);
	$nmar6=mysqli_num_rows($mar6);
	//Apr
	$napr1=mysqli_num_rows($apr1);
	$napr2=mysqli_num_rows($apr2);
	$napr3=mysqli_num_rows($apr3);
	$napr4=mysqli_num_rows($apr4);
	$napr5=mysqli_num_rows($apr5);
	$napr6=mysqli_num_rows($apr6);
	//May
	$nmay1=mysqli_num_rows($may1);
	$nmay2=mysqli_num_rows($may2);
	$nmay3=mysqli_num_rows($may3);
	$nmay4=mysqli_num_rows($may4);
	$nmay5=mysqli_num_rows($may5);
	$nmay6=mysqli_num_rows($may6);
	//Jun
	$njun1=mysqli_num_rows($jun1);
	$njun2=mysqli_num_rows($jun2);
	$njun3=mysqli_num_rows($jun3);
	$njun4=mysqli_num_rows($jun4);
	$njun5=mysqli_num_rows($jun5);
	$njun6=mysqli_num_rows($jun6);
	//July
	$njul1=mysqli_num_rows($jul1);
	$njul2=mysqli_num_rows($jul2);
	$njul3=mysqli_num_rows($jul3);
	$njul4=mysqli_num_rows($jul4);
	$njul5=mysqli_num_rows($jul5);
	$njul6=mysqli_num_rows($jul6);
	//Aug
	$naug1=mysqli_num_rows($aug1);
	$naug2=mysqli_num_rows($aug2);
	$naug3=mysqli_num_rows($aug3);
	$naug4=mysqli_num_rows($aug4);
	$naug5=mysqli_num_rows($aug5);
	$naug6=mysqli_num_rows($aug6);
	//Sep
	$nsep1=mysqli_num_rows($sep1);
	$nsep2=mysqli_num_rows($sep2);
	$nsep3=mysqli_num_rows($sep3);
	$nsep4=mysqli_num_rows($sep4);
	$nsep5=mysqli_num_rows($sep5);
	$nsep6=mysqli_num_rows($sep6);
	//Oct
	$noct1=mysqli_num_rows($oct1);	
	$noct2=mysqli_num_rows($oct2);	
	$noct3=mysqli_num_rows($oct3);	
	$noct4=mysqli_num_rows($oct4);	
	$noct5=mysqli_num_rows($oct5);	
	$noct6=mysqli_num_rows($oct6);	
	//Nov
	$nnov1=mysqli_num_rows($nov1);
	$nnov2=mysqli_num_rows($nov2);
	$nnov3=mysqli_num_rows($nov3);
	$nnov4=mysqli_num_rows($nov4);
	$nnov5=mysqli_num_rows($nov5);
	$nnov6=mysqli_num_rows($nov6);
	//Dec
	$ndec1=mysqli_num_rows($dec1);	
	$ndec2=mysqli_num_rows($dec2);	
	$ndec3=mysqli_num_rows($dec3);	
	$ndec4=mysqli_num_rows($dec4);	
	$ndec5=mysqli_num_rows($dec5);	
	$ndec6=mysqli_num_rows($dec6);	
					

?>