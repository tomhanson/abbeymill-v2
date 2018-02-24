<?php get_header(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>Address Geocoding</h1>
            <p>Google maps require the use of Latitude and Longditude for placing markers on maps. To ensure the map shows the correct location for each property, use the form below and search for an address, place or postcode. Copy the latitude and longditude for use when adding or editing a property.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 geo-form">
            <form action="" onsubmit="return:false;">
                <input name="add" type="text" id="address" class="required">
                <button type="submit" name="submit" class="btn">Search</button>
                <div id="result">
                    <span>(00.000000, 00.000000)</span>
                </div>
                <div id="map"></div>
            </form>
        </div>
    </div>
</div>




<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-GB"></script>
<script>
$(function(){

  var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    var place = autocomplete.getPlace();
  });
  
  $('form').submit(function(){
    cordinate();
    return false;
  });
  
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
            
          return false;
          
        } else {
          alert("Geocode was not successful for the following reason: " + status);
        }
      });
    }
}
  
</script>

<?php get_footer(); ?>
