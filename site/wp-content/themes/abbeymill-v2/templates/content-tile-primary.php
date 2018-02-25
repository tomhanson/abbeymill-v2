<?php $image = get_field('main_photo');  ?>
<div class="property-tile">
  <img src="<?php echo $image['sizes']['img-property-tile']; ?>" alt="<?php the_title(); ?>">
  <div class="property-tile__content">
    <h3 class="spacing-xs--btm-only">
      <?php the_title(); ?>
    </h3>
    <h6 class="spacing-xs--btm-only">
      <?php the_field('property_address'); ?>
    </h6>
    <a href="<?php the_permalink(); ?>" class="property-tile__link">
      <h5>View</h5>
    </a>
  </div>
</div>
