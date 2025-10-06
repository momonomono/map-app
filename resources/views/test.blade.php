<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Google Map サンプル</title>
  <style>
    #map {
      height: 500px;   /* 高さは必須 */
      width: 100%;
    }
  </style>
</head>
<body>
  <h1>Googleマップを表示</h1>
  <div id="map"></div>

  <!-- Google Maps API 読み込み -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
          async defer></script>

  <script>
    function initMap() {
      // 東京駅の座標
      const tokyoStation = { lat: 35.681236, lng: 139.767125 };

      // マップを表示
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,               // ズームレベル
        center: tokyoStation,   // 東京駅を中心に
      });

      // マーカーを置く
      new google.maps.Marker({
        position: tokyoStation,
        map: map,
        title: "東京駅",
      });
    }
  </script>
</body>
</html>