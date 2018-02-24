<footer class="footer footer--primary">
  <div class="container">
    <div class="footer__border">
      <div class="row">
        <div class="col-sm-4 col-md-3 col-lg-2">
          <?php
          if (has_nav_menu('footer_nav_1')) :
            wp_nav_menu(['theme_location' => 'footer_nav_1', 'menu_class' => 'nav']);
          endif;
          ?>
        </div>
        <div class="col-sm-4 col-md-3 col-lg-2">
          <?php
          if (has_nav_menu('footer_nav_2')) :
            wp_nav_menu(['theme_location' => 'footer_nav_2', 'menu_class' => 'nav']);
          endif;
          ?>
        </div>
        <div class="col-sm-4 col-md-offset-2 col-md-5 col-lg-offset-3">
          <div style="text-align: right;">

            <div class="search search--secondary">
              <?php get_search_form(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
