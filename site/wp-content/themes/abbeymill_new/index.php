<?php get_header('properties'); ?>


<!-- Leave the rest in here -->

<div id="maparea">
  <div id="map-canvas"></div>
  <div id="properties">
    <ul id="resultstable">

<?php

$properties = array( 'overview' => array( 'total' => 0 ) );
$i = 0;

global $query_string;
query_posts( $query_string . '&post_parent=0' );

if( have_posts()) : while(have_posts()) : the_post();

  $pID = get_the_ID();
  $latlng = trim(rtrim(ltrim(get_field('latlng',$pID),'('),')'));
  $latlng = explode(',',$latlng);
  $image = get_field('main_photo',$pID);
  $children = get_children( array('post_parent'=>get_the_ID(),'post_status'=>'publish'),ARRAY_A );

  $properties['properties'][$i]['ID'] = $pID;
  $properties['properties'][$i]['property_address'] = get_field('property_address', $pID);
  $properties['properties'][$i]['property_description'] = get_field('property_description',$pID);
  $properties['properties'][$i]['property_status'] = get_field('property_status',$pID);
  $properties['properties'][$i]['property_permalink'] = get_permalink($pID);
  $properties['properties'][$i]['latlng']['full'] = trim($latlng[0]) . '|' . trim($latlng[1]);
  $properties['properties'][$i]['latlng']['lat'] = $latlng[0];
  $properties['properties'][$i]['latlng']['lng'] = $latlng[1];
  $properties['properties'][$i]['main_photo'] = $image['sizes']['propertieslist'];
  $properties['properties'][$i]['index'] = $i;
  $properties['properties'][$i]['property_title'] = get_the_title();
  $properties['properties'][$i]['children'] = $children;

  ?>
    <li id="mk<?php echo $i; ?>" class="property">
        <a href="<?php echo get_permalink($pID); ?>" data-marker-index="<?php echo $i; ?>">
            <span class="property-image-container">
                <img src="<?php echo $image['sizes']['propertieslist']; ?>" alt="<?php echo the_title(); ?>" />
                <div class="property-overlay">
                    <span class="view-property"><img src="<?php print IMAGES; ?>/hover-cross.png" alt="View Property" /></span>
                </div>
            </span>
            <h3><?php echo the_title(); ?></h3>
            <p><?php echo the_field('property_address'); ?></p>
        </a>
    </li>
  <?php

    foreach($children as $child){

        $childimage = get_field('main_photo',$child['ID']);
        ?>

        <li class="property childproperty">
            <a href="<?php echo get_permalink($pID); ?>">
            <span class="property-image-container">
                <img src="<?php echo $childimage['sizes']['propertieslist']; ?>" alt="<?php echo $child['post_title']; ?>" />
                <div class="property-overlay">
                    <span class="view-property"><img src="<?php print IMAGES; ?>/hover-cross.png" alt="View Property" /></span>
                </div>
            </span>
                <h3><?php echo $child['post_title']; ?></h3>
                <p><?php echo (get_field('property_address',$child['ID'])) ? get_field('property_address',$child['ID']):get_field('property_address'); ?></p>
            </a>
        </li>

    <?php }

  $i++;

endwhile; endif;
?>
    </ul>
  </div>
</div>
  
<script src="//maps.google.com/maps/api/js?sensor=true&key=AIzaSyAQP_ZUNOZEmMzdpB5dSbBVfew693OxlG0"></script>
<script src="<?php print TEMPPATH; ?>/js/gmaps.js"></script>
      
<script>
var xhr = <?php echo json_encode(array($properties)); ?>;
var interval; 
var propertyheight = $('#resultstable li').height();

  
var map = new GMaps({
  div: '#map-canvas',
  lat: 51.5073,
  lng: -0.1277,
  zoom: 6
});

  
function loadResults (data) {
  var items, markers_data = [];
  if (data.length > 0) {
    items = data[0].properties;
    for (var i = 0; i < items.length; i++) {
      var item = items[i];
      if (item.latlng.lat != undefined && item.latlng.lng != undefined) {
        if(item.property_status  == 'Sold'){
          var icon = '<?php print TEMPPATH; ?>/images/markerred.png';
        }else{
          var icon = '<?php print TEMPPATH; ?>/images/markergreen.png';
        }
        markers_data.push({
          lat : item.latlng.lat,
          lng : item.latlng.lng,
          title : item.property_name,
          icon : {
            size : new google.maps.Size(32, 32),
            url : icon
          },
          infoWindow: {
            content: '<a href="' + item.property_permalink + '" alt="' + item.property_title + '">' + item.property_title + '</a>'
          },
          permalink: item.property_permalink,
          image: item.main_photo,
          index: item.index,
          click: function(e) {
            position = e.getPosition();
            lat = position.lat();
            lng = position.lng();
            map.setCenter(lat, lng);

              var activeli = $( "#resultstable li" ).index( $('#mk' + e.index) );
              var propertyheight = $( "#resultstable li").outerHeight();

            $("#properties").scrollTo( ( ( propertyheight + 15 ) * activeli ) );
            $('#properties .active').removeClass('active');
            $('#mk' + e.index).addClass('active');
          }
        });
      }

    }
  }
  map.addMarkers(markers_data);
}
map.on('marker_added', function (marker) {
  var index = map.markers.indexOf(marker);
  if (index == map.markers.length - 1) {
    map.fitZoom();
  }
});
loadResults(xhr);
</script>

<?php get_footer('properties'); ?>