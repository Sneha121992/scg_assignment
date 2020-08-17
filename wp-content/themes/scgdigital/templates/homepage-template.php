<?php
/**
 * Template Name: Home Page Template 
 **/

 get_header();
?>

<style type="text/css">
  body { margin:0; padding:0;}
  .demo-code{ background-color:#ffffff; border:1px solid #333333; display:block; padding:10px;}
  .option-table td{ border-bottom:1px solid #eeeeee;}
  
</style>
<div class="container-fluid">
<div class="row" id="slider">
	
    <div id="demo2">
      <div class="slide">
          <img src="http://localhost/scg_assignment/files/2020/08/RR_BlogImage_Sliders-1.jpg" />
          <!--Slider Description example-->
           <div class="slide-desc">
              <h2>Slider Title 1</h2>
              <p>Demo description here. Demo description here. Demo description here. Demo description here. Demo description here. <a class="more" href="#">more</a></p>
            </div>
      </div>
      <div class="slide"><img src="http://localhost/scg_assignment/files/2020/08/1_718Rp957TTYXCMegVIUK7g.jpeg" />
         <div class="slide-desc">
          <h2>Slider Title 2</h2>
          <p>Demo description here. Demo description here. Demo description here. Demo description here. Demo description here. <a class="more" href="#">more</a></p>
        </div>
      </div>
      <div class="slide"><img src="http://localhost/scg_assignment/files/2020/08/4.jpg" />
        <!--NO Description Here-->
      </div>
      
    </div>

</div>
</div>
<!-- Service -->
<section class="section mt-5">
<div class="container">
	
<?php if ( is_active_sidebar( 'our-services-widget' ) ) { ?>
<?php get_template_part( 'inc/sidebar', 'services' ); ?>
<?php } ?>

</div>

</section>

 <?php
     the_content();
  ?>

<?php 
get_footer();
?>