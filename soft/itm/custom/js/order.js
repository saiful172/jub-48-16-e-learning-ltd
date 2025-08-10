var manageOrderTable;

$(document).ready(function() {

	var divRequest = $(".div-request").text();

	// top nav bar 
	$("#navOrder").addClass('active');

	if(divRequest == 'add')  {
		// add order	
		// top nav child bar 
		$('#topNavAddOrder').addClass('active');	

		// order date picker
		$("#orderDate").datepicker();
		// DeliveryDate date picker
		$("#DeliveryDate").datepicker();

		// create order form function
		$("#createOrderForm").unbind('submit').bind('submit', function() {
			var form = $(this);

			$('.form-group').removeClass('has-error').removeClass('has-success');
			$('.text-danger').remove();
				
			var orderDate = $("#orderDate").val();
			var clientName = $("#clientName").val();
			var clientContact = $("#clientContact").val();
			var PreDue = $("#PreDue").val();
			var paid = $("#paid").val();
			var RecDues = $("#RecDues").val();
			var discount = $("#discount").val();
			var paymentType = $("#paymentType").val();
			var paymentStatus = $("#paymentStatus").val();		

			// form validation 
			if(orderDate == "") {
				$("#orderDate").after('<p class="text-danger"> The Order Date field is required </p>');
				$('#orderDate').closest('.form-group').addClass('has-error');
			} else {
				$('#orderDate').closest('.form-group').addClass('has-success');
			} // /else

			if(clientName == "") {
				$("#clientName").after('<p class="text-danger"> The Client Name field is required </p>');
				$('#clientName').closest('.form-group').addClass('has-error');
			} else {
				$('#clientName').closest('.form-group').addClass('has-success');
			} // /else

			if(clientContact == "") {
				$("#clientContact").after('<p class="text-danger"> The Contact field is required </p>');
				$('#clientContact').closest('.form-group').addClass('has-error');
			} else {
				$('#clientContact').closest('.form-group').addClass('has-success');
			} // /else
				
				if(PreDue == "") {
				$("#PreDue").after('<p class="text-danger"> The Contact field is required </p>');
				$('#PreDue').closest('.form-group').addClass('has-error');
			} else {
				$('#PreDue').closest('.form-group').addClass('has-success');
			} // /else

			if(paid == "") {
				$("#paid").after('<p class="text-danger"> The Paid field is required </p>');
				$('#paid').closest('.form-group').addClass('has-error');
			} else {
				$('#paid').closest('.form-group').addClass('has-success');
			} // /else
				
			

			if(discount == "") {
				$("#discount").after('<p class="text-danger"> The Discount field is required </p>');
				$('#discount').closest('.form-group').addClass('has-error');
			} else {
				$('#discount').closest('.form-group').addClass('has-success');
			} // /else

			if(paymentType == "") {
				$("#paymentType").after('<p class="text-danger"> The Payment Type field is required </p>');
				$('#paymentType').closest('.form-group').addClass('has-error');
			} else {
				$('#paymentType').closest('.form-group').addClass('has-success');
			} // /else

			if(paymentStatus == "") {
				$("#paymentStatus").after('<p class="text-danger"> The Payment Status field is required </p>');
				$('#paymentStatus').closest('.form-group').addClass('has-error');
			} else {
				$('#paymentStatus').closest('.form-group').addClass('has-success');
			} // /else


			// array validation
			var productName = document.getElementsByName('productName[]');				
			var validateProduct;
			for (var x = 0; x < productName.length; x++) {       			
				var productNameId = productName[x].id;	    	
		    if(productName[x].value == ''){	    		    	
		    	$("#"+productNameId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
		    	$("#"+productNameId+"").closest('.form-group').addClass('has-error');	    		    	    	
	      } else {      	
		    	$("#"+productNameId+"").closest('.form-group').addClass('has-success');	    		    		    	
	      }          
	   	} // for

	   	for (var x = 0; x < productName.length; x++) {       						
		    if(productName[x].value){	    		    		    	
		    	validateProduct = true;
	      } else {      	
		    	validateProduct = false;
	      }          
	   	} // for       		   	
	   	
	   	var quantity = document.getElementsByName('quantity[]');		   	
	   	var validateQuantity;
	   	for (var x = 0; x < quantity.length; x++) {       
	 			var quantityId = quantity[x].id;
		    if(quantity[x].value == ''){	    	
		    	$("#"+quantityId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
		    	$("#"+quantityId+"").closest('.form-group').addClass('has-error');	    		    		    	
	      } else {      	
		    	$("#"+quantityId+"").closest('.form-group').addClass('has-success');	    		    		    		    	
	      } 
	   	}  // for

	   	for (var x = 0; x < quantity.length; x++) {       						
		    if(quantity[x].value){	    		    		    	
		    	validateQuantity = true;
	      } else {      	
		    	validateQuantity = false;
	      }          
	   	} // for       	
	   	

			if(orderDate && clientName && clientContact && PreDue && paid && discount && paymentType && paymentStatus) {
				if(validateProduct == true && validateQuantity == true) {
					// create order button
					// $("#createOrderBtn").button('loading');

					$.ajax({
						url : form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),					
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// reset button
							$("#createOrderBtn").button('reset');
							
							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if(response.success == true) {
								
								// create order button
								$(".success-messages").html('<div class="alert alert-primary alert-dismissible fade show" role="alert">'+
				
				 
                    '<a type="button" onclick="printOrder('+response.order_id+')" class="btn-sm btn-primary"> <i class="bi bi-printer"></i> Print </a>'+
	            	' &nbsp;<a type="button" onclick="printOrderWithBlank('+response.order_id+')" class="btn-sm btn-info"> <i class="bi bi-printer"></i> P.Blank </a>'+
	                ' &nbsp;<a type="button" onclick="printOrderWithPreSP('+response.order_id+')" class="btn-sm btn-warning"> <i class="bi bi-printer"></i> P.SP </a>'+
	            	' &nbsp;<a href="orders?o=add" class="btn-sm btn-danger"> <i class="bi bi-plus-circle"></i> Add New Order </a>'+
	            	
				    '<span style="float:right;fontSize:20px;">'+
					'<i class="bi bi-cart me-1"></i> <i class="bi bi-check-circle me-1"></i> '+ response.messages + 
					'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>'+
					
					'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+
	   		        '</div>');
								
							$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);

							// disabled te modal footer button
							$(".submitButtonFooter").addClass('d-none');
							// remove the product row
							$(".removeProductRowBtn").addClass('d-none');
								
							} else {
								alert(response.messages);								
							}
						} // /response
					}); // /ajax
				} // if array validate is true
			} // /if field validate is true
			

			return false;
		}); // /create order form function	
	
	} else if(divRequest == 'manord') {
		// top nav child bar 
		$('#topNavManageOrder').addClass('active');

		manageOrderTable = $("#manageOrderTable").DataTable({
			'ajax': 'php_action/fetchOrder.php',
			'order': []
		});		
					
	} else if(divRequest == 'editOrd') {
		$("#orderDate").datepicker();

		// edit order form function
		$("#editOrderForm").unbind('submit').bind('submit', function() {
			// alert('ok');
			var form = $(this);

			$('.form-group').removeClass('has-error').removeClass('has-success');
			$('.text-danger').remove();
				
			var orderDate = $("#orderDate").val();
			var clientName = $("#clientName").val();
			var clientContact = $("#clientContact").val();
			var paid = $("#paid").val();
			var Paid_dd = $("#Paid_dd").val();
			var discount = $("#discount").val();
			var paymentType = $("#paymentType").val();
			var paymentStatus = $("#paymentStatus").val();		

			// form validation 
			if(orderDate == "") {
				$("#orderDate").after('<p class="text-danger"> The Order Date field is required </p>');
				$('#orderDate').closest('.form-group').addClass('has-error');
			} else {
				$('#orderDate').closest('.form-group').addClass('has-success');
			} // /else

			if(clientName == "") {
				$("#clientName").after('<p class="text-danger"> The Client Name field is required </p>');
				$('#clientName').closest('.form-group').addClass('has-error');
			} else {
				$('#clientName').closest('.form-group').addClass('has-success');
			} // /else

			if(clientContact == "") {
				$("#clientContact").after('<p class="text-danger"> The Contact field is required </p>');
				$('#clientContact').closest('.form-group').addClass('has-error');
			} else {
				$('#clientContact').closest('.form-group').addClass('has-success');
			} // /else

			if(paid == "") {
				$("#paid").after('<p class="text-danger"> The Paid field is required </p>');
				$('#paid').closest('.form-group').addClass('has-error');
			} else {
				$('#paid').closest('.form-group').addClass('has-success');
			} // /else

            if(Paid_dd == "") {
				$("#Paid_dd").after('<p class="text-danger"> The Paid field is required </p>');
				$('#Paid_dd').closest('.form-group').addClass('has-error');
			} else {
				$('#Paid_dd').closest('.form-group').addClass('has-success');
			} // /else
				
			
			if(discount == "") {
				$("#discount").after('<p class="text-danger"> The Discount field is required </p>');
				$('#discount').closest('.form-group').addClass('has-error');
			} else {
				$('#discount').closest('.form-group').addClass('has-success');
			} // /else

			if(paymentType == "") {
				$("#paymentType").after('<p class="text-danger"> The Payment Type field is required </p>');
				$('#paymentType').closest('.form-group').addClass('has-error');
			} else {
				$('#paymentType').closest('.form-group').addClass('has-success');
			} // /else

			if(paymentStatus == "") {
				$("#paymentStatus").after('<p class="text-danger"> The Payment Status field is required </p>');
				$('#paymentStatus').closest('.form-group').addClass('has-error');
			} else {
				$('#paymentStatus').closest('.form-group').addClass('has-success');
			} // /else


			// array validation
			var productName = document.getElementsByName('productName[]');				
			var validateProduct;
			for (var x = 0; x < productName.length; x++) {       			
				var productNameId = productName[x].id;	    	
		    if(productName[x].value == ''){	    		    	
		    	$("#"+productNameId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
		    	$("#"+productNameId+"").closest('.form-group').addClass('has-error');	    		    	    	
	      } else {      	
		    	$("#"+productNameId+"").closest('.form-group').addClass('has-success');	    		    		    	
	      }          
	   	} // for

	   	for (var x = 0; x < productName.length; x++) {       						
		    if(productName[x].value){	    		    		    	
		    	validateProduct = true;
	      } else {      	
		    	validateProduct = false;
	      }          
	   	} // for       		   	
	   	
	   	var quantity = document.getElementsByName('quantity[]');		   	
	   	var validateQuantity;
	   	for (var x = 0; x < quantity.length; x++) {       
	 			var quantityId = quantity[x].id;
		    if(quantity[x].value == ''){	    	
		    	$("#"+quantityId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
		    	$("#"+quantityId+"").closest('.form-group').addClass('has-error');	    		    		    	
	      } else {      	
		    	$("#"+quantityId+"").closest('.form-group').addClass('has-success');	    		    		    		    	
	      } 
	   	}  // for

	   	for (var x = 0; x < quantity.length; x++) {       						
		    if(quantity[x].value){	    		    		    	
		    	validateQuantity = true;
	      } else {      	
		    	validateQuantity = false;
	      }          
	   	} // for       	
	   	

			if(orderDate && clientName && clientContact && paid && discount && paymentType && paymentStatus) {
				if(validateProduct == true && validateQuantity == true) {
					// create order button
					// $("#createOrderBtn").button('loading');

					$.ajax({
						url : form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),					
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// reset button
							$("#editOrderBtn").button('reset');
							
							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if(response.success == true) {
								
								// Edit order button
								$(".success-messages").html('<div class="alert alert-primary alert-dismissible fade show" role="alert">'+
				 '<i class="bi bi-cart me-1"></i> <i class="bi bi-check-circle me-1"></i> '+ response.messages + 
                 '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+
                 '</div>');
				   
								
							$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);

							// disabled te modal footer button
							$(".editButtonFooter").addClass('d-none');
							// remove the product row
							$(".removeProductRowBtn").addClass('d-none');
								
							} else {
								alert(response.messages);								
							}
						} // /response
					}); // /ajax
				} // if array validate is true
			} // /if field validate is true
			

			return false;
		}); // /edit order form function	
	} 	

}); // /documernt


