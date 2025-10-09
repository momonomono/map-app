<li class="js-map-card w-64 h-72 flex flex-col justify-center items-center hover:shadow-xl transition rounded-md overflow-hidden">
    {{-- 画像スライダー --}}
    <div class="relative w-full h-full">
        <div class="flex w-full h-full overflow-hidden snap-x snap-mandatory hover:shadow-xl js-image-container">
            @foreach($map->randomImage as $image )
                <img src="{{ asset('storage/' . $image->image_path) }}"
                     class="w-full h-full object-cover flex-shrink-0 snap-center js-map-card-image">
            @endforeach
        </div>

        {{-- 下部オーバーレイ --}}
        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent p-4 z-10">
            <h2 class="text-white font-bold text-lg mb-2">{{ $title }}</h2>
            <a href="{{ route('show.map', $map->id) }}"
               class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
               詳細を見る
            </a>
        </div>

        {{-- ドットインジケータ --}}
        <ul class="absolute bottom-3 left-1/2 flex gap-3 z-20">
            @foreach($map->randomImage as $image )
                <li class="w-3 h-3 bg-white/80 rounded-full cursor-pointer hover:scale-125 transition js-card-dot"></li>
            @endforeach
        </ul>
    </div>
</li>