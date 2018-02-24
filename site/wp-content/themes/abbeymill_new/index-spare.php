<?php get_header(); ?>

<script>
  // ------------------------------
  // Move this to its own file and include it
  // ------------------------------
$.fn.scrollTo = function( target, options, callback ){
  if(typeof options == 'function' && arguments.length == 2){ callback = options; options = target; }
  var settings = $.extend({
    scrollTarget  : target,
    offsetTop     : 50,
    duration      : 500,
    easing        : 'swing'
  }, options);
  return this.each(function(){
    var scrollPane = $(this);
    var scrollTarget = (typeof settings.scrollTarget == "number") ? settings.scrollTarget : $(settings.scrollTarget);
    var scrollY = (typeof scrollTarget == "number") ? scrollTarget : scrollTarget.offset().top + scrollPane.scrollTop() - parseInt(settings.offsetTop);
    scrollPane.animate({scrollTop : scrollY }, parseInt(settings.duration), settings.easing, function(){
      if (typeof callback == 'function') { callback.call(this); }
    });
  });
}
</script>

<style type="text/css">
  /*
    Add this to yout CSS file
  */
  #maparea .active {
    background:red;
  }
  #maparea {
    width:100%;
    height:500px;
    position:relative;
  }
  #maparea #map-canvas {
    height:500px;
    display:block;
    padding:0;
  }
  #maparea #properties {
    position:absolute;
    left:50px;
    top:0px;
    height:500px;
    width:200px;
    overflow:auto;
    background:#fff;
    padding:20px;
  }
  #maparea #properties li {
    height:80px; /* IMPORTANT! You must set a fixed height for the scroll to work */
    border-bottom:1px solid #ccc;
  }
</style>


<!-- Leave the rest in here -->

<div id="maparea">
  <div id="map-canvas"></div>
  <div id="properties">
    <ul id="resultstable">

<?php 

$properties = array( 'overview' => array( 'total' => 0 ) );
$i = 0;

if( have_posts()) : while(have_posts()) : the_post();

  $pID = get_the_ID();
  $latlng = trim(rtrim(ltrim(get_field('latlng',$pID),'('),')'));
  $latlng = explode(',',$latlng);
  $image = get_field('main_photo',$pID);

  $properties['properties'][$i]['ID'] = $pID;
  $properties['properties'][$i]['property_name'] = get_field('property_name',$pID);
  $properties['properties'][$i]['property_description'] = get_field('property_description',$pID);
  $properties['properties'][$i]['property_status'] = get_field('property_status',$pID);
  $properties['properties'][$i]['property_permalink'] = get_permalink($pID);
  $properties['properties'][$i]['latlng']['full'] = trim($latlng[0]) . '|' . trim($latlng[1]);
  $properties['properties'][$i]['latlng']['lat'] = $latlng[0];
  $properties['properties'][$i]['latlng']['lng'] = $latlng[1];
  $properties['properties'][$i]['main_photo'] = $image['sizes']['propertieslist'];
  $properties['properties'][$i]['index'] = $i;
  
  ?>
  <li id="mk<?php echo $i; ?>"><a href="<?php echo get_permalink($pID); ?>" data-marker-index="<?php echo $i; ?>"><img src="<?php echo $image['sizes']['propertieslist']; ?>" alt="" /><?php echo get_field('property_name',$pID); ?></a></li>
  <?php

  $i++;

endwhile; endif; 
?>
    </ul>
  </div>
</div>
  
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
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
          permalink: item.property_permalink,
          image: item.main_photo,
          index: item.index,
          click: function(e) {
            position = e.getPosition();
            lat = position.lat();
            lng = position.lng();
            map.setCenter(lat, lng);
            $("#properties").scrollTo((propertyheight*e.index));
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

<?php get_footer(); ?>