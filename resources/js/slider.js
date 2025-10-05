// スライダーの動作
if (window.location.pathname == "/") {
    // ボタン
    const prevButtons = document.querySelectorAll(".js-prev-button");
    const nextButtons = document.querySelectorAll(".js-next-button");
    
    // カードの大きさを取得、一回の移動量を指定
    const card = document.querySelectorAll(".js-map-card");
    const cardWidth = card[0].offsetWidth + 24;

    // クリックイベント
    prevButtons.forEach(element => {
        element.addEventListener("click", (e) => moveSlider(e, - cardWidth));
    });
    
    nextButtons.forEach(element => {
        element.addEventListener("click", (e) => moveSlider(e, cardWidth));
    });
    

    // スライダーの移動
    function moveSlider(e, direction) {
        // スライダーと画像コンテナの大きさを取得
        const slider = e.currentTarget.closest("#js-slider");
        const ul = slider.querySelector("ul");
        if (!ul) return;
        
        const sliderWidth = slider.offsetWidth;
        const containerWidth = ul.offsetWidth;
        const maxMovePrev = containerWidth - sliderWidth;
        
        // dataset に現在位置を保存しておく（初期値は 0）
        let currentX = parseInt(slider.dataset.currentX || "0", 10);
      
        // direction によって移動方向を変える
        currentX += direction;
        
        // スライドの限界値
        if (currentX > 0) {
            currentX = 0;
        } else if(currentX < - maxMovePrev) {
            currentX = - maxMovePrev;
        }
        
        // 移動のアニメーション
        slider.dataset.currentX = currentX;
        ul.style.transform = `translateX(${currentX}px)`;
        ul.style.transition = "transform 0.3s ease";
      }
}