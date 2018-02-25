<header class="header header--primary">
  <div class="container-fluid">
    <div class="row">
      <div class="flex align-center">

        <div class="col-xs-4">
          <button class="js-nav-btn | nav__button">
            <h5 class="header__nav-toggle">Menu</h5>
          </button>
          <nav class="flex align-center justify-center | nav nav--primary">
            <button class="js-nav-btn | nav__close">X</button>
            <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
          endif;
          ?>
          </nav>
        </div>
        <div class="col-xs-4">
          <a class="flex align-center justify-center | logo logo--primary" href="<?= esc_url(home_url('/')); ?>">
            <?php if( is_front_page() ) { ?>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-white.png" alt="<?php bloginfo('name'); ?>">
            <?php } else { ?>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-dark.png" alt="<?php bloginfo('name'); ?>">

            <?php } ?>
            <h1 class="logo__text">
              <?php bloginfo('name'); ?>
            </h1>
          </a>
        </div>
        <div class="col-xs-4">
          <div class="search search--primary">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
