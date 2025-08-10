<?php
// Increase limits
ini_set('memory_limit', '512M');
set_time_limit(300);

$con = mysqli_connect("localhost","root","","elaeltdc_jubo_48_db");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:".mysqli_connect_error();
    die();
}

// Pagination setup
$limit = 300; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Get total count
$count_sql = "SELECT COUNT(*) as total FROM questions_list";
$count_result = mysqli_query($con, $count_sql) or die(mysqli_error($con));
$total_rows = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total_rows / $limit);

// Get paginated data
$sql = "SELECT * FROM questions_list LIMIT $offset, $limit";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
?>

<table width="100%" class="table table-bordered table-responsive table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Question</th>
            <th>Answer 1</th>
            <th>Answer 2</th>
            <th>Answer 3</th>
            <th>Answer 4</th>
            <th>Right Answer</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody id="tbody">
        <?php
        $sl = $offset; // Start numbering from offset
        while ($eqrow = mysqli_fetch_array($result)) {
            $sl++;
        ?>
            <tr>
                <td><?php echo $sl; ?></td>
                <td><?php echo htmlspecialchars($eqrow['question']); ?></td>
                <td><?php echo htmlspecialchars($eqrow['ans1']); ?></td>
                <td><?php echo htmlspecialchars($eqrow['ans2']); ?></td>
                <td><?php echo htmlspecialchars($eqrow['ans3']); ?></td>
                <td><?php echo htmlspecialchars($eqrow['ans4']); ?></td>
                <td><?php echo htmlspecialchars($eqrow['right_ans']); ?></td>
                <td><a href="edit.php?id=<?php echo $eqrow['id']; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $eqrow['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
// Display pagination links if needed
if ($total_pages > 1) {
    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<a href="?page='.$i.'"'.($i==$page?' class="active"':'').'>'.$i.'</a> ';
    }
    echo '</div>';
}

mysqli_close($con);
?>