
        function initMap(){
            var location = {lat: 35.434301, lng: -96.1952543};
            var styles = [
            {elementType: 'geometry', stylers: [{color: '#515151'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#000'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#000'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515151'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#4D534C'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#E8E8E8'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#E8E8E8'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#D7D7D7'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#D7D7D7'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#606060'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#D7D7D7'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#D7D7D7'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#CECECE'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#D7D7D7'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#4D534C'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#A0A09A'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#5F5F5F'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#686868'}]
            }
        ]
            var map = new google.maps.Map(document.getElementById("gmap"), {
                zoom: 10,
                center: location,
                styles: styles
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map,
            });
       }
