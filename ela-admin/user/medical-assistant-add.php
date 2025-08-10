<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'head_link.php'; ?>

</head>

<body>

    <?php require_once 'header1.php'; ?>

    <?php

    if (isset($_GET['edit_id'])) {
        $eq = mysqli_query($con, "SELECT * FROM medical_assistant_admission  WHERE ad_id='" . $_GET['edit_id'] . "' ORDER BY ad_id desc   ");
        $data = mysqli_fetch_array($eq);
    }

    $AdName = isset($data) ? $data['ad_name'] : '';
    $Details = isset($data) ? $data['ad_details'] : '';
    $userPic = isset($data) ? $data['userPic'] : '';


    error_reporting(~E_NOTICE); // avoid notice
    if (isset($_POST['btnsave'])) {

        $oldImage = $_POST['oldImage'];
        $user_id = $_POST['user_id'];
        $ad_id = $_POST['ad_id'];

        $AdName = $_POST['AdName'];
        $Details = $_POST['Details'];


        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];


        if (empty($AdName)) {
            $errMSG = "Please Enter Service .";
        } else {
            $upload_dir = 'user_images/'; // upload directory

            $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions


            // allow valid image file formats
            if (in_array($imgExt, $valid_extensions)) {
                // Check file size '5MB'
                // rename uploading image
                $userPic = rand(1000, 1000000) . "." . $imgExt;
                if ($imgSize < 5000000) {
                    if (!empty($oldImage)) {
                        if (file_exists($upload_dir . $oldImage)) {
                            unlink($upload_dir . $oldImage);
                        }
                    }

                    move_uploaded_file($tmp_dir, $upload_dir . $userPic);
                } else {
                    $errMSG = "Sorry, your file is too large.";
                }
            }
        }


        // if no error occured, continue ....
        if (!isset($errMSG)) {
            if ($ad_id == 0) {
                $stmt = $DB_con->prepare('INSERT INTO medical_assistant_admission (user_id,ad_name,ad_details,userPic) 
                                                                VALUES(:user_id,:AdName,:Details,:upic)');

                $stmt->bindParam(':user_id', $user_id);

                $stmt->bindParam(':AdName', $AdName);
                $stmt->bindParam(':Details', $Details);

                $stmt->bindParam(':upic', $userPic);

                if ($stmt->execute()) {
    ?>
                    <script>
                        alert('Successfully Added ...');
                        window.location.href = 'medical-assistant';
                    </script>
                <?php
                } else {
                    $errMSG = "error while inserting....";
                }
            } else {
                $stmt = $DB_con->prepare('UPDATE medical_assistant_admission 
									     SET  ad_name =:AdName,
											  ad_details=:Details,userPic=:upic 
								       WHERE ad_id=:uid');

                $stmt->bindParam(':AdName', $AdName);
                $stmt->bindParam(':Details', $Details);

                $stmt->bindParam(':upic', $userPic);
                $stmt->bindParam(':uid', $ad_id);

                if ($stmt->execute()) {
                ?>
                    <script>
                        alert('Successfully Updated ...');
                        window.location.href = 'medical-assistant';
                    </script>
    <?php
                } else {
                    $errMSG = "Sorry Data Could Not Updated !";
                }
            }
        }
    }
    ?>

    <?php require_once 'sidebar.php'; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add New Medical Admission | <span> <a href="medical-assistant"> <i class="bi bi-building"></i> </a> </span> </h1>
            <hr>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
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

                            </h5>

                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" class="form-horizontal">

                                <table class="table table-hover table-responsive">

                                    <tr>

                                        <?php
                                        $pq = mysqli_query($con, "select * from stuff left join `user` on user.userid=stuff.userid where stuff.userid='" . $_SESSION['id'] . "'");
                                        while ($pqrow = mysqli_fetch_array($pq)) {
                                        ?>
                                            <input type="hidden" name="ad_id" value="<?php echo (!empty($data) ? $data['ad_id'] : '0') ?>">
                                            <input class="form-control" type="hidden" name="user_id" value="<?php echo $pqrow['userid']; ?>" />
                                        <?php } ?>
                                    </tr>


                                    <tr>
                                        <td><label class="control-label"> Course Name </label></td>
                                        <td><input class="form-control" type="text" name="AdName" placeholder="Service Name" value="<?php echo $AdName ?>" /></td>
                                    </tr>

                                    <tr>
                                        <td><label class="control-label"> Details </label></td>
                                        <td><textarea name="Details" id="summernote" placeholder="Details"><?php echo $Details; ?></textarea></td>
                                    </tr>


                                    <tr>
                                        <td><label class="control-label">Picture </label></td>
                                        <td>
                                            <?php
                                            if (!empty($userPic)) { ?>
                                                <p><img src="user_images/<?php echo $userPic ?>" height="150" width="150" /></p>
                                                <input type="hidden" name="oldImage" value="<?= $userPic ?>">
                                            <?php  }
                                            ?>

                                            <input class="input-group" type="file" name="user_image" accept="image/*" />
                                        </td>
                                    </tr>


                                </table>
                                <tr>
                                    <td colspan="2"><button type="submit" name="btnsave" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-save"></span> &nbsp; save
                                        </button>
                                    </td>
                                </tr>


                            </form>


                        </div>
                    </div>


                </div>


        </section>

    </main>

    <?php require_once 'footer1.php'; ?>


    <script src="js/chosen.js"></script>
    <script type="text/javascript">
        $('.chosen-select').chosen({
            width: "100%"
        });
    </script>

    <?php
    require_once 'summernote_link.php';
    summernote('summernote');
    ?>