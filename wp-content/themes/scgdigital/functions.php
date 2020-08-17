<?php

/**
 * Scg digital theme functions and definitions
*/


/*Enque Stylesheet */
wp_enqueue_style( 'style', get_stylesheet_uri() );
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css',false,'4.4','all');
wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css',false,'4.5','all');
wp_enqueue_style( 'bootstrap-rebbot', get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css',false,'4.5','all');
wp_enqueue_style( 'slider-css', get_template_directory_uri() . '/assets/css/skdslider.css',false,'4.5','all');
wp_enqueue_style( 'font', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',false,'4.5','all');




/* Enque Javascript files */
wp_enqueue_script( 'jquery',  'http://code.jquery.com/jquery.js', array ( 'jquery' ), 4.5, false);

wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array ( 'jquery' ), 4.5, false);
wp_enqueue_script( 'bootstrap-jsb', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array ( 'jquery' ), 4.5, false);
wp_enqueue_script( 'slider', get_template_directory_uri() . '/assets/js/slider.js', array ( 'jquery' ), 4.5, false);
wp_enqueue_script( 'slider-js', get_template_directory_uri() . '/assets/js/skdslider.min.js', array ( 'jquery' ), 4.5, false);
wp_enqueue_script( 'sliderjs', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array ( 'jquery' ), 4.5, false);


/* Menu option*/
add_theme_support( 'menus' );

function register_my_menu() {
  register_nav_menu('primary-menu',__( 'Primary menu' ));
}
add_action( 'init', 'register_my_menu' );

function wp_get_menu_array($current_menu) {

    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['children'] = array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID'] = $m->ID;
            $submenu[$m->ID]['title'] = $m->title;
            $submenu[$m->ID]['url'] = $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;
}

/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
    $labels = array(
        'name'                => _x( 'Projects', 'Post Type General Name', 'scgdigital' ),
        'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'scgdigital' ),
        'menu_name'           => __( 'Projects', 'scgdigital' ),
        'parent_item_colon'   => __( 'Parent Projects', 'scgdigital' ),
        'all_items'           => __( 'All Projects', 'scgdigital' ),
        'view_item'           => __( 'View Poject', 'scgdigital' ),
        'add_new_item'        => __( 'Add New Project', 'scgdigital' ),
        'add_new'             => __( 'Add New', 'scgdigital' ),
        'edit_item'           => __( 'Edit Project', 'scgdigital' ),
        'update_item'         => __( 'Update Project', 'scgdigital' ),
        'search_items'        => __( 'Search Project', 'scgdigital' ),
        'not_found'           => __( 'Not Found', 'scgdigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'scgdigital' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'projects', 'scgdigital' ),
        'description'         => __( 'Projects to display in CV', 'scgdigital' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );

    $labels1 = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name', 'scgdigital' ),
        'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'scgdigital' ),
        'menu_name'           => __( 'Testimonials', 'scgdigital' ),
        'parent_item_colon'   => __( 'Parent Testimonials', 'scgdigital' ),
        'all_items'           => __( 'All Testimonials', 'scgdigital' ),
        'view_item'           => __( 'View Testimonials', 'scgdigital' ),
        'add_new_item'        => __( 'Add New Testimonial', 'scgdigital' ),
        'add_new'             => __( 'Add New', 'scgdigital' ),
        'edit_item'           => __( 'Edit Project', 'scgdigital' ),
        'update_item'         => __( 'Update Project', 'scgdigital' ),
        'search_items'        => __( 'Search Project', 'scgdigital' ),
        'not_found'           => __( 'Not Found', 'scgdigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'scgdigital' ),
    );
     
// Set other options for Custom Post Type
     
    $args1 = array(
        'label'               => __( 'testimonials', 'scgdigital' ),
        'description'         => __( 'Testimonials to display in Carosel', 'scgdigital' ),
        'labels'              => $labels1,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
   


     
    // Registering your Custom Post Type
    register_post_type( 'projects', $args );
    register_post_type( 'testimonials', $args1 );
 
}

add_action( 'init', 'custom_post_type', 0 );


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';



function scgdigital_widgets_init() {
    register_sidebar( array(
        'name' => 'Text Above Our Services',
        'id' => 'text-above-our-services-widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => 'Our Services',
        'id' => 'our-services-widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="rounded">',
        'after_title' => '</h4>',
    ) );
}
add_action( 'widgets_init', 'scgdigital_widgets_init' );

/**
* Services Widget
*/
require get_template_directory() . '/inc/services-widget.php';

require get_template_directory() . '/inc/shortcode.php';
?>