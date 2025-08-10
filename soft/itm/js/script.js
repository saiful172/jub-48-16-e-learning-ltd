function toPrint() {
	var el=document.getElementById("table");
	el.setAttribute('border', '1px');
	el.setAttribute('cellpadding', '10');
	el.setAttribute('class', 'table table-bordered');
	el.style.borderCollapse='collapse';
	
	newPrint=window.open("");
	newPrint.document.write(el.outerHTML);
	newPrint.print();
	newPrint.close();
}

 
function displayData(){
	var data = [
		{ 'firstname': 'John', 'lastname': 'Smith', 'address': 'New York', 'gender': 'Male'},
		{ 'firstname': 'Claire', 'lastname': 'Temple', 'address': 'Racoon City', 'gender': 'Female'},
	];
	
	var table = "" ;
 
			for(var i in data){
				table += "<tr>";
				table += "<td>" + data[i].firstname +"</td>" 
						+ "<td>" + data[i].lastname +"</td>"
						+ "<td>" + data[i].address +"</td>"
						+ "<td>" + data[i].gender +"</td>"; 
				table += "</tr>";
			}
 
	document.getElementById("result").innerHTML = table;		
}