// print order function
function printOrder(orderId = null) {
	if(orderId) {		
			
		$.ajax({
			url: 'php_action/printOrder.php',
			type: 'post',
			data: {orderId: orderId},
			dataType: 'text',
			success:function(response) {
				
		var mywindow = window.open('', 'Digital Invoice Manager', 'height=1500,width=900');
        mywindow.document.write('<html><head><title>Order Invoice</title>');        
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        // mywindow.print();
        //mywindow.close();
				
			}// /success function
		}); // /ajax function to fetch the printable order
	} // /if orderId
} // /print order function


// print order WithPreDue
function printOrderWithPreDue(orderId = null) {
	if(orderId) {		
			
		$.ajax({
			url: 'php_action/printOrderWithPreDue.php',
			type: 'post',
			data: {orderId: orderId},
			dataType: 'text',
			success:function(response) {
				
		var mywindow = window.open('', 'Digital Invoice Manager', 'height=1500,width=900');
        mywindow.document.write('<html><head><title>Order Invoice</title>');        
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        // mywindow.print();
        //mywindow.close();
				
			}// /success function
		}); // /ajax function to fetch the printable order
	} // /if orderId
} // /print order function


// print order printOrderWithPreSP
function printOrderWithPreSP(orderId = null) {
	if(orderId) {		
			
		$.ajax({
			url: 'php_action/printOrderWithPreSP.php',
			type: 'post',
			data: {orderId: orderId},
			dataType: 'text',
			success:function(response) {
				
		var mywindow = window.open('', 'Digital Invoice Manager', 'height=1500,width=900');
        mywindow.document.write('<html><head><title>Order Invoice</title>');        
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        // mywindow.print();
        //mywindow.close();
				
			}// /success function
		}); // /ajax function to fetch the printable order
	} // /if orderId
} // /print order function

