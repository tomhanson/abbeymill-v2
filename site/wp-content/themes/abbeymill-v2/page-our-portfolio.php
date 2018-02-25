<section id="section:content-block" class="header-padding | content-block content-block--secondary">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 | text-center | spacing-lg">
        <h1 class="spacing-sm--btm-only">
          <?php the_title(); ?>
        </h1>
        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
          dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
          specimen book.</h5>
      </div>
    </div>
  </div>
</section>
<section id="section:portfolio" class="infinite-scroll">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 portfolio-filters">
        <div class="filter " data-filter="all">Show All</div>
        <div class="filter" data-filter=".internal">Internal</div>
        <div class="filter" data-filter=".external">External</div>
      </div>
    </div>
    <div class="row">
      <div id="js-tiles" class="mix-it-up__wrap">

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
              if($status == 'Internal') {
                $statusText =  "internal";
              } else {
                $statusText =  "external";
              }
        ?>
        <div class="<?php echo " col-sm-6 col-md-4 | mix $statusText " ?>">
          <div class="basic-tile">

            <div class="basic-tile__img">
              <img src=" <?php echo $image[ 'sizes'][ 'img-portfolio']; ?>" alt="
              <?php echo $image['alt']; ?>" />
            </div>

            <a class="secondary-font-color | basic-tile__link" href="#">
              <div class="flex align-center justify-center | secondary-font-color | basic-tile__overlay">
                <h3 class="secondary-font-color">Property title</h3>
              </div>
            </a>
          </div>

        </div>

        <?php $i++; endwhile; ?>

      </div>
    </div>
  </div>
</section>
