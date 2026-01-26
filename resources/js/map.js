// マップの初期値の設定
export function createMap(center) {
  const googleMap = {};
  googleMap.map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: center,
  });
  googleMap.marker = new google.maps.Marker({ map: googleMap.map });
  googleMap.markers = [];

  return googleMap;
}

// マーカーを追加する
export function addMarker(coorde, googleMap, pinId) {
  const marker = new google.maps.Marker({
    position: coorde,
    map: googleMap.map,
  });
  googleMap.markers[pinId] = marker;
}

// マップ作成の際、クリックしたピンをすべて表示させる
export function fitAllMarkers(googleMap) {
  const markers = Object.values(googleMap.markers);
  if (markers.length === 0) return; 

  const bounds = new google.maps.LatLngBounds();
  markers.forEach(marker => bounds.extend(marker.getPosition()));

  googleMap.map.fitBounds(bounds); 

  // ズームの最大を12とする
  const listener = google.maps.event.addListenerOnce(googleMap.map, "bounds_changed", () => {
    if (googleMap.map.getZoom() > 12) {
      googleMap.map.setZoom(12);
    }
  });
}