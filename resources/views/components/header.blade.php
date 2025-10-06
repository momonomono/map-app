<header class="w-full bg-white h-20 shadow-md relative">
    <div class="container mx-auto h-full flex justify-between items-center px-4">
        
        <div class="flex items-center gap-4">
            <a href="{{ route('top') }}">
                <h1 class="text-2xl font-bold">MAP Maker</h1>
            </a>
        </div>

        
        @auth
        <ul class="hidden sm:flex gap-6 items-center">
            <li><a href="{{ route('create.map') }}" class="hover:underline">MAP</a></li>
            <li><a href="{{ route('create.pin') }}" class="hover:underline">PIN</a></li>
            <li><a href="{{ route('mypost') }}" class="hover:underline">MYPOST</a></li>
            <li><a href="{{ route('profile.edit') }}" class="hover:underline">マイページ</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="hover:underline">ログアウト</button>
                </form>
            </li>
        </ul>
        @else
        <ul class="hidden sm:flex gap-6 items-center">
            <li><a href="{{ route('login') }}" class="hover:underline">ログイン</a></li>
            <li><a href="{{ route('register') }}" class="hover:underline">サインイン</a></li>
        </ul>
        @endauth

        {{-- スマホ用メニューボタン --}}
        <button id="menu-btn" class="sm:hidden sm:text-xl z-30">
            <img src="{{ asset('images/bars.png') }}" class="w-8 h-8"/>
        </button>
    </div>

    {{-- スマホ用メニュー --}}
    <ul id="menu"
        class="fixed inset-0 w-screen h-screen bg-gray-800/90 text-white flex flex-col items-center justify-center gap-8 text-2xl hidden z-20">
        @auth
            <li><a href="{{ route('create.map') }}">MAP</a></li>
            <li><a href="{{ route('create.pin')}}">PIN</a></li>
            <li><a href="{{ route('mypost') }}">MYPOST</a></li>
            <li><a href="{{ route('profile.edit') }}">マイページ</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button>ログアウト</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">ログイン</a></li>
            <li><a href="{{ route('register') }}">サインイン</a></li>
        @endauth
    </ul>
</header>