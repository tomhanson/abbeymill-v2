<style>
  #js-tiles .mix {
    display: none;
  }

</style>
<section id="section:content-block" class="header-padding | content-block content-block--secondary">
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
          $args = array( 
            'post_type' => 'portfolio', 
            'posts_per_page' => '18' 
          );
          $i = 0;
          $portfolio = new WP_Query( $args );       
          while ( $portfolio->have_posts() ) : $portfolio->the_post();
              $image = get_field('portfolio_image'); 
              $status = get_field('portfolio_type'); 
        ?>
        <div class="col-xs-6 col-sm-4 col-md-3 mix                
              <?php if($status == 'Internal') {
                  print " internal ";
              } else {
                  print "external ";
              } ?> 
              ">
          <div class="gallery">
            <a href="<?php echo $image['sizes']['large']; ?>" data-lightbox="<?php echo $i; ?>">
              <img src="<?php echo $image['sizes']['portfolioThumb']; ?>" alt="<?php echo $image['alt']; ?>" />
            </a>
          </div>
        </div>

        <?php $i++; endwhile; ?>

      </div>
    </div>
  </div>
</section>
