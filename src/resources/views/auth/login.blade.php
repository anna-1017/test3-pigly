

    @extends('layouts.no-header')

    @section('title')
    <title>ログイン</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @endsection

    @section('content')
    <main class="main-content">
        <div class="contents">
        <h1>PiGLy</h1>
        <p class="form-title">ログイン</p>
            <form class="form" action="{{ route('login') }}" method="POST">
                @csrf
                    <label class="label">メールアドレス</label>
                    <input class="form-input" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力">
                    @error('email')
                        <span class="input_error">
                            <p class="input_error_message">{{ $errors->first('email') }}</p>
                        </span>
                    @enderror

                    <label class="label">パスワード</label>
                    <input class="form-input" type="password" name="password" placeholder="パスワードを入力">
                    @error('password')
                        <span class="input_error">
                            <p class="input_error_message">{{ $errors->first('password') }}</p>
                        </span>
                    @enderror
                    
                    <button class="form-button" type="submit">ログイン</button>
                
                    <a class="register-notion" href="/register/step1">アカウント作成はこちら</a>
            </form>
        </div>
    </main>
    @endsection