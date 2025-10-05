<x-layout>
    <div class="w-full relative pt-10">
        <div class="w-[80%] mx-auto" >
            {{-- search_container --}}
            <form method="get" action="{{ route('search.map') }}" class="w-full px-4">
                <div class="flex justify-center">
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
            
            <div class="mt-4">
                {{ $maps->links() }}
            </div>

            <div class="mt-10">
                <article class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 justify-items-center">
                    @forelse($maps as $map)
                        <x-map-card :title="$map->title" :map="$map" />
                    @empty
                        <div class="text-center py-20 w-full">
                            <p class="text-lg text-gray-500 font-black">何も見つかりませんでした</p>
                            <p class="text-sm text-gray-400 mt-2">別のキーワードでお試しください。</p>
                        </div>
                    @endforelse
                </article>
            </div>
        </div>
    </div>
</x-layout>