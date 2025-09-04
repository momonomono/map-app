import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const prevButtons = document.querySelectorAll(".js-prev-button");
const nextButtons = document.querySelectorAll(".js-next-button");
let currentX = 0;

prevButtons.forEach(element => {
    element.addEventListener("click", (e) => moveSlider(e, -304));
});

nextButtons.forEach(element => {
    element.addEventListener("click", (e) => moveSlider(e, 304));
});

function moveSlider(e, direction) {
    const slider = e.currentTarget.closest(".js-slider");
    const ul = slider.querySelector("ul");
    if (!ul) return;
  
    // dataset に現在位置を保存しておく（初期値は 0）
    let currentX = parseInt(slider.dataset.currentX || "0", 10);
  
    // direction によって移動方向を変える
    currentX += direction;
  
    slider.dataset.currentX = currentX;
    ul.style.transform = `translateX(${currentX}px)`;
    ul.style.transition = "transform 0.3s ease";
  }
  