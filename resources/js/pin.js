// 共有リンクのURLをリダイアルして座標を取得、ピンを作成Ú
export function changeGoogleMap(googleMap, map_url){
    fetch('/pins', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            url: map_url
        })
    })
    .then(res => res.json())
    .then(data => {
        const pin = data[0];
        const pin_lat = parseFloat(pin.lat);
        const pin_lng = parseFloat(pin.lng);
        const coord = { lat: pin_lat, lng: pin_lng};

        const decode_place = decodeURIComponent(pin.place);
        const pinTitle = document.querySelector('#js-form-pinTitle');

        pinTitle.value = decode_place;
        
        googleMap.marker.setPosition(coord);
        googleMap.map.setCenter(coord);
    })
    .catch(err => {
        console.log('errが出ました');
    });
}

// ピンをクリックした際に、マップに追加するピンIDのフォームを追加する
export function addHiddenInputBox(id) {
    const hiddenInputBox = document.querySelector("#js-hidden-inputs");
    const target = document.querySelector(`#js-pin-${id}`);

    if (target) {
      target.remove();
    } else {
      const input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'pins[]';
      input.value = `${id}`;
      input.id = `js-pin-${id}`;
      hiddenInputBox.appendChild(input);
    }
}