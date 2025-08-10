
<?php include('login_header.php'); ?>

<!DOCTYPE html>
<html lang="zxx">

<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" /> 
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login/css/style.css" type="text/css" media="all" />  
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

	<style type="text/css"> 
body {	
  background: url(includes/bg2.jpg);  
  background-repeat:repeat; 
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
                      EL
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="includes/web-logo.jpg" >
                        </div>
                    </div>
                    <div class="content-wthree text-center">
					<span style="color:blue; font-size:18px;"><img src="includes/el-logo.png" width="180px" />   </span>
                          <br>  
              <h2>Website CMS</h2>  <br><br>
                          
                        <h2 class="alert alert-danger pt-4" style="width:100%;"> <span class="fa fa-exclamation-triangle"></span> Login Invalid </h2>
                       
						<br><br>
						<a href="index.php" class="btn btn-lg btn-danger btn-block"><span class="fa fa-repeat"></span> Try again</a>
						
						 
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
        
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