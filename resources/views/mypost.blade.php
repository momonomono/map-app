<x-layout>
    <div class="container mx-auto py-12">
        <x-text.title title="MAP一覧"/>

        <div class="mt-10">
            <article class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 justify-items-center">
                @forelse($maps as $map)
                    <x-map-card :title="$map->title" :map="$map" />
                @empty
                    <div class="w-full text-center py-20">
                        <p class="text-lg text-gray-500 font-black">何も見つかりませんでした</p>
                        <p class="block py-8">
                            <x-main-button
                                onclick="window.location.href='/post/map'"
                                class="bg-blue-500 hover:bg-blue-600" text="MAPを投稿する"
                            />
                        </p>
                    </div>
                @endforelse
            </article>
        </div>
    </div>
</x-layout>