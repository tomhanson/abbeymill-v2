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
<section id="section:properties" class="infinite-scroll">
  <div class="container">
    <div class="row">
      <?php
            $args = array(   
            'post_type' => 'properties', 
            'posts_per_page'   => 10, 
            );
            // $myposts = get_field('home_fields');                   
            $myposts = new WP_Query( $args );       
            while ( $myposts->have_posts() ) : $myposts->the_post();
            ?>
        <div class="col-sm-6 | spacing-md--btm-only">
          <?php get_template_part('templates/content', 'tile-primary'); ?>
        </div>
        <?php endwhile; ?>

    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        load more component, when you get near the bottom stop scroll event listener and look for more posts. add spinner
      </div>
    </div>
  </div>
</section>
