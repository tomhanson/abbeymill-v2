<?php get_header(); ?>
<section class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 about-us__info">

            <?php the_field('about_left_content'); ?>

            </div>
            <div class="col-sm-6">
                <img src="<?php the_field('about_us_image'); ?>" alt="<?php the_title(); ?>" />
            </div>
        </div>
    </div>
</section>
    

<?php get_footer(); ?>