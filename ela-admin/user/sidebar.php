<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="home">
        <i class="bi bi-grid"></i>
        <span class="text-center"> Dashboard</span>
      </a>
    </li>

    <?php
    $home = ['banner-section', 'slider', 'slider-add', 'slider-edit', 'why', 'why-setting', 'why-add', 'why-edit', 'faq', 'faq-setting', 'faq-add', 'faq-edit', 'stats', 'Stats-add', 'stats-edit', 'parner', 'parner-add', 'parner-edit', 'header-section', 'header-section-add', 'header-section-edit', 'feature-1', 'feature-2'];
    ?>
    <li class="nav-item">
      <a class="nav-link collapsed <?= is_numeric(array_search($activePage, $home)) ? 'active' : ''; ?>" data-bs-target="#home" data-bs-toggle="collapse" href="#">
        <i class="bi bi-house-fill"></i><span>Home & Features </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="home" class="nav-content collapse  <?= is_numeric(array_search($activePage, $home)) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li><a href="banner-section" class="<?= ($activePage == 'banner-section') ? 'active' : ''; ?>"><i class="bi bi-image"></i><span> Banner </span> </a> </li>
        <li><a href="slider" class="<?= ($activePage == 'slider' ||  $activePage == 'slider-add' ||  $activePage == 'slider-edit') ? 'active' : ''; ?>"><i class="bi bi-images"></i><span> Slider </span> </a> </li>
        <li><a href="header-section" class="<?= ($activePage == 'header-section' || $activePage == 'header-section-add' || $activePage == 'header-section-edit') ? 'active' : ''; ?>"><i class="bi bi-list"></i><span> Heading Section </span> </a> </li>

        <li><a href="why" class="<?= ($activePage == 'why' || $activePage == 'why-setting' ||  $activePage == 'why-add' ||  $activePage == 'why-edit') ? 'active' : ''; ?>"><i class="bi bi-person-check"></i><span> Why Chose </span> </a> </li>
        <li><a href="stats" class="<?= ($activePage == 'stats' ||  $activePage == 'Stats-add' ||  $activePage == 'stats-edit') ? 'active' : ''; ?>"><i class="bi bi-bar-chart"></i><span> Stats / Counter </span> </a> </li>
        <li><a href="faq" class="<?= ($activePage == 'faq' || $activePage == 'faq-setting' ||  $activePage == 'faq-add' ||  $activePage == 'faq-edit') ? 'active' : ''; ?>"><i class="bi bi-patch-question"></i><span> FAQ </span> </a> </li>
        <li><a href="parner" class="<?= ($activePage == 'parner' ||  $activePage == 'parner-add' ||  $activePage == 'parner-edit') ? 'active' : ''; ?>"><i class="bi bi-map"></i><span> Partner </span> </a> </li>
        <li><a href="feature-1" class="<?= ($activePage == 'feature-1') ? 'active' : ''; ?>"><i class="bi bi-bookmarks"></i><span> Home Feature </span> </a> </li>
        <li><a href="feature-2" class="<?= ($activePage == 'feature-2') ? 'active' : ''; ?>"><i class="bi bi-bookmarks"></i><span> About Feature </span> </a> </li>
      </ul>
    </li>




    <?php
    $course_arr = ['course', 'course-add', 'course-edit', 'course-category', 'course-category-add'];
    ?>
    <li class="nav-item">
      <a class="nav-link collapsed <?= is_numeric(array_search($activePage, $course_arr)) ? 'active' : ''; ?>" data-bs-target="#Course" data-bs-toggle="collapse" href="#">
        <i class="bi bi-book-half"></i><span>Course </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Course" class="nav-content collapse  <?= is_numeric(array_search($activePage, $course_arr)) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li><a href="course-category" class="<?= ($activePage == 'course-category' ||  $activePage == 'course-category-add') ? 'active' : ''; ?>"><i class="bi bi-bookmarks-fill"></i><span> Category </span> </a> </li>
        <li><a href="course" class="<?= ($activePage == 'course' ||  $activePage == 'course-add' ||  $activePage == 'course-edit') ? 'active' : ''; ?>"><i class="bi bi-book-half"></i><span> Course List </span> </a> </li>
      </ul>
    </li>

    <?php $about_arr = ['web-about-sec', 'edit-web-about-sec', 'team', 'add-team', 'edit-team', 'teacher', 'teacher-add', 'teacher-edit', 'testimonial', 'Testimonial-add', 'testimonial-edit', 'mission', 'Mission-add', 'mission-edit', 'vision', 'Vision-add', 'vision-edit', 'success-student', 'success-student-add', 'success-student-edit'] ?>

    <li class="nav-item">
      <a class="nav-link collapsed <?= is_numeric(array_search($activePage, $about_arr)) ? 'active' : ''; ?>" data-bs-target="#Website" data-bs-toggle="collapse" href="#">
        <i class="bi bi-laptop"></i><span>About</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>

      <ul id="Website" class="nav-content collapse <?= is_numeric(array_search($activePage, $about_arr)) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li><a href="web-about-sec" class="<?= ($activePage == 'web-about-sec' || $activePage == 'edit-web-about-sec') ? 'active' : ''; ?>"><i class="bi bi-card-checklist"></i><span> About Us </span> </a> </li>
        <li><a href="mission" class="<?= ($activePage == 'mission' ||  $activePage == 'Mission-add' ||  $activePage == 'mission-edit') ? 'active' : ''; ?>"><i class="bi bi-bricks"></i><span> Mission </span> </a> </li>
        <li><a href="vision" class="<?= ($activePage == 'vision' ||  $activePage == 'Vision-add' ||  $activePage == 'vision-edit') ? 'active' : ''; ?>"><i class="bi bi-binoculars-fill"></i><span> Vision </span> </a> </li>
        <li><a href="team" class="<?= ($activePage == 'team' ||  $activePage == 'add-team' ||  $activePage == 'edit-team') ? 'active' : ''; ?>"><i class="bi bi-people-fill"></i><span> Team Member </span> </a> </li>
        <li><a href="teacher" class="<?= ($activePage == 'teacher' ||  $activePage == 'teacher-add' ||  $activePage == 'teacher-edit') ? 'active' : ''; ?>"><i class="bi bi-person-workspace"></i><span> Our Teacher </span> </a> </li>
        <li><a href="testimonial" class="<?= ($activePage == 'testimonial' ||  $activePage == 'Testimonial-add' ||  $activePage == 'testimonial-edit') ? 'active' : ''; ?>"><i class="bi bi-chat-left-quote-fill"></i><span> Testimonial </span> </a> </li>
        <li><a href="success-student" class="<?= ($activePage == 'success-student' ||  $activePage == 'success-student-add' ||  $activePage == 'success-student-edit') ? 'active' : ''; ?>"><i class="bi bi-images"></i><span> Successful Students </span> </a> </li>
      </ul>
    </li>


    <?php
    $gallery = ['gallery-image', 'gallery-image-add', 'gallery-image-edit', 'gallery-video', 'gallery-video-add', 'gallery-video-edit'];
    ?>
    <li class="nav-item">
      <a class="nav-link collapsed <?= is_numeric(array_search($activePage, $gallery)) ? 'active' : ''; ?>" data-bs-target="#gallery" data-bs-toggle="collapse" href="#">
        <i class="bi bi-book-half"></i><span>Gallery </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="gallery" class="nav-content collapse  <?= is_numeric(array_search($activePage, $gallery)) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li><a href="gallery-image" class="<?= ($activePage == 'gallery-image' ||  $activePage == 'gallery-image-add' ||  $activePage == 'gallery-image-edit') ? 'active' : ''; ?>"><i class="bi bi-bookmarks-fill"></i><span> Image Gallery </span> </a> </li>
        <li><a href="gallery-video" class="<?= ($activePage == 'gallery-video' ||  $activePage == 'gallery-video-add' ||  $activePage == 'gallery-video-edit') ? 'active' : ''; ?>"><i class="bi bi-book-half"></i><span> Video Gallery </span> </a> </li>
      </ul>
    </li>

    <?php $news_arr = ['contact-list', 'course-apply-list']; ?>
    <li class="nav-item">
      <a class="nav-link collapsed <?= is_numeric(array_search($activePage, $news_arr)) ? 'active' : ''; ?>" data-bs-target="#Apply" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-lines-fill"></i><span>Contact / Apply </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Apply" class="nav-content collapse  <?= is_numeric(array_search($activePage, $news_arr)) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li><a href="contact-list" class="<?= ($activePage == 'contact-list') ? 'active' : ''; ?>"><i class="bi bi-list"></i><span> Contact List </span> </a> </li>
        <li><a href="course-apply-list" class="<?= ($activePage == 'course-apply-list') ? 'active' : ''; ?>"><i class="bi bi-list"></i><span> Course Apply List </span> </a> </li>
      </ul>
    </li>


    <?php
    $service_arr = ['notice', 'notice-add', 'notice-edit', 'publish', 'publish-add', 'publish-edit', 'blog', 'blog-add', 'blog-edit'];
    ?>
    <li class="nav-item">
      <a class="nav-link collapsed <?= is_numeric(array_search($activePage, $service_arr)) ? 'active' : ''; ?>" data-bs-target="#news" data-bs-toggle="collapse" href="#">
        <i class="bi bi-newspaper"></i><span>News / Blog </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="news" class="nav-content collapse  <?= is_numeric(array_search($activePage, $service_arr)) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li><a href="blog" class="<?= ($activePage == 'blog' ||  $activePage == 'blog-add' ||  $activePage == 'blog-edit') ? 'active' : ''; ?>"><i class="bi bi-images"></i><span> Blog </span> </a> </li>
        <li><a href="notice" class="<?= ($activePage == 'notice' ||  $activePage == 'notice-add' ||  $activePage == 'notice-edit') ? 'active' : ''; ?>"><i class="bi bi-newspaper"></i><span> News / Notice </span> </a> </li>
        <li><a href="publish" class="<?= ($activePage == 'publish' ||  $activePage == 'publish-add' ||  $activePage == 'publish-edit') ? 'active' : ''; ?>"><i class="bi bi-newspaper"></i><span> Publish </span> </a> </li>
      </ul>
    </li>



    <?php
    $service_arr = ['service', 'service-add', 'service-edit', 'service-category', 'service-category-add', 'services-feature'];
    ?>
    <li class="nav-item d-none">
      <a class="nav-link collapsed <?= is_numeric(array_search($activePage, $service_arr)) ? 'active' : ''; ?>" data-bs-target="#Service" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layers-fill"></i><span>Service </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Service" class="nav-content collapse  <?= is_numeric(array_search($activePage, $service_arr)) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li><a href="service-category" class="<?= ($activePage == 'service-category' ||  $activePage == 'service-category-add') ? 'active' : ''; ?>"><i class="bi bi-bookmarks-fill"></i><span> Category </span> </a> </li>
        <li><a href="service" class="<?= ($activePage == 'service' ||  $activePage == 'service-add' ||  $activePage == 'service-edit') ? 'active' : ''; ?>"><i class="bi bi-layers-fill"></i><span> Service List </span> </a> </li>
        <li><a href="services-feature" class="<?= ($activePage == 'services-feature') ? 'active' : ''; ?>"><i class="bi bi-list"></i><span> Service Features </span> </a> </li>
      </ul>
    </li>


    <?php
    $service_arr = ['why-chosse-feature', 'call-to-action', 'team-feature', 'apply-feature'];
    ?>
    <li class="nav-item">
      <a class="nav-link collapsed <?= is_numeric(array_search($activePage, $service_arr)) ? 'active' : ''; ?>" data-bs-target="#Features" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layers-fill"></i><span>Features </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Features" class="nav-content collapse  <?= is_numeric(array_search($activePage, $service_arr)) ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li><a href="why-chosse-feature" class="<?= ($activePage == 'why-chosse-feature') ? 'active' : ''; ?>"><i class="bi bi-bookmarks-fill"></i><span> Why Chose Us </span> </a> </li>
        <li><a href="call-to-action" class="<?= ($activePage == 'call-to-action') ? 'active' : ''; ?>"><i class="bi bi-list"></i><span> Call To Action </span> </a> </li>
        <li><a href="team-feature" class="<?= ($activePage == 'team-feature') ? 'active' : ''; ?>"><i class="bi bi-list"></i><span> Team Features </span> </a> </li>
        <li><a href="apply-feature" class="<?= ($activePage == 'apply-feature') ? 'active' : ''; ?>"><i class="bi bi-list"></i><span> Course Apply </span> </a> </li>
      </ul>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed <?= ($activePage == 'seo' || $activePage == 'seo-add' || $activePage == 'seo-edit') ? 'active' : ''; ?>" href="seo">
        <i class="bi bi-search"></i>
        <span>Page & SEO Settings</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed <?= ($activePage == 'contact-info' || $activePage == 'contact-info-add' || $activePage == 'contact-info-edit' || $activePage == 'social-media' ||  $activePage == 'social-media-add' ||  $activePage == 'social-media-edit' || $activePage == 'branch' || $activePage == 'Branch-add' || $activePage == 'branch-edit' || $activePage == 'map' || $activePage == 'map-add' || $activePage == 'map-edit') ? 'active' : ''; ?>" data-bs-target="#Contact" data-bs-toggle="collapse" href="#">
        <i class="bi bi-telephone"></i><span>Contact Settings </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Contact" class="nav-content collapse <?= ($activePage == 'contact-info' || $activePage == 'contact-info-add' || $activePage == 'contact-info-edit' || $activePage == 'social-media' ||  $activePage == 'social-media-add' ||  $activePage == 'social-media-edit' || $activePage == 'branch' || $activePage == 'Branch-add' || $activePage == 'branch-edit' || $activePage == 'map' || $activePage == 'map-add' || $activePage == 'map-edit') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">

        <li><a href="contact-info" class="<?= ($activePage == 'contact-info' || $activePage == 'contact-info-add' || $activePage == 'contact-info-edit') ? 'active' : ''; ?>"><i class="bi bi-telephone"></i><span> Contact </span> </a> </li>
        <li><a href="social-media" class="<?= ($activePage == 'social-media' ||  $activePage == 'social-media-add' ||  $activePage == 'social-media-edit') ? 'active' : ''; ?>"><i class="bi bi-menu-app-fill"></i><span> Social Media </span> </a> </li>
        <li><a href="division" class="<?= ($activePage == 'division' ||  $activePage == 'division-add' ||  $activePage == 'division-edit') ? 'active' : ''; ?>"><i class="bi bi-house-fill"></i><span> Division </span> </a> </li>
		<li><a href="branch" class="<?= ($activePage == 'branch' ||  $activePage == 'Branch-add' ||  $activePage == 'branch-edit') ? 'active' : ''; ?>"><i class="bi bi-house-fill"></i><span> Branch </span> </a> </li>
        <li><a href="map" class="<?= ($activePage == 'map' ||  $activePage == 'Map-add' ||  $activePage == 'map-edit') ? 'active' : ''; ?>"><i class="bi bi-geo-alt-fill"></i><span> Map </span> </a> </li>

      </ul>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed <?= ($activePage == 'users-profile') ? 'active' : ''; ?>" href="users-profile">
        <i class="bi bi-person"></i>
        <span>Profile Settings</span>
      </a>
    </li>


 


  </ul>

</aside>