// print order With Blank
function printOrderWithBlank(orderId = null) {
	if(orderId) {		
			
		$.ajax({
			url: 'php_action/printOrderWithBlank.php',
			type: 'post',
			data: {orderId: orderId},
			dataType: 'text',
			success:function(response) {
				
		var mywindow = window.open('', 'Digital Invoice Manager', 'height=1500,width=900');
        mywindow.document.write('<html><head><title>Order Invoice</title>');        
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        // mywindow.print();
        //mywindow.close();
				
			}// /success function
		}); // /ajax function to fetch the printable order
	} // /if orderId
} // /print order function


//Add Row Option....
function addRow() {
	$("#addRowBtn").button("loading");

	var tableLength = $("#productTable tbody tr").length;

	var tableRow;
	var arrayNumber;
	var count;

	if(tableLength > 0) {		
		tableRow = $("#productTable tbody tr:last").attr('id');
		arrayNumber = $("#productTable tbody tr:last").attr('class');
		count = tableRow.substring(3);	
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;					
		arrayNumber2 = Number(arrayNumber) + 1;					
	} else {
		// no table row
		count = 1;
		arrayNumber = 0;
		arrayNumber2 = 1;
	}

	$.ajax({
		url: 'php_action/fetchProductData.php',
		type: 'post',
		dataType: 'json',
		success:function(response) {
			$("#addRowBtn").button("reset");			

			var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+			  				
								
				
				'<td style="padding-left:0px;">'+
					'<div class="form-group">'+
					'<input type="text"  value="'+arrayNumber2+'" class="form-control center" readonly>'+
					'</div>'+
				'</td>'+
				
				'<td style="padding-left:0px;" >'+
					'<div class="form-group">'+

					'<select style="width:100%;" class="form-control chosen-select" name="productName[]" id="productName'+count+'" onchange="getProductData('+count+')" >'+
						'<option value="">Select Product / Service  </option>';
						// console.log(response);
						$.each(response, function(index, value) {
							tr += '<option value="'+value[0]+'">'+value[1]+' - '+value[3]+' - '+value[2]+' </option>';							
						});
													
					tr += '</select>'+
					'</div>'+
				'</td>'+
				
				'<td style="padding-left:0px;display:none;">'+
					'<div class="form-group">'+
					'<input type="text" name="ShortDetails[]" id="ShortDetails'+count+'" value="Na" autocomplete="off" class="form-control center" />'+
					'</div>'+
				'</td>'+
				
				'<td style="padding-left:0px;">'+
					'<div class="form-group">'+
					'<input type="text" name="QrCode[]"  id="QrCode'+count+'" value="0" autocomplete="off" onclick="clearInput()" class="form-control center" />'+
					'</div>'+
				'</td>'+
				
				'<td style="padding-left:0px;"">'+
				//Add Row Option....
					'<input type="text" name="rate[]" id="rate'+count+'" onkeyup="getTotal('+count+')" autocomplete="off"  class="form-control center " />'+
					'<input type="hidden" name="BuyRate[]" id="BuyRate'+count+'" onkeyup="getTotal('+count+')" autocomplete="off"  class="form-control center " />'+
					'<input type="hidden" name="rateValue[]" id="rateValue'+count+'" autocomplete="off" class="form-control" />'+
				 '</td>'+
				
				'<td style="padding-left:0px;display:none;">'+
					'<div class="form-group">'+
					'<input type="text" name="StockQty[]" id="StockQty'+count+'" onkeyup="getTotal('+count+')"  autocomplete="off" class="form-control center " disabled="true" />'+
					'</div>'+
				'</td>'+
				
				'<td style="padding-left:0px;">'+
					'<div class="form-group">'+
					'<input type="text" name="quantity1[]" id="quantity1'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control center" value="0" disabled="true" />'+
					'<input type="hidden" name="quantity[]" id="quantity'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
					'</div>'+
				'</td>'+
				
				
				'<td style="padding-left:0px;display:none;">'+
					'<div class="form-group">'+
					'<input type="text" name="OrdQty[]" id="OrdQty'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control center"  />'+
					'</div>'+
				'</td>'+
				
				'<td style="padding-left:0px;">'+
					'<div class="form-group">'+
					'<input type="text" name="AddQty[]" id="AddQty'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control center"  />'+
					'</div>'+
				'</td>'+
				
				'<td style="padding-left:0px;">'+
					'<div class="form-group">'+
					'<input type="text" name="BackQty1[]" id="BackQty1'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control center" disabled="true"/>'+
					'<input type="hidden" name="BackQty[]" id="BackQty'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control"  />'+
					'</div>'+
				'</td>'+
				
				'<td style="padding-left:0px;">'+
					'<div class="form-group">'+
					'<input type="text" name="RecQty1[]" id="RecQty1'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control center" disabled="true"/>'+
					'<input type="hidden" name="RecQty[]" id="RecQty'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control center "/>'+
					'</div>'+
				'</td>'+
				 
				 
				 '<td style="padding-left:0px;display:none;">'+
					'<div class="form-group">'+
					'<input type="text" name="SingTotal[]" id="SingTotal'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control center" min="0" />'+
					'</div>'+
				'</td>'+
				
				'<td style="padding-left:0px;">'+
					'<div class="form-group">'+
					'<input type="text" style="width:49%;float:left;" name="Discount[]" id="Discount'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control center" min="0" />'+
					'<input type="text" style="width:49%;float:left;margin-left:2px;" name="DisPrsnt[]" id="DisPrsnt'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control center" min="0" />'+
					'<input type="hidden" name="DisTaka[]" id="DisTaka'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control center" min="0" />'+
					'</div>'+
				'</td>'+
								
				'<td style="padding-left:0px;">'+
					'<input type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control center " disabled="true" />'+
					'<input type="hidden" name="totalValue[]" id="totalValue'+count+'" autocomplete="off" class="form-control" />'+
				 '</td>'+
				
				'<td>'+
					'<center><button class="btn btn-danger removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="bi bi-trash"></i></button></center>'+
				'</td>'+
				
			'</tr>';
			if(tableLength > 0) {							
				$("#productTable tbody tr:last").after(tr);
			} else {				
				$("#productTable tbody").append(tr);
			}		
 $('.chosen-select').chosen({width: "100%"});  // chosen-select
		} // /success
	});	// get the product data

} // /add row

