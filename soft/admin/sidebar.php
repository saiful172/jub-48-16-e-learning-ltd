<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dash">
          <i class="bi bi-grid"></i>
          <span>Home / Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
	  
	  <li class="nav-item">
        <a class="nav-link collapsed <?= ($activePage == 'client' || $activePage == 'client-trail-active') ? 'active' : ''; ?>" data-bs-target="#clients-list-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Clients / Customer</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="clients-list-nav" class="nav-content collapse <?= ($activePage == 'client' || $activePage == 'client-trail-active') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
            <li><a href="client" class="<?= ($activePage == 'client') ? 'active' : ''; ?>">  <i class="bi bi-person-plus-fill"></i><span>All Clients </span> </a> </li>
		 </ul>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link collapsed <?= ($activePage == 'option-status' || $activePage == 'option-status-add' ||  $activePage == 'option-status-edit') ? 'active' : ''; ?>" href="option-status">
          <i class="bi bi-person"></i>
          <span>Access Control</span>
        </a>
      </li> 
	  
	  <li class="nav-item">
        <a class="nav-link collapsed <?= ($activePage == 'inv-color' || $activePage == 'inv-color-add' ||  $activePage == 'inv-color-edit') ? 'active' : ''; ?>" href="inv-color">
          <i class="bi bi-brush-fill"></i>
          <span>Color</span>
        </a>
      </li> 
	  
	  <li class="nav-item">
        <a class="nav-link collapsed <?= ($activePage == 'trial-free' || $activePage == 'trial-free' ||  $activePage == 'trial-free') ? 'active' : ''; ?>" href="trial-free">
          <i class="bi bi-gift-fill"></i>
          <span>Free Trial</span>
        </a>
      </li> 
	  
	  
	  <li class="nav-item">
        <a class="nav-link collapsed <?= ($activePage == 'contact-info' || $activePage == 'contact-info' ||  $activePage == 'contact-info') ? 'active' : ''; ?>" href="contact-info">
          <i class="bi bi-person-fill"></i>
          <span>Contact</span>
        </a>
      </li> 
	  
	  
	  
	  
	  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#ProductList" data-bs-toggle="collapse" href="#">
          <i class="bi bi-geo-alt-fill"></i><span>Location</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="ProductList" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="division">
              <i class="bi bi-geo-alt-fill"></i><span>Division </span>
            </a>
          </li>
          
		  <li>
            <a href="District-new">
              <i class="bi bi-geo-alt-fill"></i><span>District</span>
            </a>
          </li>
		  
		  <li>
            <a href="upazila">
              <i class="bi bi-geo-alt-fill"></i><span>Upazilla</span>
            </a>
          </li>
		  
		  
        </ul>
      </li>
 
	  
	  
	  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#QuotSec" data-bs-toggle="collapse" href="#">
          <i class="bi bi-envelope-fill"></i><span>Messages</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="QuotSec" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="send-message">
              <i class="bi bi-envelope-open-fill"></i><span>Send Message</span>
            </a>
          </li>
          <li>
            <a href="cstm-message">
              <i class="bi bi-envelope-open-fill"></i><span>Customer Message</span>
            </a>
          </li>
        </ul>
      </li>
	   
     

      <li class="nav-item">
        <a class="nav-link collapsed <?= ($activePage == 'users-profile') ? 'active' : ''; ?>" href="users-profile">
          <i class="bi bi-person"></i>
          <span>Profile Settings</span>
        </a>
      </li> 

 <li class="nav-item mt-5 text-left" style="position: fixed;bottom:0;left:50px;">
         <img class="opacity-25" src="../includes/itm.png" width="40%">
      </li>
     

    </ul>

  </aside> 
