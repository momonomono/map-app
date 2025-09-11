// 東京駅を中心にマップ表示
const map = L.map('map').setView([35.6812, 139.7671], 13);

if(map){
  // OpenStreetMap タイルを表示
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
  }).addTo(map);
  
  // ピンを立てる
  const marker = L.marker([35.6812, 139.7671]).addTo(map)
    .bindPopup('東京駅')
    .openPopup();
}

