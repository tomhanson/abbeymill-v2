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


            <div id="panel3" class="panel">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php $brochure = get_field('brochure'); ?>
                            <div id="flipbook-wrapper">
                                <div id="flipbook" style="margin: auto;">
                                    <?php foreach( $brochure as $page ): ?>
                                    <div class="wowbook-hardpage"><img src="<?php echo $page['sizes']['large']; ?>" alt="<?php echo $page['alt']; ?>" /></div>
                                    <?php endforeach; ?> 
                                </div> 

                                <div class="download-button">
                                <a href="<?php the_field('brochure_download'); ?>" target="_blank" class="btn">Download Brochure</a>
                                </div>
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


            <script src="//maps.google.com/maps/api/js?sensor=true"></script>
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

                                <li><a id="brochure" href="#panel3">Brochure</a></li>

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
            </div> 
            <div class="col-sm-4 col-md-3 col-md-offset-1">
                <h3>Price: £<span><?php the_field('property_price'); ?></span></h3>
                <h3>Completion: <span><?php the_field('completion_date'); ?></span></h3>

            </div>           

        </div>
</div>

<?php get_footer('individual'); ?>