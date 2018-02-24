<?php /* wp_nav_menu( array(
				'walker' => new My_Walker_Nav_Menu() )); */?>


<nav id="global-nav">
    <?php $defaults = array('menu_class'=> 'dropdown');
    wp_nav_menu( $defaults ); ?>
</nav>			
