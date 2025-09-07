<div class="relative flex justify-between items-center ">
    <div>
        <h1 class="text-2xl font-bold">MAP Maker</h1>
    </div>
    <ul class="flex gap-4">
        @auth
            <li>マイページ</li>
            <li>
                <form>
                    @csrf
                    <a href="{{ route('logout') }}">ログアウト</a>
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