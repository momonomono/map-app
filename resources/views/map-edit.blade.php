<x-layout>
    <article class="container mx-auto py-12">
        <x-text.title title="MAP 編集" />

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- ピン一覧 --}}
            <aside class="relative bg-white rounded-md shadow p-4 flex flex-col h-full">
                <h2 class="text-lg font-bold mb-4">登録済みピン</h2>

                <ul class="space-y-2 overflow-scroll flex-1 pr-2" id="pin-list">
                    @if ($pins->count() === 0)
                        <div class="flex flex-col items-center justify-center p-10">
                            <p class="text-gray-600 text-lg mb-4">まだピンが登録されていません</p>
                            <a href="{{ route('create.pin') }}"
                            class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow transition">
                                ピンを登録する
                            </a>
                        </div>
                    @else
                        @foreach($pins as $pin)
                            {{-- リスト --}}
                            <li 
                                data-id = "{{ $pin->id }}"
                                data-lat="{{ $pin->latitude }}" data-lng="{{ $pin->longitude }}"
                                class="cursor-pointer px-3 py-2 flex justify-between bg-blue-50 rounded hover:bg-blue-100 js-click-pin z-0"
                            >
                                <h1>{{ $pin->title }}</h1>


                                <div
                                    data-id = "{{ $pin->id }}" 
                                    class="flex gap-4 items-center justify-center"
                                >
                                    {{-- 編集ボタン --}}
                                    <button
                                        data-id = "{{ $pin->id }}"
                                        class="block hover:scale-125 duration-300 z-10 js-edit-button">
                                        <img src="{{ asset('images/edit.png') }}" class="w-6" >
                                    </button>

                                    {{-- 削除ぼたん --}}
                                    <form method="POST" action="{{ route('delete.pin') }}" class="js-delete-form">
                                        @csrf
                                        <input type="hidden" name="pin_id" value="{{ $pin->id }}">
                                        <button class="block hover:scale-125 duration-300 z-10">
                                            <img src="{{ asset('images/trashbox.png') }}" class="w-6">
                                        </button> 
                                    </form>


                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </aside>

            {{-- 地図エリア --}}
            <section class="md:col-span-2">
                <div id="map" class="h-[500px] w-full rounded-md shadow"></div>
            </section>
        </div>
        <div class=" py-6 px-16 space-y-8">
                
        {{-- マップ全体の情報 --}}
        <form method="POST">
            @csrf
            <div id="js-hidden-inputs">

            </div> 

            <x-label-form title="マップのタイトル" name="title">
                <input type="text" name="title" class="w-full">
            </x-label-form>

            <div>
                <label class="block text-sm font-medium text-gray-700">説明</label>
                <textarea class="w-full border rounded-md px-3 py-2 focus:ring focus:ring-blue-200" name="detail"></textarea>
            </div>

            {{-- 登録ボタン --}}
            @if ()
                <div class="pt-4 text-right">
                    <x-main-button text="マップを登録" class="bg-blue-500 hover:bg-blue-400"/>
                    <x-main-button text="マップを登録" class="bg-red-500 hover:bg-red-400"/>
                </div>
            @endif
        </form>
        
        </div>
    </article>
</x-layout>

