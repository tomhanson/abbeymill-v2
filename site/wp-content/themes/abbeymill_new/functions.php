<?php
define( 'TEMPPATH', get_bloginfo('stylesheet_directory'));  /*shortcut to root directory */
define( 'IMAGES', TEMPPATH. "/images");  /*shortcut to images root directory*/

/* register the nav menu */

register_nav_menus(array(
					'Main Menu' => 'Main') );
					
										
/* show me which template i am currently using 
function show_me_the_template()
{
    if (current_user_can( 'manage_options' )) {
        global $template, $wp_admin_bar;
        get_currentuserinfo();
        if ( is_admin_bar_showing() ) {
            $wp_admin_bar->add_menu( array(
                'parent' => false,
                'id' => 'template',
                'title' => $template,
                'href' => '#'
            ));
        }
    }
}
add_action( 'wp_head', 'show_me_the_template');
/* End template showing function */



// Register Custom Post Type - Properties
// function Properties() {

// 	$labels = array(
// 		'name'                => _x( 'Properties', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'       => _x( 'Property', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'           => __( 'Properties', 'text_domain' ),
// 		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
// 		'all_items'           => __( 'All Properties', 'text_domain' ),
// 		'view_item'           => __( 'View Properties', 'text_domain' ),
// 		'add_new_item'        => __( 'Add Property', 'text_domain' ),
// 		'add_new'             => __( 'Add New Property', 'text_domain' ),
// 		'edit_item'           => __( 'Edit Property', 'text_domain' ),
// 		'update_item'         => __( 'Update Property', 'text_domain' ),
// 		'search_items'        => __( 'Search Property', 'text_domain' ),
// 		'not_found'           => __( 'No Property Found', 'text_domain' ),
// 		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
// 	);
// 	$args = array(
// 		'label'               => __( 'Properties', 'text_domain' ),
// 		'description'         => __( 'Properties', 'text_domain' ),
// 		'labels'              => $labels,
// 		'supports'            => array( 'title', 'page-attributes', ),
// 		'taxonomies'          => array( 'category', 'post_tag' ),
// 		'hierarchical'        => true,
// 		'public'              => true,
// 		'show_ui'             => true,
// 		'show_in_menu'        => true,
// 		'show_in_nav_menus'   => true,
// 		'show_in_admin_bar'   => true,
// 		'menu_position'       => 2,
// 		'menu_icon'           => 'dashicons-admin-home',
// 		'can_export'          => true,
// 		'has_archive'         => true,
// 		'exclude_from_search' => false,
// 		'publicly_queryable'  => true,
// 		'capability_type'     => 'page',
// 		'show_in_rest'				=> true
// 	);
// 	register_post_type( 'Properties', $args );

// }

// // Hook into the 'init' action
// add_action( 'init', 'Properties', 0 );

// // Register Custom Post Type - Portfolio
// function Portfolio() {

// 	$labels = array(
// 		'name'                => _x( 'Portfolio', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'           => __( 'Portfolio', 'text_domain' ),
// 		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
// 		'all_items'           => __( 'Portfolio', 'text_domain' ),
// 		'view_item'           => __( 'View Properties', 'text_domain' ),
// 		'add_new_item'        => __( 'Add New Image', 'text_domain' ),
// 		'add_new'             => __( 'Add New Image', 'text_domain' ),
// 		'edit_item'           => __( 'Edit Image', 'text_domain' ),
// 		'update_item'         => __( 'Update Image', 'text_domain' ),
// 		'search_items'        => __( 'Search Property', 'text_domain' ),
// 		'not_found'           => __( 'No Property Found', 'text_domain' ),
// 		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
// 	);
// 	$args = array(
// 		'label'               => __( 'Portfolio', 'text_domain' ),
// 		'description'         => __( 'Portfolio', 'text_domain' ),
// 		'labels'              => $labels,
// 		'supports'            => array( 'title', ),
// 		'taxonomies'          => array( 'category', 'post_tag' ),
// 		'hierarchical'        => false,
// 		'public'              => true,
// 		'show_ui'             => true,
// 		'show_in_menu'        => true,
// 		'show_in_nav_menus'   => true,
// 		'show_in_admin_bar'   => true,
// 		'menu_position'       => 5,
// 		'menu_icon'           => 'dashicons-format-image',
// 		'can_export'          => true,
// 		'has_archive'         => true,
// 		'exclude_from_search' => false,
// 		'publicly_queryable'  => true,
// 		'capability_type'     => 'page',
// 		'show_in_rest'				=> true
// 	);
// 	register_post_type( 'Portfolio', $args );

// }

// // Hook into the 'init' action
// add_action( 'init', 'Portfolio', 0 );


add_action( 'after_setup_theme', 'baw_theme_setup' );
function baw_theme_setup() {
    add_image_size('propertieslist',240,135,true);
    //add_image_size('custom',450,450,false);
    add_image_size('portfolioThumb',350, 350,true);
    add_image_size('slider',9999, 600,false);
}


add_action( 'admin_init', 'posts_order_wpse_91866' );

function posts_order_wpse_91866() {
    add_post_type_support( 'properties', 'page-attributes' );
}

?>