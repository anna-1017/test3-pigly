

    @extends('layouts.header')

    @section('title')
    <title>目標体重設定</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/goal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">   
    @endsection

    @section('content')
    <main class="main-content">
        <div class="content-inner">
            <h1>目標体重設定</h1>
            <form action="/weight_logs/goal_setting" method="POST">
                @csrf
                <div class="input-group">
                    <input class="weight-input" type="number" name="target_weight">
                    <span class="unit">kg</span>
                    
                    @error('target_weight')
                        <span class="input_error">
                            <p class="input_error_message">{{ $errors->first('target_weight') }}</p>
                        </span>
                    @enderror
                </div>


                <div class="button-group">
                    <a class="back-button"  href="/weight_logs">戻る</a>
                    <button class="update-button" type="submit">更新</button>
                </div>
            </form>
        </div>
    </main>
    @endsection