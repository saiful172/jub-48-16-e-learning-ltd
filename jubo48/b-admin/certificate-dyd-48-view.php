<!doctype html>
<html lang="en">

<head>
  <title>DYD Certificate Information | e-Learning & Earning Ltd.</title>
  <?php include "header-link.php"; ?>

  <style>
    .table-responsive {
      overflow-x: auto;
    }

    table.dataTable {
      width: 100% !important;
    }

    @media (max-width: 576px) {
      .action-buttons {
        flex-direction: column;
        align-items: stretch;
      }

      .action-buttons a {
        width: 100%;
      }
    }

    .card-header h4 {
      font-weight: 600;
    }

    .page-title-box {
      flex-wrap: wrap;
    }

    .breadcrumb {
      margin-bottom: 0;
    }

    .btn {
      transition: all 0.3s ease;
    }

    .btn:hover {
      transform: scale(1.05);
    }
  </style>
</head>

<body data-topbar="colored">
  <div id="layout-wrapper">

    <?php include "header.php"; ?>
    <?php include "sidebar.php"; ?>

    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">

          <!-- Page Title -->
          <div class="row mb-3">
            <div class="col-12">
              <div class="page-title-box d-flex align-items-center justify-content-between">
                <div class="page-title">
                  <h4 class="mb-0 font-size-18">Dashboard</h4>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">All DYD Certificate Information</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <!-- Certificate Table -->
          <div class="row">
            <div class="col-12">
              <div class="card shadow-sm">
                <div class="card-header py-3 bg-light">
                  <h4 class="card-title m-0">All DYD Certificate Lists</h4>
                </div>
                <div class="card-body">
                  <h3 class="text-center mb-4">DYD Certificate List</h3>

                  <?php
                  $con = new mysqli("localhost", "root", "", "elaeltdc_jubo_48_db");
                  if ($con->connect_error) {
                    die("Database connection failed: " . $con->connect_error);
                  }

                  if (isset($_GET['delete_id'])) {
                    $delete_id = intval($_GET['delete_id']);
                    $con->query("DELETE FROM dyd_certificate WHERE id = $delete_id");
                    echo "<script>alert('Record deleted successfully'); window.location='certificate-dyd-48-view.php';</script>";
                  }

                  // Filter options
                  $districts = $con->query("SELECT DISTINCT district FROM dyd_certificate ORDER BY district ASC");
                  $batches = $con->query("SELECT DISTINCT batch FROM dyd_certificate ORDER BY batch ASC");
                  $groups = $con->query("SELECT DISTINCT `group` FROM dyd_certificate ORDER BY `group` ASC");

                  $currentDistrict = $_GET['district'] ?? '';
                  $currentBatch = $_GET['batch'] ?? '';
                  $currentGroup = $_GET['group'] ?? '';
                  ?>
                  <?php
                  // Import success/error message
                  if (isset($_GET['imported'])) {
                    echo "<div class='alert alert-success mb-3'>✅ Imported: <b>" . intval($_GET['imported']) . "</b>, Skipped (duplicate): <b>" . intval($_GET['skipped']) . "</b></div>";
                  }
                  if (isset($_GET['error'])) {
                    echo "<div class='alert alert-danger mb-3'>❌ " . htmlspecialchars($_GET['error']) . "</div>";
                  }
                  ?>
                  <!-- Filter Form -->
                  <form method="GET" class="mb-4">
                    <div class="row g-2">
                      <div class="col-md-3 col-sm-6">
                        <select name="district" class="form-select">
                          <option value="">🔍 Filter by District</option>
                          <?php while ($d = $districts->fetch_assoc()) { ?>
                            <option value="<?= htmlspecialchars($d['district']); ?>" <?= ($currentDistrict == $d['district']) ? 'selected' : ''; ?>>
                              <?= htmlspecialchars($d['district']); ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <select name="batch" class="form-select">
                          <option value="">🔍 Filter by Batch</option>
                          <?php while ($b = $batches->fetch_assoc()) { ?>
                            <option value="<?= htmlspecialchars($b['batch']); ?>" <?= ($currentBatch == $b['batch']) ? 'selected' : ''; ?>>
                              <?= htmlspecialchars($b['batch']); ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <select name="group" class="form-select">
                          <option value="">🔍 Filter by Group</option>
                          <?php while ($g = $groups->fetch_assoc()) { ?>
                            <option value="<?= htmlspecialchars($g['group']); ?>" <?= ($currentGroup == $g['group']) ? 'selected' : ''; ?>>
                              <?= htmlspecialchars($g['group']); ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-6 d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100">Apply Filter</button>
                        <?php if ($currentDistrict || $currentBatch || $currentGroup) { ?>
                          <a href="certificate-dyd-48-view.php" class="btn btn-outline-secondary">Reset</a>
                        <?php } ?>
                      </div>
                    </div>
                  </form>
                  <div class="btn mb-3">
                    <a href="assets/demo/demo.xlsx" download class="btn btn-primary w-100">
                      📄 Download Demo Excel
                    </a>
                  </div>
                  <!-- Bulk Import Form -->

                  <form method="POST" enctype="multipart/form-data" action="certificate-dyd-48-import.php" class="mb-4">
                    <div class="row g-2 align-items-end">

                      <div class="col-md-4 col-sm-8">
                        <input type="file" name="import_file" accept=".xlsx" class="form-control" required>
                      </div>
                      <div class="col-md-2 col-sm-4">
                        <button type="submit" name="import_excel" class="btn btn-success w-100">📥 Import Excel</button>
                      </div>

                    </div>
                  </form>




                  <button onclick="exportTableToExcel()" class="btn btn-outline-success mb-3">
                    📤 Export to Excel
                  </button>


                  <!-- Table -->
                  <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover align-middle">
                      <thead class="table-light">
                        <tr>
                          <th>SL</th>
                          <th>District</th>
                          <th>Group</th>
                          <th>Batch</th>
                          <th>Student ID</th>
                          <th>Student Name</th>
                          <th>Gender</th>
                          <th>NID</th>
                          <th>Father Name</th>
                          <th>Mother Name</th>
                          <th>Duration</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $where = [];
                        $params = [];
                        $types = "";

                        if ($currentDistrict) {
                          $where[] = "district = ?";
                          $params[] = $currentDistrict;
                          $types .= "s";
                        }
                        if ($currentBatch) {
                          $where[] = "batch = ?";
                          $params[] = $currentBatch;
                          $types .= "s";
                        }
                        if ($currentGroup) {
                          $where[] = "`group` = ?";
                          $params[] = $currentGroup;
                          $types .= "s";
                        }

                        if ($where) {
                          $query = "SELECT * FROM dyd_certificate WHERE " . implode(" AND ", $where) . " ORDER BY district ASC";
                          $stmt = $con->prepare($query);
                          $stmt->bind_param($types, ...$params);
                          $stmt->execute();
                          $sql = $stmt->get_result();
                        } else {
                          $sql = $con->query("SELECT * FROM dyd_certificate ORDER BY district ASC");
                        }

                        $sl = 1;
                        while ($row = $sql->fetch_assoc()) {
                        ?>
                          <tr>
                            <td><?= $sl++; ?></td>
                            <td><?= htmlspecialchars($row['district']); ?></td>
                            <td><?= htmlspecialchars($row['group']); ?></td>
                            <td><?= htmlspecialchars($row['batch']); ?></td>
                            <td><?= htmlspecialchars($row['stu_id']); ?></td>
                            <td><?= htmlspecialchars($row['stu_name']); ?></td>
                            <td><?= htmlspecialchars($row['gender']); ?></td>
                            <td><?= htmlspecialchars($row['nid']); ?></td>
                            <td><?= htmlspecialchars($row['father']); ?></td>
                            <td><?= htmlspecialchars($row['mother']); ?></td>
                            <td><?= htmlspecialchars($row['duration']); ?></td>
                            <td class="text-center">
                              <div class="action-buttons d-flex justify-content-center gap-2">
                                <a class="btn btn-success btn-sm" href="certificate-dyd-48-edit.php?edit_id=<?= $row['id']; ?>">
                                  <i class="fa fa-edit me-1"></i>Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="?delete_id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">
                                  <i class="fa fa-trash me-1"></i>Delete
                                </a>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <?php include "footer.php"; ?>
    </div>
  </div>

  <?php include "script.php"; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
  <script>
    function exportTableToExcel() {
      const headers = [
        'District', 'Group', 'Batch', 'Student ID', 'Student Name',
        'Gender', 'NID', 'Father Name', 'Mother Name', 'Duration'
      ];

      const data = [];
      data.push(headers);

      // Get all visible (filtered) rows from DataTable
      const table = $('#datatable').DataTable();
      table.rows({
        search: 'applied'
      }).every(function(rowIdx, tableLoop, rowLoop) {
        const rowNode = this.node();
        const rowData = [];

        // Grab only the relevant columns: index 1 to 10 (skip SL=0, Action=11)
        $(rowNode).find('td').each(function(i) {
          if (i > 0 && i < 11) {
            rowData.push($(this).text().trim());
          }
        });

        data.push(rowData);
      });

      // Create workbook and export
      const wb = XLSX.utils.book_new();
      const ws = XLSX.utils.aoa_to_sheet(data);
      XLSX.utils.book_append_sheet(wb, ws, "DYD Certificates");
      XLSX.writeFile(wb, 'dyd_certificates.xlsx');
    }
  </script>





  <script>
    $(document).ready(function() {
      // Destroy previous DataTable if exists and re-initialize
      $('#datatable').DataTable({
        responsive: true,
        pageLength: 25, // show 25 rows per page
        lengthMenu: [
          [25, 50, 100, -1],
          [25, 50, 100, "All"]
        ],
        destroy: true, // ensures re-initialization
        language: {
          search: "🔍 Search:",
          lengthMenu: "Show _MENU_ entries",
          info: "Showing _START_ to _END_ of _TOTAL_ entries",
          paginate: {
            first: "First",
            last: "Last",
            next: "→",
            previous: "←"
          }
        }
      });

      // Redraw table on filter change (optional)
      $('select[name=district], select[name=batch], select[name=group]').on('change', function() {
        // $('#datatable').DataTable().ajax.reload(); // only needed if using server-side processing
      });
    });
  </script>





</body>

</html>