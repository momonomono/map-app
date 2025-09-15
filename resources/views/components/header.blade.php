<header class="w-full bg-white h-20 relative">
    <div  class="container mx-auto h-full flex justify-between items-center">
        <div>
            <a href="{{ route('top') }}">
                <h1 class="text-2xl font-bold">MAP Maker</h1>
            </a>
        </div>
        <ul class="flex gap-4">
            @auth
                <li>
                    <a href="{{ route('profile.edit') }}">マイページ</a>
                </li>
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