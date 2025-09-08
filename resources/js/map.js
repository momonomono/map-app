// 東京駅を中心にマップ表示
const map = L.map('map').setView([35.6812, 139.7671], 13);

// OpenStreetMap タイルを表示
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
}).addTo(map);

// ピンを立てる
const marker = L.marker([35.6812, 139.7671]).addTo(map)
  .bindPopup('東京駅')
  .openPopup();

document.getElementById("photo-input").addEventListener("change", function(e) {
    const preview = document.getElementById("photo-preview");
    preview.innerHTML = ""; // 一旦リセット
    
    Array.from(e.target.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(event) {
            const img = document.createElement("img");
            img.src = event.target.result;
            img.className = "w-24 h-24 object-cover rounded-md shadow";
            preview.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
});