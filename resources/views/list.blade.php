<x-layout>
    <div class="container mx-auto py-12">
        <x-text.title title="投稿一覧"/>

        <div class="mb-8 w-full">
            
        </div>

        <article class="grid grid-cols-1 gap-10 lg:grid-cols-2">
            @for($i = 0; $i < 4; $i++)
                <div class="grid gap-2 w-full border-2 p-4 rounded hover:shadow-2xl duration-500 space-y-3">
                    <h2 class="text-lg font-bold">タイトル</h2>
                    <p class="text-gray-600">説明</p>
                    
                    <div class="relative w-full h-[400px] rounded-xl shadow-lg">
                        {{-- マップ背景 --}}
                        <iframe
                            class="w-full h-full"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.947501284251!2d139.7671258152587!3d35.681236280194144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bf3542f1f3d%3A0x2f3a5c5e8d8c7c!2z5pel5pys44CB44CSMTAwLTAwMTUg5p2x5Lqs6YO95riv5Yy66KW_5Zub77yR5LiB55uu77yR77yT4oiS77yR77yQIOODk-ODqyDjgqLjg7Pjg5Xjg6zjg7w!5e0!3m2!1sja!2sjp!4v1638251744559!5m2!1sja!2sjp"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    </div>

                    <div class="flex justify-between items-center">
                        <p class="text-red-400 text-bold text-lg">♡ 1</p>
                        <a href="#" class="text-blue-500">
                            詳細を見る
                        </a>
                    </div>
                </div>
            @endfor
        </article>
    </div>
</x-layout>