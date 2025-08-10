<?php 
  require_once 'session.php';
  error_reporting( ~E_NOTICE );
  require_once '../includes/conn.php';
  require_once '../includes/dbconfig.php';
  include('../scripts2.php');
  //include('modal.php'); 
  //include('more-fals/access_point.php'); 
  ?> 
  
  <style type="text/css"> 
  .header {
    transition: all 0.5s;
    z-index: 997;
    height: 60px;
    box-shadow: 0px 2px 20px #0a58cac9;
    background-color: #fff;
    padding-left: 20px;
}
  </style>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dash" class="logo d-flex align-items-center">
        <img src="../includes/itm.png" alt="ITM">
        <span class="d-none d-lg-block">ITM-SOFTS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="../<?php if ($srow['photo']==""){echo "img/profile.jpg"; } else {echo $srow['photo'];} ?>"   class="rounded-circle">
		   <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $user; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile rounded">
            <li class="dropdown-header">
              <h6>ITM-ADMIN</h6>
              <span>Innovation Technology</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            		 

            <li>
              <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#MyAcc" href="#MyAcc">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#Logout" href="#Logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
            </li>

          </ul> 
        </li> 
		
		

      </ul>
    </nav> 

  </header> 
  
  <div class="modal fade" id="MyAcc" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">                     
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
            <div class="row g-0">
              <div class="col-md-12 text-center p-2">
               <img src="../<?php if ($srow['photo']==""){echo "img/profile.jpg"; } else {echo $srow['photo'];} ?>" width="90px" class="rounded-circle">
               <h5 class="modal-title mt-2">Change Account User / Password </h5>
			  </div>
              <div class="col-md-12">
                <div class="card-body"><br>
				<form method="POST" action="update_account.php"> 
				
				
				<div class="row mb-3">
                  <label for="customer_name" class="col-sm-3 col-form-label"> User Name</label>
                  <div class="col-sm-9">
				  <input type="text" value="<?php echo $srow['username']; ?>" class="form-control" name="username">
                 </div>
               </div>
			   
			   <div class="row mb-3">
                  <label for="customer_name" class="col-sm-3 col-form-label"> Password</label>
                  <div class="col-sm-9">
				  <input type="password" value="<?php echo $srow['password']; ?>" class="form-control" name="password">
                 </div>
               </div>
		 
						
					<center> <p> <strong>  Type Current Password To Update </strong></p></center>	
						
						
				<div class="row mb-3">
                  <label for="customer_name" class="col-sm-3 col-form-label"> Password</label>
                  <div class="col-sm-9">
				  <input type="password" class="form-control" name="cpass" required>
                 </div>
                 </div>
				 
				 <div class="row mb-3">
                  <label for="customer_name" class="col-sm-3 col-form-label"> Re-Type </label>
                  <div class="col-sm-9">
				  <input type="password"  class="form-control" name="repass" required>
                 </div>
                 </div>
				 
				</div>
				</div>
				
                   <div class="modal-footer">
                      <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
                    </div>	
					
					</form>
							  
              
              </div>
            </div> 
		  
					</div>
                    
                  </div>
                </div>
           
  
  
   <div class="modal fade" id="Logout" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Are You Sure To Logout !</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
            <div class="row g-0">
              <div class="col-md-4 text-center p-2">
               <img src="../<?php if ($srow['photo']==""){echo "img/profile.jpg"; } else {echo $srow['photo'];} ?>" width="70%" class="rounded-circle">
              </div>
              <div class="col-md-8">
                <div class="card-body"><br>
						        
							
                  		<b><span style="font-size:22px;"> ITM-ADMIN</span></b><br>		  
                  		<b><span style="font-size:15px;"> 
					    Admin Panel
						</span></b>		  
			

				  
                </div>
              </div>
            </div> 
		  
					</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                  </div>
                </div>
              </div> 

