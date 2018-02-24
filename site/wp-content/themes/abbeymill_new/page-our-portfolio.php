<?php get_header('portfolio'); ?>


<style type="text/css">
    #js-tiles .mix{
	display: none;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-xs-12 portfolio-title">
            <h2>Our Portfolio</h2>
        </div>
        <div class="col-xs-12 portfolio-filters">
            <div class="filter btn" data-filter="all">Show All</div>
            <div class="filter btn" data-filter=".internal">Internal</div>
            <div class="filter btn" data-filter=".external">External</div>
        </div>
    </div>
    <div class="row">
        <div id="js-tiles">
        
        <?php 
                $args = array( 'post_type' => 'Portfolio', 'posts_per_page' => '80' );
                       $i = 0;
                    $myposts = get_posts( $args );                   
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                    $image = get_field('portfolio_image'); 
                    $status = get_field('portfolio_type'); 
                 
                                                        ?>
                        <div class="col-xs-6 col-sm-4 col-md-3 mix
                                    
                                    <?php if($status == 'Internal') {
                                        print "internal";
                                    } else {
                                        print "external";
                                    } ?> 
                                    ">
                            <div class="gallery">
                                <a href="<?php echo $image['sizes']['large']; ?>" data-lightbox="<?php echo $i; ?>"><img src="<?php echo $image['sizes']['portfolioThumb']; ?>" alt="<?php echo $image['alt']; ?>" /></a>
                            </div>
                        </div>
                        
                   <?php $i++; ?>

                   <?php endforeach; 
            wp_reset_postdata(); ?>
                
        </div>
    </div>
</div>
<?php get_footer('portfolio'); ?>