function removeProductRow(row = null) {
	if(row) {
		$("#row"+row).remove();


		subAmount();
	} else {
		alert('error! Refresh the page again');
	}
}

// select on product data
function getProductData(row = null) {
	if(row) {
		var productId = $("#productName"+row).val();		
		
		if(productId == "") {
			$("#ShortDetails"+row).val("");
			$("#rate"+row).val(""); 			
			$("#quantity"+row).val("");			
			$("#total"+row).val("");
			$("#SingTotal"+row).val(""); 
			$("#CouCrg"+row).val("");
			$("#FinalTotal"+row).val("");
			

			// remove check if product name is selected
			// var tableProductLength = $("#productTable tbody tr").length;			
			// for(x = 0; x < tableProductLength; x++) {
			// 	var tr = $("#productTable tbody tr")[x];
			// 	var count = $(tr).attr('id');
			// 	count = count.substring(3);

			// 	var productValue = $("#productName"+row).val()

			// 	if($("#productName"+count).val() == "") {					
			// 		$("#productName"+count).find("#changeProduct"+productId).removeClass('d-none');	
			// 		console.log("#changeProduct"+count);
			// 	}											
			// } // /for

		} else {
			$.ajax({
				url: 'php_action/fetchSelectedProduct.php',
				type: 'post',
				data: {productId : productId},
				dataType: 'json',
				success:function(response) {
					// setting the rate value into the rate input field
					
					
					$("#ShortDetails"+row).val(response.product_details);
					$("#rate"+row).val(response.rate);
					$("#rateValue"+row).val(response.rate);
					$("#BuyRate"+row).val(response.buy_rate); 

					$("#quantity1"+row).val(1);
					$("#quantity"+row).val(1);
					
					$("#StockQty"+row).val(response.quantity);
					$("#OrdQty"+row).val(0);
					$("#AddQty"+row).val(1);
					$("#BackQty"+row).val(0);
					
					$("#Discount"+row).val(0);
					$("#DisPrsnt"+row).val(0);
					$("#DisTaka"+row).val(0);
					$("#DisAmt"+row).val(0);
					
					$("#CouCrg"+row).val(0);  
					$("#FinalTotal"+row).val(0); 
                    $("#RecDues"+row).val(0);  
					$("#RecDues1"+row).val(0);  				
					
                    
					var SingTotal = Number(response.rate) * 1;
					SingTotal = SingTotal.toFixed(2);
					$("#SingTotal"+row).val(SingTotal); 
					
					var total = Number(response.rate) * 1;
					total = total.toFixed(2);
					$("#total"+row).val(total);
					$("#totalValue"+row).val(total);
					 
					var RecStock =(response.quantity) - $("#quantity"+row).val();
					RecStock = RecStock.toFixed(1); 
					$("#RecQty"+row).val(RecStock);
					$("#RecQty1"+row).val(RecStock);
					
					// check if product name is selected
					// var tableProductLength = $("#productTable tbody tr").length;					
					// for(x = 0; x < tableProductLength; x++) {
					// 	var tr = $("#productTable tbody tr")[x];
					// 	var count = $(tr).attr('id');
					// 	count = count.substring(3);

					// 	var productValue = $("#productName"+row).val()

					// 	if($("#productName"+count).val() != productValue) {
					// 		// $("#productName"+count+" #changeProduct"+count).addClass('d-none');	
					// 		$("#productName"+count).find("#changeProduct"+productId).addClass('d-none');								
					// 		console.log("#changeProduct"+count);
					// 	}											
					// } // /for
			
					subAmount(); 
				} // /success
			}); // /ajax function to fetch the product data	
		}
				
	} else {
		alert('no row! please refresh the page');
	}
} // /select on product data

