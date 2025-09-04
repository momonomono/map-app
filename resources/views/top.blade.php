<x-layout>
    <div class="w-full h-fit relative min-h-screen pt-10 grid gap-4">
    {{-- 背景画像 --}}
        <img src="{{ asset('images/downtown.png') }}"
            class="absolute top-0 left-0 w-full h-full object-cover -z-10">
        
        {{-- search_container --}}
        <article class="bg-white w-full h-32 z-10">
            
        </article>
            
        <div class="container mx-auto bg-none grid gap-4">
            
            {{-- スライダーコンテナ --}}
            <article class="w-full h-fit z-10 px-10 py-8 grid gap-4 overflow-hidden bg-black/70">
                <h2 class="text-4xl text-white text-bold drop-shadow-lg">おすすめ</h2>
                
                <article class="overflow-hidden relative flex items-center justify-center js-slider">
                    {{-- prev button --}}
                    <x-slider-button class="js-prev-button left-4">◀︎</x-slider-button>
            
                    {{-- next button --}}
                    <x-slider-button class="js-next-button right-4">▶</x-slider-button>
            
                    {{-- slider items --}}
                    <ul class="flex gap-6 w-full px-12 snap-x snap-mandatory box-border">
                        <li class="z-0 snap-center shrink-0 w-64 h-72 bg-white/80 rounded-xl shadow-md flex flex-col justify-center items-center">
                            <h2 class="font-bold text-xl mb-2">Slide 1</h2>
                            <p class="text-sm">サンプルテキスト</p>
                        </li>
                    </ul>
                </article>
                
            </article>
    
            <article class="w-full h-fit z-10 px-10 py-8 grid gap-4 overflow-hidden bg-black/70">
                <h2 class="text-4xl text-white text-bold drop-shadow-lg">最新の投稿</h2>
                
                <article class="overflow-hidden relative flex items-center justify-center js-slider">
                    {{-- prev button --}}
                    <x-slider-button class="js-prev-button left-4">◀︎</x-slider-button>
            
                    {{-- next button --}}
                    <x-slider-button class="js-next-button right-4">▶</x-slider-button>
            
                    {{-- slider items --}}
                    <ul class="flex gap-6 w-full px-12 snap-x snap-mandatory box-border">
                        <li class="z-0 snap-center shrink-0 w-64 h-72 bg-white/80 rounded-xl shadow-md flex flex-col justify-center items-center">
                            <h2 class="font-bold text-xl mb-2">Slide 1</h2>
                            <p class="text-sm">サンプルテキスト</p>
                        </li>
                    </ul>
                </article>
                
            </article>
        </div>
    </div>
</x-layout>