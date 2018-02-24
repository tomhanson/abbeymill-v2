
<?php get_header('individual'); ?>
<div style="box-shadow: 0 5px 9px rgba(0, 0, 0, 0.18); overflow: hidden;">
    <div class="single-property-tabs">
        <div class="tab-wrapper">            
            <div id="panel1" class="panel">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php $images = get_field('gallery'); ?>    
                                    <?php if($images) { ?>
                                        <?php foreach( $images as $image ): ?>
                                                <li><img src="<?php echo $image['sizes']['slider']; ?>" alt="<?php echo $image['alt']; ?>" /></li>           
                                        <?php endforeach; ?> 
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="panel2" class="panel">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="specs">
                                <?php if( get_field('property_specs') ) {
                                    the_field('property_specs');    
                                } else { ?>
                                <ul style="list-style-type:none;">
                                    <li>Specification coming soon.</li>
                                </ul>                                    
                                <?php } ?>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>

            <div id="panel4" class="panel" style="height:350px;">
                <?php   
                    $latlng = trim(rtrim(ltrim(get_field('latlng'),'('),')'));  
                    $latlng = explode(',',$latlng);
                ?>
                <div id="single-map" style="width:auto !important;height:350px !important;display:block;"></div>
            </div>
            <script src="//maps.google.com/maps/api/js?sensor=true&key=AIzaSyAQP_ZUNOZEmMzdpB5dSbBVfew693OxlG0"></script>
            <script src="<?php print TEMPPATH; ?>/js/gmaps.js"></script>
            <script>
        
                function initialize(){
                    var map = new GMaps({
                        div: 'single-map',
                        lat: '<?php echo $latlng[0]; ?>',
                        lng: '<?php echo $latlng[1]; ?>'
                    });
                    map.addMarker({
                      lat: '<?php echo $latlng[0]; ?>',
                      lng: '<?php echo $latlng[1]; ?>',
                      title: '<?php the_title(); ?>'
                    });
                    map.setZoom(14);
                }       
                google.maps.event.addDomListener(window, 'load', initialize);


            </script>
        </div> 
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div id="content">
                    <div class="property-title">
                        <h2><?php the_title(); ?></h2>
                        <span class="triangle">+</span>
                    </div>
                    <nav>
                        <div id="panels">
                            <ul class="tabs">
                                <li><a href="#panel1">Overview</a></li>
                                <li><a href="#panel2">Specification</a></li>
                                <?php if( get_field('brochure') ) { ?>
                                <li id="brochure" data-target="#panel3" data-toggle="modal">Brochure</li>
                                <?php } ?>
                                <li><a id="location" href="#panel4">Location</a></li>
                            </ul> 
                        </div>  
                    </nav>
                </div>
            </div>
        </div>
        <div class="row property-info">
            <div class="col-sm-8 col-md-8">
                <h4><?php the_field('property_address'); ?></h4>
                <p><?php the_field('property_description'); ?></p>
                <h5>For further information please contact
                <?php bloginfo( 'name' ); ?> – 01234 714844.</h5>
                <div class="information-button">
                  <a href="/contact-us" class="btn">Request Information</a>
                </div>
            </div> 
            <div class="col-sm-4 col-md-3 col-md-offset-1">
                <h3>Price: £<span><?php the_field('property_price'); ?></span></h3>
                <h3>Completion: <span><?php the_field('completion_date'); ?></span></h3>
            </div>
        </div>
</div>
<?php $brochure = get_field('brochure'); ?>
<?php if($brochure) { ?>

<!-- Modal -->
<div class="modal fade" id="panel3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="pane modal-dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
     <div class="modal-content">
      <div class="container-fluid modal-body">
          <div class="row">
              <div class="col-xs-12">
                  <div id="flipbook-wrapper" style="width: 100%;">
                      <div id="flipbook" style="margin: auto; max-width: 100%;">
                          <?php foreach( $brochure as $page ): ?>
                          <div class="wowbook-hardpage">
                              <img src="<?php echo $page['sizes']['large']; ?>" alt="<?php echo $page['alt']; ?>" />
                          </div>
                          <?php endforeach; ?>
                      </div>
                      <div class="download-button">
                        <p>Click the edges of the book to turn the page or download a brochure by clicking below</p>
                        <a href="<?php the_field('brochure_download'); ?>" target="_blank" class="btn">Download Brochure</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php get_footer('individual'); ?>