<aside id="sidebar" class="sidebar">

<?php  
$sql = $con->query("select * from stock_low where user_id ='".$_SESSION['id']."' ");
$row = $sql->fetch_assoc();
$LowQty =$row['low_qty'];
?>
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="home">
          <i class="bi bi-grid"></i>
          <span>Home / Dashboard</span>
        </a>
      </li> 
	
  <li class="nav-item">
        <a class="nav-link collapsed <?= ( $activePage == 'brand-list' || $activePage == 'add-brand' || $activePage == 'edit-brand' || $activePage == 'category-list' || $activePage == 'add-category' || $activePage == 'edit-category' ||  $activePage == 'sub-cat-list' ||  $activePage == 'sub-cat-add'||  $activePage == 'sub-cat-edit') ? 'active' : ''; ?>" data-bs-target="#Brand" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide-fill"></i><span>Brand / Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Brand" class="nav-content collapse <?= ($activePage == 'brand-list' || $activePage == 'add-brand'|| $activePage == 'edit-brand' || $activePage == 'category-list' || $activePage == 'add-category' || $activePage == 'edit-category' ||  $activePage == 'sub-cat-list' ||  $activePage == 'sub-cat-add'||  $activePage == 'sub-cat-edit' ) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
		
		<li><a href="brand-list" class="<?= ($activePage == 'brand-list' || $activePage == 'add-brand' || $activePage == 'edit-brand') ? 'active' : ''; ?>"><i class="bi bi-menu-app-fill"></i><span>Brand </span> </a> </li>
		<li class="d-none"><a href="add-brand" class="<?= ($activePage == 'add-brand') ? 'active' : ''; ?>"><i class="bi bi-menu-app-fill"></i><span>Add New Brand </span> </a> </li>
		<li> <a href="category-list" class="<?= ($activePage == 'category-list' || $activePage == 'add-category' || $activePage == 'edit-category') ? 'active' : ''; ?>"> <i class="bi bi-arrow-return-right"></i><span>Category </span> </a> </li>
		<li class="d-none"> <a href="sub-cat-list" class="<?= ($activePage == 'sub-cat-list' || $activePage == 'sub-cat-add' || $activePage == 'sub-cat-edit') ? 'active' : ''; ?>">   <i class="bi bi-arrow-return-right"></i><span>Sub Category </span> </a> </li> 
		  
        </ul>
      </li>

	  
	  <li class="nav-item">
	     <a class="nav-link collapsed <?= ( $activePage == 'add-product' || $activePage == 'product-list' || $activePage == 'product-details-view' || $activePage == 'edit-product-price' || $activePage == 'product-low-stock' ||  $activePage == 'history-product') ? 'active' : ''; ?>" data-bs-target="#ProductList" data-bs-toggle="collapse" href="#">
         <i class="bi bi-eject-fill"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ProductList" class="nav-content collapse <?= ($activePage == 'add-product' || $activePage == 'product-list'|| $activePage == 'product-details-view' || $activePage == 'edit-product-price' || $activePage == 'product-low-stock' ||  $activePage == 'history-product') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">	 	  
		
          <li> <a href="add-product" class="<?= ($activePage == 'add-product') ? 'active' : ''; ?>"> <i class="bi bi-plus-circle"></i><span>Add New Product </span></a></li>            
          
		  <li><a href="product-list" class="<?= ($activePage == 'product-list' || $activePage == 'product-details-view' || $activePage == 'edit-product-price') ? 'active' : ''; ?>"><i class="bi bi-menu-button-wide-fill"></i><span>Product List / Stock</span></a></li>
		  
		  <li><a target="_blank" href="php_action/Print-Product"><i class="bi bi-file-earmark-fill"></i><span>Print Product List</span></a></li>
		  
		  <li><a href="product-low-stock" class="<?= ($activePage == 'product-low-stock') ? 'active' : ''; ?>"> <span class="text-danger"> <i class="bi bi-menu-button-wide-fill"></i> Low Stock - <?php  echo  $LowQty; ?></span></a></li>
		  
		  <li> <a href="history-product" class="<?= ($activePage == 'history-product') ? 'active' : ''; ?>"> <i class="bi bi-menu-button-wide-fill"></i><span>Product History</span></a></li>
		</ul>
      </li>
	  
	 <li class="nav-item">
        <a class="nav-link collapsed <?= ($activePage == 'supplier-list' || $activePage == 'order-supplier' ||  $activePage == 'order-supplier?o=manord' || $activePage == 'dues-supplier' ||$activePage == 'dues-paid-supplier' || $activePage == 'only-dues-supplier' || $activePage == 'dues-history-supplier') ? 'active' : ''; ?>" data-bs-target="#SupplierList" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Suppliers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="SupplierList" class="nav-content collapse <?= ($activePage == 'supplier-list' || $activePage == 'order-supplier' ||  $activePage == 'order-supplier?o=manord' || $activePage == 'dues-supplier' ||$activePage == 'dues-paid-supplier' || $activePage == 'only-dues-supplier' || $activePage == 'dues-history-supplier') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
           
		    <li><a href="supplier-list" class="<?= ($activePage == 'supplier-list') ? 'active' : ''; ?>"> <i class="bi bi-people"></i><span>Supplier List</span>  </a></li>			
		    <li><a href="order-supplier?o=add" class="<?= ($activePage == 'order-supplier') ? 'active' : ''; ?>"> <i class="bi bi-cart"></i><span>Buy New Product</span>  </a></li>			
		    <li><a href="order-supplier?o=manord" class="<?= ($activePage == 'order-supplier') ? 'active' : ''; ?>"> <i class="bi bi-menu-button-wide-fill"></i><span>View Product</span>  </a></li>			
			<li class="d-none"><a href="dues-supplier" class="<?= ($activePage == 'dues-supplier') ? 'active' : ''; ?>"> <i class="bi bi-person-lines-fill"></i><span>Dues List</span>  </a></li>
		    <li class="d-none"><a href="dues-paid-supplier" class="<?= ($activePage == 'dues-paid-supplier') ? 'active' : ''; ?>"> <i class="bi bi-person-check-fill"></i><span>Pay Supplier Dues </span>  </a></li>
		    
		    <li><a href="only-dues-supplier" class="<?= ($activePage == 'only-dues-supplier') ? 'active' : ''; ?>"> <i class="bi bi-person-dash-fill"></i><span>Dues List </span>  </a></li>
		    <li><a href="dues-history-supplier" class="<?= ($activePage == 'dues-history-supplier') ? 'active' : ''; ?>"> <i class="bi bi-receipt-cutoff"></i><span>Dues History</span>  </a></li>
		    <li class="d-none"><a target="_blank" href="Dues-Report-All"> <i class="bi bi-file-earmark-fill"></i><span>Dues Report</span>  </a></li>
        </ul>
      </li>

	  <li class="nav-item">
        <a class="nav-link collapsed <?= ($activePage == 'add-customer' || $activePage == 'customer-list' ||  $activePage == 'customer-dues' || $activePage == 'customer-dues-paid' || $activePage == 'customer-only-dues' || $activePage == 'customer-dues-history') ? 'active' : ''; ?>" data-bs-target="#clients-list-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Customer</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="clients-list-nav" class="nav-content collapse <?= ($activePage == 'add-customer' || $activePage == 'customer-list' ||  $activePage == 'customer-dues' || $activePage == 'customer-dues-paid' || $activePage == 'customer-only-dues' || $activePage == 'customer-dues-history') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
            <li><a href="add-customer" class="<?= ($activePage == 'add-customer') ? 'active' : ''; ?>">  <i class="bi bi-person-plus-fill"></i><span>Add New </span> </a> </li>
		    <li><a href="customer-list" class="<?= ($activePage == 'customer-list') ? 'active' : ''; ?>"> <i class="bi bi-people"></i><span>Customer List</span>  </a></li>
		    <li class="d-none"><a href="customer-dues-paid" class="<?= ($activePage == 'customer-dues-paid') ? 'active' : ''; ?>"> <i class="bi bi-person-check-fill"></i><span>Pay Dues </span>  </a></li>
		    <li class="d-none"><a href="customer-dues" class="<?= ($activePage == 'customer-dues') ? 'active' : ''; ?>"> <i class="bi bi-person-lines-fill"></i><span>Dues List</span>  </a></li>
		    <li><a href="customer-only-dues" class="<?= ($activePage == 'customer-only-dues') ? 'active' : ''; ?>"> <i class="bi bi-person-dash-fill"></i><span>Dues List </span>  </a></li>
		    <li><a href="customer-dues-history" class="<?= ($activePage == 'customer-dues-history') ? 'active' : ''; ?>"> <i class="bi bi-receipt-cutoff"></i><span>Dues History</span>  </a></li>
		    <li class="d-none"><a target="_blank" href="Dues-Report-All"> <i class="bi bi-file-earmark-fill"></i><span>Dues Report</span>  </a></li>
        </ul>
      </li>
	   
	  
	  <li class="nav-item">
	    <a class="nav-link collapsed <?= ( $activePage == 'orders-retail' || $activePage == 'orders') ? 'active' : ''; ?>" data-bs-target="#ClientsOrder" data-bs-toggle="collapse" href="#">
        <i class="bi bi-cart-fill"></i><span>Sales</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ClientsOrder" class="nav-content collapse <?= ( $activePage == 'orders-retail' || $activePage == 'orders') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">        
		
		<li> <a href="orders-retail?o=add"> <i class="bi bi-plus-circle"></i><span>New Sales </span> </a>  </li>
		<li> <a href="orders-retail?o=manord"> <i class="bi bi-file-earmark-ruled-fill"></i><span>Sales List </span> </a>  </li>
		
		<li> <a href="orders?o=add"> <i class="bi bi-plus-circle"></i><span>New Sales - Wholesale </span> </a>  </li>
        <li> <a href="orders?o=manord"> <i class="bi bi-file-earmark-ruled-fill"></i><span>Sales List - Wholesale </span> </a>  </li>
		
        </ul>
      </li>
	  
	  
	  
	  <li class="nav-item <?php echo $Marketing; ?>">
	   <a class="nav-link collapsed <?= ( $activePage == 'lead-category' || $activePage == 'lead-category-add' || $activePage == 'lead-category-edit' || $activePage == 'lead-list' || $activePage == 'lead-list-add' || $activePage == 'lead-list-edit' || $activePage == 'lead-only-view' || $activePage == 'lead-report' || $activePage == 'followup' || $activePage == 'followup-add' || $activePage == 'followup-edit' || $activePage == 'follow-up-day-wise-report') ? 'active' : ''; ?>" data-bs-target="#ExpSec" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-spreadsheet-fill"></i><span> Marketing</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ExpSec" class="nav-content collapse <?= ( $activePage == 'exp-name-list' || $activePage == 'lead-list' || $activePage == 'lead-list-add' || $activePage == 'lead-list-edit' || $activePage == 'lead-only-view' || $activePage == 'lead-report' || $activePage == 'followup' || $activePage == 'followup-add' || $activePage == 'followup-edit' || $activePage == 'follow-up-day-wise-report') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
         
		  <li> <a href="lead-category" class="<?= ($activePage == 'lead-category' || $activePage == 'lead-category-add' || $activePage == 'lead-category-edit') ? 'active' : ''; ?>"> <i class="bi bi-file-spreadsheet-fill"></i><span> Lead Category </span> </a>  </li>
          <li> <a href="lead-list" class="<?= ($activePage == 'lead-list' || $activePage == 'lead-list-add' || $activePage == 'lead-list-edit' || $activePage == 'lead-only-view') ? 'active' : ''; ?>"> <i class="bi bi-house-fill"></i><span> Lead List </span> </a> </li>
          <li> <a href="other-exp-list" class="<?= ($activePage == 'other-exp-list') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Lead Full View </span> </a> </li>
          <li> <a href="lead-report" class="<?= ($activePage == 'lead-report') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Lead Report </span> </a> </li>
          <li> <a href="followup" class="<?= ($activePage == 'followup' || $activePage == 'followup-edit') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Follow Up List </span> </a> </li>
          <li> <a href="followup-add" class="<?= ($activePage == 'followup-add') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> New Follow Up </span> </a> </li>
          <li> <a href="follow-up-day-wise-report" class="<?= ($activePage == 'follow-up-day-wise-report') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Follow Up Report By Date</span> </a> </li>
		  
        </ul>
      </li>
	  
	   <li class="nav-item <?php echo $Bnk; ?>">
	   <a class="nav-link collapsed <?= ( $activePage == 'bank-list' || $activePage == 'bank-list-add' || $activePage == 'bank-list-edit' || $activePage == 'bank-account' || $activePage == 'bank-account-add' || $activePage == 'bank-account-edit' || $activePage == 'bank-deposit' || $activePage == 'bank-withdraw' || $activePage == 'bank-trans-details' || $activePage == 'bank-report-date-wise' || $activePage == 'single-bank-report' || $activePage == 'single-bank-by-date') ? 'active' : ''; ?>" data-bs-target="#Banking" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-spreadsheet-fill"></i><span> Banking</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Banking" class="nav-content collapse <?= ( $activePage == 'bank-list' || $activePage == 'bank-list-add' || $activePage == 'bank-list-edit'  || $activePage == 'bank-account' || $activePage == 'bank-account-add' || $activePage == 'bank-account-edit' || $activePage == 'bank-deposit' || $activePage == 'bank-withdraw' || $activePage == 'bank-trans-details' || $activePage == 'bank-report-date-wise'|| $activePage == 'single-bank-report' || $activePage == 'single-bank-by-date') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
         
		  <li> <a href="bank-list" class="<?= ($activePage == 'bank-list' || $activePage == 'bank-list-add' || $activePage == 'bank-list-edit') ? 'active' : ''; ?>"> <i class="bi bi-file-spreadsheet-fill"></i><span> Bank List </span> </a>  </li>
          <li> <a href="bank-account" class="<?= ($activePage == 'bank-account' || $activePage == 'bank-account-add' || $activePage == 'bank-account-edit') ? 'active' : ''; ?>"> <i class="bi bi-house-fill"></i><span> Account </span> </a> </li>
          <li> <a href="bank-deposit" class="<?= ($activePage == 'bank-deposit') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Deposit  </span> </a> </li>
          <li> <a href="bank-withdraw" class="<?= ($activePage == 'bank-withdraw') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Withdraw </span> </a> </li>
          <li> <a href="bank-trans-details" class="<?= ($activePage == 'bank-trans-details') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Transaction History </span> </a> </li>
          <li> <a href="bank-report-date-wise" class="<?= ($activePage == 'bank-report-date-wise') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Report - All </span> </a> </li>
          <li> <a href="single-bank-by-date" class="<?= ($activePage == 'single-bank-by-date') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Report - Single</span> </a> </li>
		  
        </ul>
      </li>
	  
	   <li class="nav-item <?php echo $Exp; ?>" >
	   <a class="nav-link collapsed <?= ( $activePage == 'exp-name-list' || $activePage == 'office-exp-list' || $activePage == 'other-exp-list') ? 'active' : ''; ?>" data-bs-target="#ExpSec" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-spreadsheet-fill"></i><span>Expenses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ExpSec" class="nav-content collapse <?= ( $activePage == 'exp-name-list' || $activePage == 'office-exp-list' || $activePage == 'other-exp-list') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
         
		  <li> <a href="exp-name-list" class="<?= ($activePage == 'exp-name-list') ? 'active' : ''; ?>"> <i class="bi bi-file-spreadsheet-fill"></i><span> Category </span> </a>  </li>
          <li> <a href="office-exp-list" class="<?= ($activePage == 'office-exp-list') ? 'active' : ''; ?>"> <i class="bi bi-house-fill"></i><span>Office Expenses </span> </a> </li>
          <li> <a href="other-exp-list" class="<?= ($activePage == 'other-exp-list') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span>Other Expenses </span> </a> </li>
		  
        </ul>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link collapsed <?= ($activePage == 'sales-report-by-date-short' || $activePage == 'daily-cash-report' || $activePage == 'daily-report-by-date' ||  $activePage == 'CollReportDetails' || $activePage == 'customer-statement' || $activePage == 'customer-statement-by-date' || $activePage == 'item-wise-buy-sale' || $activePage == 'profit-report' || $activePage == 'prft-report-by-date' ) ? 'active' : ''; ?>" data-bs-target="#ReportSec" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-text-fill"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
		
        <ul id="ReportSec" class="nav-content collapse <?= ($activePage == 'sales-report-by-date-short' || $activePage == 'daily-report-by-date' || $activePage == 'daily-cash-report' ||  $activePage == 'CollReportDetails' ||  $activePage == 'customer-statement' ||  $activePage == 'customer-statement-by-date' || $activePage == 'item-wise-buy-sale' || $activePage == 'profit-report' || $activePage == 'prft-report-by-date' ) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
          
		  <li> <a href="daily-cash-report" class="<?= ($activePage == 'daily-cash-report') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Daily Cash Report </span>  </a> </li>
		  <li> <a href="daily-report-by-date" class="<?= ($activePage == 'daily-report-by-date') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Cash Report - Date Wise  </span>  </a> </li>
          <li> <a href="CollReportDetails" class="<?= ($activePage == 'CollReportDetails') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Sales & Collection Report </span>  </a> </li>
          <li> <a href="customer-statement" class="<?= ($activePage == 'customer-statement') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Customer Statement </span>  </a> </li> 
          <li> <a href="customer-statement-by-date" class="<?= ($activePage == 'customer-statement-by-date') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Customer Statement - Date</span>  </a> </li> 
		  
		  <li> <a href="item-wise-buy-sale" class="<?= ($activePage == 'item-wise-buy-sale') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Item Wise - Buy / Sale </span>  </a> </li>
		  <li> <a href="profit-report" class="<?= ($activePage == 'profit-report') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Profit Report</span>  </a> </li>
		  <li> <a href="prft-report-by-date" class="<?= ($activePage == 'prft-report-by-date') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Profit Report - By Date</span>  </a> </li>
		
        </ul>
      </li>
	  
	<li class="nav-item <?php echo $Task; ?>">
        <a class="nav-link collapsed <?= ( $activePage == 'task-new' || $activePage == 'task-list' || $activePage == 'task-remind') ? 'active' : ''; ?>" data-bs-target="#TaskSec" data-bs-toggle="collapse" href="#">
          <i class="bi bi-pencil-square"></i><span>Daily Task / Notes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="TaskSec" class="nav-content collapse <?= ( $activePage == 'task-new' || $activePage == 'task-list' || $activePage == 'task-remind') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
          
		  <li> <a href="task-new" class="<?= ($activePage == 'task-new') ? 'active' : ''; ?>">  <i class="bi bi-stickies-fill"></i><span>Add New</span>  </a> </li>
          <li> <a href="task-list" class="<?= ($activePage == 'task-list') ? 'active' : ''; ?>"> <i class="bi bi-stack"></i><span>Task / Notes List</span> </a> </li>
          <li> <a href="task-remind" class="<?= ($activePage == 'task-remind') ? 'active' : ''; ?>"> <i class="bi bi-alarm"></i><span>Reminder List</span> </a> </li>
		</ul>
      </li>    
	  
	  	 
  <li class="nav-item <?php echo $Quot; ?>">
        <a class="nav-link collapsed <?= ( $activePage == 'orders-quot' || $activePage == 'orders-quot?o=manord') ? 'active' : ''; ?>" data-bs-target="#QuotSec" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-earmark-ruled-fill"></i><span>Quotation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="QuotSec" class="nav-content collapse <?= ( $activePage == 'orders-quot' || $activePage == 'orders-quot?o=manord') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="orders-quot?o=add" class="<?= ($activePage == 'orders-quot') ? 'active' : ''; ?>">
              <i class="bi bi-file-earmark-plus-fill"></i><span>New Quotation </span>
            </a>
          </li>
          <li>
            <a href="orders-quot?o=manord" class="<?= ($activePage == 'orders-quot') ? 'active' : ''; ?>">
              <i class="bi bi-file-earmark-ruled-fill"></i><span>Quotation List</span>
            </a>
          </li>
        </ul>
      </li>
	  
	 <li class="nav-item <?php echo $HrAcc; ?>">
        <a class="nav-link collapsed <?= ($activePage == 'emp-list' || $activePage == 'emp-salary-list' || $activePage == 'emp-salary-create' ||  $activePage == 'pay-emp-salary'||  $activePage == 'emp-salary-history' ||  $activePage == 'salary-advance'||  $activePage == 'pay-salary-adv'||  $activePage == 'emp-report-by-date') ? 'active' : ''; ?>" data-bs-target="#HrAcc" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bank"></i><span>HR / ACC</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="HrAcc" class="nav-content collapse <?= ( $activePage == 'emp-list' ||$activePage == 'emp-salary-list' || $activePage == 'emp-salary-create' ||  $activePage == 'pay-emp-salary' || $activePage == 'emp-salary-history' ||  $activePage == 'salary-advance'||  $activePage == 'pay-salary-adv' ||  $activePage == 'emp-report-by-date') ? 'show' : ''; ?>" data-bs-parent="#HrAcc">
         
		  <li> <a href="emp-list" class="<?= ($activePage == 'emp-list') ? 'active' : ''; ?>"> <i class="bi bi-people"></i><span> Employees </span> </a>  </li>
          <li> <a href="emp-salary-list" class="<?= ($activePage == 'emp-salary-list') ? 'active' : ''; ?>"> <i class="bi bi-cash"></i><span>Salary </span> </a> </li>
          <li class="d-none" > <a href="emp-salary-create" class="<?= ($activePage == 'emp-salary-create') ? 'active' : ''; ?>"> <i class="bi bi-cash"></i><span>Create Salary </span> </a> </li>
          <li class="d-none" > <a href="pay-emp-salary" class="<?= ($activePage == 'pay-emp-salary') ? 'active' : ''; ?>"> <i class="bi bi-cash"></i><span>Pay Salary </span> </a> </li>
          <li> <a href="salary-advance" class="<?= ($activePage == 'salary-advance') ? 'active' : ''; ?>"> <i class="bi bi-circle-square"></i><span>Advance Salary </span> </a> </li>
          <li class="d-none" > <a href="pay-salary-adv" class="<?= ($activePage == 'pay-salary-adv') ? 'active' : ''; ?>"> <i class="bi bi-filter-square"></i><span>Pay Advance Salary </span> </a> </li>
		  <li>  <a href="emp-salary-history" class="<?= ($activePage == 'emp-salary-history') ? 'active' : ''; ?>"> <i class="bi bi-distribute-vertical"></i><span>Salary History</span> </a> </li>
 <li>  <a href=""> <span>Reports</span> </a> </li>		
		<li>  <a target="_blank"  href="emp-all-report" class="<?= ($activePage == 'emp-all-report') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i> <span>All Employee Report</span> </a> </li>
		<li>  <a href="emp-report-by-date" class="<?= ($activePage == 'emp-report-by-date') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i> <span>Employee Report By Date</span> </a> </li>
		<li>  <a href="emp-salary-rpt-by-monthly" class="<?= ($activePage == 'emp-salary-rpt-by-monthly') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i> <span> Salary Report - Monthly</span> </a> </li>
		<li>  <a href="EmpSalSingleReport" class="<?= ($activePage == 'EmpSalSingleReport') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i> <span> Salary Report - Single</span> </a> </li>
		 
            
		</ul>
      </li>
	   
	   
	   <li class="nav-heading">Settings Panel</li> 
	  
	  <li class="nav-item">
        <a class="nav-link collapsed <?= ( $activePage == 'invoice-comments' || $activePage == 'invoice-color' || $activePage == 'paym-type' || $activePage == 'paym-status' || $activePage == 'delivery-status' || $activePage == 'courier-service') ? 'active' : ''; ?>" data-bs-target="#SettingSec" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear-fill"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="SettingSec" class="nav-content collapse <?= ( $activePage == 'invoice-comments' || $activePage == 'invoice-color' || $activePage == 'paym-type' || $activePage == 'paym-status' || $activePage == 'delivery-status' || $activePage == 'courier-service') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
         
		<li> <a href="invoice-comments"  class="<?= ($activePage == 'invoice-comments') ? 'active' : ''; ?>"> <i class="bi bi-chat-dots-fill"></i><span>Invoice Comments</span> </a> </li>		
		<li> <a href="invoice-color" class="<?= ($activePage == 'invoice-color') ? 'active' : ''; ?>"> <i class="bi bi-brush-fill"></i><span>Invoice Color</span> </a> </li>		
		<li> <a href="paym-type" class="<?= ($activePage == 'paym-type') ? 'active' : ''; ?>"> <i class="bi bi-cash"></i><span>Payment Type</span> </a> </li>		
		<li> <a href="paym-status" class="<?= ($activePage == 'paym-status') ? 'active' : ''; ?>"> <i class="bi bi-cash-stack"></i><span>Payment Status</span> </a> </li>		
		<li> <a href="delivery-status" class="<?= ($activePage == 'delivery-status') ? 'active' : ''; ?>"> <i class="bi bi-telegram"></i><span>Delivery Status</span> </a> </li>		
		<li> <a href="courier-service" class="<?= ($activePage == 'courier-service') ? 'active' : ''; ?>"> <i class="bi bi-truck"></i><span>Courier Services</span> </a> </li>		
		  
        </ul>
      </li>
	  

     

      <li class="nav-item">
        <a class="nav-link collapsed <?= ($activePage == 'users-profile') ? 'active' : ''; ?>" href="users-profile">
          <i class="bi bi-person"></i>
          <span>Profile Settings</span>
        </a>
      </li> 

    <li class="nav-item mt-5 text-center d-none" >
         <img class="opacity-25" src="../includes/itm.png" width="70%">
      </li>
     

    </ul>

  </aside> 
