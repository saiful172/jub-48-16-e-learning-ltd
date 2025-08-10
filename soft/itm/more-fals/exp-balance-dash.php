  <div class="col-xxl-3 col-md-6">
    <div class="card info-card sales-card">

      <div class="filter">
        <?php
        $sql = $con->query("SELECT ac_id  FROM account_balance where user_id='" . $_SESSION['id'] . "' ");
        $row = $sql->fetch_assoc();
        $CashAccId = $row['ac_id'];
        ?>
        <a class="icon" href="expenses-balance-edit?edit_id=<?php echo $CashAccId; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="New Expenses"><i class="bi bi-plus-circle "></i></a>
        <a class="icon" href="expenses" data-bs-toggle="tooltip" data-bs-placement="top" title="Expense List"><i class="bi bi-menu-button-wide-fill" ></i></a>
      </div>

      <div class="card-body">
        <h5 class="card-title">Expense <span> | Today</span></h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <a href="javascript:void(0)"><i class="bi bi-cash"></i> </a>
          </div>
          <div class="ps-3">
            <h6>
              <?php
              $sql = $con->query("SELECT sum(`expense`) as cash_gtotal FROM expense where last_update='$date' and user_id='" . $_SESSION['id'] . "' ");
              $row = $sql->fetch_assoc();
             // $CashBal = $row['cash_gtotal'];
              echo $row['cash_gtotal'];
              ?> /-
            </h6>

            <span class="text-primary small pt-1 fw-bold d-none"> Last Transaction :
             0 / - Taka
            </span>


          </div>
        </div>
      </div>

    </div>
  </div>