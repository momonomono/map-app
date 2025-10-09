import './bootstrap';

import Alpine from 'alpinejs';
import './map.js';
import './picture.js';

import './pin.js';
import './post.js';
import './slider.js';
import './header.js';

window.Alpine = Alpine;

Alpine.start();

import { initMap, addMarker, fitAllMarkers } from './map.js';
import { changeGoogleMap, addHiddenInputBox } from './pin.js';

// const map =
// if () {

// }
window.initMap = () => initMap({ lat: 35.681236, lng: 139.767125 });

document.addEventListener("DOMContentLoaded", () => {
    const mapCards = document.querySelectorAll(".js-map-card");

    mapCards.forEach( (card) => {
        const container = card.querySelector('.js-image-container');
        const dots = card.querySelectorAll('.js-card-dot');
        
        dots.forEach((dot, index)=>{
            dot.addEventListener("click", () =>{
                const imageWidth = card.clientWidth;

                container.scrollTo({
                    left: imageWidth * index,
                    behavior: "smooth"
                }); 
            });
        });
    })
});

// マップ投稿画面
if (window.location.pathname == "/post/map") {
    document.addEventListener("DOMContentLoaded", () => {
        // マップの初期設定
        const tokyoStation = { lat: 35.681236, lng: 139.767125 };
        const googleMap = initMap(tokyoStation);

        const pinList = document.querySelectorAll('.js-click-pin');
        pinList.forEach((pin) => {
            // クリックしたイベント
            pin.addEventListener('click', () => {
                const pinId = pin.getAttribute('data-id');
                const newLat = Number(pin.getAttribute('data-lat'));
                const newLng = Number(pin.getAttribute('data-lng'));
                const coord = {lat: newLat, lng: newLng};
                
                if (googleMap.markers[pinId]) {
                    googleMap.markers[pinId].setMap(null);
                    delete googleMap.markers[pinId];
                } else {
                    addMarker(coord, googleMap, pinId);
                }

                fitAllMarkers(googleMap);
                addHiddenInputBox(pinId); 
            });
        });
      });
}

// 詳細画面　マップ表示のための処理
if (/^\/post\/\d+$/.test(window.location.pathname)) {
    document.addEventListener("DOMContentLoaded", () => {
        const mapContainer = document.querySelector("#map");
        const map_id = mapContainer.getAttribute("data-id");

        let map;
        let markers = [];

        fetch("/post/detail",{
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                id : map_id
            })
        })
        .then(response => response.json())
        .then(pins => {
            // マップの初期設定
            map = new google.maps.Map(mapContainer, {
                center: { lat: 35.681236, lng: 139.767125 },
                zoom: 10,
            });

            // 複数ピンを打つためのインスタンス
            const bounds = new google.maps.LatLngBounds();

            // 登録したマップに結びつけたピンを作成
            pins.forEach((pin) => {
                const lat = parseFloat(pin.latitude);
                const lng = parseFloat(pin.longitude);

                const marker = new google.maps.Marker({
                    position: {lat: lat, lng: lng},
                    map: map,
                    title: pin.title
                });

                markers.push(marker);
                bounds.extend(marker.position);
            });

            // ピンが一個の場合一つをズーム、2つ以上ある場合全体が映るように
            if (pins.length > 1) {
                map.fitBounds(bounds);
            } else if (pins.length === 1) {
                map.setCenter(bounds.getCenter());
                map.setZoom(12);
            }

            // 詳細画面のピンリストをクリックした際にマップの中心に置く
            const lists = document.querySelectorAll('.js-detail-pin');
            lists.forEach((list) => {
                list.addEventListener('click', () => {
                    const lat = Number(list.getAttribute('data-lat'));
                    const lng = Number(list.getAttribute('data-lng'));
                    const coord = { lat: lat, lng: lng };
                    
                    map.setCenter(coord);

                    // クリックした際のモーション
                    const targetMarker = markers.find(
                        (m) => m.getPosition().lat() === lat && m.getPosition().lng() === lng
                    );
                    if (targetMarker) {
                        targetMarker.setAnimation(google.maps.Animation.BOUNCE);
                        setTimeout(() => targetMarker.setAnimation(null), 1400);
                    }
                });
            });
        })
        .catch(error => console.error("通信エラー:", error));
    });

    
}

// ピン編集画面
if (/^\/edit\/pin\/\d+$/.test(window.location.pathname)) {

    // マップに登録した座標のピンを刺す
    document.addEventListener("DOMContentLoaded", () => {
        const mapElement = document.querySelector("#map");
        const pinLat = Number(mapElement.getAttribute("data-lat"));
        const pinLng = Number(mapElement.getAttribute("data-lng"));
        const coord = {lat: pinLat, lng: pinLng};

        const googleMap = initMap(coord);
        googleMap.marker.setPosition(coord);
    });
}



// ピンのページでMAP_URLを入力終わった時点でマップを変化
const pinForm = document.querySelector('#js-pin-form');
if (pinForm) {
    const tokyoStation = { lat: 35.681236, lng: 139.767125 };
    const googleMap = initMap(tokyoStation);

    // フォームを入力し終わった時
    pinForm.addEventListener('change', async () => {
        const map_url = pinForm.value;
        changeGoogleMap(googleMap, map_url);
    });
}