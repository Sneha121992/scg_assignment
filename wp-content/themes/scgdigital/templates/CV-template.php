<?php
/**
 * Template Name: CV Template 
 **/

 get_header();
?>
<div class="section mb-2">
	<div class="container">
		<div class="row">
			<div class="col align-self-start">
            </div>
			<?php echo the_content(); ?>
           <div class="col align-self-end">
          </div>
			
			</div>
		</div>
	</div>
<div class="section">
	<div class="container">
		<div class="row">
          <?php 
			$args = array('post_type' => 'projects', 'posts_per_page' => -1);
			$myQuery = new WP_Query($args);
			
			?>
		    <?php if ($myQuery->have_posts()) : ?>
		    	<table class="table table-striped">
		    		<tbody>
			<?php while ($myQuery->have_posts()) : $myQuery->the_post(); ?>
                
			      <tr>
			        <td><?php	echo the_title(); ?></td>
			        <td><?php	echo the_content(); ?></td>
			    </tr>
			 
			<?php endwhile;  wp_reset_postdata(); ?>
					</tbody>
					</table>
		<?php endif; ?>
   
		</div>
	</div>
</div>








<?php 
get_footer();

?>