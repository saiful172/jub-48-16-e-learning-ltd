<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>শিক্ষিত কর্মপ্রত্যাশি যুবদের ফ্রিল্যান্সিং প্রশিক্ষণের মাধ্যমে কর্মসংস্থান সৃষ্টি - E-Learning & Earning LTD</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

  <style type="text/css">
    table,
    tr,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>

</head>

<body>

  <?php
  require_once 'session.php';
  require_once '../admin/includes/conn.php';
  require_once '../admin/includes/dbconfig.php';
  ?>

  <div class="row">
    <div class="col-lg-12 mt-1 aos-init aos-animate" data-aos="fade-left">
      <img src="../project/assets/img/all/banner.jpg" class="img-fluid rounded shadow" alt="" width="100%">
    </div>

    <?php
    if (isset($_GET['batch_id']) && !empty($_GET['batch_id'])) {
      $BatchID = $_GET['batch_id'];
      $query = "SELECT * FROM batch_list WHERE batch_id = '$BatchID'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
    }
    ?>


    <div class="col-12 text-center mt-5 mb-3 border-bottom pb-2">
      <h3>All Branches Student Earning Status - <?php echo $row['batch_name'] ?></h3>
      <a href="javascript:void(0)" class="btn btn-success" onclick="downloadExcel()">Download Excel File</a>
    </div>
  </div>

  <div class="container-fluid">
    <table width="100%" class="table m-0 table-bordered" id="dataTables-example">
      <thead class="bg-light ">
        <tr>
          <th>SL</th>
          <th>STD ID</th>
          <th>Branch Name</th>
          <th>Student Name</th>
          <th>Gender</th>
          <th>Father's Name</th>
          <th>Contact No.</th>
          <th>Earning Dollar</th>
          <th>Earning BD</th>
          <th>Remarks</th>
        </tr>
      </thead>
      <tbody id="tbody">
        <?php
        $sl = 0;

        $query = "SELECT distinct * FROM income_info 
          LEFT JOIN jobs ON jobs.j_id = income_info.job_id 
          LEFT JOIN student_list ON student_list.student_id = income_info.student_id 
          LEFT JOIN district ON district.id = student_list.district 
          LEFT JOIN batch_list ON batch_list.batch_id = student_list.batch_id
          LEFT JOIN group_list ON group_list.group_id = student_list.group_id   
          WHERE income_info.status=1
          AND student_list.batch_id = $BatchID
          ORDER BY student_list.district desc";

        $eq = mysqli_query($con, $query);

        // Check if any records are found
        if (mysqli_num_rows($eq) > 0) {
          while ($eqrow = mysqli_fetch_array($eq)) {
        ?>

            <tr>
              <td><?= ++$sl; ?></td>
              <td><?= $eqrow['student_id']; ?></td>
              <td><?= $eqrow['dist_name']; ?></td>
              <td><?= $eqrow['stu_name']; ?></td>
              <td><?= $eqrow['gender']; ?></td>
              <td><?= $eqrow['father_name']; ?></td>
              <td><?= $eqrow['contact']; ?></td>
              <td>$<?= number_format($eqrow['earning_dollar'], 2) ?></td>
              <td><strong style="font-size: 22px;">৳</strong><?= number_format($eqrow['earning_bd'], 2) ?></td>
              <td><?= $eqrow['job_name']; ?></td>
            </tr>
          <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="12" class="text-center py-2">No records found.!</td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <script type="text/javascript">
    function downloadExcel() {
      var table = document.getElementById("dataTables-example");
      var workbook = XLSX.utils.table_to_book(table, {
        sheet: "Sheet1"
      });
      XLSX.writeFile(workbook, "Report All Branches.xlsx");
    }
  </script>

</body>

</html>