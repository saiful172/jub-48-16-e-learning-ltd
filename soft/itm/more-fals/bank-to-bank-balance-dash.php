  <div class="col-xxl-4 col-md-6">
    <div class="card info-card customers-card">

      <div class="filter">
        <a class="icon" href="add-product" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"><i class="bi bi-plus-circle "></i></a>
        <a class="icon" href="bank-to-bank?edit_id=<?php echo $CashAccId; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Bank To Bank Balance"><i class="bi bi-bank"></i></a>
        <a class="icon" href="product-list"><i class="bi bi-menu-button-wide-fill "></i></a>
      </div>

      <div class="card-body">
        <h5 class="card-title">Bank <span>| Balance</span></h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <a href="javascript:void(0)"><i class="bi bi-bank"></i> </a>
          </div>
          <div class="ps-3">
            <h6>
              <?php
              $sql = $con->query("SELECT sum(`recent_amt`) as bnk_gtotal FROM bank_money where user_id='" . $_SESSION['id'] . "' ");
              $row = $sql->fetch_assoc();
              $BankBal = $row['bnk_gtotal'];
              echo $row['bnk_gtotal'];
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