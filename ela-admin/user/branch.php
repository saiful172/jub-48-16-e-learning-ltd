<!DOCTYPE html>
<html lang="en"> 

<head>
    <?php require_once 'head_link.php'; ?>
</head>

<body>

    <?php require_once 'header1.php'; ?> 

    <?php
    if (isset($_GET['delete_id'])) {
        // It will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM branch WHERE br_id = :uid');
        $stmt_delete->bindParam(':uid', $_GET['delete_id']);
        $stmt_delete->execute();
    }
    ?>

    <?php require_once 'sidebar.php'; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> Branch List  |  
                <span> 
                    <a href="Branch-add">   
                        <i class="bi bi-plus-square-fill"></i> 
                    </a> 
                </span> 
            </h1>
            <hr>
        </div> 

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <table class="table table-hover datatable">
                                <thead class="bg-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Division</th>
                                        <th>Branch Name</th>
                                        <th>Branch Address</th>
                                        <th>Contact No.</th>
                                        <th>E-mail</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody id="tbody">
                                    <?php
                                    $sl = 0;
                                    $eq = mysqli_query($con, "SELECT branch.*, division.div_name 
                                                              FROM branch 
                                                              LEFT JOIN division ON branch.div_id = division.div_id 
                                                              WHERE branch.user_id='" . $_SESSION['id'] . "'  
                                                              ORDER BY branch.br_id DESC");

                                    while ($eqrow = mysqli_fetch_array($eq)) {
                                    ?>
                                        <tr>
                                            <td><?php echo ++$sl; ?></td>
                                            <td><?php echo $eqrow['div_name']; ?></td>
                                            <td><?php echo $eqrow['br_name']; ?></td>
                                            <td><?php echo $eqrow['br_address']; ?></td>
                                            <td><?php echo $eqrow['br_contact']; ?></td>
                                            <td><?php echo $eqrow['br_mail']; ?></td>

                                            <td>
                                                <a class="btn btn-info btn-sm" href="branch-edit?edit_id=<?php echo $eqrow['br_id']; ?>" title="Click for edit" onclick="return confirm('Do You Want To Edit?')">
                                                    <span class="bi bi-pencil-square"></span> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-sm" href="?delete_id=<?php echo $eqrow['br_id']; ?>" title="Click for delete" onclick="return confirm('Are You Sure?')">
                                                    <span class="bi bi-trash"></span> Delete
                                                </a>
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
        </section>

    </main>

    <?php require_once 'footer1.php'; ?>
</body>
</html>
