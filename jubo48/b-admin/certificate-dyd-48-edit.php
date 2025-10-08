<?php
// ===============================
// DYD Certificate Edit Page
// ===============================
$con = new mysqli("localhost", "root", "", "elaeltdc_jubo_48_db");
if ($con->connect_error) {
    die("Database connection failed: " . $con->connect_error);
}

if (!isset($_GET['edit_id']) || !is_numeric($_GET['edit_id'])) {
    die("Invalid ID!");
}

$id = intval($_GET['edit_id']);

// Fetch existing data
$stmt = $con->prepare("SELECT * FROM dyd_certificate WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die("Record not found!");
}
$row = $result->fetch_assoc();

// ===============================
// Handle Update Request
// ===============================
if (isset($_POST['update'])) {
    $district = trim($_POST['district']);
    $group = trim($_POST['group']);
    $batch = trim($_POST['batch']);
    $stu_id = trim($_POST['stu_id']);
    $stu_name = trim($_POST['stu_name']);
    $gender = trim($_POST['gender']);
    $nid = trim($_POST['nid']);
    $father = trim($_POST['father']);
    $mother = trim($_POST['mother']);
    $duration = trim($_POST['duration']);

    // Check duplicate stu_id (excluding current record)
    $check = $con->prepare("SELECT id FROM dyd_certificate WHERE stu_id = ? AND id != ?");
    $check->bind_param("si", $stu_id, $id);
    $check->execute();
    $dupResult = $check->get_result();

    if ($dupResult->num_rows > 0) {
        $error = "❌ Student ID already exists! Please use a unique Student ID.";
    } else {
        // Update query
        $update = $con->prepare("
      UPDATE dyd_certificate 
      SET district=?, `group`=?, batch=?, stu_id=?, stu_name=?, gender=?, nid=?, father=?, mother=?, duration=?
      WHERE id=?
    ");
        $update->bind_param(
            "ssssssssssi",
            $district,
            $group,
            $batch,
            $stu_id,
            $stu_name,
            $gender,
            $nid,
            $father,
            $mother,
            $duration,
            $id
        );

        if ($update->execute()) {
            echo "<script>alert('✅ Record updated successfully!'); window.location='certificate-dyd-48-view.php';</script>";
            exit;
        } else {
            $error = "❌ Update failed: " . $con->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit DYD Certificate | e-Learning & Earning Ltd.</title>
    <?php include "header-link.php"; ?>
    <style>
        .card {
            max-width: 800px;
            margin: 20px auto;
        }

        label {
            font-weight: 600;
        }

        .btn {
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body data-topbar="colored">

    <div id="layout-wrapper">
        <?php include "header.php"; ?>
        <?php include "sidebar.php"; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-header bg-light">
                                    <h4 class="mb-0">✏️ Edit DYD Certificate</h4>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($error)) { ?>
                                        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
                                    <?php } ?>

                                    <form method="POST">
                                        <div class="row g-3">

                                            <div class="col-md-6">
                                                <label>District</label>
                                                <input type="text" name="district" class="form-control" value="<?= htmlspecialchars($row['district']); ?>" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Group</label>
                                                <input type="text" name="group" class="form-control" value="<?= htmlspecialchars($row['group']); ?>" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Batch</label>
                                                <input type="text" name="batch" class="form-control" value="<?= htmlspecialchars($row['batch']); ?>" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Student ID</label>
                                                <input type="text" name="stu_id" class="form-control" value="<?= htmlspecialchars($row['stu_id']); ?>" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Student Name</label>
                                                <input type="text" name="stu_name" class="form-control" value="<?= htmlspecialchars($row['stu_name']); ?>" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Gender</label>
                                                <select name="gender" class="form-select" required>
                                                    <option value="Male" <?= $row['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                                                    <option value="Female" <?= $row['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                                                    <option value="Other" <?= $row['gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label>NID</label>
                                                <input type="text" name="nid" class="form-control" value="<?= htmlspecialchars($row['nid']); ?>">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Father’s Name</label>
                                                <input type="text" name="father" class="form-control" value="<?= htmlspecialchars($row['father']); ?>">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Mother’s Name</label>
                                                <input type="text" name="mother" class="form-control" value="<?= htmlspecialchars($row['mother']); ?>">
                                            </div>

                                            <div class="col-md-6">
                                                <label>Duration</label>
                                                <input type="text" name="duration" class="form-control" value="<?= htmlspecialchars($row['duration']); ?>">
                                            </div>

                                        </div>

                                        <div class="mt-4 d-flex justify-content-between">
                                            <a href="certificate-dyd-48-view.php" class="btn btn-outline-secondary">← Back</a>
                                            <button type="submit" name="update" class="btn btn-primary">💾 Update Record</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php"; ?>
        </div>
    </div>

    <?php include "script.php"; ?>
</body>

</html>