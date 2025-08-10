   <section id="blog" class="blog">
      <div class="container">
	   <div class="section-title">
          <h2>Recent News</h2>
        </div>

        <div class="row">

		 <?php  require_once 'include/conn2.php';
							 
								$eq=mysqli_query($con,"select * from magazine_list order by id desc limit 6 ");
								while($eqrow=mysqli_fetch_array($eq)){
						$eqrow['description'] = strip_tags(html_entity_decode($eqrow['description']));		
								 
	    ?>
	
          <div class="col-lg-4 entries"> 
            <article class="entry" data-aos="fade-up">

                <div class="entry-img">
              <a href="news-details?edit_id=<?php echo $eqrow['id']; ?>">
			  <img src="e-admin/<?php echo $eqrow['banner_path']; ?>" alt="" class="img-fluid">
			  </a>
              </div>

              <h2 class="entry-title">
                <a href="news-details?edit_id=<?php echo $eqrow['id']; ?>"><?php echo $eqrow['title']; ?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">e-Learning</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"> <?php echo  date('d-m-Y H:i',strtotime($eqrow['date_created'])); ?></a></li> 
                </ul>
              </div>

              <div class="entry-content">
                <p>  
				<?php echo substr($eqrow['description'],0,500); ?>
				</p>
				
                <div class="read-more mt-3"><hr>
				<center>  <a href="news-details?edit_id=<?php echo $eqrow['id']; ?>">Read More</a> </center>
                </div>
				
              </div>

            </article>
	</div>	
	
	<?php
		}  
		?>
			
  
 
  

          </div>
	</section>