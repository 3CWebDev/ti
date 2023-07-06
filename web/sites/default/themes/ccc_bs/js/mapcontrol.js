(function($, Drupal, drupalSettings) {

    'use strict';

    // This drives the interaction with the Geofield Google Map.
    Drupal.behaviors.geofieldGoogleMapInteraction = {
        attach: function (context, settings) {

            // React on geofieldMapInit event.
            $(document).on('geofieldMapInit', function (e, mapid) {

                $('#block-views-block-map-block-block-1 .views-field-title', context).each(function () {

                    $(this).hover(
                        function() {

                            var id = $(this).closest('.views-row').find('.ui-accordion-content').find('.views-field-nid').find('.marker-selector').attr('data-marker-id');

                            var map = Drupal.geoFieldMap.map_data[mapid].map;
                            var markers = Drupal.geoFieldMap.map_data[mapid].markers;
                            //console.log(markers);
                            google.maps.event.trigger(markers[id], 'click');
                        }
                    );
                });

            });
        }
    };

})(jQuery, Drupal, drupalSettings);