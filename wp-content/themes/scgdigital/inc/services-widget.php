
<?php
// Creating the widget 
class wpb_widget extends WP_Widget {
  
function __construct() {
parent::__construct(
  
// Base ID of your widget
'wpb_widget', 
  
// Widget name will appear in UI
__('Our Services Widget', 'wpb_widget_domain'), 
  
// Widget description
array( 'description' => __( 'Widget to show services block', 'wpb_widget_domain' ), ) 
);
}
  
  public $args = array(
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="col-sm-4 text-center">',
        'after_widget'  => '</div>'
    );
// Creating widget front-end
  
public function widget( $args, $instance ) {

$icon = apply_filters( 'widget_title', $instance['icon'] );
$service_title = apply_filters( 'widget_title', $instance['service_title'] );
$service_description = apply_filters( 'widget_title', $instance['service_description'] );
$button_link = apply_filters( 'widget_title', $instance['button_link'] );
$button_text = apply_filters( 'widget_title', $instance['button_text'] );

// before and after widget arguments are defined by themes



if ( ! empty( $below_title ) ){
//echo "<h5>" . $below_title . "</h5>". $args['after_title'];
}
echo '<div class="col-sm-4 text-center">';

if ( ! empty( $icon ) ){
	?>
	<span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x "></i>
              <i class="fa <?php echo $icon ?> fa-stack-1x fa-inverse"></i>
              </span>
 <?php
}
if ( ! empty( $service_title ) ){
echo "<h4>". $service_title. "</h4>";

}
 if ( ! empty( $service_description ) ){
echo "<p>". $service_description. "</p>";

} 
if ( ! empty( $button_text ) ){
echo "<a href=".$button_link."><button type='button' class='btn btn-secondary btn-sm ''>". $button_text. "</button></a>";

} 

echo $args['after_widget'];
}
          
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
if ( isset( $instance[ 'below_title' ] ) ) {
$below_title = $instance[ 'below_title' ];
}
if ( isset( $instance[ 'icon' ] ) ) {
$icon = $instance[ 'icon' ];
}
if ( isset( $instance[ 'service_title' ] ) ) {
$service_title = $instance[ 'service_title' ];
}
if ( isset( $instance[ 'service_description' ] ) ) {
$service_description = $instance[ 'service_description' ];
}
if ( isset( $instance[ 'button_link' ] ) ) {
$button_link = $instance[ 'button_link' ];
}
if ( isset( $instance[ 'button_text' ] ) ) {
$button_text = $instance[ 'button_text' ];
}
//
// Widget admin form
?>

<p>
<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Icon Class:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'service_title' ); ?>"><?php _e( 'Service Title :' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'service_title' ); ?>" name="<?php echo $this->get_field_name( 'service_title' ); ?>" type="text" value="<?php echo esc_attr( $service_title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'service_description' ); ?>"><?php _e( 'Service Discription :' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'service_description' ); ?>" name="<?php echo $this->get_field_name( 'service_description' ); ?>" type="text" value="<?php echo esc_attr( $service_description ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'button_link' ); ?>"><?php _e( 'Button text :' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'button_link' ); ?>"><?php _e( 'Button Link :' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'button_link' ); ?>" name="<?php echo $this->get_field_name( 'button_link' ); ?>" type="text" value="<?php echo esc_attr( $button_link ); ?>" />
</p>
<?php 
}
      
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['below_title'] = ( ! empty( $new_instance['below_title'] ) ) ? strip_tags( $new_instance['below_title'] ) : '';
$instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';
$instance['service_title'] = ( ! empty( $new_instance['service_title'] ) ) ? strip_tags( $new_instance['service_title'] ) : '';
$instance['service_description'] = ( ! empty( $new_instance['service_description'] ) ) ? strip_tags( $new_instance['service_description'] ) : '';
$instance['button_link'] = ( ! empty( $new_instance['button_link'] ) ) ? strip_tags( $new_instance['button_link'] ) : '';
$instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? strip_tags( $new_instance['button_text'] ) : '';

return $instance;
}
 
// Class wpb_widget ends here
} 
 
 // Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

?>