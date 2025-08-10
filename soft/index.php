<?php
	session_start();
	if (isset($_SESSION['id'])){
		$ses=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
		$sesrow=mysqli_fetch_array($ses);		
		if ($ses['access']==1){
			header('location:admin/');
		}
		elseif ($ses['access']==2){
			header('location:staff/');
		}
		else{
			header('location:log-please');
		}
	}
?>

<?php include('login_header.php'); ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>ITM Easy Business Software - ITM-SOFTS</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" /> 
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login/css/style.css" type="text/css" media="all" />  
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

	<style type="text/css"> 
body {	
  background: url(includes/bg5.jpg);  
  background-repeat:repeat; 
  margin-left: auto;
  margin-right: auto;
}</style>

</head>

<body>
 
    <section class="w3l-mockup-form">
        <h1> </h1>
        <div class="container"> 
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close1">
                        PG
                    </div>
                    <div class="w3l_form align-self"> 
                            <img src="login/images/itm-soft-user.jpg" width="100%" > 
                    </div>
                    <div class="content-wthree text-center">
					<div style="margin-top:20px;margin-bottom:20px;">
					<img src="includes/dim.png" width="130px" />  
					<br><h2>Accounting Managent </h2> 
						<p>A Smart Software</p>
					</div>	
						
                        <form action="login-go" method="post">
                            <input type="text" class="text" name="username" placeholder="Enter Your User Name" required="">
                            <input type="password" class="email" name="password" placeholder="Enter Your Password" required="">
                            <button class="btn" type="submit">Login</button>
                        </form><br><br>
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
            
        </div>
       
        <div class="copyright text-center" style="display:none;">
            <p class="copy-footer-29">From ©2022 | Powered By <a href="https://itmsofts.com">ITM-SOFTS</a></p>
        </div>
        
    </section> 

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