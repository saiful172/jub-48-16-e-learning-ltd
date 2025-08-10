<div class="row">
  <?php 
  date_default_timezone_set("Asia/Dhaka");
 $date=date("Y/m/d");
 
  require_once 'cash-balance-dash.php';  
    require_once 'exp-balance-dash.php';  
  require_once 'bank-balance-dash.php'; 
  
  ?>
  
  <div class="col-xxl-3 col-md-6">
    <div class="card info-card customers-card">

      <div class="filter">
      </div>

      <div class="card-body">
        <h5 class="card-title">Total <span>| Balance</span></h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <a href="javascript:void(0)"><i class="bi bi-menu-down"></i> </a>
          </div>
          <div class="ps-3">
            <h6>
              <?php echo $CashBal + $BankBal; ?> /-
            </h6>
            <span class="text-primary small pt-1 fw-bold d-none"> Last Transaction :
              <?php
              $sql = $con->query("SELECT  current_balance as last_balance FROM account_balance_details where user_id='" . $_SESSION['id'] . "' order by ach_id  limit 1 ");
              $row = $sql->fetch_assoc();
              echo $row['last_balance'];
              ?> / - Taka
            </span>


          </div>
        </div>
      </div>

    </div>
  </div>


</div>