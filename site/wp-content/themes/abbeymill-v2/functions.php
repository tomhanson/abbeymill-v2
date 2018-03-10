<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_action( 'wp_ajax_my_action', 'my_action' );
add_action( 'wp_ajax_nopriv_my_action', 'my_action' );

function my_action() {
  $args = array(   
    'post_type' => 'properties', 
    'posts_per_page'   => 10, 
    'paged' => $_POST['page'],
    'meta_query' => array(
      array(
        'key'     => 'property_status',
        'value'   => $_POST['type'],
        'compare' => 'IN',
      ),
    ),
  );
  // $myposts = get_field('home_fields');                   
  $myposts = new WP_Query( $args );       
  while ( $myposts->have_posts() ) : $myposts->the_post();
    get_template_part('templates/ajax-content', 'tile-primary');
  endwhile; wp_die(); // this is required to terminate immediately and return a proper response }
}
