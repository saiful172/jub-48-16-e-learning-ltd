
  <?php require_once 'session.php'; ?>  
  <?php include('login_header.php'); ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Digital Invoice Manager</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" /> 
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login/css/style.css" type="text/css" media="all" />  
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

	<style type="text/css"> 
body {	
<!-- background: url(images/bg.jpg);  -->
  background-repeat: no-repeat; 
  background-size:100%;
  margin-left: auto;
  margin-right: auto;
}</style>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <h1> </h1>
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                   <div class="alert-close1">
                        ITM
                    </div>
                    <div class="w3l_form align-self" style="background-color:#C0392B;">
                        <div class="left_grid_info">
                            <img src="login/images/itm-soft-user.png" >
                        </div>
                    </div>
                    <div class="content-wthree text-center">
					<span style="color:blue; font-size:18px;"><img src="img/pay-itm.png" width="110px" /> </span>
                        <h2> Digital Invoice Manager </h2>  <br><br>
                          
                        <h3 class="alert alert-danger pt-4" style="width:100%;"> Please Pay Your <b style="color:red;">Due Amount</b> ! And Then You Can Alow To <b style="color:green;">Use Software</b>. Or, Contact With Us </h3>
                        <h2>  </h2>  
						
						<a href="logout.php" class="btn btn-lg btn-danger btn-block"> Logout</a>
						
						<div class="social-icons w3layouts" style="display:none;">
                            <ul>
                                <li>
                                    <a target="_blank" href="https://www.facebook.com/itmsofts" class="facebook"><span class="fab fa-facebook"></span> </a>
                                </li>
								 
                                <li>
                                    <a href="#url" class="pinterest"><span class="fas fa-envelope"></span> </a>
                                    <a href="#url" class="pinterest"><span class="fas fa-laptop"></span> </a>
                                    <a href="#url" class="pinterest"><span class="fas fa-phone-square"></span> </a>
                                </li>
								
                                <li>
                                    <a href="#url" class="pinterest"><span class="fab fa-pinterest"></span> </a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
        <!-- copyright-->
        <div class="copyright text-center">
            <p class="copy-footer-29">From ©2022 | Powered By <a href="https://itmsofts.com">ITM-SOFTS</a></p>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->

    <script src="login/js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>