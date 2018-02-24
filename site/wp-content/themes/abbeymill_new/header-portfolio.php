<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title><?php bloginfo( 'name' ); ?> | <?php wp_title("",true); ?> </title>
    <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> 
    <![endif]-->
    <script src="<?php print TEMPPATH;?>/js/pace.js"></script>
    <link rel="stylesheet" href="<?php print TEMPPATH; ?>/css/LESS/bootstrap/bootstrap.css" />
    <link rel="stylesheet" href="<?php print TEMPPATH; ?>/css/lightbox/lightbox.min.css" />   
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>
<body class="portfolio-page">
    <div class="sticky-footer">
  <header>
      <div class="container">      
          <div class="row">
              <div class="col-xs-9 col-sm-4 col-md-3 logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php print IMAGES;?>/abbeymill-logo.png" alt="<?php bloginfo( 'name' );?>">
                    <h1><?php bloginfo( 'name' ); ?></h1>
                </a>
              </div>
              <div class="col-xs-3 mobile-nav-button">
                    <button class="mobile-icon">
                        <span class="mobile-icon__sr-only">Toggle navigation</span>
                        <span class="mobile-icon__social-line">&nbsp;</span>
                        <span class="mobile-icon__social-line">&nbsp;</span>
                        <span class="mobile-icon__social-line">&nbsp;</span>
                    </button>
              </div>              
              <div class="col-xs-12 col-sm-8 col-md-9">                  
                  <?php get_sidebar('nav'); ?>
              </div>
          </div>          
      </div>
  </header>