// table total
function getTotal(row = null) {
	if(row) {
	   
    	var RecStock = Number($("#StockQty"+row).val()) - Number($("#AddQty"+row).val()) + Number($("#BackQty"+row).val());
		var Qnty = Number($("#OrdQty"+row).val()) + Number($("#AddQty"+row).val()) - Number($("#BackQty"+row).val());
		var Singtotal = Number($("#rate"+row).val()) * ( Number($("#OrdQty"+row).val()) + Number($("#AddQty"+row).val()) - Number($("#BackQty"+row).val()) ) ;
		var Disp = Number($("#Discount"+row).val()) + ( Number($("#rate"+row).val()) * Number($("#DisPrsnt"+row).val()) / 100 );
		var total = Singtotal - Disp;
		
		total = total.toFixed(2);
		$("#SingTotal"+row).val(Singtotal); 
		$("#total"+row).val(total);
		$("#totalValue"+row).val(total);
		$("#RecQty"+row).val(RecStock);
		$("#RecQty1"+row).val(RecStock);
		$("#quantity"+row).val(Qnty); 
		$("#quantity1"+row).val(Qnty); 
		$("#DisTaka"+row).val(Disp);
		
		subAmount();
		CourierFunc();
		paidAmount();
		discountFunc()
		
	} else {
		alert('no row !! please refresh the page');
	}
}

