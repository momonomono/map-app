<x-layout>
    <article class="container mx-auto py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            {{-- ピン一覧 --}}
            <aside class="relative bg-white rounded-md shadow p-4 flex flex-col h-full">
                <h1 class="text-lg font-bold mb-4">登録済みピン</h1>
                
                <ul class="space-y-2 overflow-scroll flex-1 pr-2" id="pin-list">
                    @foreach($pins as $pin)
                        <li 
                            data-lat="{{ $pin->latitude }}" data-lng="{{ $pin->longitude }}"
                            class="cursor-pointer px-3 py-2 bg-blue-50 rounded hover:bg-blue-100 js-click-pin"
                        >
                            <h1>{{ $pin->title }}</h1>
                        </li>
                    @endforeach
                </ul>
            </aside>

            {{-- 地図エリア --}}
            <section class="md:col-span-2">
                <div id="map" class="h-[500px] w-full rounded-md shadow"></div>
            </section>
        </div>
        <div class=" py-6 px-16 space-y-8">
                
        {{-- マップ全体の情報 --}}
        <form class="space-y-6">
            <x-label-form title="マップのタイトル" name="title">
                <input type="text" name="title" class="w-full">
            </x-label-form>

            <div>
                <label class="block text-sm font-medium text-gray-700">説明</label>
                <textarea class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-blue-200"></textarea>
            </div>
        </form>
        
        {{-- 登録ボタン --}}
        <x-main-button text="マップを登録"/>
        </div>
    </article>
</x-layout>

