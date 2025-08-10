<?php
require_once 'include/conn.php';
require_once 'include/dbconfig.php';

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
if(isset($_GET['view']) && !empty($_GET['view']))
{
    
    $stu_phn = $_GET['view'];
    
    $stmt_edit = $DB_con->prepare('SELECT * FROM student_reg_jubo 
	left join district on district.id = student_reg_jubo.district
	WHERE phone = :uid'); 
	
    $stmt_edit->execute(array(':uid' => $stu_phn));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
}
else
{
    header("Location: index");
}
?>

        <div class="container my-5 pt-5">
            <div class="card shadow-lg">
                <div class="card-body">
                    
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <img src="jubo/project/assets/img/all/banner.jpg" width="100%">
                            <div class="d-flex justify-content-between align-items-center text-center mt-3">
                                <img class="rounded border" src="profile/admin/circular/jubo-student-image/<?= $userPic; ?>" width="150" height="150" alt="Logo">
                                <h4 class="mt-3"><i><?= $dist_name; ?></i></h4>
                                <h5 class="mt-1"><strong>Batch : </strong>09</h5>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-12">
                            <table class="table mt-4" id="certificateTable" style="font-size:20px;font-weight:bold;">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold" style="width: 30%;">ID Number</td>
                                        <td>: <?= $stu_id; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Name</td>
                                        <td>: <?= $student_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Phone</td>
                                        <td>: <?= $phone; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Email</td>
                                        <td>: <?= $email; ?></td>
                                    </tr>

									 <tr> <td colspan="2"> 
									 <p class="mt-5 text-center"> লিখিত পরিক্ষার তারিখ : ২৩ - মার্চ - ২০২৫, সময় ও স্থান, মেসেজের মাধ্যমে জানানো হবে। </p>
									 </td></tr>
									 
									 
									 <tr> <td colspan="2"> 
									 
									 <p class="mt-5" style="font-size:18px;"> 
									 <i class="border-bottom"><strong>Term & Conditions :  </strong></i><br><br>
									   1. অবশ্যই এডমিট কার্ড সাথে নিয়ে আসতে হবে । <br>
									   2. পরীক্ষা শুরুর ১০ মিনিট আগে আসতে হবে । <br>
									   3. এডমিট কার্ডের প্রিন্ট কপি নিয়ে আসতে হবে । <br>
									 </p>
									 </td></tr>

                                </tbody>
                            </table>
                            
                        </div>


                    </div>

                    <div class="text-center mt-4">
                        <button onclick="generatePDF()" class="btn btn-danger">Download</button>
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