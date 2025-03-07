<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>目標体重設定</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/target.update.css) }}">

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
                <button class="logout" href="">
                    <img class="icon" src="ログアウト・サインアウトのアイコン素材 4.png" alt="ログアウトアイコン">
                    ログアウト
                </button>
            </nav>
        </div>
    </header>
    <!--ここから上はheader.blade.phpへ -->

    @extends('layouts.header')

    @section('title')
    <title>目標体重設定</title>
    @endsection

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/target.update.css) }}">   @endsection

    @section('content')
    <main class="main-content">
        <div class="content-inner">
            <h1>目標体重設定</h1>
            <div class="input-group">
                <input class="weight-input" type="number">
                <span class="unit">kg</span>
            </div>

            <div class="button-group">
                <button class="back-button" type="button">戻る</button>
                <button class="update-button" type="submit">更新</button>
            </div>
        </div>
    </main>
    @endsection