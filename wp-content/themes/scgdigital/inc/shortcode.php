<?php
function show_testimonial_carousel() {
   $args = array('post_type' => 'testimonials', 'posts_per_page' => -1);
			$myQuery = new WP_Query($args);
			
			?>
		    
		  
    <?php
	$message="<div class=-'row'>
	          <div id='carouselExampleControls' class='carousel slide' data-ride='carousel' style='
    width: 100%;''>
     
  <div class='carousel-inner'>";?>
  <?php if ($myQuery->have_posts()) : $myQuery->the_post();?>
  	<?php $message.="<div class='carousel-item active' >
      <div style='height: 300px;background-color: #4C4A49;'></div>
      <div class='carousel-caption d-none d-md-block'>
    <h5>".get_the_title()."</h5>
    <p>".get_the_content()."</p>
    </div>
    </div>";  ?>
    <?php endif; ?>
  	<?php while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
    <?php $message.="<div class='carousel-item ' >
      <div style='height: 300px;background-color: #4C4A49;'></div>
      <div class='carousel-caption d-none d-md-block'>
    <h5>".get_the_title()."</h5>
    <p>".get_the_content()."</p>
    </div>
    </div>";  ?>
      <?php endwhile; 
			 wp_reset_postdata(); ?>
					
		<?php $message.="</div>
  <a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='sr-only'>Previous</span>
  </a>
  <a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='sr-only'>Next</span>
  </a>
</div>";

return $message;
} 
// register shortcode
add_shortcode('show_testimonial_carousel', 'show_testimonial_carousel');

?>