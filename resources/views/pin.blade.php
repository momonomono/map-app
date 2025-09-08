<x-layout>
    <article class="w-1/2 mx-auto py-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">ピンの登録</h1>
        
        <div class="relative w-full h-80">
            <div id="map" class="w-full h-80 rounded-md shadow-md absolute z-0"></div>
            <div id="photo-preview" class="flex flex-wrap gap-3 mb-2 z-10"></div>
        </div>

        <form class="bg-white shadow-lg rounded-xl p-8 space-y-6">
            {{-- 名前 --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">名前</label>
                <input 
                    type="text" 
                    class="w-full h-10 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none px-3"
                    placeholder="ピンの名前を入力">
            </div>

            {{-- URL --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">ピンのURL</label>
                <input 
                    type="url" 
                    class="w-full h-10 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none px-3"
                    placeholder="https://example.com">
            </div>

            {{-- 説明文 --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">説明文</label>
                <textarea 
                    class="w-full h-24 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none px-3 py-2 resize-none"
                    placeholder="説明を入力してください"></textarea>
            </div>

            {{-- 複数画像 --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">写真</label>
            
                <input type="file" id="photo-input" class="hidden" accept="image/*" multiple>
                <button type="button" onclick="document.getElementById('photo-input').click()"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    写真を選択
                </button>
            </div>

            {{-- 登録ボタン --}}
            <div class="flex justify-center">
                <button 
                    type="submit"
                    class="px-10 py-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white font-semibold shadow-md transition">
                    登録
                </button>
            </div>
        </form>
    </article>
</x-layout>