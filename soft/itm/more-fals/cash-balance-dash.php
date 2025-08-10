  <div class="col-xxl-3 col-md-6">
    <div class="card info-card sales-card">

      <div class="filter">
        <?php
        $sql = $con->query("SELECT ac_id  FROM account_balance where user_id='" . $_SESSION['id'] . "' ");
        $row = $sql->fetch_assoc();
        $CashAccId = $row['ac_id'];
        ?>
        <a class="icon" href="cash-balance-edit?edit_id=<?php echo $CashAccId; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Cash Money Add"><i class="bi bi-plus-circle"></i></a>
        <a class="icon" href="bank-to-cash?edit_id=<?php echo $CashAccId; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Bank To Cash"><i class="bi bi-bank"></i></a>
        <a class="icon" href="balance-history"><i class="bi bi-menu-button-wide-fill "></i></a>
      </div>

      <div class="card-body">
        <h5 class="card-title">Cash <span>| Balance</span></h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <a href="javascript:void(0)"><i class="bi bi-cash"></i> </a>
          </div>
          <div class="ps-3">
            <h6>
              <?php
              $sql = $con->query("SELECT sum(`current_balance`) as cash_gtotal FROM account_balance where user_id='" . $_SESSION['id'] . "' ");
              $row = $sql->fetch_assoc();
              $CashBal = $row['cash_gtotal'];
              echo $row['cash_gtotal'];
              ?> /-
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