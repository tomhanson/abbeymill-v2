$(document).ready(function() { 
     //Individual Page slideshow  
    $('.flexslider').flexslider({
        animation: "fade",
        animationSpeed: 1000,
        controlNav: false
    });
    //Individual Page SubNav Tabs Large Screens
    $('.tabs a').click(function() {
        $this = $(this);		
        // hide panels
        $('.panel').hide();
        $('.tabs a.active').removeClass('active');		    
        // add active state to new tab
        $this.addClass('active').blur();	
        // retrieve href from link (is id of panel to display)
        var panel = $this.attr('href');
        // show panel
        $(panel).fadeIn(250);
        return(false);
    }); //end click
    $('.tabs li:first a').click(); //open first tab    
    //Single Page Flipbook
    $("#flipbook").wowBook({
        width: 1600,
        height: 600,
        centeredWhenClosed : true,
        hardcovers : true,
        turnPageDuration : 1500,
        mouseWheel : "zoom",
        zoomWindow : "#flipbook-wrapper",
        zoomStep : 1,
        scaleToFit: "#flipbook-wrapper"
    });
    //Initialise the flipbook and the google map on tab click.
    $(".modal").on("opened", function(){
        $("#flipbook").trigger("resize"); // this will make the book resize
    });
    $('.modal').on('shown.bs.modal', function (e) {
        $("#flipbook").trigger("resize"); // this will make the book resize
    });
    $("#location").on("click", function(){
        initialize();
    });
});