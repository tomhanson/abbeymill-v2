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
      <div class="col-xs-12 | spacing-sm |  mix-it-up__filters">
        <div class="mix-it-up__filter" data-filter="all">
          <h6>Show All</h6>
        </div>
        <div class="mix-it-up__filter" data-filter=".internal">
          <h6> Internal</h6>
        </div>
        <div class="mix-it-up__filter" data-filter=".external">
          <h6>External</h6>
        </div>
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
              $link = get_field('portfolio_page_link');
        ?>
        <div class="<?php echo " col-sm-6 col-md-4 | mix " . strtolower($status) ?>">
          <div class="basic-tile">

            <div class="basic-tile__img">
              <img src=" <?php echo $image[ 'sizes'][ 'img-portfolio']; ?>" alt="
              <?php echo $image['alt']; ?>" />
            </div>

            <a class="secondary-font-color | basic-tile__link" href="<?php echo $link['url']; ?>">
              <div class="flex align-center justify-center | secondary-font-color | basic-tile__overlay">
                <h3 class="secondary-font-color text-center">
                  <?php the_title(); ?>
                </h3>
              </div>
            </a>
          </div>

        </div>

        <?php $i++; endwhile; ?>

      </div>
    </div>
  </div>
</section>
