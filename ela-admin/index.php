<?php
session_start();
if (isset($_SESSION['id'])) {
  $ses = mysqli_query($conn, "select * from user where userid='" . $_SESSION['id'] . "'");
  $sesrow = mysqli_fetch_array($ses);
  if ($ses['access'] == 1) {
    header('location:admin/index.php');
  } elseif ($ses['access'] == 2) {
    header('location:staff/index.php');
  } else {
    header('location:logout-please-now');
  }
}
?>

<?php include('login_header.php'); ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>E-Learning</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8" />
  <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="login/css/style.css" type="text/css" media="all" />
  <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

  <style type="text/css">
    body {
      background: url(includes/bg2.jpg);
      background-repeat: repeat;
      margin-left: auto;
      margin-right: auto;
    }
  </style>

</head>

<body>

  <section class="w3l-mockup-form">
    <h1> </h1>
    <div class="container">
      <div class="workinghny-form-grid">
        <div class="main-mockup">
          <div class="alert-close1">
            EL
          </div>
          <div class="w3l_form align-self">
            <img src="includes/web-logo.jpg" width="100%" height="100%">
          </div>
          <div class="content-wthree text-center"><br> 
            
			<div style="margin-top:20px;margin-bottom:20px;">
              <img src="includes/el-logo.png" width="180px" />
              <br>  
              <h2>Website CMS</h2> 
            </div>

            <form action="login.php" method="post">
              <input type="text" class="text" name="username" placeholder="Enter Your User Name" required="">
              <input type="password" class="email" name="password" placeholder="Enter Your Password" required="">
              <button class="btn" type="submit">Login</button>
            </form><br><br>
          
		  </div>
        </div>
      </div>

    </div>


  </section>

  <script src="login/js/jquery.min.js"></script>
  <script>
    $(document).ready(function(c) {
      $('.alert-close').on('click', function(c) {
        $('.main-mockup').fadeOut('slow', function(c) {
          $('.main-mockup').remove();
        });
      });
    });
  </script>

</body>

</html>