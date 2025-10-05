<x-layout>
    <article class="container mx-auto py-12">
        <x-text.title :title="$map->title"/>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            {{-- ピン一覧 --}}
            <aside class="relative bg-white rounded-md shadow p-4 flex flex-col h-full">
                <h1 class="text-lg font-bold mb-4">登録済みピン</h1>
                
                <ul class="space-y-2 overflow-scroll flex-1 pr-2" id="pin-list">
                    
                    @foreach($map->pins as $pin)
                        {{-- リスト --}}
                        <li 
                            data-lat="{{ $pin->latitude }}"
                            data-lng="{{ $pin->longitude }}"
                            class="cursor-pointer px-3 py-2 flex justify-between bg-blue-50 rounded hover:bg-blue-100 z-0 js-detail-pin"
                        >
                            <h1>{{ $pin->title }}</h1>
                        </li>
                    @endforeach
                </ul>
            </aside>

            {{-- 地図エリア --}}
            <section class="md:col-span-2">
                <div
                    data-id="{{ $map->id }}" 
                    id="map" class="h-[500px] w-full rounded-md shadow"></div>
            </section>
        </div>

        <div class="mt-4 hadow-md p-6 border border-gray-200 bg-white">
            <h2 class="text-xl font-bold text-gray-800 pl-3 mb-3">詳細</h2>
            <p class="text-gray-700 leading-relaxed">
                {{ $map->detail }}
            </p>
        </div>

        @if ($flg)
            <div class="mt-4 py-6 mr-20  flex justify-end gap-8">
                <form method="POST" action="{{ route('delete.map') }}" class="js-delete-form">
                    @csrf
                    <input type="hidden" value="{{ $map->id }}" name="id">
                    <x-main-button text="削除" class="bg-red-500 hover:bg-red-400 block"/>
                </form>
            </div>
        @endif
    </article>
</x-layout>