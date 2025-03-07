
@extends('layouts.no-header')

    @section('title')
    <title>新規会員登録</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/step2.css') }}">
    @endsection

    @section('content')
    <main class="main-content">
        <div class="contents">
        <h1>PiGLy</h1>
        <p class="form-title">新規会員登録</p>
        <p class="step2">STEP2 体重データの入力</p>
        <form action="/register/step2" method="POST">
            @csrf
                <label class="label">現在の体重</label>
                <input class="form-input" type="text"  name="weight" placeholder="現在の体重を入力"><span class="kg">kg</span>
                @error('weight')
                    <span class="input_error">
                        <p class="input_error_message">{{ $errors->first('weight') }}</p>
                    </span>
                @enderror

                <label class="label">目標の体重</label>
                <input class="form-input" type="text"  name="target_weight" placeholder="目標の体重を入力"><span class="kg">kg</span>
                @error('target_weight')
                    <span class="input_error">
                        <p class="input_error_message">{{ $errors->first('target_weight') }}
                        </p>
                    </span>
                @enderror

                <button class="form-button" type="submit">アカウント作成</button>
        </form>
        </div>
    </main>
    @endsection