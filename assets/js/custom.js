// Run Scripts once window loaded
jQuery(window).ready(function(){

    var scrollpos = 0;

    // Adds a floating class when scrolled past top;
    jQuery(window).scroll(function(){

        // Scroll Direction;
        if ( jQuery(window).scrollTop() > scrollpos) {
            jQuery('body').addClass('scrolling-down');
            jQuery('body').removeClass('scrolling-up');
        } else {
            jQuery('body').addClass('scrolling-up');
            jQuery('body').removeClass('scrolling-down');
        }
        scrollpos = jQuery(window).scrollTop();
        
        // Scroll Off Top of Page
        if (jQuery(window).scrollTop() > 0 ) {
            jQuery('body').addClass('liftoff');
        } else {
            jQuery('body').removeClass('liftoff');
            jQuery('body').removeClass('scrolling-up');
            jQuery('body').removeClass('scrolling-down');
        }

        // Fade Out Menu
        fade = jQuery(window).scrollTop() /1000;

        if (fade < 0.5 ) {
            jQuery('.cover .fader').css('opacity', 0.5+fade);
        }
        
    });
    
});