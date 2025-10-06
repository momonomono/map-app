<x-layout>
    <div class="w-full relative pt-10">
        <div class="mb-10">
            <h1 class="text-center text-5xl font-mono">MAP Maker</h1>
        </div>
    
        {{-- search_container --}}
        <form method="get" action="{{ route('search.map') }}" class="w-full px-4">
            <div class="flex justify-center overflow-x-hidden">
                <article class="flex w-full max-w-md sm:max-w-xl lg:max-w-2xl border border-gray-300 rounded-lg shadow-sm">
                    <input
                        name="keyword"
                        type="text"
                        class="flex-grow px-3 py-2 text-sm sm:text-base focus:outline-none"
                        placeholder="検索ワードを入力"
                    >
                    <button
                        class="bg-orange-400 text-white font-semibold px-4 sm:px-6 hover:bg-orange-500">
                        検索
                    </button>
                </article>
            </div>
        </form>
        
        <div class="text-center my-10 leading-10 text-gray-600">
            <p>お気に入りのマップを作って、<br class="inline sm:hidden"/>投稿することができます。</p>
            <p>googleMapの共有リンクを使用することで<br class="inline sm:hidden"/>マップに刺すピンを作ることができます。</p>
        </div>
            {{-- 最新の投稿セクション --}}
        <div class="sm:w-[80%] w-[90%] mx-auto mb-10">
            <article class="mt-10 w-full z-10 px-2 sm:px-10 py-8 grid gap-6 bg-black/40 rounded-2xl">
                <h2 class="text-xl lg:text-3xl font-bold text-white pl-4">最新の投稿</h2>
                
                <article class="relative flex items-center overflow-hidden" id="js-slider">
                    {{-- prev button --}}
                    <x-slider-button class="js-prev-button left-0 lg:left-4 bg-black/50 hover:bg-black/80 text-white">◀︎</x-slider-button>
            
                    {{-- next button --}}
                    <x-slider-button class="js-next-button right-4 bg-black/50 hover:bg-black/80 text-white">▶</x-slider-button>
            
                    {{-- slider items --}}
                    <ul class="flex gap-6 px-12 snap-x snap-mandatory transition-transform duration-300" id="js-slider-container">
                        @foreach($maps as $map)
                            <x-map-card 
                                :title="Str::limit($map->title, 30)"
                                :map="$map"
                            />
                        @endforeach
                    </ul>
                </article>
            </article>
        </div>
    </div>
</x-layout>