<x-layout>
    <div class="container mx-auto">
        <section class="w-100">
            <h1>Hello</h1>
            <article class="h-60 flex justify-between">
                <button class="w-8 h-full bg-blue-600">◀︎</button>
                <ul class="flex ">
                    <li class="flex flex-col h-full border">
                        <p class="text-md">タイトル</p>
                        <img src="{{ asset('images/luffy.png') }}"
                            class="flex-1 object-contain h-max-full">
                        <p class="text-sm">テキストテキストテキスト</p>
                    </li>
                </ul>
                <button class="w-8 h-full bg-blue-600">▶︎</button>
            </article>
        </section>
    </div>
</x-layout>