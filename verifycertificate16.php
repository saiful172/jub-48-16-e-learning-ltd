<?php 
session_start();

// Connect to database
require_once 'include/conn16.php';

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit(); // Stop execution if connection fails
}

// Fetch only non-empty, non-null distinct districts
$result = $con->query("
    SELECT DISTINCT district 
    FROM certificate_dyd_16 
    WHERE TRIM(district) != '' AND district IS NOT NULL 
    ORDER BY district ASC
");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Certificate Verify - E-Learning & Earning LTD 16 Districts</title>
    <?php include('head_link.php'); ?>

    <style type="text/css">
        .page-content {
            position: relative;
            background-image: url(assets/img/bg/home-main.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body>

    <div class="main-wrapper">

        <?php include('header_nav.php'); ?>

        <div class="breadcrumb-bar breadcrumb-bar-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12 mt-5 pt-5">
                        <div class="breadcrumb-list">
						<img  class="rounded shadow border" src="https://jubo16.e-laeltd.com/jubo/project/assets/img/all/banner.jpg"  width="100%" > 
						   <h3 class="breadcrumb-title mt-5"> Verify Your Certificate </h3>
                            <h3 class="breadcrumb-title d-none">Certificate Verify For DYD 16 Districts</h3>
                           <p class="d-none" style="color: #081235;">Employment Creation Through Freelancing Training of Educated Job Seekers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-5">
            <div class="container">
                <div class="row">
                    <div class="container">

                        <?php
                        if (isset($errMSG)) {
                        ?>
                            <div class="alert alert-danger">
                                <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                            </div>
                        <?php
                        } else if (isset($successMSG)) {
                        ?>
                            <div class="alert alert-success">
                                <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="row justify-content-center" data-aos="fade-up">
                            <div class="col-lg-12">

                                <form method="post" action="certificate-open-16.php" enctype="multipart/form-data">

                                    <div class="form-row m-auto">
                                        <div class="col-md-4 form-group text-center m-auto">
                                            <select class="form-select mb-2" name="district" id="district" required>
                                                <option value="">জেলা নির্বাচন করুন</option>
                                                <?php
                                                if ($result && $result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $district = htmlspecialchars($row['district']); // Sanitize output
                                                        echo "<option value=\"$district\">$district</option>";
                                                    }
                                                } else {
                                                    echo "<option value=\"\">No Districts Found</option>";
                                                }
                                                ?>
                                            </select>
                                            <input type="text" class="form-control mb-2" name="user_input" id="user_input" placeholder="নির্বাচন করা জেলার প্রথম তিন অক্ষর ইংরেজিতে লিখুন" required />
                                            <input type="text" class="form-control mb-2" name="IdNo" id="IdNo" placeholder="Enter Certificate Id" required />
                                            <!-- <input type="text" class="form-control mb-2" name="StudentName" id="StudentName" placeholder="Student Name" required /> -->
                                            <!-- <input type="text" class="form-control mb-2" name="groupNumber" id="groupNumber" placeholder="Group Number" required /> -->
                                            <div class="text-center mt-2">
                                                <button class="Certificate Verify btn bg-dark text-white py-2 px-5" name="btnsave" type="submit">Verify</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php include('footer.php'); ?>