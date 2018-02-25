<section id="section:banner" class="flex align-center justify-center | header-padding bg-image | banner banner--primary"
  style="background-image: url('<?php the_field('home_banner_image'); ?>');">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 | text-center | banner__headline">
        <h1 class="secondary-font-color">
          <?php the_field('home_banner_headline'); ?>
        </h1>
      </div>
    </div>
  </div>
</section>
<section id="section:content-block" class="spacing-lg | content-block content-block--secondary">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 | text-center">
        <div class="wysiwyg">
          <?php the_field('home_top_content'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="section:slider" class="slider slider--primary">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul class="home-slider">
          <?php
            $args = array(   'post_type' => 'properties', 
            'category' => '3',
            'posts_per_page'   => 10, 
            'orderby' => 'menu_order', 
            'order' => 'ASC', 
            );
            // $myposts = get_field('home_fields');                   
            $myposts = new WP_Query( $args );       
            while ( $myposts->have_posts() ) : $myposts->the_post();
            ?>
            <li>
              <?php get_template_part('templates/content', 'tile-primary'); ?>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
        <div class="text-center | spacing-md--top-only spacing-lg--btm-only">
          <a href="/our-properties" class="btn btn--primary">
            View all properties
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="section:cta" class="primary-brand-bg | cta cta--primary">
  <div class="max-width-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-6 | cta__overide-grid-position">
          <?php $img = get_field('home_content_image'); ?>
          <img src="<?php echo $img['sizes']['large']; ?>" alt="alt tag">
        </div>
        <div class="col-md-6 col-md-offset-6 col-lg-5 col-lg-offset-7">
          <div class="wysiwyg | spacing-lg">
            <h2>
              <?php the_field('home_bottom_content_headline'); ?>
            </h2>
            <h5 class="secondary-font-color">
              <?php the_field('home_bottom_content_subheadline'); ?>
            </h5>
            <a href="#" class="btn btn--primary">Read our story</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="section:testimonial" class="text-center | spacing-lg | testimonials">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
        <div class="slider slider--secondary">

          <h2 class="spacing-sm--btm-only">
            <?php the_field('home_testimonials_headline'); ?>
          </h2>
          <h6 class="spacing-sm--btm-only">
            <?php the_field('home_testimonials_subheadline'); ?>
          </h6>
          <div class="testimonial-slider">
            <?php while( have_rows('home_testimonials') ) : the_row(); ?>
            <div class="testimonial">
              <h4 class="spacing-sm--btm-only">
                <?php the_sub_field('testimonial'); ?>
              </h4>
              <div class="spacing-sm--btm-only | testimonial__image">
                <?php $testImg = get_sub_field('image'); ?>
                <img src="<?php echo $testImg['sizes']['thumbnail']; ?>" alt="<?php the_sub_field('info'); ?>">
              </div>
              <h6>
                <?php the_sub_field('info'); ?>
              </h6>
            </div>
            <?php endwhile; ?>
          </div>

        </div>


      </div>
    </div>
  </div>
</section>
