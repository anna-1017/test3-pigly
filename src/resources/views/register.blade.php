@extends('layouts.no-header')

    @section('title')
    <title>新規会員登録</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    @endsection

    @section('content')
    <main class="main-content">
        <div class="contents">
        <h1>PiGLy</h1>
        <p class="form-title">新規会員登録</p>
        <p class="step1">STEP1 アカウント情報の登録</p>
            <form class="form" action="/register/step1" method="POST">
                @csrf
                    <label class="label">お名前</label>
                    <input class="form-input" type="text" name="name" value="{{ old('name') }}" placeholder="名前を入力" />
                    @error('name')
                        <span class="input_error">
                            <p class="input_error_message">{{ $message }}</p>
                        </span>
                    @enderror
                    
                    <label class="label">メールアドレス</label>
                    <input class="form-input" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力" />
                    @error('email')
                        <span class="input_error">
                            <p class="input_error_message">{{ $errors->first('email') }}</p>
                        </span>
                    @enderror

                    <label class="label">パスワード</label>
                    <input class="form-input" type="password" name="password"  placeholder="パスワードを入力" />
                    @error('password')
                        <span class="input_error">
                            <p class="input_error_message">{{ $errors->first('password') }}</p>
                        </span>
                    @enderror

                <button class="form-button" type="submit">次に進む</button>
                <a class="login-notion"href="/login">ログインはこちら</a>

            </form>
        </div>
    </main>
    @endsection