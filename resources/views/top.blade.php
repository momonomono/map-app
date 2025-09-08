<x-layout>
    <div class="w-full min-h-screen relative pt-10">
        <div class="mb-10">
            <h1 class="text-center text-5xl text-white font-mono">MAP Maker</h1>
        </div>

        {{-- 背景画像 --}}
        <img src="{{ asset('images/downtown.png') }}"
             class="absolute top-0 left-0 w-full h-full object-cover -z-10 blur-sm">
        <div class="absolute top-0 left-0 w-full h-full bg-black/60 -z-10"></div>
    
        {{-- search_container --}}
        <div class="flex justify-center">
            <article class="mx-auto flex border-gray-100 h-10">
                <input type="text" class="hover:border-none w-96" placeholder="タグ検索">
                <button class="bg-orange-400 w-14">検索</button>
            </article>
        </div>
    
        <div class="container mx-auto grid gap-12 py-10">
            
            {{-- スライダーセクション --}}
            <article class="w-full z-10 px-10 py-8 grid gap-6 bg-black/40 rounded-2xl shadow-lg">
                <h2 class="text-3xl font-bold text-white border-l-4 border-blue-400 pl-4">おすすめ</h2>
                
                <article class="relative flex items-center js-slider overflow-hidden">
                    {{-- prev button --}}
                    <x-slider-button class="js-prev-button left-4 bg-black/50 hover:bg-black/80 text-white">◀︎</x-slider-button>
            
                    {{-- next button --}}
                    <x-slider-button class="js-next-button right-4 bg-black/50 hover:bg-black/80 text-white">▶</x-slider-button>
            
                    {{-- slider items --}}
                    <ul class="flex gap-6 w-full px-12 snap-x snap-mandatory transition-transform duration-300">
                        <li class="snap-center shrink-0 w-64 h-72 bg-white/80 backdrop-blur-sm rounded-xl shadow-md flex flex-col justify-center items-center hover:scale-105 hover:shadow-xl transition">
                            <h2 class="font-bold text-xl mb-2">Slide 1</h2>
                            <p class="text-sm">サンプルテキスト</p>
                        </li>
                        <li class="snap-center shrink-0 w-64 h-72 bg-white/80 backdrop-blur-sm rounded-xl shadow-md flex flex-col justify-center items-center hover:scale-105 hover:shadow-xl transition">
                            <h2 class="font-bold text-xl mb-2">Slide 2</h2>
                            <p class="text-sm">別のカード</p>
                        </li>
                    </ul>
                </article>
            </article>
    
            {{-- 最新の投稿セクション --}}
            <article class="w-full z-10 px-10 py-8 grid gap-6 bg-black/40 rounded-2xl shadow-lg">
                <h2 class="text-3xl font-bold text-white border-l-4 border-green-400 pl-4">最新の投稿</h2>
                
                <article class="relative flex items-center js-slider overflow-hidden">
                    {{-- prev button --}}
                    <x-slider-button class="js-prev-button left-4 bg-black/50 hover:bg-black/80 text-white">◀︎</x-slider-button>
            
                    {{-- next button --}}
                    <x-slider-button class="js-next-button right-4 bg-black/50 hover:bg-black/80 text-white">▶</x-slider-button>
            
                    {{-- slider items --}}
                    <ul class="flex gap-6 w-full px-12 snap-x snap-mandatory transition-transform duration-300">
                        <li class="snap-center shrink-0 w-64 h-72 bg-white/80 backdrop-blur-sm rounded-xl shadow-md flex flex-col justify-center items-center hover:scale-105 hover:shadow-xl transition">
                            <h2 class="font-bold text-xl mb-2">Slide 1</h2>
                            <p class="text-sm">サンプルテキスト</p>
                        </li>
                    </ul>
                </article>
            </article>
        </div>
    </div>
</x-layout>