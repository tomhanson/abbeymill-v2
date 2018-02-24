<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>Address Geocoding</h1>
            <p>Google maps require the use of Latitude and Longditude for placing markers on maps. To ensure the map shows the correct location for     each property, use the form below and search for an address, place or postcode. Copy the latitude and longditude for use when adding or editing a property.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form style="padding:50px;margin:50px;text-align:center;">
              <input name="add" type="text" id="address" class="required" style="width:100%;padding:1em 2em;">
                <button type="submit" name="submit" class="button">Search</button>
                <div id="result" style="clear:both;width:100%;text-align:center;font-size:18px;padding:3em 0 1em 0;color:#999;">
                    <span>(00.000000, 00.000000)</span>
                </div>
              <div id="map"></div>
            </form>
        </div>
    </div>
</div>




<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-GB"></script>
<script>
$(function(){

  var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    var place = autocomplete.getPlace();
  });
  
  google.maps.event.addListener(marker, 'click', function() {
    map.setZoom(8);
    map.setCenter(marker.getPosition());
  });
  
  $('form').submit(function(){
    cordinate();
    return false;
  })
  
});  

function cordinate()
{
    geocoder = new google.maps.Geocoder();
    address1 = document.getElementById("address").value;

    if (geocoder)
    {
      geocoder.geocode( { 'address': address1}, function(results, status)
      {
        if (status == google.maps.GeocoderStatus.OK)
        {
          
          var location1 = results[0].geometry.location;
          var basiclatlng = location1;
          $('#result span').text(basiclatlng);
          
          var mapdiv = $('#map');
          mapdiv.html('<img src="//maps.googleapis.com/maps/api/staticmap?center=' + basiclatlng + '&zoom=15&size=400x400&markers=color:blue|' + basiclatlng + '" alt="" />');
            
        } else {
          alert("Geocode was not successful for the following reason: " + status);
        }
      });
    }
}
  
</script>

<?php get_footer(); ?>
