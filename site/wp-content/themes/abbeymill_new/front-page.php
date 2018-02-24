<?php get_header('home'); ?>

<div id="slides">
        <ul class="slides-container">
            
             <?php $args = array(   'post_type' => 'properties', 
                                    'category' => '3',
				                    'posts_per_page'   => 10, 
                                    'orderby' => 'menu_order', 
                                    'order' => 'ASC', 
				);

                    $myposts = get_posts( $args );                   
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                    $image = get_field('main_photo'); ?>
                        <li>
                            <img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>">
                            <div class="slider__content">
                                <a href="<?php the_permalink(); ?>">
                                <h1><?php the_title(); ?></h1>
                                <h3><?php the_field('property_address'); ?></h3></a>
                            </div>
                        </li>

            <?php endforeach; 
            wp_reset_postdata(); ?>
          
        </ul>
        <nav class="slides-navigation">
            <a href="#" class="slider__btn--next next"></a>
            <a href="#" class="slider__btn--prev prev"></a>
        </nav>      
    </div>

<?php get_footer('home'); ?>