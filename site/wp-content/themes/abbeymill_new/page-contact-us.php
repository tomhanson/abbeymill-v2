<?php get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="contact-image">
                 <!-- <img src="<?php the_field('contact_main_image'); ?>" alt="<?php the_title(); ?>" /> -->            
             </div>            
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="get-in-touch-info">
                    <h2>Feel free to get in touch. We would love to hear from you.</h2>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-5">
                <div class="form-horizontal contact-form">                
                    <?php echo do_shortcode( '[contact-form-7 id="1793" title="Contact form"]' ); ?>
                </div>


            </div>
            <div class="col-sm-6 col-md-5">
                <iframe style="max-width: 100%; border: 1px solid #333;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2447.976972112849!2d-0.7006856!3d52.15292849999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4877a8ddf6b4bde3%3A0x764c7a153ca5b499!2sRose+Court%2C+Olney%2C+Milton+Keynes+MK46+4BY!5e0!3m2!1sen!2suk!4v1424906880280" width="800" height="350" frameborder="0" style="border:0"></iframe>
            </div>
        </div>
    </div>

<?php get_footer(); ?>