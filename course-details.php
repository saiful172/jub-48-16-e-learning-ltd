<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Course Details - E-Learning & Earning LTD</title>
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

        <?php
        if (isset($_GET['course_id'])) {
            $course_id = intval($_GET['course_id']); // Sanitize the input

            // Fetch the specific course details from the database
            $sql = mysqli_query($con, "SELECT * FROM course WHERE id = $course_id");
            if (mysqli_num_rows($sql) > 0) {
                $rowabt = mysqli_fetch_assoc($sql); // Fetch the course data
            } else {
                die("Course not found."); // Handle case where course does not exist
            }
        } else {
            die("Invalid request."); // Handle case where course_id is not provided
        }
        ?>

        <div class="breadcrumb-bar breadcrumb-bar-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12 mt-5 pt-5">
                        <div class="breadcrumb-list">
                            <h2 class="breadcrumb-title">Our Course Details</h2>
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $rowabt['name']; ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        if (isset($_GET['course_id'])) {
            $course_id = intval($_GET['course_id']); // Sanitize the input

            // Fetch the specific course details from the database
            $sql = mysqli_query($con, "SELECT * FROM course WHERE id = $course_id");
            if (mysqli_num_rows($sql) > 0) {
                $rowabt = mysqli_fetch_assoc($sql); // Fetch the course data
            } else {
                die("Course not found."); // Handle case where course does not exist
            }
        } else {
            die("Invalid request."); // Handle case where course_id is not provided
        }
        ?>

        <div class="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        <h2><?php echo $rowabt['name']; ?></h2>
                        <p> <?php echo $rowabt['sub_name']; ?></p>
                        <div class="course-info d-flex align-items-center border-bottom-0 m-0 p-0">
                            <div class="cou-info">
                                <img src="assets/img/icon/icon-01.svg" alt="Img">
                                <p>মোট ক্লাস : <?php echo $rowabt['total_semester']; ?> টি</p>
                            </div>
                            <div class="cou-info">
                                <img src="assets/img/icon/timer-icon.svg" alt="Img">
                                <!-- <p>কোর্সের মেয়াদ : ৩ মাস ( সপ্তাহে ৩ দিন )</p> -->
                                <p>কোর্সের মেয়াদ : <?php echo $rowabt['duration']; ?></p>
                            </div>
                            <div class="cou-info">
                                <img src="assets/img/icon/people.svg" alt="Img">
                                <p>প্রজেক্ট = <?php echo $rowabt['project']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="page-content course-sec">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8">

                        <!-- Overview -->
                        <?php if (!empty($rowabt['details'])): ?>
                            <div class="card overview-sec">
                                <div class="card-body">
                                    <h2 class="subs-title"> <i class="fa fa-laptop" aria-hidden="true"> </i> Introduction</h2>
                                    <p class=""><?php echo $rowabt['details']; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($rowabt['course_overview'])): ?>
                            <div class="card overview-sec">
                                <div class="card-body">
                                    <h2 class="subs-title"><i class="fa fa-desktop" aria-hidden="true"></i> Course Overview</h2>
                                    <p><?php echo $rowabt['course_overview']; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <style>
                            li {
                                list-style-type: inherit !important;
                            }

                            ul {
                                padding-left: 35px !important;
                            }

                            .card-body p {
                                padding-left: 30px !important;
                            }
                        </style>

                        <?php if (!empty($rowabt['course_curriculum'])): ?>
                            <div class="card instructor-sec">
                                <div class="card-body">
                                    <h2 class="subs-title"><i class="fa fa-code" aria-hidden="true"></i> Course Curriculum</h2>
                                    <p class="" style="margin-left: 20px;"><?php echo $rowabt['course_curriculum']; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($rowabt['software'])): ?>
                            <div class="card instructor-sec">
                                <div class="card-body">
                                    <h2 class="subs-title"><i class="fa fa-desktop" aria-hidden="true"></i> Software You’ll Use</h2>
                                    <p><?php echo $rowabt['software']; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($rowabt['course_desinger'])): ?>
                            <div class="card instructor-sec">
                                <div class="card-body">
                                    <h2 class="subs-title"><i class="fa fa-briefcase" aria-hidden="true"></i> This Course is Designed for</h2>
                                    <p><?php echo $rowabt['course_desinger']; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($rowabt['career_opportunities'])): ?>
                            <div class="card instructor-sec">
                                <div class="card-body">
                                    <h2 class="subs-title"><i class="fa fa-briefcase" aria-hidden="true"></i> Career Opportunities
                                    </h2>

                                    <p><?php echo $rowabt['career_opportunities']; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($rowabt['job_position'])): ?>
                            <div class="card instructor-sec">
                                <div class="card-body">
                                    <h2 class="subs-title"><i class="fa fa-briefcase" aria-hidden="true"></i> Open Job Positions</h2>
                                    <p><?php echo $rowabt['job_position']; ?></p>
                                </div>
                            </div>
                        <?php endif; ?>


                        <?php if (!empty($rowabt['exclusive_solution'])): ?>
                            <div class="card instructor-sec">
                                <div class="card-body">
                                    <h2 class="subs-title"><i class="fa fa-briefcase" aria-hidden="true"></i> Exclusive Solutions That Set Us Apart
                                    </h2>
                                    <p> <?php echo $rowabt['exclusive_solution']; ?></p>

                                </div>
                            </div>
                        <?php endif; ?>

                        <?php include('course-bottom-details.php'); ?>

                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar-sec">



                            <style>
                                .all-btn {
                                    position: absolute;
                                    bottom: -20px;
                                    /* Moves the button outside the image */
                                    left: 50%;
                                    transform: translateX(-50%);
                                }

                                .custom-gradient-btn {
                                    background: linear-gradient(45deg, #ff6a00, #ee0979);
                                    border: none;
                                    color: white;
                                    padding: 10px 20px;
                                    border-radius: 5px;
                                    transition: 0.3s ease-in-out;
                                    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
                                }

                                .custom-gradient-btn:hover {
                                    background: linear-gradient(45deg, #ee0979, #ff6a00);
                                    color: #fff;
                                }
                            </style>

                            <div class="video-sec vid-bg">
                                <div class="card">
                                    <div class="card-body p-2">
                                        <img class="rounded" src="ela-admin/user/user_images/<?= $rowabt['userPic'] ?>" alt="Graphics">
                                    </div>
                                    <div class="all-btn all-category d-flex align-items-center justify-content-center">
                                        <a href="paid-course-apply.php" class="btn custom-gradient-btn">Apply Now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card feature-sec">
                                <div class="card-body">
                                    <div class="cat-title">
                                        <h4><?php echo $rowabt['name']; ?></h4>
                                    </div>
                                    <ul>
                                        <li><img src="assets/img/icon/users.svg" class="me-2" alt="Img"> প্রজেক্ট : <?php echo $rowabt['project']; ?></span></li>
                                        <li><img src="assets/img/icon/timer.svg" class="me-2" alt="Img"> কোর্সের মেয়াদ : <span><?php echo $rowabt['duration']; ?></span></li>
                                        <li><img src="assets/img/icon/chapter.svg" class="me-2" alt="Img"> মোট ক্লাস : <span><?php echo $rowabt['total_semester']; ?> টি </span></li>
                                    </ul>
                                </div>
                            </div>

                            <?php include('retaled-course.php'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include('footer.php'); ?>