<x-layout>
    <article class="container mx-auto py-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">ピンの編集</h1>
        
        {{-- プレビューエリア --}}
        <div class="w-full gap-4">
            
            {{-- map_box --}}
            <article class="relative md:basis-2/3 min-w-0 ">
                <div
                    id="map" class="h-80 md:h-[500px] w-full rounded-md shadow-md z-0 "
                    data-lat="{{ $pin->latitude }}" data-lng="{{ $pin->longitude }}"    
                ></div>
            </article>

            {{-- post_box --}}
            <article class=" p-6">
                <form method="POST" action="{{ route('update.pin', $pin->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="w-full flex gap-4 justify-start flex-wrap">
                        @for($i=0; $i<3; $i++)
                            <label class="relative flex flex-col justify-center items-center 
                                           w-28 h-28 md:w-36 md:h-36
                                           border-2 border-dashed border-gray-300 rounded-lg
                                           bg-gradient-to-br from-gray-50 to-gray-100
                                           hover:from-blue-50 hover:to-blue-100 hover:border-blue-400
                                           shadow-sm hover:shadow-md cursor-pointer transition
                                           js-preview-label">
                                
                                {{-- プレビュー画像 --}}
                                <img 
                                    class="absolute inset-0 w-full h-full object-cover rounded-lg js-preview-image"
                                    @isset ($pin->images[$i]->image_path)
                                        src="{{ asset('storage/' . $pin->images[$i]->image_path) }}"
                                    @endisset
                                >
                                
                                {{-- +アイコン --}}
                                <div class="flex flex-col items-center gap-1 text-gray-500 group-hover:text-blue-500 js-preview-box">
                                    <div class="w-8 h-8 flex items-center justify-center rounded-full 
                                                bg-white border border-gray-300 shadow">
                                        <span class="text-xl font-bold">+</span>
                                    </div>
                                    <p class="text-xs font-medium">追加</p>
                                </div>
                    
                                <input type="file" class="hidden js-images-for-pin" name="images[]" accept="image/*">
                            </label>
                        @endfor
                    </div>
                    @error('images')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <input type="hidden" value="{{ $pin->id }}" name="pin_id">

                    {{-- MAP URL投稿 --}}
                    <x-label-form title="MAP URL" name="map_url">
                        <input 
                            type="text" name="map_url" class="w-full" 
                            id="js-pin-form"
                            placeholder="変更がある場合は入力してください"
                            value="{{ old('map_url') ?? $pin->map_url }}"
                        >
                    </x-label-form>

                    {{-- タイトル投稿 --}}
                    <x-label-form title="タイトル" name="title">
                        <input type="text" name="title" 
                            class="w-full" id="js-form-pinTitle" value="{{ old('title') ?? $pin->title }}">
                    </x-label-form>
                    
                    {{-- 詳細投稿 --}}
                    <x-label-form title="詳細" name="detail">
                        <textarea class="w-full" name="detail">{{ old('detail') ?? $pin->detail }}</textarea>
                    </x-label-form>

                    {{-- 登録ボタン --}}
                    <div class="pt-4 text-right">
                        <x-main-button text="ピンを登録" class="bg-green-500 hover:bg-green-400"/>
                    </div>
                </form>
            </article>
        </div>
    </article>
</x-layout>