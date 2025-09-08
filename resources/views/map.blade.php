<x-layout>
    <article class="container mx-auto py-12">
        <div class="w-full flex flex-col md:flex-row gap-4">
            
            {{-- map_box --}}
            <article class="md:basis-2/3 min-w-0">
                <div id="map" class="h-80 md:h-[500px] w-full rounded-md shadow-md"></div>
            </article>

            {{-- post_box --}}
            <article class="md:basis-1/3 bg-white rounded-md shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">投稿フォーム</h2>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">タイトル</label>
                        <input type="text" class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">説明</label>
                        <textarea class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-blue-200"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition">
                        登録
                    </button>
                </form>
            </article>

        </div>
    </article>
</x-layout>

