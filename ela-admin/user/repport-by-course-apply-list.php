<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'head_link.php'; ?>
    <script>
        function tableToExcel(tableID, filename = '') {
            let dataType = 'application/vnd.ms-excel';
            let tableSelect = document.getElementById(tableID);
            let tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            filename = filename ? filename + '.xls' : 'excel_data.xls';

            let downloadLink = document.createElement("a");
            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                let blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
                downloadLink.download = filename;
                downloadLink.click();
            }
        }
    </script>
</head>


<style>
    #reportTable,
    #reportTable th,
    #reportTable td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    #reportTable th,
    #reportTable td {
        padding: 5px;
    }
</style>



<body>

    <?php require_once 'header1.php'; ?>
    <?php require_once 'sidebar.php'; ?>

    <?php
    if (isset($_GET['delete_id'])) {
        $stmt_delete = $DB_con->prepare('DELETE FROM course_apply WHERE id = :uid');
        $stmt_delete->bindParam(':uid', $_GET['delete_id']);
        $stmt_delete->execute();
    }
    ?>

    <main id="main" class="main">

        <div class="pagetitle mt-5">
            <h1 class="text-center">Course Report By Apply List</h1>
            <hr>
        </div>

        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Filter By Date</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="form-inline text-center" style="margin-bottom: 30px;">

                                <div class="row align-items-center g-3 mt-2">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="row align-items-center g-2">
                                            <div class="col-auto">
                                                <label for="startDate" class="col-form-label">Start Date:</label>
                                            </div>
                                            <div class="col">
                                                <input type="date" name="startDate" id="startDate" class="form-control" required
                                                    value="<?= isset($_POST['startDate']) ? htmlspecialchars($_POST['startDate']) : '' ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-md-6">
                                        <div class="row align-items-center g-2">
                                            <div class="col-auto">
                                                <label for="endDate" class="col-form-label">End Date:</label>
                                            </div>
                                            <div class="col">
                                                <input type="date" name="endDate" id="endDate" class="form-control" required
                                                    value="<?= isset($_POST['endDate']) ? htmlspecialchars($_POST['endDate']) : '' ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-12">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="bi bi-filter"></i> Filter
                                        </button>
                                    </div>
                                </div>




                                <!-- <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Submit</button> -->
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $startDate = $_POST['startDate'];
                    $endDate = $_POST['endDate'];

                    $start = DateTime::createFromFormat('Y-m-d', $startDate);
                    $end = DateTime::createFromFormat('Y-m-d', $endDate);

                    // Check if date formats are valid
                    if (!$start || !$end) {
                        echo "<div class='alert alert-danger'>Invalid date range selected.</div>";
                        exit;
                    }

                    // Swap dates if Start Date is after End Date
                    if ($start > $end) {
                        $temp = $start;
                        $start = $end;
                        $end = $temp;
                    }

                    $start_fmt = $start->format('Y-m-d');
                    $end_fmt = $end->format('Y-m-d');

                    $query = "SELECT * FROM course_apply WHERE entry_date BETWEEN '$start_fmt' AND '$end_fmt' ORDER BY id DESC";
                    $result = mysqli_query($con, $query);
                    $total = mysqli_num_rows($result);
                ?>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading mb-2
      ">
                                <div style="display: flex; align-items: center; justify-content: space-between;">

                                    <strong class="text-success h3">Total Records: <?= $total ?></strong><br>
                                    <strong>Date: <?= $start->format('d-M-Y') ?> to <?= $end->format('d-M-Y') ?></strong>

                                    <button class="btn btn-success" onclick="tableToExcel('reportTable', 'Course Apply Report')">Export to Excel</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group input-group mb-3">
                                    <span class="input-group-text">Search:</span>
                                    <input id="myInput" type="text" class="form-control" placeholder="Search...">
                                </div>
                                <table id="reportTable" class="table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Course</th>          
                                            <th>Address</th>
                                            <th>Course Type</th>
                                            <th>Date</th> 
                                            <th>Time</th> 

                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <?php
                                        $sl = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td><?= ++$sl ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                  <td><?php echo $row['phone']; ?></td>
                                                  <td><?php echo $row['email']; ?></td>
                                                  <td><?php echo $row['course']; ?></td>
                                                  <td><?php echo $row['address']; ?></td>
                                                  <td><?php echo $row['course_type']; ?></td>
                                                 <td><?php echo date("d-M-Y", strtotime($row['entry_date'])); ?></td>
                                                 <td><?php echo date("h:i:sa", strtotime($row['entry_date'])); ?></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </section>

    </main>

    <?php require_once 'footer1.php'; ?>

    <script>
        // Table search filter
        document.getElementById('myInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#tbody tr");
            rows.forEach(function(row) {
                row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
            });
        });





        function tableToExcel(tableID, filename = '') {
            let dataType = 'application/vnd.ms-excel';
            let tableSelect = document.getElementById(tableID);

            let style = `
    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
      th, td {
        padding: 5px;
      }
    </style>
  `;

            let tableHTML = style + tableSelect.outerHTML.replace(/ /g, '%20');
            filename = filename ? filename + '.xls' : 'excel_data.xls';

            let downloadLink = document.createElement("a");
            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                let blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
                downloadLink.download = filename;
                downloadLink.click();
            }
        }
    </script>



</body>

</html>