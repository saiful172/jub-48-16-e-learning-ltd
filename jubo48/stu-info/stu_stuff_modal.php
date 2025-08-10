<!-- Modal -->
<div class="modal fade" id="adddealer" tabindex="-1" aria-labelledby="addDealerLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title w-100 text-center">Add New Student User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="addStudentForm" class="needs-validation" novalidate method="POST" action="add_stu_user.php">
        <div class="modal-body">
          <div class="container-fluid">

            <!-- District -->
            <div class="mb-3 input-group">
              <span class="input-group-text" style="width:120px;">Select District:</span>
              <select class="form-select" name="DistrictId" required>
                <?php
                $sql = "SELECT id, dist_name FROM district WHERE user_id='" . $_SESSION['id'] . "'";
                $result = $con->query($sql);
                while ($row = $result->fetch_array()) {
                  echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
                }
                ?>
              </select>
            </div>

            <!-- Batch -->
            <div class="mb-3 input-group">
              <span class="input-group-text" style="width:120px;">Select Batch:</span>
              <select class="form-select" name="BatchId" required>
                <?php
                $sql = "SELECT * FROM batch_list";
                $result = $con->query($sql);
                while ($row = $result->fetch_array()) {
                  echo "<option value='" . $row['batch_id'] . "'>" . $row['batch_name'] . "</option>";
                }
                ?>
              </select>
            </div>

            <!-- Group -->
            <div class="mb-3 input-group">
              <span class="input-group-text" style="width:120px;">Select Group:</span>
              <select class="form-control" name="GroupId" required>
                <option value="">Select Group</option>
                <?php
                $sql = "SELECT * FROM group_list";
                $result = $con->query($sql);
                while ($row = $result->fetch_array()) {
                  echo "<option value='" . $row['group_id'] . "'>" . $row['group_name'] . "</option>";
                }
                ?>
              </select>
            </div>

            <!-- Student Name -->
            <div class="mb-3 input-group">
              <span class="input-group-text" style="width:120px;">Student Name:</span>
              <input type="text" class="form-control" placeholder="Enter Student Name" name="StuName" required>
            </div>

            <!-- Phone -->
            <div class="mb-3 input-group">
              <span class="input-group-text" style="width:120px;">Phone No:</span>
              <input type="tel" class="form-control" name="Contact" id="contactInput"
                placeholder="Enter Phone" required pattern="01[0-9]{9}">
              <div class="invalid-feedback">
                Please enter a valid 11-digit phone number starting with 01.
              </div>
            </div>

            <!-- Hidden Username -->
            <div class="mb-3 input-group d-none">
              <span class="input-group-text" style="width:120px;">Username:</span>
              <input type="text" class="form-control" name="UserName" value="none">
            </div>

            <!-- Email -->
            <div class="mb-3 input-group">
              <span class="input-group-text" style="width:120px;">User Email:</span>
              <input type="email" class="form-control" name="Email" placeholder="Enter Email"
                value="<?= $_SESSION['old_input']['Email'] ?? '' ?>" required>
            </div>
            <?php if (isset($_SESSION['add_error'])): ?>
              <div class="text-danger small ms-2 mb-2"><?= $_SESSION['add_error'] ?></div>
            <?php endif; ?>

            <!-- Password -->
            <div class="mb-3 input-group">
              <span class="input-group-text" style="width:120px;">Password:</span>
              <input type="password" class="form-control" name="Password" id="passwordInput" placeholder="Enter Password" required>
              <span class="input-group-text" onclick="togglePassword()" style="cursor:pointer;">
                <i class="fa fa-eye" id="eyeIcon"></i>
              </span>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Script to reset form on modal close -->
<script>
  const addStudentModal = document.getElementById('adddealer');
  addStudentModal.addEventListener('hidden.bs.modal', function() {
    document.getElementById('addStudentForm').reset();
  });
</script>

<!-- Show Modal If Error -->
<?php if (!empty($_SESSION['add_error'])): ?>
  <script>
    const modal = new bootstrap.Modal(document.getElementById('adddealer'));
    modal.show();
  </script>
  <?php unset($_SESSION['add_error'], $_SESSION['old_input']); ?>
<?php endif; ?>

<!-- Show Success Alert -->
<?php if (!empty($_SESSION['add_success'])): ?>
  <script>
    alert("<?= $_SESSION['add_success'] ?>");
  </script>
  <?php unset($_SESSION['add_success']); ?>
<?php endif; ?>
<script>
  function togglePassword() {
    const input = document.getElementById("passwordInput");
    const icon = document.getElementById("eyeIcon");

    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
</script>
<script>
  (function() {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(function(form) {
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();
</script>