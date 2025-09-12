<x-layout>
    <article class="container mx-auto py-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">ピンの登録</h1>
        
        {{-- プレビューエリア --}}
        <div class="w-full gap-4">
            
            {{-- map_box --}}
            <article class="relative md:basis-2/3 min-w-0 ">
                <div id="map" class="h-80 md:h-[500px] w-full rounded-md shadow-md z-0"></div>
            </article>

            {{-- post_box --}}
            <article class=" p-6">
                <form class="space-y-4">
                    <div class="w-full flex gap-6 justify-between">
                        @for($i=0; $i<3; $i++)
                            <label class="relative flex flex-col justify-center items-center w-full aspect-square 
                                           border-2 border-dashed border-gray-400 rounded-xl
                                           bg-gradient-to-br from-gray-100 to-gray-200
                                           hover:from-blue-50 hover:to-blue-100 hover:border-blue-400
                                           shadow-sm hover:shadow-md cursor-pointer transition
                                           js-preview-label">
                                
                                <img class="absolute w-full h-full hidden js-preview-image">
                                <div class="flex flex-col items-center gap-2 text-gray-500 group-hover:text-blue-500 js-preview-box">
                                    <div class="w-12 h-12 flex items-center justify-center rounded-full 
                                                bg-white border border-gray-300 shadow">
                                        <span class="text-3xl font-bold">+</span>
                                    </div>
                                    <p class="text-sm font-medium">画像を追加</p>
                                </div>
                    
                                <input type="file" class="hidden js-images-for-pin" name="images[]" accept="image/*" >
                            </label>
                        @endfor
                    </div>

                    <x-label-form title="タイトル" name="title">
                        <input type="text" name="title" class="w-full">
                    </x-label-form>
                    
                    <x-label-form title="詳細" name="detail">
                        <textarea class="w-full"></textarea>
                    </x-label-form>
                    <x-main-button text="ピンを登録" />
                </form>
            </article>

        </div>
    </article><
</x-layout>