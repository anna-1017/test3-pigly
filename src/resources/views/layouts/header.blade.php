<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    @yield('css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <div class="header-logo">PiGLy</div>
            <nav class="header-nav">
                <button class="target-setting" href="">
                    <img class="icon" src="設定の歯車アイコン素材 1.png" alt="歯車アイコン">
                    目標体重設定
                </button>
                <form action="/logout" class="form" method="post">
                    @csrf
                    <button class="logout" href="">
                    <img class="icon" src="ログアウト・サインアウトのアイコン素材 4.png" alt="ログアウトアイコン">
                    ログアウト
                </button>
                </form>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')

    </main>
</body>
</html>
