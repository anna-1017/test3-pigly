

    @extends('layouts.header')

    @section('title')
    <title>情報更新</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/update.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">   
    @endsection

    @section('content')
    <main class="main-content">
        <div class="content-inner">
            <h1 class="content-header">Weight Log</h1>
            <form class="update-form" action="{{ route('weight_logs.update', ['weightLogId' => $weightLog->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <label class="label" for="date">日付</label>
                <input class="input" type="date" id="date" name="date" value="{{ $weightLog->date }}" />
                @error('date')
                    <span class="input_error">
                        <p class="input_error_message">{{ $message }}</p>
                    </span>
                @enderror

                <label class="label">体重</label>
                <div class="input-group">
                    <input class="input-unit" type="number" step="0.1" name="weight" value="{{ $weightLog->weight }}">
                    <span class="unit">kg</span>
                </div>
                @error('weight')
                    <span class="input_error">
                        <p class="input_error_message">{{ $errors->first('weight') }}</p>
                    </span>
                @enderror

                <label class="label">摂取カロリー</label>
                <div class="input-group">
                    <input class="input-unit" type="number" step="1" name="calories" value="{{ $weightLog->calories }}">
                    <span class="unit">cal</span>
                </div>
                @error('calories')
                    <span class="input_error">
                        <p class="input_error_message">{{ $errors->first('calories') }}</p>
                    </span>
                @enderror

                <label class="label">運動時間</label>
                <input class="input" type="number" step="0.1" name="exercise_time" value="{{ $weightLog->exercise_time }}">
                @error('exercise_time')
                    <span class="input_error">
                        <p class="input_error_message">{{ $errors->first('exercise_time') }}</p>
                    </span>
                @enderror

                <label class="label">運動内容</label>
                <textarea class="textarea "name="exercise_content" placeholder="運動内容を追加">{{ $weightLog->exercise_content }}</textarea>
                @error('exercise_content')
                    <span class="input_error">
                        <p class="input_error_message">{{ $errors->first('exercise_content') }}</p>
                    </span>
                @enderror

                <div class="button-container">
                    <div class="button-group">
                        <button class="back-button" type="button">戻る</button>
                        <button class="update-button" type="submit">更新</button>
                    </div>

                    <div class="trash-can">
                        <a href="{{ route('weight_logs.delete', ['weightLogId' => $weightLog->id]) }}">
                            <img class="trash-can-icon" src="{{ asset('images/trash_can.png') }}" alt="ゴミ箱の画像">
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </main>
    @endsection