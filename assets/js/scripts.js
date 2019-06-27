
(function($){
  "use strict";

    // Toggle menu
     $(".navbar-toggle").click(function() {
        $(this).toggleClass('in');
    });


    /*** Sticky header */
    $(window).scroll(function() {

        if ($(window).scrollTop() > 0) {
          $(".header").addClass("sticky");
        } 
        else {
          $(".header").removeClass("sticky");
        }
    });


    /*** Header height = gutter height */

    function setGutterHeight(){
        var header = document.querySelector('.navbar'),
            gutter = document.querySelector('.header_gutter');
            gutter.style.height = header.offsetHeight + 'px';
    }

    window.onload = setGutterHeight;
    window.onresize = setGutterHeight;


    /** Case Study Slider **/ 
    $(".banner").slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        arrows: false
    });

    /** Testimonials Slider **/ 
    $(".testimonial-quote-slider").slick({
        dots: true,
        infinite: true,
        arrows: false,
        asNavFor: '.testimonial-image-slider'
    });

    $('.testimonial-image-slider').slick({
        dots: false,
        infinite: true,
        arrows: false,
        vertical: true,
        centerMode: true,
        asNavFor: '.testimonial-quote-slider'
    });

    // initialize works mixitup 
    function photoInitiateMixItUp(){
        var container = $('.portfolios'),
            mobileFilter = $('#FilterSelect');

        container.mixItUp();

        // filter for mobile
        mobileFilter.on('change', function(){
            container.mixItUp('filter', this.value);
        });
    }

    photoInitiateMixItUp();


/*** Google map */
    // var mapElement = document.getElementById("gmap");
    // // if( mapElement) {
    // //     var map;
    // //     google.maps.event.addDomListener(window, 'load', init);
    // // }
    
    // function init() {

    //     var google_map_setting = {
    //         latitude: 35.434301,
    //         longitude: -96.1952543
    //     };
        
    //     // if (ajax.map_icon) {
    //     //     var image = ajax.map_icon
    //     // }

        
    //     var styles = [
    //         {elementType: 'geometry', stylers: [{color: '#F6F6F6'}]},
    //         {elementType: 'labels.text.stroke', stylers: [{color: '#F6F6F6'}]},
    //         {elementType: 'labels.text.fill', stylers: [{color: '#4D534C'}]},
    //         {
    //           featureType: 'administrative.locality',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#4D534C'}]
    //         },
    //         {
    //           featureType: 'poi',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#4D534C'}]
    //         },
    //         {
    //           featureType: 'poi.park',
    //           elementType: 'geometry',
    //           stylers: [{color: '#E8E8E8'}]
    //         },
    //         {
    //           featureType: 'poi.park',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#E8E8E8'}]
    //         },
    //         {
    //           featureType: 'road',
    //           elementType: 'geometry',
    //           stylers: [{color: '#D7D7D7'}]
    //         },
    //         {
    //           featureType: 'road',
    //           elementType: 'geometry.stroke',
    //           stylers: [{color: '#D7D7D7'}]
    //         },
    //         {
    //           featureType: 'road',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#606060'}]
    //         },
    //         {
    //           featureType: 'road.highway',
    //           elementType: 'geometry',
    //           stylers: [{color: '#D7D7D7'}]
    //         },
    //         {
    //           featureType: 'road.highway',
    //           elementType: 'geometry.stroke',
    //           stylers: [{color: '#D7D7D7'}]
    //         },
    //         {
    //           featureType: 'road.highway',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#CECECE'}]
    //         },
    //         {
    //           featureType: 'transit',
    //           elementType: 'geometry',
    //           stylers: [{color: '#D7D7D7'}]
    //         },
    //         {
    //           featureType: 'transit.station',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#4D534C'}]
    //         },
    //         {
    //           featureType: 'water',
    //           elementType: 'geometry',
    //           stylers: [{color: '#A0A09A'}]
    //         },
    //         {
    //           featureType: 'water',
    //           elementType: 'labels.text.fill',
    //           stylers: [{color: '#5F5F5F'}]
    //         },
    //         {
    //           featureType: 'water',
    //           elementType: 'labels.text.stroke',
    //           stylers: [{color: '#686868'}]
    //         }
    //     ]
    //     var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
    //     var mapOptions = {
    //         zoomControl: true,
    //         zoomControlOptions: {
    //             position: google.maps.ControlPosition.RIGHT_TOP
    //         },
    //         disableDefaultUI: true,
    //         draggable: true,
    //         scrollwheel: false,
    //         zoom: 16,
    //         center: google_map_setting,
    //         styles: styles,
    //     };

    //     // var contentString = ajax.gmap_address;
    //     // var infowindow = new google.maps.InfoWindow({
    //     //     // content: contentString,
    //     //     maxWidth: 200
    //     // });

    //     var map = new google.maps.Map(mapElement, mapOptions);

    //     var marker = new google.maps.Marker({
    //         position: new google.maps.LatLng( google_map_setting.latitude, google_map_setting.longitude),
    //         map: map,
    //         icon: '<span class="fas fa-map-marker-alt"></span>',
    //     });

    //     console.log(marker);

    //     google.maps.event.addListener(marker, 'click', function() {
    //         infowindow.open(map, marker);
    //     });

    //     var center = map.getCenter();
    //     google.maps.event.addDomListener(window, 'resize', function() {
    //         map.setCenter(center);
    //     });
    // }
    
})(jQuery);