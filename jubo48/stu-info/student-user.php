<!doctype html>
<html lang="en">

<head>

    <title>Students | e-Learning & Earning Ltd.</title>

    <?php include "header-link.php" ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="css/table_data_center.css"> -->

    <style>
        .dataTables_wrapper .row:nth-child(2) {
            overflow-x: scroll;
        }

        .dataTables_wrapper .row:nth-child(2) table {
            width: 1560px !important;
        }
    </style>

</head>

<body data-topbar="colored">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== Header Start ========== -->
        <?php include "header.php" ?>
        <!-- ========== Header End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include "sidebar.php" ?>
        <!-- ========== Left Sidebar End ========== -->


        <!-- ========== Main Content Start ========== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title">
                                    <h4 class="mb-0 font-size-18">Dashboard</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">All Students</li>
                                    </ol>
                                </div>

                                <div class="state-information d-none d-sm-block">
                                    <div class="state-graph">
                                        <div id="header-chart-1" data-colors='["--bs-primary"]'></div>
                                    </div>
                                    <div class="state-graph">
                                        <div id="header-chart-2" data-colors='["--bs-danger"]'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Start Page-content-Wrapper -->
                    <div class="page-content-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom py-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title m-0">All Student Lists</h4>
                                            <div>
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#adddealer">
                                                    <i class="fa fa-plus-circle"></i> Add Student User
                                                </button>

                                                <!-- <a href="view_stuff.php" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> Print</a> -->
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="m-0">

                                    <!-- /.row -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table width="100%" class="table  table-bordered " id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Stu User Id</th>


                                                        <th>Batch</th>
                                                        <th>Group</th>
                                                        <th>Name</th>
                                                      
                                                        <th>Phone</th>
                                                         <th>Email</th>
                                                        <th>Password</th>
                                                        <!-- <th>Photo</th> -->
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                  $dq = mysqli_query($con, "SELECT * FROM student_stuff 
                                                    LEFT JOIN student_user ON student_user.userid = student_stuff.userid
                                                    LEFT JOIN batch_list ON batch_list.batch_id = student_stuff.batch_id
                                                    LEFT JOIN group_list ON group_list.group_id = student_stuff.group_id 
                                                    where student_stuff.district_id = " . $_SESSION['id'] . " ORDER BY student_stuff.userid DESC");

                                                    while ($dqrow = mysqli_fetch_array($dq)) {
                                                        $did = $dqrow['userid'];
                                                    ?>
                                                        <tr>
                                                            <td><?php echo ucwords($dqrow['userid']); ?> </td>
                                                            <td><?php echo ucwords($dqrow['batch_name']); ?> </td>
                                                            <td><?php echo ucwords($dqrow['group_name']); ?> </td>
                                                            <td><?php echo ucwords($dqrow['stu_name']); ?> </td>
                                                           
                                                            <td><?php echo $dqrow['contact']; ?> </td>
                                                            <td><?php echo $dqrow['email']; ?> </td>
                                                            <td>
                                                                <?php
                                                                $pass = mysqli_query($con, "select * from `student_password` where mdfive='" . $dqrow['password'] . "'");
                                                                $passrow = mysqli_fetch_array($pass);

                                                                echo $passrow['original'];
                                                                ?>
                                                            </td>

                                                            <!-- <td><img src="stu_user_images/<?php if ($dqrow['photo'] == "") {
                                                                                                    echo "/img/profile.jpg";
                                                                                                } else {
                                                                                                    echo $dqrow['photo'];
                                                                                                } ?>" height="30px;" width="30px;"></td> -->
                                                            <td>
                                                                <!-- <a href="#details_<?php echo $did; ?>" data-bs-toggle="modal" class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-user"></i> Full Details
                                                                </a> -->

                                                                <a href="#update<?php echo $did; ?>" data-bs-toggle="modal" class="btn btn-success btn-sm">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>

                                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delemp_<?php echo $did; ?>">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>


                                                                <?php include('edit_stu_user_modal.php'); ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- End Page-content -->

                </div>
            </div>
            <?php include('stu_modal.php'); ?>
            <?php include('stu_stuff_modal.php'); ?>

            <!-- ========== Footer Start ========== -->
            <?php include "footer.php" ?>
            <!-- ========== Footer End ========== -->
        </div>
        <!-- ========== Main Content End ========== -->

    </div>
    <!-- END layout-wrapper -->
</body>

</html>