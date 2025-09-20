let map_lat = 35.681236;
let map_lng = 139.767125;

let marker;
let map;

document.addEventListener("DOMContentLoaded", () => {
  const tokyoStation = { lat: map_lat, lng: map_lng };
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: tokyoStation,
  });
  marker = new google.maps.Marker({
    position: tokyoStation,
    map: map,
    title: "東京駅",
  });
});

const pinList = document.querySelectorAll('.js-click-pin');
if (pinList){
  pinList.forEach((pin) => {
    pin.addEventListener('click', () => {
      const new_pin_lat = Number(pin.getAttribute('data-lat'));
      const new_pin_lng = Number(pin.getAttribute('data-lng'));
  
      console.log(new_pin_lat, new_pin_lng);
  
      marker.setPosition({ lat: new_pin_lat, lng: new_pin_lng });
      map.setCenter({ lat: new_pin_lat, lng: new_pin_lng});
    });
  });
}

const pinForm = document.querySelector('#js-pin-form');
if (pinForm) {
  pinForm.addEventListener('blur', async () => {
    const url = pinForm.value;
    
    
  });
}
