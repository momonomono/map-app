<header class="w-full bg-white h-20 relative">
    <div  class="container mx-auto h-full flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold">MAP Maker</h1>
        </div>
        <ul class="flex gap-4">
            @auth
                <li>マイページ</li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button>ログアウト</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}">ログイン</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">サインイン</a>
                </li>
            @endauth
        </ul>
    </div>
</header>