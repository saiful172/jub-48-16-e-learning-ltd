<?php
require_once 'include/conn48.php';
require_once 'include/dbconfig48.php'; 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E-Learning & Earning LTD</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <?php include('link.php'); ?>



</head>

<body>

    <?php include('header-apply.php'); ?>

    <main id="main">

        <?php include('breadcrumb.php'); ?>

        <?php
            $sql = mysqli_query($con, "
                SELECT sr.*, d.dist_name 
                FROM student_reg_jubo sr
                JOIN district d ON sr.district = d.id
                ORDER BY sr.stu_id ASC 
                LIMIT 1
            ");

            if (mysqli_num_rows($sql) > 0) {
                $student = mysqli_fetch_assoc($sql);
            } else {
                die("No student records found.");
            }
            ?>




        



<div class="container my-5">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="row col-md-12 d-flex text-center mb-3">
                        <div class="col-md-12 rounded p-0">
                            <img src="assets/img/banner.jpg" width="100%">


                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">

                            <div class="d-flex justify-content-between align-items-center text-center">
                                <img class="rounded border" src="assets/img/e-logo.png" width="150" height="150" alt="Logo">
                                <h4 class="mt-3"><i><?= htmlspecialchars($student['dist_name']); ?></i></h4>
                                <h5 class="mt-1"><strong>Batch:</strong>2nd</h5>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-6">
                            <table class="table mt-4" id="certificateTable">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold" style="width: 30%;">ID Number</td>
                                        <td>: <?= htmlspecialchars($student['stu_id']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Name</td>
                                        <td>: <?= htmlspecialchars($student['student_name']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Phone</td>
                                        <td>: <?= htmlspecialchars($student['phone']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Email</td>
                                        <td>: <?= htmlspecialchars($student['email']); ?></td>
                                    </tr>


                                </tbody>
                            </table>
                            <p> লিখিত পরিক্ষার তারিখ : ২৩ - মার্চ - ২০২৫, সময় ও স্থান, মেসেজের মাধ্যমে জানানো হবে। </p>
                        </div>


                    </div>

                    <div class="text-center mt-4">
                        <button onclick="generatePDF()" class="btn btn-danger">Download PDF</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ✅ jsPDF & html2canvas CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

        <script>
            function generatePDF() {
                const {
                    jsPDF
                } = window.jspdf;
                let doc = new jsPDF('p', 'mm', 'a4');


                html2canvas(document.querySelector(".card-body")).then(canvas => {
                    let imgData = canvas.toDataURL('image/png');
                    let imgWidth = 190;
                    let pageHeight = 297;
                    let imgHeight = (canvas.height * imgWidth) / canvas.width;
                    let heightLeft = imgHeight;
                    let position = 10;

                    doc.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;

                    while (heightLeft >= 0) {
                        position = heightLeft - imgHeight;
                        doc.addPage();
                        doc.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
                        heightLeft -= pageHeight;
                    }

                    doc.save("application.pdf");
                });
            }
        </script>

    </main>

    <!-- ======= Footer ======= -->
    <?php include('footer.php'); ?>
    <!-- End Footer -->