function subAmount() {
	var tableProductLength = $("#productTable tbody tr").length;
	var totalSubAmount = 0;
	for(x = 0; x < tableProductLength; x++) {
		var tr = $("#productTable tbody tr")[x];
		var count = $(tr).attr('id');
		count = count.substring(3);

		totalSubAmount = Number(totalSubAmount) + Number($("#total"+count).val());
	} // /for

	totalSubAmount = totalSubAmount.toFixed(2);

	// sub total
	$("#subTotal").val(totalSubAmount);
	$("#subTotalValue").val(totalSubAmount);

	// vat
	var vat = (Number($("#subTotal").val())/100) * 0;
	vat = vat.toFixed(2);
	$("#vat").val(vat);
	$("#vatValue").val(vat);

	// total amount
	var totalAmount = (Number($("#subTotal").val()) + Number($("#vat").val()));
	totalAmount = totalAmount.toFixed(2);
	$("#totalAmount").val(totalAmount);
	$("#totalAmountValue").val(totalAmount);

	
	 // Grand Total (PreDue+Today Due)
	var PreDue = $("#PreDue").val();
	if(PreDue) {
		var GTotal = Number($("#totalAmount").val()) + Number(PreDue);
		GTotal = GTotal.toFixed(2);
		$("#GTotal1").val(GTotal);
		$("#GTotal").val(GTotal);
		$("#FinalTotal").val(GTotal);
		$("#paid").val(GTotal);
	} else {
		$("#GTotal1").val(totalAmount);
		$("#FinalTotal").val(totalAmount);
		$("#paid").val(totalAmount);
	} // /else discount	
	
  // grandTotal/discount
	var discount = $("#discount").val();
	if(discount) {
		var grandTotal = Number($("#totalAmount").val()) - Number(discount);
		grandTotal = grandTotal.toFixed(2);
		$("#grandTotal").val(grandTotal);
		$("#grandTotalValue").val(grandTotal);
	} else {
		$("#grandTotal").val(totalAmount);
		$("#grandTotalValue").val(totalAmount);
	} // /else discount	

// paidAmount
	var paidAmount = $("#paid").val();
	if(paidAmount) {
		paidAmount =  Number($("#grandTotal").val()) - Number(paidAmount);
		paidAmount = paidAmount.toFixed(2);
		$("#due").val(paidAmount);
		$("#dueValue").val(paidAmount);
	} else {	
		$("#due").val($("#grandTotal").val());
		$("#dueValue").val($("#grandTotal").val());
	} // else

} // /sub total amount

