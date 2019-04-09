<?php
namespace Godogi\Pos\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Googlemap extends \Magento\Config\Block\System\Config\Form\Field
{
    protected function _getElementHtml(AbstractElement $element)
    {
      $html = '<div style="display:none;">' . $element->getElementHtml() . '</div>';
      $html .= '<style>
      #googleMap {
          height: 200px;
      }
      </style>
      <div id="googleMap"></div>
      <script type="text/javascript">
      var googleMap;
      function initMap() {
          var latitude = 27.7172453; // YOUR LATITUDE VALUE
          var longitude = 85.3239605; // YOUR LONGITUDE VALUE
          var myLatLng = {lat: latitude, lng: longitude};
          var marker;
          googleMap = new google.maps.Map(document.getElementById("googleMap"), {
            center: myLatLng,
            zoom: 14,
            disableDoubleClickZoom: true,
          });

          google.maps.event.addListener(googleMap,"click",function(event) {
              document.getElementById("godogipos_general_default_lat").value = event.latLng.lat();
              document.getElementById("godogipos_general_default_lng").value =  event.latLng.lng();
              document.getElementById("godogipos_general_default_zoom").value =  googleMap.getZoom();
          });

          google.maps.event.addListener(googleMap,"click",function(event) {
            if (marker && marker.setMap) {
              marker.setMap(null);
            }
            marker = new google.maps.Marker({
              position: event.latLng,
              map: googleMap,
              title: event.latLng.lat()+", "+event.latLng.lng()
            });
          });
      }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUNQBaWQiIE4zsTNXKGO2FJtdwOmonqt4&callback=initMap"
              async defer></script>';
        return $html;
    }
}
