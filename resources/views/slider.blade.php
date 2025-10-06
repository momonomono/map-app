<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Tailwind Slider</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="relative w-full max-w-2xl overflow-hidden rounded-2xl shadow-lg">
<!-- Slider Wrapper -->
<div id="slider" class="flex transition-transform duration-500">
<img src="https://picsum.photos/800/400?random=1" class="w-full flex-shrink-0" />
<img src="https://picsum.photos/800/400?random=2" class="w-full flex-shrink-0" />
<img src="https://picsum.photos/800/400?random=3" class="w-full flex-shrink-0" />
</div>


<!-- Controls -->
<button id="prev" class="absolute top-1/2 -translate-y-1/2 left-4 bg-black/50 text-white px-3 py-2 rounded-full">◀</button>
<button id="next" class="absolute top-1/2 -translate-y-1/2 right-4 bg-black/50 text-white px-3 py-2 rounded-full">▶</button>


<!-- Indicators -->
<div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
<span class="indicator w-3 h-3 bg-white rounded-full cursor-pointer"></span>
<span class="indicator w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
<span class="indicator w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
</div>
</div>


<script>
const slider = document.getElementById("slider");
const slides = slider.children.length;
const indicators = document.querySelectorAll(".indicator");
let index = 0;


function showSlide(i) {
index = (i + slides) % slides;
slider.style.transform = `translateX(-${index * 100}%)`;
indicators.forEach((dot, idx) => {
dot.classList.toggle("bg-white", idx === index);
dot.classList.toggle("bg-gray-400", idx !== index);
});
}


document.getElementById("prev").addEventListener("click", () => showSlide(index - 1));
document.getElementById("next").addEventListener("click", () => showSlide(index + 1));
indicators.forEach((dot, idx) => dot.addEventListener("click", () => showSlide(idx)));


// Auto slide every 5 seconds
setInterval(() => showSlide(index + 1), 5000);
</script>
</body>
</html>