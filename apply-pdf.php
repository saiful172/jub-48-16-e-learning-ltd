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



    <main id="main">

      

        <?php
        if (isset($_GET['view']) && !empty($_GET['view'])) {

            $stu_phn = $_GET['view'];

            $stmt_edit = $DB_con->prepare('SELECT * FROM student_reg_jubo 
	left join district on district.id = student_reg_jubo.district
	WHERE phone = :uid');

            $stmt_edit->execute(array(':uid' => $stu_phn));
            $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
            extract($edit_row);
        } else {
            header("Location: index");
        }
        ?>

       
<div class="container mt-2 ">
             

                    <div class="row justify-content-center">
                        <div class="col-lg-12 p-0">
                            <img src="jubo/project/assets/img/all/banner.jpg" width="100%">
                        </div>
                        <div class="col-12 p-0">
                            <div class="mt-3">
                                <img class="rounded border" src="profile/admin/circular/jubo-student-image/<?= $userPic; ?>" width="150" height="150" alt="Logo">

                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 p-0">
                            <table class="table mt-4 mb-5" id="certificateTable" style="font-size: 19px;">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold" style="width: 30%;"><b>District</b></td>
                                        <td>: <?= $dist_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold" style="width: 30%;"><b>ID Number</b></td>
                                        <td>: <?= $stu_id; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold"><b>Name</b></td>
                                        <td>: <?= $student_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold"><b>Phone</b></td>
                                        <td>: <?= $phone; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold"><b>Email</b></td>
                                        <td>: <?= $email; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold"><b>Batch No</b></td>
                                        <td>: 09</td>
                                    </tr>
                                </tbody>
                            </table>
							
                            <p style="font-size: 19px;"> লিখিত পরীক্ষার তারিখ : ২৩ - মার্চ - ২০২৫ এবং মৌাখিক পরীক্ষার তারিখ: ২৫ শে মার্চ ২০২৫ । পরীক্ষার সময় ও স্থান, এসএমএস এর মাধ্যমে জানানো হবে। </p>
                            <div>
                              <span style="font-size: 23px; font-weight: 700;">শর্তাবলীঃ</span>
                                <ul style="list-style-type: none; font-size: 19px">
                                    <li>১। অ্যাডমিট কার্ডের প্রিন্ট প্রত্যেক পরীক্ষার জন্য সাথে আনতে হবে । </li>
                                    <li>২। পরীক্ষা শুরুর ৩০ মিনিট পূর্বে কেন্দ্রে অবস্থান করতে হবে ।</li>
                                    <li>৩। পরীক্ষার কেন্দ্রে কলম ও অ্যাডমিট কার্ড ব্যাতীত কোনোকিছু সাথে আনা যাবে না ।</li>
                                    <li>৪। যেকোনো পরীক্ষার্থী কর্তৃক অসঙ্গতির প্রমাণ পেলে কর্তৃপক্ষ বৈধ পদক্ষেপ নিবে।</li>
                                    <li>৫। পরীক্ষা পরিচালনার সম্পূর্ণ ক্ষেত্রে যেকোনো ক্ষমতা কর্তৃপক্ষ কর্তৃক সংরক্ষিত।</li>

                                </ul>
                            </div>
                        </div>

                     
				
                <div class="text-center mt-4 mb-4">
                        <button onclick="generatePDF()" class="btn btn-danger">Download</button>
                    </div>
            </div>
        </div>

        <!-- ✅ jsPDF & html2canvas CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

        <script>
    function generatePDF() {
        const { jsPDF } = window.jspdf;
        let doc = new jsPDF('p', 'mm', 'a4');

       
        const scale = 2; 

        html2canvas(document.querySelector(".card-body"), { scale: scale }).then(canvas => {
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

 