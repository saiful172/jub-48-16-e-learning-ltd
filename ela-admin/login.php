<?php
include('includes/conn.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  function check_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $username = check_input($_POST['username']);
  $fpassword = md5(check_input($_POST['password']));
  if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
?>
    <script>
      window.alert('Username should not contain space and special characters. Only underscore(_) is allowed!');
      window.location.href = 'login_form';
    </script>

    <?php
  } else {


    $date = date("Y-m-d");
    $fusername = $username;
    $lquery = mysqli_query($con, "select * from `user` where username='$fusername' && password='$fpassword' and status=1");
    $lrow = mysqli_fetch_array($lquery);
    $lnum = mysqli_num_rows($lquery);
    if ($lnum == 0) {
      header('location:logout-please');
    }


    $fusername = $username;
    $lquery = mysqli_query($con, "select * from `user` where username='$fusername' && password='$fpassword'");
    $lrow = mysqli_fetch_array($lquery);
    $lnum = mysqli_num_rows($lquery);
    if ($lnum == 0) {
      header('location:log-fail.php');
    } else {

      if ($lrow['access_level'] == "1") {
        $_SESSION['id'] = $lrow['userid'];

    ?>
        <script>
          window.alert('Welcome Admin!');
          window.location.href = 'admin/';
        </script>


      <?php
      } elseif ($lrow['access_level'] == "2") {
        $_SESSION['id'] = $lrow['userid'];

      ?>
        <script>
          window.alert('Welcome To Collector !');
          window.location.href = 'collection/index.php';
        </script>


      <?php
      } elseif ($lrow['access_level'] == "3") {
        $_SESSION['id'] = $lrow['userid'];

      ?>
        <script>
          window.alert('Welcome To Accounts Section !');
          window.location.href = 'itm/';
        </script>


      <?php
      } else {
        $_SESSION['id'] = $lrow['userid'];

      ?>
        <script>
          window.alert('Welcome To E-Learning and Earning Ltd !');
          window.location.href = 'user/';
        </script>
<?php
      }
    }
  }
}
?>