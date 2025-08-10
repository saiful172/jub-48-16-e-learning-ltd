<aside id="sidebar" class="sidebar">

  <?php
  $sql = $con->query("select * from stock_low where user_id ='" . $_SESSION['id'] . "' ");
  $row = $sql->fetch_assoc();
  $LowQty = $row['low_qty'];
  ?>
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed <?= ($activePage == 'home') ? 'active' : ''; ?>" href="home">
        <i class="bi bi-grid"></i>
        <span>Home / Dashboard</span>
      </a>
    </li>
  
    <li class="nav-item <?php echo $Exp; ?>">
      <a class="nav-link collapsed <?= ($activePage == 'company-group') || ($activePage == 'company-group-add') || ($activePage == 'company-group-edit') || ($activePage == 'project') || ($activePage == 'project-add') || ($activePage == 'project-edit') || ($activePage == 'expense-category') || ($activePage == 'expense-category-add') || ($activePage == 'expense-category-edit')  ? 'active' : ''; ?>" data-bs-target="#ExpSec" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-spreadsheet-fill"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="ExpSec" class="nav-content collapse <?= ($activePage == 'company-group') || ($activePage == 'company-group-add') || ($activePage == 'company-group-edit') || ($activePage == 'project') || ($activePage == 'project-add') || ($activePage == 'project-edit') || ($activePage == 'expense-category') || ($activePage == 'expense-category-add') || ($activePage == 'expense-category-edit')  ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">

        <li>
          <a class="<?= ($activePage == 'company-group') || ($activePage == 'company-group-add') || ($activePage == 'company-group-edit') ? 'active' : ''; ?>" href="company-group">
            <i class="bi bi-collection"></i><span>Company Group</span>
          </a>
        </li>

        <li>
          <a class="<?= ($activePage == 'project') || ($activePage == 'project-add') || ($activePage == 'project-edit') ? 'active' : ''; ?>" href="project">
            <i class="bi bi-person-lines-fill"></i><span>Project</span>
          </a>
        </li>

        <li>
          <a class="<?= ($activePage == 'expense-category') || ($activePage == 'expense-category-add') || ($activePage == 'expense-category-edit') ? 'active' : ''; ?>" href="expense-category">
            <i class="bi bi-bookmark-check"></i><span>Expenses Category</span>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed <?= ($activePage == 'expenses') || ($activePage == 'balance') || ($activePage == 'cash-balance') || ($activePage == 'cash-balance-add') || ($activePage == 'cash-balance-edit') || ($activePage == 'bank-balance') || ($activePage == 'bank-balance-add') || ($activePage == 'bank-balance-edit') || ($activePage == 'bank-to-cash') || ($activePage == 'bank-to-bank') || ($activePage == 'bank-to-bank-balance') || ($activePage == 'bank-to-bank-balance-add') || ($activePage == 'bank-to-bank-balance-edit') ? 'active' : ''; ?>" data-bs-target="#BalanceSec" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-text-fill"></i><span>Balance</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>

      <ul id="BalanceSec" class="nav-content collapse <?= ($activePage == 'expenses') || ($activePage == 'balance') || ($activePage == 'cash-balance') || ($activePage == 'cash-balance-add') || ($activePage == 'cash-balance-edit') || ($activePage == 'bank-balance') || ($activePage == 'bank-balance-add') || ($activePage == 'bank-balance-edit') || ($activePage == 'bank-to-cash') || ($activePage == 'bank-to-bank') || ($activePage == 'bank-to-bank-balance') || ($activePage == 'bank-to-bank-balance-add') || ($activePage == 'bank-to-bank-balance-edit') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li> <a href="balance" class="<?= ($activePage == 'balance') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Main Balance </span> </a> </li>
        <li> <a href="cash-balance" class="<?= ($activePage == 'cash-balance') || ($activePage == 'cash-balance-add') || ($activePage == 'cash-balance-edit') || ($activePage == 'bank-to-cash') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Cash </span> </a> </li>
        <li> <a href="bank-balance" class="<?= ($activePage == 'bank-balance') || ($activePage == 'bank-balance-add') || ($activePage == 'bank-balance-edit') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Bank </span> </a> </li>
        <li> <a href="bank-to-bank-balance" class="<?= ($activePage == 'bank-to-bank') || ($activePage == 'bank-to-bank-balance') || ($activePage == 'bank-to-bank-balance-add') || ($activePage == 'bank-to-bank-balance-edit') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Bank To Bank </span> </a> </li>
        <li> <a href="expenses" class="<?= ($activePage == 'expenses') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Expenses </span> </a> </li>
        
	  </ul>
    </li>

    <li class="nav-item <?php echo $Bnk; ?>">
      <a class="nav-link collapsed <?= ($activePage == 'bank-list' || $activePage == 'bank-list-add' || $activePage == 'bank-list-edit' || $activePage == 'bank-account' || $activePage == 'bank-account-add' || $activePage == 'bank-account-edit' || $activePage == 'bank-deposit' || $activePage == 'bank-withdraw' || $activePage == 'bank-trans-details' || $activePage == 'bank-report-date-wise' || $activePage == 'single-bank-report' || $activePage == 'single-bank-by-date') ? 'active' : ''; ?>" data-bs-target="#Banking" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-spreadsheet-fill"></i><span> Banking</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Banking" class="nav-content collapse <?= ($activePage == 'bank-list' || $activePage == 'bank-list-add' || $activePage == 'bank-list-edit'  || $activePage == 'bank-account' || $activePage == 'bank-account-add' || $activePage == 'bank-account-edit' || $activePage == 'bank-deposit' || $activePage == 'bank-withdraw' || $activePage == 'bank-trans-details' || $activePage == 'bank-report-date-wise' || $activePage == 'single-bank-report' || $activePage == 'single-bank-by-date') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">

        <li> <a href="bank-list" class="<?= ($activePage == 'bank-list' || $activePage == 'bank-list-add' || $activePage == 'bank-list-edit') ? 'active' : ''; ?>"> <i class="bi bi-file-spreadsheet-fill"></i><span> Bank List </span> </a> </li>
        <li> <a href="bank-account" class="<?= ($activePage == 'bank-account' || $activePage == 'bank-account-add' || $activePage == 'bank-account-edit') ? 'active' : ''; ?>"> <i class="bi bi-house-fill"></i><span> Account </span> </a> </li>
        <li> <a href="bank-deposit" class="<?= ($activePage == 'bank-deposit') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Deposit </span> </a> </li>
        <li> <a href="bank-withdraw" class="<?= ($activePage == 'bank-withdraw') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Withdraw </span> </a> </li>
        <li> <a href="bank-trans-details" class="<?= ($activePage == 'bank-trans-details') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Transaction History </span> </a> </li>
        <li> <a href="bank-report-date-wise" class="<?= ($activePage == 'bank-report-date-wise') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Report - All </span> </a> </li>
        <li> <a href="single-bank-by-date" class="<?= ($activePage == 'single-bank-by-date') ? 'active' : ''; ?>"> <i class="bi bi-filter-square-fill"></i><span> Report - Single</span> </a> </li>

      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed <?= ($activePage == 'balance-history') || ($activePage == 'balance-history-add') || ($activePage == 'balance-history-edit') ? 'active' : ''; ?>" href="balance-history">
        <i class="bi bi-bookmark-check"></i><span>Balance History</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed <?= ($activePage == 'sales-report-by-date-short' || $activePage == 'daily-cash-report' || $activePage == 'daily-report-by-date' ||  $activePage == 'CollReportDetails' || $activePage == 'customer-statement' || $activePage == 'customer-statement-by-date' || $activePage == 'company-statement-by-date' || $activePage == 'item-wise-buy-sale' || $activePage == 'profit-report' || $activePage == 'prft-report-by-date') ? 'active' : ''; ?>" data-bs-target="#ReportSec" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-text-fill"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>

      <ul id="ReportSec" class="nav-content collapse <?= ($activePage == 'sales-report-by-date-short' || $activePage == 'daily-report-by-date' || $activePage == 'daily-cash-report' ||  $activePage == 'CollReportDetails' ||  $activePage == 'customer-statement' ||  $activePage == 'customer-statement-by-date' || $activePage == 'company-statement-by-date' || $activePage == 'item-wise-buy-sale' || $activePage == 'profit-report' || $activePage == 'prft-report-by-date') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">

        <li> <a href="daily-cash-report" class="<?= ($activePage == 'daily-cash-report') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Daily Cash Report </span> </a> </li>
        <li> <a href="daily-report-by-date" class="<?= ($activePage == 'daily-report-by-date') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Cash Report - Date Wise </span> </a> </li>
        <li> <a href="CollReportDetails" class="<?= ($activePage == 'CollReportDetails') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Sales & Collection Report </span> </a> </li>
        <li> <a href="customer-statement" class="<?= ($activePage == 'customer-statement') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Customer Statement </span> </a> </li>
        <li> <a href="customer-statement-by-date" class="<?= ($activePage == 'customer-statement-by-date') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Customer Statement - Date</span> </a> </li>
        <li> <a href="company-statement-by-date" class="<?= ($activePage == 'company-statement-by-date') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Company Statement - Date</span> </a> </li>

        <li> <a href="item-wise-buy-sale" class="<?= ($activePage == 'item-wise-buy-sale') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Item Wise - Buy / Sale </span> </a> </li>
        <li> <a href="profit-report" class="<?= ($activePage == 'profit-report') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Profit Report</span> </a> </li>
        <li> <a href="prft-report-by-date" class="<?= ($activePage == 'prft-report-by-date') ? 'active' : ''; ?>"> <i class="bi bi-file-text-fill"></i><span>Profit Report - By Date</span> </a> </li>

      </ul>
    </li>


   <li class="nav-heading">Settings Panel</li>

    <li class="nav-item d-none">
      <a class="nav-link collapsed <?= ($activePage == 'invoice-comments' || $activePage == 'invoice-color' || $activePage == 'paym-type' || $activePage == 'paym-status' || $activePage == 'delivery-status' || $activePage == 'courier-service') ? 'active' : ''; ?>" data-bs-target="#SettingSec" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear-fill"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="SettingSec" class="nav-content collapse <?= ($activePage == 'invoice-comments' || $activePage == 'invoice-color' || $activePage == 'paym-type' || $activePage == 'paym-status' || $activePage == 'delivery-status' || $activePage == 'courier-service') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">

        <li> <a href="invoice-comments" class="<?= ($activePage == 'invoice-comments') ? 'active' : ''; ?>"> <i class="bi bi-chat-dots-fill"></i><span>Invoice Comments</span> </a> </li>
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

    <li class="nav-item mt-5 text-center d-none">
      <img class="opacity-25" src="../includes/itm.png" width="70%">
    </li>


  </ul>

</aside>