$(document).ready(function() {
    //Navigation drop down              
    $('.mobile-icon').click(function(e) {
        $('#global-nav').stop().slideToggle("0");   
    }); 
    //add the header and footer size to pad the properties bar properties page  
    function propertiesBar() {
        var headerHeight = $('header').outerHeight();
        var footerHeight = $('footer').outerHeight();              
        $('#properties').css({'top' : headerHeight + 'px', 'bottom' : footerHeight + 'px'});
        $('#maparea').css('padding-top', headerHeight + 'px');
    }              
    propertiesBar();              
    $(window).resize(propertiesBar); 
    //Individual Page Subnav mobile only 
    function subNav() {
        var $width = $(window).width();
        if($width < 768) {
            $('.triangle').click(function(e) {
                $('#panels ul').stop().slideToggle("0");
            });
        }        
    } 
    //Initialise Subnav then init on resize
    subNav();
    $(window).resize(subNav);
    //Homepage full screen slider
		if($('#slides').length) {
			$('#slides').superslides({
					play : 7000,
					animation : 'fade',
					animation_speed : 'slow' 
			});
		}
});