//function discountFunc
function discountFunc() {
	var discount = $("#discount").val();
	var TotalDisP = $("#TotalDisP").val();
	var DisAmt = $("#DisAmt").val();
	
 	var totalAmount = Number($("#totalAmount").val());
 	totalAmount = totalAmount.toFixed(2);

 	var grandTotal;
 	if(totalAmount) { 	
 		DDP = Number($("#discount").val()) +  ( Number($("#totalAmount").val()) * Number($("#TotalDisP").val()) / 100 ) ;
		grandTotal = Number($("#totalAmount").val()) - DDP ;
 		grandTotal = grandTotal.toFixed(2);

 		$("#grandTotal").val(grandTotal);
 		$("#grandTotalValue").val(grandTotal);
 		$("#DisAmt").val(DDP);
 	} else {
 	}
// Grand Total -Discount	
	var GTotal;
 	if(totalAmount) { 	
 		GTotal = Number($("#totalAmount").val()) + Number($("#PreDue").val()) - DDP;
 		GTotal = GTotal.toFixed(2);
 		$("#GTotal1").val(GTotal);
 		$("#GTotal").val(GTotal);
		
		Curi = Number($("#GTotal").val()) + Number($("#CouCrg").val());
 		Curi = Curi.toFixed(2);
 		$("#FinalTotal").val(Curi)  
		$("#paid").val(Curi);  
		
 	} else {
 	}

// Recent Due
 	
 
// dueAmount
 	var paid = $("#paid").val();
 	var dueAmount; 	
 	if(paid) {
 		dueAmount = Number($("#grandTotal").val()) - Number($("#paid").val());
 		dueAmount = dueAmount.toFixed(2);

 		$("#due").val(dueAmount);
 		$("#dueValue").val(dueAmount);
 	} else {
 		$("#due").val($("#grandTotal").val());
 		$("#dueValue").val($("#grandTotal").val());
 	}

} // /discount function


// function Curier
function CourierFunc() { 
	var GTotal = $("#GTotal").val();
	if(GTotal) {
		var TotalAmt= Number($("#GTotal").val()) + ( Number($("#CouCrg").val()) );
		TotalAmt = TotalAmt.toFixed(2);
		$("#FinalTotal").val(TotalAmt); 
		$("#paid").val(TotalAmt);
	} // /if
} // /paid amoutn Curier


