
<?php
  require_once 'include/dbconfig.php';
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM magazine_list where id=:uid ' );
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		 
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>News Details - E-Learning & Earning LTD</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <?php include('link.php'); ?>
 
</head>

<body>
 
  <?php include('header.php'); ?> 

  <main id="main"> 
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Latest News / Notice</h2>
          <ol>
            <li><a href="#">Home</a></li>
            <li>News / Notice</li>
          </ol>
        </div>

      </div>
    </section> 
 
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single" data-aos="fade-up"> 
              <div class="entry-img">
                <img src="e-admin/<?php echo $banner_path; ?>" width="100%" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <?php echo $title; ?>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#">E-Learning</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><?php echo  date('d-m-Y H:i',strtotime($date_created)); ?></a></li>
                  <!-- <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="#">12 Comments</a></li>-->
                </ul>
              </div>

              <div class="entry-content">
                
				<?php echo isset($description) ? html_entity_decode($description) : "" ; ?>

              </div>

               
 

              </div>

            </article> 



          <div class="col-lg-4">

            <div class="sidebar" data-aos="fade-left">

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts"> 
			  
			  <?php  require_once 'include/conn2.php';
							 
								$eq=mysqli_query($con,"select * from magazine_list order by id desc limit 6 ");
								while($eqrow=mysqli_fetch_array($eq)){
						$eqrow['description'] = strip_tags(html_entity_decode($eqrow['description']));		
								 
	    ?>
				<div class="post-item clearfix">
                  <img src="e-admin/<?php echo $eqrow['banner_path']; ?>" width="100%">
                  <h4><a href="news-details?edit_id=<?php echo $eqrow['id']; ?>"><?php echo $title; ?></a></h4>
                  <time><?php echo  date('d-m-Y H:i',strtotime($eqrow['date_created'])); ?></time>
                </div> 
				
				
				<?php
		}  
		?>
              </div>  
               
            </div>  
          </div> 
		  
		  
		  

          </div>
        </div>

      </div>
    </section> 

  </main> 

  
   <?php include('footer.php'); ?>
  