$(function () {

    function initMap() {

        var map_section = $('#map');
        var depos = map_section.data('depos');
        var location = new google.maps.LatLng(-7.7891527, 110.4522545);

        var mapCanvas = map_section[0];
        var mapOptions = {
            center: location,
            zoom: 10,
            panControl: false,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);

        var markerImage = siteurl+'resource/indaco/img/marker.png';

        var markersz;
        for (var i in depos)
        {
            var location = new google.maps.LatLng(Number(depos[i].map_lat), Number(depos[i].map_lang));
            markersz = new google.maps.Marker({
                position: location,
                map: map,
                icon: markerImage,
                depo_id: depos[i].id,
                depo_index: i,
                depo_data: depos[i]
            });

            // console.log(depos[i]);

            // var infowindow = new google.maps.InfoWindow({
            //     content: '<div style="width:250px">' +
            //                '<div style="float:left;width:60%" class="depo-info-name"><h6>Depo<br>Tirtomartani</h6></div>' +
            //          '<div style="float:right;width:40%" class="depo-info-img"></div>' +
            //          '</div>' ,
            // });

            google.maps.event.addListener(markersz, 'click', (function(markersz, i) {
                return function() {
                    // infowindow.open(map, markersz);
                    var depo_data = markersz.get('depo_data');
                    // $('#depo-bg').css('background-image', 'url('+siteurl+'resource/uploaded/img/depo/'+depo_data.image+')');
                    $('.depo-search-left').css('background-image', 'url('+siteurl+'resource/uploaded/img/depo/'+depo_data.image+')');
                    $('.depo-name').html(depo_data.nama_depo);
                    $('.depo-alamat').html(depo_data.alamat_depo);
                    $('.depo-bm').html(depo_data.nama_bm);
                    $('.depo-admin').html(depo_data.nama_admin);
                    $('.depo-tel-bm').html(depo_data.tel_bm);
                    $('.depo-tel-admin').html(depo_data.tel_admin);
                }
            })(markersz, i));

            var info = new SnazzyInfoWindow({
                marker: markersz,
                placement: 'top',
                content: '<div style="width:250px;height: 80px;">' +
                                 '<div style="float:left;width:60%" class="depo-info-name"><h6>'+depos[i].nama_depo+'</h6></div>' +
                         '<div style="float:right;width:40%;height: 100%;background-size: 100%;background-image:url('+siteurl+'resource/uploaded/img/depo/'+depos[i].image+')" class="depo-info-img"></div>' +
                         '</div>' ,
                showCloseButton: true,
                closeOnMapClick: true,
                padding: '0px',
                backgroundColor: '#3549d4',
                border: false,
                borderRadius: '25px',
                shadow: true,
                fontColor: '#fff',
                fontSize: '13px'
            });

        }

        // var info = new SnazzyInfoWindow({
        //     // marker: markers,
        //     placement: 'top',
        //     // content: '<div style="width:250px">' +
        //     // 				 '<div style="float:left;width:60%" class="depo-info-name"><h6>Depo<br>Tirtomartani</h6></div>' +
        //     //          '<div style="float:right;width:40%" class="depo-info-img"></div>' +
        //     //          '</div>' ,
        //     showCloseButton: false,
        //     closeOnMapClick: true,
        //     padding: '0px',
        //     backgroundColor: '#3549d4',
        //     border: false,
        //     borderRadius: '25px',
        //     shadow: true,
        //     fontColor: '#fff',
        //     fontSize: '13px'
        // });
    
        var styles = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"simplified"},{"saturation":"-65"},{"lightness":"45"},{"gamma":"1.78"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"saturation":"-33"},{"lightness":"22"},{"gamma":"2.08"}]},{"featureType":"transit.station.airport","elementType":"geometry","stylers":[{"gamma":"2.08"},{"hue":"#ffa200"}]},{"featureType":"transit.station.airport","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.rail","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.rail","elementType":"labels.icon","stylers":[{"visibility":"simplified"},{"saturation":"-55"},{"lightness":"-2"},{"gamma":"1.88"},{"hue":"#ffab00"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#bbd9e5"},{"visibility":"simplified"}]}]

        map.set('styles', styles);

        var address_autocomplete = new google.maps.places.Autocomplete($('#address_map1')[0], {
            types: ['geocode']
        });

        address_autocomplete.addListener('place_changed', function () {
            // Get the place details from the autocomplete object.
            var place = address_autocomplete.getPlace();
            // var components = place.address_components;
            console.log(place);

            // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(10);  // Why 17? Because it looks good.
          }
        });

    }

    google.maps.event.addDomListener(window, 'load', initMap);
});