// function paidAmount
function paidAmount() {  
	if(GTotal) {
		var RecDue= Number($("#FinalTotal").val()) - ( Number($("#paid").val()) + Number($("#Paid_dd").val()) );
		RecDue = RecDue.toFixed(2);
		$("#RecDues1").val(RecDue);
		$("#RecDues").val(RecDue);
	} // /if
} // /paid amoutn function


function resetOrderForm() {
	// reset the input field
	$("#createOrderForm")[0].reset();
	// remove remove text danger
	$(".text-danger").remove();
	// remove form group error 
	$(".form-group").removeClass('has-success').removeClass('has-error');
} // /reset order form


// remove order from server
function removeOrder(orderId = null) {
	if(orderId) {
		$("#removeOrderBtn").unbind('click').bind('click', function() {
			$("#removeOrderBtn").button('loading');

			$.ajax({
				url: 'php_action/removeOrder.php',
				type: 'post',
				data: {orderId : orderId},
				dataType: 'json',
				success:function(response) {
					$("#removeOrderBtn").button('reset');

					if(response.success == true) {

						manageOrderTable.ajax.reload(null, false);
						// hide modal
						$("#removeOrderModal").modal('hide');
						// success messages
						$("#success-messages").html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
	          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          

					} else {
						// error messages
						$(".removeOrderMessages").html('<div class="alert alert-warning">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
	          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          
					} // /else

				} // /success
			});  // /ajax function to remove the order

		}); // /remove order button clicked
		

	} else {
		alert('error! refresh the page again');
	}
}
// /remove order from server

// Payment ORDER
function paymentOrder(orderId = null) {
	if(orderId) {

		$("#orderDate").datepicker();

		$.ajax({
			url: 'php_action/fetchOrderData.php',
			type: 'post',
			data: {orderId: orderId},
			dataType: 'json',
			success:function(response) {				

				// due 
				$("#due").val(response.order[10]);				

				// pay amount 
				$("#payAmount").val(response.order[10]);

				var paidAmount = response.order[9] 
				var dueAmount = response.order[10];							
				var grandTotal = response.order[8];

				// update payment
				$("#updatePaymentOrderBtn").unbind('click').bind('click', function() {
					var payAmount = $("#payAmount").val();
					var paymentType = $("#paymentType").val();
					var paymentStatus = $("#paymentStatus").val();

					if(payAmount == "") {
						$("#payAmount").after('<p class="text-danger">The Pay Amount field is required</p>');
						$("#payAmount").closest('.form-group').addClass('has-error');
					} else {
						$("#payAmount").closest('.form-group').addClass('has-success');
					}

					if(paymentType == "") {
						$("#paymentType").after('<p class="text-danger">The Pay Amount field is required</p>');
						$("#paymentType").closest('.form-group').addClass('has-error');
					} else {
						$("#paymentType").closest('.form-group').addClass('has-success');
					}

					if(paymentStatus == "") {
						$("#paymentStatus").after('<p class="text-danger">The Pay Amount field is required</p>');
						$("#paymentStatus").closest('.form-group').addClass('has-error');
					} else {
						$("#paymentStatus").closest('.form-group').addClass('has-success');
					}

					if(payAmount && paymentType && paymentStatus) {
						$("#updatePaymentOrderBtn").button('loading');
						$.ajax({
							url: 'php_action/editPayment.php',
							type: 'post',
							data: {
								orderId: orderId,
								payAmount: payAmount,
								paymentType: paymentType,
								paymentStatus: paymentStatus,
								paidAmount: paidAmount,
								grandTotal: grandTotal
							},
							dataType: 'json',
							success:function(response) {
								$("#updatePaymentOrderBtn").button('loading');

								// remove error
								$('.text-danger').remove();
								$('.form-group').removeClass('has-error').removeClass('has-success');

								$("#paymentOrderModal").modal('hide');

								$("#success-messages").html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

								// remove the mesages
			          $(".alert-success").delay(500).show(10, function() {
									$(this).delay(3000).hide(10, function() {
										$(this).remove();
									});
								}); // /.alert	

			          // refresh the manage order table
								manageOrderTable.ajax.reload(null, false);

							} //

						});
					} // /if
						
					return false;
				}); // /update payment			

			} // /success
		}); // fetch order data
	} else {
		alert('Error ! Refresh the page again');
	}
}

