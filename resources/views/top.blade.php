<x-layout>
    <div class="container mx-auto">
        <h1>トップページ</h1>
        <article class="h-60">
            <article class="flex justify-between items-stretch h-60 w-full">
                <button class="bg-blue-400 w-8">◀︎</button>
                <ul class="flex h-full">
                    <li class="border h-full flex flex-col">
                        <p class="text-md md-1">タイトル</p>
                        <img class="w-full flex-1 object-contain shadow mb-1" src="{{ asset('img/luffy.png') }}">
                        <p>テキストテキストテキスト</p>
                    </li>
                </ul>
                <button class="bg-blue-400 w-8">▶︎</button>
            </article>
        </article>
    </div>
</x-layout>